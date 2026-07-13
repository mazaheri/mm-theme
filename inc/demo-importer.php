<?php
/**
 * Import Demo — admin page for pushing theme image assets into the database.
 *
 * Follows the Version 5 Import Demo pattern: images committed to
 * content/images/ in git get imported as real WP attachments via a web UI
 * (Appearance → Import Demo) instead of WP-CLI, so production never needs
 * shell access. Text/markup on this theme is static (see front-page.php,
 * template-parts/coming-soon.php) — this importer only handles images.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// ── Admin menu ──────────────────────────────────────────────────────────────
function mm_theme_demo_menu() {
	add_theme_page( 'Import Demo Content', 'Import Demo', 'manage_options', 'mm-theme-demo-import', 'mm_theme_demo_page' );
}
add_action( 'admin_menu', 'mm_theme_demo_menu' );

// ── Admin page UI ───────────────────────────────────────────────────────────
function mm_theme_demo_page() {
	$imported = false;
	$synced   = [];
	$errors   = [];

	if ( isset( $_POST['mm_theme_run_import'] ) && check_admin_referer( 'mm_theme_import_nonce' ) ) {
		$result = mm_theme_run_import();
		if ( is_wp_error( $result ) ) {
			$errors[] = $result->get_error_message();
		} else {
			$imported = true;
		}
	}

	if ( isset( $_POST['mm_theme_sync_selected'] ) && check_admin_referer( 'mm_theme_import_nonce' ) ) {
		require_once ABSPATH . 'wp-admin/includes/image.php';
		require_once ABSPATH . 'wp-admin/includes/file.php';
		require_once ABSPATH . 'wp-admin/includes/media.php';
		$selected = isset( $_POST['components'] ) ? array_map( 'sanitize_key', (array) $_POST['components'] ) : [];
		foreach ( $selected as $key ) {
			$comp = mm_theme_get_component( $key );
			if ( $comp && is_callable( $comp['fn'] ) ) {
				call_user_func( $comp['fn'] );
				$synced[] = $comp['label'];
			}
		}
	}

	$check      = mm_theme_check_import_status();
	$components = mm_theme_get_components();
	?>
	<div class="wrap">
		<h1>Import &amp; Sync</h1>
		<p style="max-width:700px;color:#555;">
			Image assets committed to this theme in git (<code>content/images/</code>) get pushed into the
			database from here &mdash; no CLI access needed on production. Safe to re-run: unchanged files are
			skipped (hash-checked), changed files are re-imported.
		</p>

		<?php if ( $imported ) : ?>
			<div class="notice notice-success is-dismissible"><p><strong>Full sync complete!</strong> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" target="_blank">View site &rarr;</a></p></div>
		<?php endif; ?>
		<?php if ( ! empty( $synced ) ) : ?>
			<div class="notice notice-success is-dismissible"><p><strong>Synced:</strong> <?php echo esc_html( implode( ', ', $synced ) ); ?> &mdash; <a href="<?php echo esc_url( home_url( '/' ) ); ?>" target="_blank">View site &rarr;</a></p></div>
		<?php endif; ?>
		<?php foreach ( $errors as $err ) : ?>
			<div class="notice notice-error"><p><?php echo esc_html( $err ); ?></p></div>
		<?php endforeach; ?>

		<div style="max-width:700px; margin-top:1.5rem;">

			<?php if ( 'ok' === $check['status'] ) : ?>
				<div class="notice notice-success inline" style="margin-bottom:1.5rem;"><p>&#9989; Site content is up to date.</p></div>
			<?php else : ?>
				<div class="notice notice-warning inline" style="margin-bottom:1.5rem;">
					<p>&#9888;&#65039; Some assets are out of sync:</p>
					<ul style="margin:0 0 .5rem 1.5rem;list-style:disc;">
						<?php foreach ( $check['warnings'] as $warning ) : ?>
							<li><?php echo esc_html( $warning ); ?></li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endif; ?>

			<!-- Component selector -->
			<form method="post">
				<?php wp_nonce_field( 'mm_theme_import_nonce' ); ?>
				<h3 style="margin-bottom:.25rem;">Select what to sync</h3>
				<p style="color:#666;font-size:13px;margin:0 0 1rem;">Re-imports the current file from git for the selected component(s).</p>
				<table class="wp-list-table widefat striped" style="margin-bottom:1rem;">
					<thead>
					<tr>
						<th style="width:36px;padding:8px 10px;"><input type="checkbox" id="mm-select-all"></th>
						<th style="padding:8px 10px;">Component</th>
					</tr>
					</thead>
					<tbody>
					<?php foreach ( $components as $key => $comp ) : ?>
						<tr>
							<td style="padding:10px;"><input type="checkbox" name="components[]" value="<?php echo esc_attr( $key ); ?>"></td>
							<td style="padding:10px;">
								<strong><?php echo esc_html( $comp['label'] ); ?></strong><br>
								<span style="color:#666;font-size:12px;"><?php echo esc_html( $comp['desc'] ); ?></span>
							</td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
				<script>
				document.getElementById('mm-select-all').addEventListener('change', function () {
					document.querySelectorAll('input[name="components[]"]').forEach(function (cb) { cb.checked = this.checked; }, this);
				});
				</script>
				<?php submit_button( 'Sync Selected', 'primary large', 'mm_theme_sync_selected', false ); ?>
			</form>

			<!-- Sync all -->
			<details style="margin-top:2rem;">
				<summary style="cursor:pointer;font-weight:600;color:#1a5c2e;font-size:14px;">&#9654; Sync all components at once</summary>
				<div style="margin-top:.75rem;padding:.75rem 1rem;background:#d4edda;border-left:4px solid #28a745;">
					<p style="margin:0 0 .75rem;font-size:13px;">Runs every component in one shot.</p>
					<form method="post">
						<?php wp_nonce_field( 'mm_theme_import_nonce' ); ?>
						<?php submit_button( 'Sync All', 'secondary', 'mm_theme_run_import', false ); ?>
					</form>
				</div>
			</details>

		</div>
	</div>
	<?php
}

// ── Component registry ───────────────────────────────────────────────────────
function mm_theme_get_components() {
	return [
		'about_photo' => [
			'label' => 'Founder Photo',
			'desc'  => 'Imports content/images/homepage/about-photo.png as a WP attachment for use on the homepage',
			'fn'    => 'mm_theme_import_about_photo',
		],
		'site_icon'   => [
			'label' => 'Site Icon / Favicon',
			'desc'  => 'Imports assets/images/icon-512.png as a WP attachment and sets it as the Site Icon (used by wp-admin, feeds, and browser favicons)',
			'fn'    => 'mm_theme_import_site_icon',
		],
	];
}

function mm_theme_get_component( $key ) {
	$components = mm_theme_get_components();
	return isset( $components[ $key ] ) ? $components[ $key ] : null;
}

// ── Status check ──────────────────────────────────────────────────────────────
function mm_theme_check_import_status() {
	$warnings = [];

	if ( ! mm_theme_find_attachment_by_source_path( get_template_directory() . '/content/images/homepage/about-photo.png' ) ) {
		$warnings[] = 'Founder photo not imported yet';
	}
	if ( ! get_option( 'site_icon' ) ) {
		$warnings[] = 'Site icon not set yet';
	}

	return [
		'status'   => empty( $warnings ) ? 'ok' : 'needs_sync',
		'warnings' => $warnings,
	];
}

// ── Main import runner (Sync All) ──────────────────────────────────────────────
function mm_theme_run_import() {
	require_once ABSPATH . 'wp-admin/includes/image.php';
	require_once ABSPATH . 'wp-admin/includes/file.php';
	require_once ABSPATH . 'wp-admin/includes/media.php';
	mm_theme_import_about_photo();
	mm_theme_import_site_icon();
	return true;
}

// ── Smart file import (Pattern 1 — hash-dedup, v5 methodology) ───────────────
function mm_theme_smart_import_file( $full_path ) {
	if ( ! file_exists( $full_path ) ) {
		return new WP_Error( 'not_found', "File not found: $full_path" );
	}

	$hash      = md5_file( $full_path );
	$norm_path = wp_normalize_path( $full_path );

	$existing = get_posts( [
		'post_type'      => 'attachment',
		'post_status'    => 'any',
		'posts_per_page' => 1,
		'meta_query'     => [ [ 'key' => '_source_file_path', 'value' => $norm_path ] ],
	] );

	if ( $existing ) {
		$att_id = $existing[0]->ID;
		if ( get_post_meta( $att_id, '_source_file_hash', true ) === $hash ) {
			return [ 'id' => $att_id, 'status' => 'skipped' ];
		}
		wp_delete_attachment( $att_id, true );
	}

	$filename = basename( $full_path );
	$upload   = wp_upload_bits( $filename, null, file_get_contents( $full_path ) ); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents
	if ( ! empty( $upload['error'] ) ) {
		return new WP_Error( 'upload_failed', $upload['error'] );
	}

	$mime   = wp_check_filetype( $upload['file'] );
	$att_id = wp_insert_attachment( [
		'guid'           => $upload['url'],
		'post_mime_type' => $mime['type'],
		'post_title'     => sanitize_file_name( $filename ),
		'post_status'    => 'inherit',
	], $upload['file'] );

	if ( is_wp_error( $att_id ) ) {
		return $att_id;
	}

	wp_update_attachment_metadata( $att_id, wp_generate_attachment_metadata( $att_id, $upload['file'] ) );
	update_post_meta( $att_id, '_source_file_path', $norm_path );
	update_post_meta( $att_id, '_source_file_hash', $hash );

	return [ 'id' => $att_id, 'status' => 'imported' ];
}

// ── Founder photo ─────────────────────────────────────────────────────────────
function mm_theme_import_about_photo() {
	return mm_theme_smart_import_file( get_template_directory() . '/content/images/homepage/about-photo.png' );
}

// ── Site icon / favicon ────────────────────────────────────────────────────────
function mm_theme_import_site_icon() {
	$result = mm_theme_smart_import_file( get_template_directory() . '/assets/images/icon-512.png' );
	if ( ! is_wp_error( $result ) ) {
		update_option( 'site_icon', $result['id'] );
	}
	return $result;
}
