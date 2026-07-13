<?php
/**
 * The header for the Coming Soon theme.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?><!DOCTYPE html>
<html lang="<?php bloginfo( 'language' ); ?>">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
$mm_meta_description = is_front_page()
	? get_theme_mod( 'mm_home_meta_description', 'Mazz Marketing by Pourya Mazaheri helps growing businesses improve strategy, SEO, paid media, analytics and AI-enabled marketing systems.' )
	: get_theme_mod( 'mm_meta_description', 'Mazz Marketing is launching soon. Follow us on Instagram and LinkedIn for updates.' );
?>
<meta name="description" content="<?php echo esc_attr( $mm_meta_description ); ?>">
<meta name="theme-color" content="<?php echo esc_attr( get_theme_mod( 'mm_theme_color', '#0b0d1a' ) ); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
