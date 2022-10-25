<?php
/**
 * @author  RadiusTheme
 * @since   1.0.0
 * @version 1.0.0
 */

use RadiusTheme\ClassifiedLite\Helper;
use RadiusTheme\ClassifiedLite\Options;

$rdtheme_error_img = empty( Options::$options['error_bodybanner']['url'] ) ? Helper::get_img( '404.png' ) : Options::$options['error_bodybanner']['url'];
?>
<?php get_header(); ?>
    <div id="primary" class="content-area">
        <div class="container">
            <div class="error-page">
                <img src="<?php echo esc_url( $rdtheme_error_img ); ?>" alt="<?php esc_attr_e( '404', 'cl-classified' ); ?>">
                <h3><?php echo esc_html( Options::$options['error_text'] ); ?></h3>
                <a class="error-btn"
                   href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( Options::$options['error_buttontext'] ); ?></a>
            </div>
        </div>
    </div>
<?php get_footer(); ?>