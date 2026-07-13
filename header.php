<?php
/**
 * The header for the Coming Soon theme.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$mm_favicon_links = sprintf(
	'<link rel="icon" href="%1$s" sizes="any">
<link rel="icon" type="image/svg+xml" href="%2$s">
<link rel="icon" type="image/png" sizes="32x32" href="%3$s">
<link rel="icon" type="image/png" sizes="16x16" href="%4$s">
<link rel="apple-touch-icon" href="%5$s">',
	esc_url( get_template_directory_uri() . '/favicon.ico' ),
	esc_url( get_template_directory_uri() . '/assets/images/mark.svg' ),
	esc_url( get_template_directory_uri() . '/assets/images/favicon-32x32.png' ),
	esc_url( get_template_directory_uri() . '/assets/images/favicon-16x16.png' ),
	esc_url( get_template_directory_uri() . '/assets/images/apple-touch-icon.png' )
);

if ( is_front_page() ) :
	?><!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Mazz Marketing | Strategy, SEO, Ads & AI Automation</title>
<meta name="description" content="Mazz Marketing by Pourya Mazaheri helps growing businesses improve strategy, SEO, paid media, analytics and AI-enabled marketing systems.">
<?php echo $mm_favicon_links; ?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() . '/assets/css/homepage.css' ); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<?php else : ?><!DOCTYPE html>
<html lang="<?php bloginfo( 'language' ); ?>">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="<?php echo esc_attr( get_theme_mod( 'mm_meta_description', 'Mazz Marketing is launching soon. Follow us on Instagram and LinkedIn for updates.' ) ); ?>">
<meta name="theme-color" content="<?php echo esc_attr( get_theme_mod( 'mm_theme_color', '#0b0d1a' ) ); ?>">
<?php echo $mm_favicon_links; ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<?php endif; ?>
