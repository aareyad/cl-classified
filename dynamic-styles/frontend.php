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

Helper::requires( 'dynamic-styles/common.php' );

$header_transparent_color = Options::$options['header_transparent_color'];
?>
<?php
/*-------------------------------------
#. Header
---------------------------------------*/
?>
.trheader .main-header {
background-color: <?php echo esc_html( $header_transparent_color ); ?>;
}
