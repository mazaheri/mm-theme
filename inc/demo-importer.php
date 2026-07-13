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
		'homepage'    => [
			'label' => 'Homepage Content',
			'desc'  => 'All homepage copy (hero, problem, approach, how-it-works, services, comparison, about, MAIA teaser, FAQ, footer CTA) and the founder photo',
			'fn'    => 'mm_theme_import_homepage_full',
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

	if ( ! get_option( 'mm_theme_pages_imported' ) ) {
		$warnings[] = 'Pages &amp; Navigation not created yet';
	}
	if ( ! get_theme_mod( 'mm_home_hero_heading' ) ) {
		$warnings[] = 'Homepage content not synced';
	}
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

	if ( count( $warnings ) >= 7 ) {
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
	mm_theme_import_pages();
	mm_theme_import_homepage_full();
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
		'mm_home_seo_title',
		'mm_home_meta_description',
		'mm_home_hero_eyebrow',
		'mm_home_hero_heading',
		'mm_home_hero_sub',
		'mm_home_hero_cta_primary_label',
		'mm_home_hero_cta_secondary_label',
		'mm_home_hero_microcopy',
		'mm_home_problem_eyebrow',
		'mm_home_problem_heading',
		'mm_home_problem_intro',
		'mm_home_problem_body',
		'mm_home_problem_quote',
		'mm_home_problem_closing',
		'mm_home_problem_cta_label',
		'mm_home_problem_microcopy',
		'mm_home_approach_eyebrow',
		'mm_home_approach_heading',
		'mm_home_approach_sub',
		'mm_home_how_eyebrow',
		'mm_home_how_heading',
		'mm_home_choice_heading',
		'mm_home_services_eyebrow',
		'mm_home_services_heading',
		'mm_home_services_sub',
		'mm_home_services_cta_label',
		'mm_home_collab_eyebrow',
		'mm_home_collab_heading',
		'mm_home_collab_p1',
		'mm_home_collab_p2',
		'mm_home_collab_p3',
		'mm_home_compare_without_heading',
		'mm_home_compare_with_heading',
		'mm_home_about_eyebrow',
		'mm_home_about_p1',
		'mm_home_about_p2',
		'mm_home_about_p3',
		'mm_home_about_p4',
		'mm_home_about_lightbox_cta_label',
		'mm_home_about_photo_id',
		'mm_home_maia_eyebrow',
		'mm_home_maia_heading',
		'mm_home_maia_sub',
		'mm_home_maia_body',
		'mm_home_faq_eyebrow',
		'mm_home_faq_heading',
		'mm_home_cta_heading',
		'mm_home_cta_body1',
		'mm_home_cta_body2',
		'mm_home_cta_microcopy',
		'mm_home_logo_text',
		'mm_home_header_cta_full',
		'mm_home_header_cta_short',
		'mm_home_footer_copyright',
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
		'mm_theme_pages_imported',
		'mm_home_approach_cards',
		'mm_home_process_steps',
		'mm_home_choice_cards',
		'mm_home_service_cards',
		'mm_home_compare_without_items',
		'mm_home_compare_with_items',
		'mm_home_faq',
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

// ── Pages & Navigation ────────────────────────────────────────────────────────
function mm_theme_import_pages() {
	$pages = [
		[
			'title'    => 'AI Marketing',
			'template' => 'page-templates/page-ai-landing.php',
			'opt_key'  => 'mm_page_id_ai_landing',
		],
		[
			'title'    => 'Lead Generation',
			'template' => 'page-templates/page-lead-gen.php',
			'opt_key'  => 'mm_page_id_lead_gen',
		],
		[
			'title'    => 'Coaching',
			'template' => 'page-templates/page-coaching-landing.php',
			'opt_key'  => 'mm_page_id_coaching',
		],
	];

	$created_ids = [];

	foreach ( $pages as $page ) {
		$existing_id = (int) get_option( $page['opt_key'] );
		if ( $existing_id && get_post_status( $existing_id ) === 'publish' ) {
			// Page already exists — re-apply template in case it changed.
			update_post_meta( $existing_id, '_wp_page_template', $page['template'] );
			$created_ids[ $page['title'] ] = $existing_id;
			continue;
		}

		// Search by title as a fallback (handles manual page creation).
		$found = get_posts( [
			'post_type'      => 'page',
			'post_status'    => 'publish',
			'title'          => $page['title'],
			'posts_per_page' => 1,
			'fields'         => 'ids',
		] );

		if ( $found ) {
			$page_id = (int) $found[0];
		} else {
			$page_id = wp_insert_post( [
				'post_title'   => $page['title'],
				'post_content' => '',
				'post_status'  => 'publish',
				'post_type'    => 'page',
				'post_author'  => get_current_user_id(),
			] );
		}

		if ( ! is_wp_error( $page_id ) && $page_id ) {
			update_post_meta( $page_id, '_wp_page_template', $page['template'] );
			update_option( $page['opt_key'], $page_id );
			$created_ids[ $page['title'] ] = $page_id;
		}
	}

	// Create / update the primary navigation menu.
	$menu_name = 'Primary Menu';
	$menu_id   = (int) get_option( 'mm_primary_menu_id' );

	if ( ! $menu_id || ! is_nav_menu( $menu_id ) ) {
		$menu_id = wp_create_nav_menu( $menu_name );
		if ( ! is_wp_error( $menu_id ) ) {
			update_option( 'mm_primary_menu_id', $menu_id );
		}
	}

	if ( ! is_wp_error( $menu_id ) && $menu_id ) {
		// Remove all existing items so re-running is idempotent.
		$existing_items = wp_get_nav_menu_items( $menu_id );
		if ( $existing_items ) {
			foreach ( $existing_items as $item ) {
				wp_delete_post( $item->ID, true );
			}
		}

		foreach ( $created_ids as $title => $page_id ) {
			wp_update_nav_menu_item( $menu_id, 0, [
				'menu-item-title'     => $title,
				'menu-item-object'    => 'page',
				'menu-item-object-id' => $page_id,
				'menu-item-type'      => 'post_type',
				'menu-item-status'    => 'publish',
			] );
		}

		// Assign to the primary location.
		$locations = get_theme_mod( 'nav_menu_locations', [] );
		$locations['primary'] = (int) $menu_id;
		set_theme_mod( 'nav_menu_locations', $locations );
	}

	update_option( 'mm_theme_pages_imported', '1' );
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

// ── Homepage — content import ────────────────────────────────────────────────
function mm_theme_import_homepage_content() {
	$mods = [
		'mm_home_seo_title'        => 'Mazz Marketing | Strategy, SEO, Ads & AI Automation',
		'mm_home_meta_description' => 'Mazz Marketing by Pourya Mazaheri helps growing businesses improve strategy, SEO, paid media, analytics and AI-enabled marketing systems.',

		'mm_home_hero_eyebrow'             => 'Technical Marketing Manager · SEO · Paid Media · Analytics · AI Automation',
		'mm_home_hero_heading'             => 'Make your next marketing decision with clarity—not guesswork.',
		'mm_home_hero_sub'                 => "I'm Pourya Mazaheri, founder of Mazz Marketing. I help growing businesses identify what needs attention first, then connect strategy, SEO, paid media, websites, analytics and AI-enabled workflows into a system they can measure and improve.",
		'mm_home_hero_cta_primary_label'   => 'Find your next marketing priority →',
		'mm_home_hero_cta_secondary_label' => 'Explore how I work',
		'mm_home_hero_microcopy'           => '30 minutes. One focused conversation. A clearer next step. No obligation to continue.',

		'mm_home_problem_eyebrow'   => 'The Challenge',
		'mm_home_problem_heading'   => 'Marketing gets expensive when the pieces do not work together.',
		'mm_home_problem_intro'     => 'Most businesses do not have one marketing problem. They have several disconnected ones.',
		'mm_home_problem_body'      => 'Ads may generate clicks, while the website does not convert. Content may be published consistently, but it is not connected to an offer. Data may exist, but it may not be reliable or useful enough to guide decisions. Leads may arrive, then receive inconsistent follow-up.',
		'mm_home_problem_quote'     => 'This does not mean your marketing is broken or that someone failed. It often means the system was built in the wrong order, measured incompletely, or never connected end to end.',
		'mm_home_problem_closing'   => 'My role is not to take control away from you. It is to help you understand what matters, choose the right priority, and build a practical path forward.',
		'mm_home_problem_cta_label' => 'Clarify what needs attention first →',
		'mm_home_problem_microcopy' => 'You do not need to know whether the issue is SEO, ads, tracking, your website or something else. A website link and a short description of your goal are enough to start.',

		'mm_home_approach_eyebrow' => 'How I Think About It',
		'mm_home_approach_heading' => 'Clear strategy. Reliable data. Practical execution.',
		'mm_home_approach_sub'     => 'I do not start by selling a channel, a campaign type or a tool. We start by understanding the business, the offer, the customer journey and the gap that is currently limiting progress.',

		'mm_home_how_eyebrow'    => 'How I Work',
		'mm_home_how_heading'    => 'One clear starting point. Different ways to work together.',
		'mm_home_choice_heading' => 'Choose the right level of support',

		'mm_home_services_eyebrow'   => 'Ways I Can Help',
		'mm_home_services_heading'   => 'Ways I can help',
		'mm_home_services_sub'       => 'Engagements are designed around the bottleneck that matters most right now. That may be strategy, conversion, visibility, tracking or a workflow that is taking too much time to run manually.',
		'mm_home_services_cta_label' => 'Discuss the right starting point →',

		'mm_home_collab_eyebrow'          => 'How This Is Different',
		'mm_home_collab_heading'          => 'Direct expertise, not a hand-off process.',
		'mm_home_collab_p1'               => 'When you work with Mazz Marketing, you work directly with me.',
		'mm_home_collab_p2'               => 'That means the person who understands the strategy is also involved in the analysis, the recommendations and the work itself. There is no sales call followed by a hand-off to someone who has never heard the full context.',
		'mm_home_collab_p3'               => 'You should not need to become dependent on unclear reports or black-box marketing. My role is to help you make better decisions and build capabilities that remain useful after the project ends.',
		'mm_home_compare_without_heading' => 'Common agency model',
		'mm_home_compare_with_heading'    => 'Working with Mazz Marketing',

		'mm_home_about_eyebrow'             => 'About Pourya Mazaheri',
		'mm_home_about_p1'                  => "I'm Pourya Mazaheri, a Technical Marketing Manager and the founder of Mazz Marketing.",
		'mm_home_about_p2'                  => 'My work sits at the intersection of strategy and execution: SEO, Google Ads, Meta Ads, websites, conversion paths, analytics, tracking and AI-enabled marketing workflows.',
		'mm_home_about_p3'                  => 'I work best with people who value clear thinking, direct communication and practical progress. Sometimes the right answer is to improve a campaign. Sometimes it is to fix the website, the offer, the tracking or the follow-up process first. And sometimes the most honest answer is that more advertising is not the next move.',
		'mm_home_about_p4'                  => 'Mazz Marketing is where I turn this work into focused consulting, implementation support, practical frameworks and, over time, educational resources for people who want to understand and improve their own marketing systems.',
		'mm_home_about_lightbox_cta_label'  => 'Request an early consultation →',

		'mm_home_maia_eyebrow' => 'Coming Soon — The MAIA Method by Mazz Marketing',
		'mm_home_maia_heading' => 'MAIA — Marketing AI Automations',
		'mm_home_maia_sub'     => 'The complete system to build AI-powered marketing workflows for content, leads, ads, sales and reporting.',
		'mm_home_maia_body'    => 'Mazz Marketing is building a growing library of practical insights, templates and learning experiences for marketers, founders and small teams — starting with MAIA.',

		'mm_home_faq_eyebrow' => 'FAQ',
		'mm_home_faq_heading' => 'Questions people ask before booking',

		'mm_home_cta_heading'   => 'Not sure what to fix first?',
		'mm_home_cta_body1'     => 'Request a focused 30-minute clarity call. We will discuss your current marketing situation, the goal that matters most and the most useful next step for your business.',
		'mm_home_cta_body2'     => 'You are not committing to a project by requesting the call. The purpose is to gain clarity before spending more time, budget or energy in the wrong place.',
		'mm_home_cta_microcopy' => 'You do not need to know whether the issue is SEO, ads, tracking, your website or something else. A website link and a short description of your goal are enough to start.',

		'mm_home_logo_text'       => 'Mazz Marketing',
		'mm_home_header_cta_full'  => 'Request an early consultation',
		'mm_home_header_cta_short' => 'Request a call',
		'mm_home_footer_copyright' => '&copy; ' . gmdate( 'Y' ) . ' Mazz Marketing. All rights reserved.',
	];

	foreach ( $mods as $key => $value ) {
		set_theme_mod( $key, $value );
	}

	update_option( 'mm_home_approach_cards', mm_theme_default_approach_cards() );
	update_option( 'mm_home_process_steps', mm_theme_default_process_steps() );
	update_option( 'mm_home_choice_cards', mm_theme_default_choice_cards() );
	update_option( 'mm_home_service_cards', mm_theme_default_service_cards() );
	update_option( 'mm_home_compare_without_items', mm_theme_default_compare_without() );
	update_option( 'mm_home_compare_with_items', mm_theme_default_compare_with() );
	update_option( 'mm_home_faq', mm_theme_default_home_faq() );
}

// ── Homepage — about photo import ────────────────────────────────────────────
function mm_theme_import_homepage_images() {
	$result = mm_theme_smart_import_file( get_template_directory() . '/content/images/homepage/about-photo.png' );
	if ( ! is_wp_error( $result ) ) {
		set_theme_mod( 'mm_home_about_photo_id', $result['id'] );
	}
}

// ── Homepage — combined component (registered in the component registry) ───
function mm_theme_import_homepage_full() {
	mm_theme_import_homepage_content();
	mm_theme_import_homepage_images();
}
