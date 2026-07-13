<?php
/**
 * MM Theme functions and definitions.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'MM_THEME_VERSION', '1.0.0' );

/**
 * Look up a WP attachment imported by Import Demo from a theme file path
 * (see inc/demo-importer.php). Needed on the front end, so it lives here
 * rather than in the admin-only importer file.
 */
function mm_theme_find_attachment_by_source_path( $full_path ) {
	$existing = get_posts( [
		'post_type'      => 'attachment',
		'post_status'    => 'any',
		'posts_per_page' => 1,
		'fields'         => 'ids',
		'meta_query'     => [ [ 'key' => '_source_file_path', 'value' => wp_normalize_path( $full_path ) ] ],
	] );
	return $existing ? (int) $existing[0] : 0;
}

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
 * The homepage hardcodes its own <title> tag directly in header.php,
 * matching final/index.html exactly — suppress WordPress's automatic
 * title-tag output there so the two don't collide.
 */
function mm_theme_suppress_auto_title_on_homepage() {
	if ( is_front_page() ) {
		remove_action( 'wp_head', '_wp_render_title_tag', 1 );
	}
}
add_action( 'wp_head', 'mm_theme_suppress_auto_title_on_homepage', 0 );

/**
 * header.php links the theme's own hand-tuned favicon set directly
 * (ICO + SVG + PNG sizes + Apple touch icon) on the front end. Remove
 * WordPress's auto-generated Site Icon <link> tags there to avoid
 * duplicate/conflicting favicon markup — the Site Icon option is still
 * set (see inc/demo-importer.php) so wp-admin's own UI has an icon.
 */
function mm_theme_remove_auto_site_icon_markup() {
	remove_action( 'wp_head', 'wp_site_icon', 99 );
}
add_action( 'init', 'mm_theme_remove_auto_site_icon_markup' );

/**
 * Enqueue styles. The homepage's stylesheet and fonts are linked directly
 * in its own <head> markup in header.php (matching final/index.html
 * exactly), so only the Coming Soon screen goes through wp_enqueue_style().
 */
function mm_theme_scripts() {
	// The Coming Soon screen's stylesheet (dark, fixed-viewport, flex-centered
	// body) is only meant for that screen — loading it on the homepage fights
	// the homepage's own layout (flex-centering + overflow:hidden clips the
	// long-scroll page to one viewport height).
	if ( ! is_front_page() ) {
		wp_enqueue_style( 'mm-theme-style', get_stylesheet_uri(), [], MM_THEME_VERSION );
	}
}
add_action( 'wp_enqueue_scripts', 'mm_theme_scripts' );

/**
 * Add an explicit body class for the homepage so its stylesheet can
 * reliably reset the Coming Soon screen's body rules.
 */
function mm_theme_body_class( $classes ) {
	if ( is_front_page() ) {
		$classes[] = 'mm-homepage';
	}
	return $classes;
}
add_filter( 'body_class', 'mm_theme_body_class' );

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
}
add_action( 'customize_register', 'mm_theme_customize_register' );

/**
 * Import Demo admin page (Appearance → Import Demo) — pushes theme image
 * assets (founder photo, site icon) into the database as real WP
 * attachments. See inc/demo-importer.php.
 */
if ( is_admin() ) {
	require get_template_directory() . '/inc/demo-importer.php';
}
