<?php
/**
 * The Coming Soon launch screen — currently the theme's only page.
 * Additional templates will replace this as the site's other pages are designed.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$brand       = get_theme_mod( 'mm_brand_label', 'Mazz Marketing' );
$heading     = get_theme_mod( 'mm_heading', 'Coming Soon' );
$tagline     = get_theme_mod( 'mm_tagline', "We're building something great. Stay tuned." );
$footer_text = get_theme_mod( 'mm_footer_text', '&copy; ' . gmdate( 'Y' ) . ' Mazz Marketing' );
$instagram   = get_theme_mod( 'mm_social_instagram', 'https://www.instagram.com/mazz_marketing' );
$linkedin    = get_theme_mod( 'mm_social_linkedin', 'https://www.linkedin.com/in/pourya-mazaheri-fard-2b4299390/' );
?>

<div class="mm-container">
	<div class="mm-brand"><?php echo esc_html( $brand ); ?></div>
	<h1 class="mm-heading"><?php echo esc_html( $heading ); ?></h1>
	<p class="mm-tagline"><?php echo esc_html( $tagline ); ?></p>

	<div class="mm-socials">
		<?php if ( $instagram ) : ?>
		<a href="<?php echo esc_url( $instagram ); ?>" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
			<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2.2c3.2 0 3.6 0 4.85.07 1.17.05 2.02.24 2.5.4a5 5 0 0 1 1.8 1.17 5 5 0 0 1 1.17 1.8c.16.48.35 1.33.4 2.5.06 1.25.07 1.65.07 4.85s0 3.6-.07 4.85c-.05 1.17-.24 2.02-.4 2.5a5 5 0 0 1-1.17 1.8 5 5 0 0 1-1.8 1.17c-.48.16-1.33.35-2.5.4-1.25.06-1.65.07-4.85.07s-3.6 0-4.85-.07c-1.17-.05-2.02-.24-2.5-.4a5 5 0 0 1-1.8-1.17 5 5 0 0 1-1.17-1.8c-.16-.48-.35-1.33-.4-2.5C2.2 15.6 2.2 15.2 2.2 12s0-3.6.07-4.85c.05-1.17.24-2.02.4-2.5a5 5 0 0 1 1.17-1.8A5 5 0 0 1 5.65 1.68c.48-.16 1.33-.35 2.5-.4C9.4 1.2 9.8 1.2 12 1.2zm0 1.8c-3.15 0-3.52 0-4.76.07-.96.04-1.48.2-1.82.34-.46.18-.79.4-1.13.74-.34.34-.56.67-.74 1.13-.14.34-.3.86-.34 1.82C3.15 8.35 3.15 8.72 3.15 12s0 3.65.06 4.9c.04.96.2 1.48.34 1.82.18.46.4.79.74 1.13.34.34.67.56 1.13.74.34.14.86.3 1.82.34 1.24.06 1.61.07 4.76.07s3.52 0 4.76-.07c.96-.04 1.48-.2 1.82-.34.46-.18.79-.4 1.13-.74.34-.34.56-.67.74-1.13.14-.34.3-.86.34-1.82.06-1.25.07-1.62.07-4.9s0-3.65-.07-4.9c-.04-.96-.2-1.48-.34-1.82a3.2 3.2 0 0 0-.74-1.13 3.2 3.2 0 0 0-1.13-.74c-.34-.14-.86-.3-1.82-.34C15.52 4 15.15 4 12 4zm0 3.4a4.6 4.6 0 1 1 0 9.2 4.6 4.6 0 0 1 0-9.2zm0 1.8a2.8 2.8 0 1 0 0 5.6 2.8 2.8 0 0 0 0-5.6zm5.85-3.4a1.1 1.1 0 1 1-2.2 0 1.1 1.1 0 0 1 2.2 0z"/></svg>
		</a>
		<?php endif; ?>
		<?php if ( $linkedin ) : ?>
		<a href="<?php echo esc_url( $linkedin ); ?>" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn">
			<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20.45 20.45h-3.55v-5.57c0-1.33-.02-3.03-1.85-3.03-1.86 0-2.14 1.45-2.14 2.94v5.66H9.36V9h3.41v1.56h.05c.48-.9 1.63-1.85 3.36-1.85 3.6 0 4.27 2.37 4.27 5.45v6.29zM5.34 7.43a2.07 2.07 0 1 1 0-4.14 2.07 2.07 0 0 1 0 4.14zM7.12 20.45H3.56V9h3.56v11.45z"/></svg>
		</a>
		<?php endif; ?>
	</div>
</div>

<footer class="mm-footer"><?php echo wp_kses_post( $footer_text ); ?></footer>

<?php get_footer(); ?>
