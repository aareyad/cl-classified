<?php
/**
 * @author  RadiusTheme
 * @since   1.0.0
 * @version 1.0.0
 */

namespace RadiusTheme\ClassifiedLite\Customizer;

use RadiusTheme\ClassifiedLite\Helper;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

Helper::requires( 'customizer/controls/switch-control.php' );
Helper::requires( 'customizer/controls/image-radio-control.php' );
Helper::requires( 'customizer/controls/separator-control.php' );
Helper::requires( 'customizer/controls/gallery-control.php' );
Helper::requires( 'customizer/controls/select2-control.php' );
Helper::requires( 'customizer/controls/alfa-color.php' );
Helper::requires( 'customizer/typography/typography-controls.php' );
Helper::requires( 'customizer/typography/typography-customizer.php' );
Helper::requires( 'customizer/controls/sanitization.php' );
Helper::requires( 'customizer/customizer.php' );
Helper::requires( 'customizer/settings/general.php' );
Helper::requires( 'customizer/settings/header.php' );
Helper::requires( 'customizer/settings/breadcrumb.php' );
Helper::requires( 'customizer/settings/footer.php' );
Helper::requires( 'customizer/settings/color.php' );
Helper::requires( 'customizer/settings/blog.php' );
Helper::requires( 'customizer/settings/post.php' );
Helper::requires( 'customizer/settings/error.php' );
Helper::requires( 'customizer/settings/contact-info.php' );
Helper::requires( 'customizer/settings/blog-layout.php' );
Helper::requires( 'customizer/settings/single-post-layout.php' );
Helper::requires( 'customizer/settings/page-layout.php' );
Helper::requires( 'customizer/settings/error-layout.php' );

if ( class_exists( 'Rtcl' ) ) {
	Helper::requires( 'customizer/settings/listing-archive-layout.php' );
	Helper::requires( 'customizer/settings/listing-single-layout.php' );
	Helper::requires( 'customizer/settings/listings.php' );
}
if ( class_exists( 'RtclStore' ) ) {
	Helper::requires( 'customizer/settings/store-archive-layout.php' );
}