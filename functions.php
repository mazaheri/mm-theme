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
 * Enqueue styles.
 */
function mm_theme_scripts() {
	wp_enqueue_style( 'mm-theme-style', get_stylesheet_uri(), [], MM_THEME_VERSION );
}
add_action( 'wp_enqueue_scripts', 'mm_theme_scripts' );

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
