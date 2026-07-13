<?php
/**
 * MM Theme functions and definitions.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'MM_THEME_VERSION', '1.0.0' );

/**
 * Theme setup.
 */
function mm_theme_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', [ 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ] );

	register_nav_menus( [
		'primary' => __( 'Primary Menu', 'mm-theme' ),
	] );
}
add_action( 'after_setup_theme', 'mm_theme_setup' );

/**
 * Homepage-specific <title> and meta description.
 */
function mm_theme_homepage_document_title( $title_parts ) {
	if ( is_front_page() ) {
		$title_parts['title'] = get_theme_mod( 'mm_home_seo_title', 'Mazz Marketing | Strategy, SEO, Ads & AI Automation' );
		unset( $title_parts['tagline'], $title_parts['site'] );
	}
	return $title_parts;
}
add_filter( 'document_title_parts', 'mm_theme_homepage_document_title' );

/**
 * Enqueue styles.
 */
function mm_theme_scripts() {
	$is_homepage_or_landing = is_front_page()
		|| is_page_template( 'page-templates/page-ai-landing.php' )
		|| is_page_template( 'page-templates/page-lead-gen.php' )
		|| is_page_template( 'page-templates/page-coaching-landing.php' );

	// The Coming Soon screen's stylesheet (dark, fixed-viewport, flex-centered
	// body) is only meant for that screen — loading it on any other template
	// fights that template's own layout (flex-centering + overflow:hidden
	// clips long-scroll pages to one viewport height).
	if ( ! $is_homepage_or_landing ) {
		wp_enqueue_style( 'mm-theme-style', get_stylesheet_uri(), [], MM_THEME_VERSION );
	}

	if ( is_front_page() ) {
		wp_enqueue_style( 'mm-home-fonts', 'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap', [], null );
		wp_enqueue_style( 'mm-home', get_template_directory_uri() . '/assets/css/homepage.css', [], MM_THEME_VERSION );
		wp_enqueue_script( 'mm-home', get_template_directory_uri() . '/assets/js/homepage.js', [], MM_THEME_VERSION, true );
	}

	if ( is_page_template( 'page-templates/page-ai-landing.php' ) ) {
		wp_enqueue_style( 'mm-ai-landing-fonts', 'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap', [], null );
		wp_enqueue_style( 'mm-ai-landing', get_template_directory_uri() . '/assets/css/orbai-landing.css', [], MM_THEME_VERSION );
		wp_enqueue_script( 'mm-ai-landing', get_template_directory_uri() . '/assets/js/orbai-landing.js', [], MM_THEME_VERSION, true );
	}

	if ( is_page_template( 'page-templates/page-lead-gen.php' ) ) {
		wp_enqueue_style( 'mm-lead-gen-fonts', 'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&family=Inter:wght@400;500;600&display=swap', [], null );
		wp_enqueue_style( 'mm-lead-gen', get_template_directory_uri() . '/assets/css/landing-v1.css', [ 'mm-theme-style' ], MM_THEME_VERSION );
		wp_enqueue_script( 'mm-lead-gen', get_template_directory_uri() . '/assets/js/landing-v1.js', [], MM_THEME_VERSION, true );
	}

	if ( is_page_template( 'page-templates/page-coaching-landing.php' ) ) {
		wp_enqueue_style( 'mm-coaching-fonts', 'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap', [], null );
		wp_enqueue_style( 'mm-coaching-landing', get_template_directory_uri() . '/assets/css/orbai-landing.css', [], MM_THEME_VERSION );
		wp_enqueue_script( 'mm-coaching-landing', get_template_directory_uri() . '/assets/js/orbai-landing.js', [], MM_THEME_VERSION, true );
	}
}
add_action( 'wp_enqueue_scripts', 'mm_theme_scripts' );

/**
 * Register additional page templates (stored outside the theme root).
 */
function mm_theme_register_page_templates( $templates ) {
	$templates['page-templates/page-ai-landing.php']       = __( 'AI Landing Page', 'mm-theme' );
	$templates['page-templates/page-lead-gen.php']         = __( 'Lead-Gen Landing Page', 'mm-theme' );
	$templates['page-templates/page-coaching-landing.php'] = __( 'Coaching Landing Page', 'mm-theme' );
	return $templates;
}
add_filter( 'theme_page_templates', 'mm_theme_register_page_templates' );

/**
 * Add an explicit body class for the AI Landing Page template so its
 * stylesheet can reliably reset the Coming Soon screen's body rules.
 */
