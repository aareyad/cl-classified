<?php
/**
 * @author  RadiusTheme
 * @since   1.0.0
 * @version 1.0.0
 */

use RadiusTheme\ClassifiedLite\Helper;
use RadiusTheme\ClassifiedLite\Options;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

Helper::requires( 'common.php', 'dynamic-styles' );

$header_transparent_color = Options::$options['header_transparent_color'];
$logo_max_width           = Options::$options['logo_width'];
?>
<?php
/*-------------------------------------
#. Header
---------------------------------------*/
?>
.trheader .main-header {
background-color: <?php echo esc_html( $header_transparent_color ); ?>;
}
.main-header .site-branding {
max-width: <?php echo esc_html( $logo_max_width ); ?>;
}
