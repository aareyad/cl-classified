<?php
/**
 * @author  RadiusTheme
 * @since   1.0.0
 * @version 1.0.0
 */

if ( ! isset( $content_width ) ) {
	$content_width = 1240;
}

add_action( 'after_setup_theme', 'cl_classified_load_textdomain' );
function cl_classified_load_textdomain() {
	load_theme_textdomain( 'cl-classified', get_template_directory() . '/languages' );
}

require_once 'inc/init.php';