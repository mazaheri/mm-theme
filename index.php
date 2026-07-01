<?php
/**
 * Fallback template — every URL renders the Coming Soon screen
 * until page-specific templates are added.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require locate_template( 'front-page.php' );