function mm_theme_ai_landing_body_class( $classes ) {
	if ( is_front_page() ) {
		$classes[] = 'mm-homepage';
	}
	if ( is_page_template( 'page-templates/page-ai-landing.php' ) ) {
		$classes[] = 'mm-ai-landing-page';
	}
	if ( is_page_template( 'page-templates/page-lead-gen.php' ) ) {
		$classes[] = 'mm-lead-gen-page';
	}
	if ( is_page_template( 'page-templates/page-coaching-landing.php' ) ) {
		$classes[] = 'mm-coaching-landing';
	}
	return $classes;
}
add_filter( 'body_class', 'mm_theme_ai_landing_body_class' );

/**
 * Customizer: Coming Soon content.
 */
function mm_theme_customize_register( $wp_customize ) {
	$wp_customize->add_section( 'mm_coming_soon', [
		'title'    => __( 'Coming Soon Page', 'mm-theme' ),
		'priority' => 30,
	] );

	// Brand label.
	$wp_customize->add_setting( 'mm_brand_label', [
		'default'           => 'Mazz Marketing',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'refresh',
	] );
	$wp_customize->add_control( 'mm_brand_label', [
		'label'   => __( 'Brand Label', 'mm-theme' ),
		'section' => 'mm_coming_soon',
		'type'    => 'text',
	] );

	// Heading.
	$wp_customize->add_setting( 'mm_heading', [
		'default'           => 'Coming Soon',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'refresh',
	] );
	$wp_customize->add_control( 'mm_heading', [
		'label'   => __( 'Heading', 'mm-theme' ),
		'section' => 'mm_coming_soon',
		'type'    => 'text',
	] );

	// Tagline.
	$wp_customize->add_setting( 'mm_tagline', [
		'default'           => "We're building something great. Stay tuned.",
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'refresh',
	] );
	$wp_customize->add_control( 'mm_tagline', [
		'label'   => __( 'Tagline', 'mm-theme' ),
		'section' => 'mm_coming_soon',
		'type'    => 'text',
	] );

	// Meta description.
	$wp_customize->add_setting( 'mm_meta_description', [
		'default'           => 'Mazz Marketing is launching soon. Follow us on Instagram and LinkedIn for updates.',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'refresh',
	] );
	$wp_customize->add_control( 'mm_meta_description', [
		'label'   => __( 'Meta Description', 'mm-theme' ),
		'section' => 'mm_coming_soon',
		'type'    => 'text',
	] );

	// Theme color.
	$wp_customize->add_setting( 'mm_theme_color', [
		'default'           => '#0b0d1a',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'refresh',
	] );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mm_theme_color', [
		'label'   => __( 'Browser Theme Color', 'mm-theme' ),
		'section' => 'mm_coming_soon',
	] ) );

	// Footer copyright.
	$wp_customize->add_setting( 'mm_footer_text', [
		'default'           => '&copy; ' . gmdate( 'Y' ) . ' Mazz Marketing',
		'sanitize_callback' => 'wp_kses_post',
		'transport'         => 'refresh',
	] );
	$wp_customize->add_control( 'mm_footer_text', [
		'label'   => __( 'Footer Text', 'mm-theme' ),
		'section' => 'mm_coming_soon',
		'type'    => 'text',
	] );

	// Instagram URL.
	$wp_customize->add_setting( 'mm_social_instagram', [
		'default'           => 'https://www.instagram.com/mazz_marketing',
		'sanitize_callback' => 'esc_url_raw',
		'transport'         => 'refresh',
	] );
	$wp_customize->add_control( 'mm_social_instagram', [
		'label'   => __( 'Instagram URL', 'mm-theme' ),
		'section' => 'mm_coming_soon',
		'type'    => 'url',
	] );

	// LinkedIn URL.
	$wp_customize->add_setting( 'mm_social_linkedin', [
		'default'           => 'https://www.linkedin.com/in/pourya-mazaheri-fard-2b4299390/',
		'sanitize_callback' => 'esc_url_raw',
		'transport'         => 'refresh',
	] );
	$wp_customize->add_control( 'mm_social_linkedin', [
		'label'   => __( 'LinkedIn URL', 'mm-theme' ),
		'section' => 'mm_coming_soon',
		'type'    => 'url',
	] );

	// ── Homepage section ──────────────────────────────────────────────────
	$wp_customize->add_section( 'mm_homepage', [
		'title'    => __( 'Homepage', 'mm-theme' ),
		'priority' => 30.5,
	] );

	$homepage_text_fields = [
		'mm_home_seo_title'         => [ 'Browser Tab Title (SEO)', 'text' ],
		'mm_home_meta_description'  => [ 'Meta Description (SEO)', 'textarea' ],

		'mm_home_hero_eyebrow'             => [ 'Hero Eyebrow Label', 'text' ],
		'mm_home_hero_heading'             => [ 'Hero Heading', 'text' ],
		'mm_home_hero_sub'                 => [ 'Hero Subheading', 'textarea' ],
		'mm_home_hero_cta_primary_label'   => [ 'Hero Primary CTA Label', 'text' ],
		'mm_home_hero_cta_secondary_label' => [ 'Hero Secondary CTA Label', 'text' ],
		'mm_home_hero_microcopy'           => [ 'Hero Microcopy', 'text' ],

		'mm_home_problem_eyebrow'   => [ 'Problem — Eyebrow', 'text' ],
		'mm_home_problem_heading'   => [ 'Problem — Heading', 'text' ],
		'mm_home_problem_intro'     => [ 'Problem — Intro Paragraph', 'textarea' ],
		'mm_home_problem_body'      => [ 'Problem — Body Paragraph', 'textarea' ],
		'mm_home_problem_quote'     => [ 'Problem — Pull Quote', 'textarea' ],
		'mm_home_problem_closing'   => [ 'Problem — Closing Paragraph', 'textarea' ],
		'mm_home_problem_cta_label' => [ 'Problem — CTA Label', 'text' ],
		'mm_home_problem_microcopy' => [ 'Problem — Microcopy', 'text' ],

		'mm_home_approach_eyebrow' => [ 'Approach — Eyebrow', 'text' ],
		'mm_home_approach_heading' => [ 'Approach — Heading', 'text' ],
		'mm_home_approach_sub'     => [ 'Approach — Subheading', 'textarea' ],

		'mm_home_how_eyebrow'    => [ 'How I Work — Eyebrow', 'text' ],
		'mm_home_how_heading'    => [ 'How I Work — Heading', 'text' ],
		'mm_home_choice_heading' => [ 'How I Work — Choice Heading', 'text' ],

		'mm_home_services_eyebrow'   => [ 'Services — Eyebrow', 'text' ],
		'mm_home_services_heading'   => [ 'Services — Heading', 'text' ],
		'mm_home_services_sub'       => [ 'Services — Subheading', 'textarea' ],
		'mm_home_services_cta_label' => [ 'Services — CTA Label', 'text' ],

		'mm_home_collab_eyebrow'          => [ 'Collaboration — Eyebrow', 'text' ],
		'mm_home_collab_heading'          => [ 'Collaboration — Heading', 'text' ],
		'mm_home_collab_p1'               => [ 'Collaboration — Paragraph 1', 'textarea' ],
		'mm_home_collab_p2'               => [ 'Collaboration — Paragraph 2', 'textarea' ],
		'mm_home_collab_p3'               => [ 'Collaboration — Paragraph 3', 'textarea' ],
		'mm_home_compare_without_heading' => [ 'Collaboration — "Without" Column Heading', 'text' ],
		'mm_home_compare_with_heading'    => [ 'Collaboration — "With" Column Heading', 'text' ],

		'mm_home_about_eyebrow'            => [ 'About — Eyebrow', 'text' ],
		'mm_home_about_p1'                 => [ 'About — Paragraph 1', 'textarea' ],
		'mm_home_about_p2'                 => [ 'About — Paragraph 2', 'textarea' ],
		'mm_home_about_p3'                 => [ 'About — Paragraph 3', 'textarea' ],
		'mm_home_about_p4'                 => [ 'About — Paragraph 4', 'textarea' ],
		'mm_home_about_lightbox_cta_label' => [ 'About — Lightbox CTA Label', 'text' ],

		'mm_home_maia_eyebrow' => [ 'MAIA Teaser — Eyebrow', 'text' ],
		'mm_home_maia_heading' => [ 'MAIA Teaser — Heading', 'text' ],
		'mm_home_maia_sub'     => [ 'MAIA Teaser — Subheading', 'textarea' ],
		'mm_home_maia_body'    => [ 'MAIA Teaser — Body Paragraph', 'textarea' ],

		'mm_home_faq_eyebrow' => [ 'FAQ — Eyebrow', 'text' ],
		'mm_home_faq_heading' => [ 'FAQ — Heading', 'text' ],

		'mm_home_cta_heading'   => [ 'Footer CTA — Heading', 'text' ],
		'mm_home_cta_body1'     => [ 'Footer CTA — Paragraph 1', 'textarea' ],
		'mm_home_cta_body2'     => [ 'Footer CTA — Paragraph 2', 'textarea' ],
		'mm_home_cta_microcopy' => [ 'Footer CTA — Microcopy', 'text' ],

		'mm_home_logo_text'        => [ 'Header — Logo Text', 'text' ],
		'mm_home_header_cta_full'  => [ 'Header — CTA Label (full)', 'text' ],
		'mm_home_header_cta_short' => [ 'Header — CTA Label (short, mobile)', 'text' ],
		'mm_home_footer_copyright' => [ 'Footer — Copyright Text', 'text' ],
	];

	foreach ( $homepage_text_fields as $setting_id => $field ) {
		list( $label, $type ) = $field;
		$sanitize = ( 'textarea' === $type ) ? 'sanitize_textarea_field' : 'sanitize_text_field';
		$wp_customize->add_setting( $setting_id, [
			'default'           => '',
			'sanitize_callback' => $sanitize,
			'transport'         => 'refresh',
		] );
		$wp_customize->add_control( $setting_id, [
			'label'   => __( $label, 'mm-theme' ),
			'section' => 'mm_homepage',
			'type'    => $type,
		] );
	}

	$wp_customize->add_setting( 'mm_home_about_photo_id', [
		'default'           => 0,
		'sanitize_callback' => 'absint',
		'transport'         => 'refresh',
	] );
	$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'mm_home_about_photo_id', [
		'label'    => __( 'About — Founder Photo', 'mm-theme' ),
		'section'  => 'mm_homepage',
		'mime_type' => 'image',
	] ) );

	// ── AI Landing Page section ──────────────────────────────────────────
	$wp_customize->add_section( 'mm_ai_landing', [
		'title'    => __( 'AI Landing Page', 'mm-theme' ),
		'priority' => 31,
	] );

	$wp_customize->add_setting( 'mm_ai_hero_eyebrow', [
		'default'           => 'AI MARKETING FOR GROWING BRANDS',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'refresh',
	] );
	$wp_customize->add_control( 'mm_ai_hero_eyebrow', [
		'label'   => __( 'Hero Eyebrow Label', 'mm-theme' ),
		'section' => 'mm_ai_landing',
		'type'    => 'text',
	] );

	$wp_customize->add_setting( 'mm_ai_hero_heading', [
		'default'           => 'Marketing that thinks as fast as you grow.',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'refresh',
	] );
	$wp_customize->add_control( 'mm_ai_hero_heading', [
		'label'   => __( 'Hero Heading', 'mm-theme' ),
		'section' => 'mm_ai_landing',
		'type'    => 'text',
	] );

	$wp_customize->add_setting( 'mm_ai_hero_subhead', [
		'default'           => 'AI-driven strategy paired with hands-on execution — campaigns, content, and automation built to compound results.',
		'sanitize_callback' => 'sanitize_textarea_field',
		'transport'         => 'refresh',
	] );
	$wp_customize->add_control( 'mm_ai_hero_subhead', [
		'label'   => __( 'Hero Subheading', 'mm-theme' ),
		'section' => 'mm_ai_landing',
		'type'    => 'textarea',
	] );

	$wp_customize->add_setting( 'mm_ai_founder_quote', [
		'default'           => "We don't guess — we test, measure, and scale what actually moves revenue.",
		'sanitize_callback' => 'sanitize_textarea_field',
		'transport'         => 'refresh',
	] );
	$wp_customize->add_control( 'mm_ai_founder_quote', [
		'label'   => __( 'Founder Quote', 'mm-theme' ),
		'section' => 'mm_ai_landing',
		'type'    => 'textarea',
	] );

	$wp_customize->add_setting( 'mm_ai_founder_name', [
		'default'           => 'Pourya Mazaheri, Founder',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'refresh',
	] );
	$wp_customize->add_control( 'mm_ai_founder_name', [
		'label'   => __( 'Founder Name & Title', 'mm-theme' ),
		'section' => 'mm_ai_landing',
		'type'    => 'text',
	] );

	$wp_customize->add_setting( 'mm_ai_contact_email', [
		'default'           => 'hello@mazzmarketing.com',
		'sanitize_callback' => 'sanitize_email',
		'transport'         => 'refresh',
	] );
	$wp_customize->add_control( 'mm_ai_contact_email', [
		'label'   => __( 'Contact Email', 'mm-theme' ),
		'section' => 'mm_ai_landing',
		'type'    => 'email',
	] );

	// ── Coaching Landing Page section ────────────────────────────────────────
	$wp_customize->add_section( 'mm_coaching_landing', [
		'title'    => __( 'Coaching Landing Page', 'mm-theme' ),
		'priority' => 32,
	] );

	$wp_customize->add_setting( 'mm_coaching_hero_eyebrow', [
		'default'           => 'TECHNICAL MARKETING COACHING',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'refresh',
	] );
	$wp_customize->add_control( 'mm_coaching_hero_eyebrow', [
		'label'   => __( 'Hero Eyebrow Label', 'mm-theme' ),
		'section' => 'mm_coaching_landing',
		'type'    => 'text',
	] );

	$wp_customize->add_setting( 'mm_coaching_hero_heading', [
		'default'           => 'Get more leads, fix your tracking, and scale what works.',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'refresh',
	] );
	$wp_customize->add_control( 'mm_coaching_hero_heading', [
		'label'   => __( 'Hero Heading', 'mm-theme' ),
		'section' => 'mm_coaching_landing',
		'type'    => 'text',
	] );

	$wp_customize->add_setting( 'mm_coaching_hero_subhead', [
		'default'           => 'Hands-on coaching for business owners who want a website that converts, ads that actually work, and tracking they can trust.',
		'sanitize_callback' => 'sanitize_textarea_field',
		'transport'         => 'refresh',
	] );
	$wp_customize->add_control( 'mm_coaching_hero_subhead', [
		'label'   => __( 'Hero Subheading', 'mm-theme' ),
		'section' => 'mm_coaching_landing',
		'type'    => 'textarea',
	] );

	$wp_customize->add_setting( 'mm_coaching_calendly_url', [
		'default'           => 'https://calendly.com/mazzmarketing/30min',
		'sanitize_callback' => 'esc_url_raw',
		'transport'         => 'refresh',
	] );
	$wp_customize->add_control( 'mm_coaching_calendly_url', [
		'label'   => __( 'Calendly Booking URL', 'mm-theme' ),
		'section' => 'mm_coaching_landing',
		'type'    => 'url',
	] );

	$wp_customize->add_setting( 'mm_coaching_cta_label', [
		'default'           => 'Book Free 30-Min Call',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'refresh',
	] );
	$wp_customize->add_control( 'mm_coaching_cta_label', [
		'label'   => __( 'CTA Button Label', 'mm-theme' ),
		'section' => 'mm_coaching_landing',
		'type'    => 'text',
	] );

	$wp_customize->add_setting( 'mm_coaching_about_heading', [
		'default'           => 'Pourya Mazaheri',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'refresh',
	] );
	$wp_customize->add_control( 'mm_coaching_about_heading', [
		'label'   => __( 'About — Name / Heading', 'mm-theme' ),
		'section' => 'mm_coaching_landing',
		'type'    => 'text',
	] );

	$wp_customize->add_setting( 'mm_coaching_about_bio', [
		'default'           => "I'm a technical marketing consultant who has helped dozens of businesses fix the gap between their marketing spend and their results.",
		'sanitize_callback' => 'sanitize_textarea_field',
		'transport'         => 'refresh',
	] );
	$wp_customize->add_control( 'mm_coaching_about_bio', [
		'label'   => __( 'About — Bio Paragraph', 'mm-theme' ),
		'section' => 'mm_coaching_landing',
		'type'    => 'textarea',
	] );

	$wp_customize->add_setting( 'mm_coaching_contact_email', [
		'default'           => 'hello@mazzmarketing.com',
		'sanitize_callback' => 'sanitize_email',
		'transport'         => 'refresh',
	] );
	$wp_customize->add_control( 'mm_coaching_contact_email', [
		'label'   => __( 'Contact Email', 'mm-theme' ),
		'section' => 'mm_coaching_landing',
		'type'    => 'email',
	] );
}
add_action( 'customize_register', 'mm_theme_customize_register' );

/**
 * Homepage default content and helpers — needed on every front-end request.
 */
require get_template_directory() . '/inc/homepage-content.php';

/**
 * Import Demo admin page (Appearance → Import Demo).
 */
if ( is_admin() ) {
	require get_template_directory() . '/inc/demo-importer.php';
}
