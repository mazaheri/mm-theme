<?php
/**
 * Page template — renders the Coming Soon screen for every WP Page
 * that has no dedicated template assigned.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require locate_template( 'template-parts/coming-soon.php' );
