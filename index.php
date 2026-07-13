<?php
/**
 * Fallback template — renders the Coming Soon screen for any URL
 * without a more specific template.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require locate_template( 'template-parts/coming-soon.php' );
