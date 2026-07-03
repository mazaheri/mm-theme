<?php
/**
 * Import Demo — admin page for syncing theme content.
 *
 * Follows the Version 5 Import Demo pattern: a Component Registry synced via
 * a web UI (Appearance → Import Demo) instead of WP-CLI, so production never
 * needs shell access to apply content updates that ship in git.
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

	if ( isset( $_POST['mm_theme_run_reset'] ) && check_admin_referer( 'mm_theme_import_nonce' ) ) {
		mm_theme_reset_content();
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
			Theme code and default copy live in git. Use this page to push that content into the database
			&mdash; no CLI access needed on production. Unchanged values are simply overwritten with the
			current defaults, so it's always safe to re-run.
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
			<?php elseif ( 'needs_sync' === $check['status'] ) : ?>
				<div class="notice notice-warning inline" style="margin-bottom:1.5rem;">
					<p>&#9888;&#65039; Some values are out of sync:</p>
					<ul style="margin:0 0 .5rem 1.5rem;list-style:disc;">
						<?php foreach ( $check['warnings'] as $warning ) : ?>
							<li><?php echo esc_html( $warning ); ?></li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php else : ?>
				<div class="notice notice-error inline" style="margin-bottom:1.5rem;"><p>&#128308; Content not set up yet. Use <strong>Sync All</strong> below.</p></div>
			<?php endif; ?>

			<!-- Component selector -->
			<form method="post">
				<?php wp_nonce_field( 'mm_theme_import_nonce' ); ?>
				<h3 style="margin-bottom:.25rem;">Select what to sync</h3>
				<p style="color:#666;font-size:13px;margin:0 0 1rem;">Re-applies the default copy for the selected component(s).</p>
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

			<!-- Reset (danger) -->
			<details style="margin-top:.75rem;">
				<summary style="cursor:pointer;font-weight:600;color:#856404;font-size:14px;">&#9654; Reset &amp; Reimport Everything (destructive)</summary>
				<div style="margin-top:.75rem;padding:.75rem 1rem;background:#fff3cd;border-left:4px solid #ffc107;">
					<p style="margin:0 0 .75rem;font-size:13px;">Clears every stored theme mod and option managed by this importer, then runs a full fresh import of the defaults.</p>
					<form method="post" onsubmit="return confirm('This will reset all imported content to defaults. Are you sure?');">
						<?php wp_nonce_field( 'mm_theme_import_nonce' ); ?>
						<?php submit_button( 'Reset & Reimport Everything', 'secondary', 'mm_theme_run_reset', false, [ 'style' => 'background:#856404;color:#fff;border-color:#856404;' ] ); ?>
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
		'pages'       => [
			'label' => 'Pages &amp; Navigation',
			'desc'  => 'Creates the AI Landing Page, Lead-Gen Landing Page, and Coaching Landing Page as WordPress pages, assigns their templates, and creates the primary navigation menu',
			'fn'    => 'mm_theme_import_pages',
		],
		'coming_soon' => [
			'label' => 'Coming Soon Page Content',
			'desc'  => 'Brand label, heading, tagline, meta description, theme color, footer text, social links',
			'fn'    => 'mm_theme_import_coming_soon_content',
		],
		'ai_landing'  => [
			'label' => 'AI Landing Page Content',
			'desc'  => 'Hero copy, founder quote, CTA labels, contact email for the AI Landing Page template',
			'fn'    => 'mm_theme_import_ai_landing_content',
		],
		'faq'         => [
			'label' => 'AI Landing Page — FAQ',
			'desc'  => 'The 5 FAQ question/answer pairs shown on the AI Landing Page',
			'fn'    => 'mm_theme_import_ai_landing_faq',
		],
		'team'        => [
			'label' => 'AI Landing Page — Team',
			'desc'  => 'The 4 team member name/role entries shown on the AI Landing Page',
			'fn'    => 'mm_theme_import_ai_landing_team',
		],
		'coaching'    => [
			'label' => 'Coaching Landing Page Content',
			'desc'  => 'Hero copy, bio, services, steps, testimonials, FAQ, Calendly URL, and about image for the Coaching Landing Page',
			'fn'    => 'mm_theme_import_coaching_content',
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

	if ( ! get_theme_mod( 'mm_brand_label' ) ) {
		$warnings[] = 'Coming Soon content not synced';
	}
	if ( ! get_theme_mod( 'mm_ai_hero_heading' ) ) {
		$warnings[] = 'AI Landing Page content not synced';
	}
	if ( ! get_option( 'mm_ai_landing_faq' ) ) {
		$warnings[] = 'AI Landing Page FAQ not synced';
	}
	if ( ! get_option( 'mm_ai_landing_team' ) ) {
		$warnings[] = 'AI Landing Page team not synced';
	}
	if ( ! get_theme_mod( 'mm_coaching_hero_heading' ) ) {
		$warnings[] = 'Coaching Landing Page content not synced';
	}

	if ( count( $warnings ) >= 5 ) {
		return [
			'status'   => 'needs_reset',
			'warnings' => $warnings,
		];
	}
	if ( ! empty( $warnings ) ) {
		return [
			'status'   => 'needs_sync',
			'warnings' => $warnings,
		];
	}
	return [
		'status'   => 'ok',
		'warnings' => [],
	];
}

// ── Main import runner (Sync All) ──────────────────────────────────────────────
function mm_theme_run_import() {
	require_once ABSPATH . 'wp-admin/includes/image.php';
	require_once ABSPATH . 'wp-admin/includes/file.php';
	require_once ABSPATH . 'wp-admin/includes/media.php';
	mm_theme_import_coming_soon_content();
	mm_theme_import_ai_landing_content();
	mm_theme_import_ai_landing_faq();
	mm_theme_import_ai_landing_team();
	mm_theme_import_coaching_content();
	return true;
}

// ── Reset ───────────────────────────────────────────────────────────────────────
function mm_theme_reset_content() {
	foreach ( [
		'mm_brand_label',
		'mm_heading',
		'mm_tagline',
		'mm_meta_description',
		'mm_theme_color',
		'mm_footer_text',
		'mm_social_instagram',
		'mm_social_linkedin',
		'mm_ai_hero_eyebrow',
		'mm_ai_hero_heading',
		'mm_ai_hero_subhead',
		'mm_ai_founder_quote',
		'mm_ai_founder_name',
		'mm_ai_contact_email',
		'mm_coaching_hero_eyebrow',
		'mm_coaching_hero_heading',
		'mm_coaching_hero_subhead',
		'mm_coaching_calendly_url',
		'mm_coaching_cta_label',
		'mm_coaching_pain_heading',
		'mm_coaching_pain_body',
		'mm_coaching_about_heading',
		'mm_coaching_about_bio',
		'mm_coaching_about_image_id',
		'mm_coaching_social_proof_label',
		'mm_coaching_result_heading',
		'mm_coaching_cta_heading',
		'mm_coaching_cta_body',
		'mm_coaching_contact_email',
	] as $mod ) {
		remove_theme_mod( $mod );
	}

	foreach ( [
		'mm_ai_landing_faq',
		'mm_ai_landing_team',
		'mm_coaching_services',
		'mm_coaching_steps',
		'mm_coaching_metrics',
		'mm_coaching_testimonials',
		'mm_coaching_faq',
	] as $opt ) {
		delete_option( $opt );
	}
}

// ── Coming Soon content ──────────────────────────────────────────────────────
function mm_theme_import_coming_soon_content() {
	$mods = [
		'mm_brand_label'       => 'Mazz Marketing',
		'mm_heading'           => 'Coming Soon',
		'mm_tagline'           => "We're building something great. Stay tuned.",
		'mm_meta_description'  => 'Mazz Marketing is launching soon. Follow us on Instagram and LinkedIn for updates.',
		'mm_theme_color'       => '#0b0d1a',
		'mm_footer_text'       => '&copy; ' . gmdate( 'Y' ) . ' Mazz Marketing',
		'mm_social_instagram'  => 'https://www.instagram.com/mazz_marketing',
		'mm_social_linkedin'   => 'https://www.linkedin.com/in/pourya-mazaheri-fard-2b4299390/',
	];
	foreach ( $mods as $key => $value ) {
		set_theme_mod( $key, $value );
	}
}

// ── AI Landing Page — singular copy ──────────────────────────────────────────
function mm_theme_import_ai_landing_content() {
	$mods = [
		'mm_ai_hero_eyebrow'  => 'AI MARKETING FOR GROWING BRANDS',
		'mm_ai_hero_heading'  => 'Marketing that thinks as fast as you grow.',
		'mm_ai_hero_subhead'  => "AI-driven strategy paired with hands-on execution — campaigns, content, and automation built to compound results.",
		'mm_ai_founder_quote' => "We don't guess — we test, measure, and scale what actually moves revenue.",
		'mm_ai_founder_name'  => 'Pourya Mazaheri, Founder',
		'mm_ai_contact_email' => 'hello@mazzmarketing.com',
	];
	foreach ( $mods as $key => $value ) {
		set_theme_mod( $key, $value );
	}
}

// ── AI Landing Page — FAQ (structured, repeating) ────────────────────────────
function mm_theme_import_ai_landing_faq() {
	update_option( 'mm_ai_landing_faq', [
		[
			'q' => 'What services do you offer?',
			'a' => 'We handle paid media, lifecycle marketing, content production, and marketing automation — either as a full-service partner or focused on the specific channel you need help with.',
		],
		[
			'q' => 'How long does onboarding take?',
			'a' => 'Most clients are fully onboarded and live within two to three weeks, starting with the growth assessment and moving straight into a phased rollout.',
		],
		[
			'q' => 'Do I need any technical setup on my end?',
			'a' => 'No. We handle the technical integration with your ad accounts, CRM, and analytics tools — you just need admin access to grant permissions.',
		],
		[
			'q' => 'How is our data handled?',
			'a' => 'Your data stays in your own ad accounts and analytics platforms wherever possible. Anything we process directly is encrypted and never shared with third parties.',
		],
		[
			'q' => 'Can this actually grow with my business?',
			'a' => 'Yes — our packages are built to scale from a single channel up to a fully automated, multi-channel system as your budget and team grow.',
		],
	] );
}

// ── AI Landing Page — Team (structured, repeating) ───────────────────────────
function mm_theme_import_ai_landing_team() {
	update_option( 'mm_ai_landing_team', [
		[
			'name'     => 'Pourya Mazaheri',
			'role'     => 'Founder &amp; CEO',
			'initials' => 'PM',
		],
		[
			'name'     => 'Mahsa Sanati',
			'role'     => 'Strategy &amp; Operations',
			'initials' => 'MS',
		],
		[
			'name'     => 'Jonas Lindqvist',
			'role'     => 'Creative Director',
			'initials' => 'JL',
		],
		[
			'name'     => 'Amara Klein',
			'role'     => 'Client Success',
			'initials' => 'AK',
		],
	] );
}

// ── Coaching Landing Page — all content ──────────────────────────────────────
function mm_theme_import_coaching_content() {
	// Text theme mods — idempotent (safe to re-run)
	$mods = [
		'mm_coaching_hero_eyebrow'       => 'TECHNICAL MARKETING COACHING',
		'mm_coaching_hero_heading'       => 'Get more leads, fix your tracking, and scale what works.',
		'mm_coaching_hero_subhead'       => 'Hands-on coaching for business owners who want a website that converts, ads that actually work, and tracking they can trust.',
		'mm_coaching_calendly_url'       => 'https://calendly.com/mazzmarketing/30min',
		'mm_coaching_cta_label'          => 'Book Free 30-Min Call',
		'mm_coaching_pain_heading'       => "You're spending on ads but the results don't add up.",
		'mm_coaching_pain_body'          => "Your website isn't converting. Your ad accounts have gaps. Your analytics don't tell you where buyers actually come from. You've tried fixing it yourself — it takes too long and nothing sticks.",
		'mm_coaching_about_heading'      => 'Pourya Mazaheri',
		'mm_coaching_about_bio'          => "I'm a technical marketing consultant who has helped dozens of businesses fix the gap between their marketing spend and their results. I work directly in your ad accounts, your website, and your analytics — no handoffs, no black boxes.",
		'mm_coaching_social_proof_label' => 'Trusted by business owners across Europe',
		'mm_coaching_result_heading'     => 'Real results from real clients',
		'mm_coaching_cta_heading'        => "Ready to fix what's broken?",
		'mm_coaching_cta_body'           => "Book a free 30-minute call. We'll look at your setup, find the biggest opportunity, and map a clear path to more leads.",
		'mm_coaching_contact_email'      => 'hello@mazzmarketing.com',
	];
	foreach ( $mods as $key => $value ) {
		set_theme_mod( $key, $value );
	}

	// About image — smart import from content/images/coaching/about.svg
	$about_img = get_template_directory() . '/content/images/coaching/about.svg';
	if ( file_exists( $about_img ) ) {
		$result = mm_theme_smart_import_file( $about_img );
		if ( ! is_wp_error( $result ) ) {
			set_theme_mod( 'mm_coaching_about_image_id', $result['id'] );
		}
	}

	// Structured options — services, steps, metrics, testimonials, FAQ
	update_option( 'mm_coaching_services', [
		[
			'icon'  => 'web',
			'title' => 'Website & Conversion Audit',
			'desc'  => "We diagnose exactly why your site isn't converting and fix it — layout, copy, and technical performance.",
		],
		[
			'icon'  => 'ads',
			'title' => 'Google & Meta Ads',
			'desc'  => 'Strategy, setup, and ongoing management of paid campaigns that drive qualified leads at a profitable cost.',
		],
		[
			'icon'  => 'track',
			'title' => 'GTM, GA4 & Pixel Tracking',
			'desc'  => 'Full tracking setup so you can see which campaigns, pages, and channels actually produce buyers.',
		],
	] );

	update_option( 'mm_coaching_steps', [
		[
			'num'   => '01',
			'title' => 'Free Discovery Call',
			'desc'  => 'We spend 30 minutes on your current setup, your goals, and the biggest gaps. No pitch — just clarity.',
		],
		[
			'num'   => '02',
			'title' => 'Action Plan',
			'desc'  => 'You get a written plan prioritising the highest-ROI fixes first, with clear timelines and expected outcomes.',
		],
		[
			'num'   => '03',
			'title' => 'Hands-On Execution',
			'desc'  => 'We implement inside your accounts — you get weekly updates and see changes in your data in real time.',
		],
	] );

	update_option( 'mm_coaching_metrics', [
		[ 'value' => '3&#215;',  'label' => 'Average increase in qualified leads' ],
		[ 'value' => '40%',      'label' => 'Reduction in cost per lead' ],
		[ 'value' => '90 days',  'label' => 'Typical time to measurable impact' ],
	] );

	update_option( 'mm_coaching_testimonials', [
		[
			'quote'    => 'Pourya fixed in two weeks what I had been struggling with for a year. My Google Ads are finally profitable.',
			'name'     => 'Erik Hoffmann',
			'role'     => 'Owner, Hoffmann Dental',
			'initials' => 'EH',
		],
		[
			'quote'    => 'The tracking setup alone changed how we make decisions. We now know exactly which channel pays for itself.',
			'name'     => 'Lena Vogel',
			'role'     => 'Marketing Lead, Formzeit',
			'initials' => 'LV',
		],
		[
			'quote'    => 'Our website conversion rate doubled after the audit. Straightforward advice, direct implementation.',
			'name'     => 'Marco Ricci',
			'role'     => 'Founder, Ricci Studi',
			'initials' => 'MR',
		],
	] );

	update_option( 'mm_coaching_faq', [
		[
			'q' => 'What kinds of businesses do you work with?',
			'a' => 'Primarily small to mid-sized businesses spending €500–€10,000/month on digital marketing — service businesses, local businesses, and e-commerce brands that want more from their current budget.',
		],
		[
			'q' => 'How is coaching different from hiring an agency?',
			'a' => 'You get direct access to one person who works inside your accounts, explains every decision, and builds systems you own. There are no account managers or handoffs.',
		],
		[
			'q' => 'Do I need to have ads running already?',
			'a' => 'No. Some clients come with existing campaigns, some start from scratch. The first call always looks at your current situation and we go from there.',
		],
		[
			'q' => 'How long does a typical engagement last?',
			'a' => 'Most clients see measurable results within the first 30–90 days. Ongoing retainers run month-to-month — no long-term contracts required.',
		],
		[
			'q' => 'What does the free call actually cover?',
			'a' => 'We look at your website, any active ad campaigns, and your analytics setup. You leave with at least two specific things you can fix immediately, regardless of whether we work together.',
		],
	] );
}
