<?php
/**
 * @author  RadiusTheme
 * @since   1.0.0
 * @version 1.0.0
 */

use RadiusTheme\ClassifiedLite\Options;

if ( Options::$has_breadcrumb ):
	do_action( 'cl_classified_breadcrumb' );
endif;