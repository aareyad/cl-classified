<?php
/**
 * @author  RadiusTheme
 * @since   1.0.0
 * @version 1.0.0
 */

use RadiusTheme\ClassifiedLite\Helper;
use RadiusTheme\ClassifiedLite\Options;

/*$callback404 = [ Helper::get_img( '404.png' ), 709, 287 ];
$options404 = Options::$options['error_bodybanner'] ? wp_get_attachment_image_src(Options::$options['error_bodybanner'], 'full') : null;

$rdtheme_error_img = !empty($options404) ? $options404 : $callback404;*/
?>
<?php get_header();?>
<div id="primary" class="content-area erorr-page">

</div>
<?php get_footer();