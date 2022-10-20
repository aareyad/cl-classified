<?php
/**
 * @author  RadiusTheme
 * @since   1.0.0
 * @version 1.0.0
 */

use RadiusTheme\ClassifiedLite\Helper;
use RadiusTheme\ClassifiedLite\Options;

use Rtcl\Helpers\Link;

$nav_menu_args = Helper::nav_menu_args();

$logo       = empty( Options::$options['logo']['url'] ) ? Helper::get_img( 'logo.png' ) : Options::$options['logo'];
$light_logo = empty( Options::$options['logo_light']['url'] ) ? Helper::get_img( 'logo-white.png' ) : Options::$options['logo_light'];

$login_icon_title = is_user_logged_in() ? esc_html__( 'My Account', 'cl-classified' ) : esc_html__( 'Login/Register', 'cl-classified' );
?>
<div class="main-header-inner">
    <div class="site-branding">

        <?php if ( ! empty( $logo['url'] ) ): ?>
            <a class="site-logo dark-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img
                        src="<?php echo esc_url( $logo['url'] ); ?>"
                        width="<?php echo isset( $logo['width'] ) ? esc_attr( $logo['width'] ) : '150'; ?>"
                        height="<?php echo isset( $logo['height'] ) ? esc_attr( $logo['height'] ) : '45'; ?>"
                        alt="<?php esc_attr( bloginfo( 'name' ) ); ?>"></a>
        <?php else: ?>
            <a class="site-logo dark-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img
                        src="<?php echo esc_url( $logo ); ?>" width="150" height="45"
                        alt="<?php esc_attr( bloginfo( 'name' ) ); ?>"></a>
        <?php endif; ?>

        <?php if ( ! empty( $light_logo['url'] ) ): ?>
            <a class="site-logo light-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img
                        src="<?php echo esc_url( $light_logo['url'] ); ?>"
                        height="<?php echo isset( $light_logo['height'] ) ? esc_attr( $light_logo['height'] ) : '45'; ?>"
                        width="<?php echo isset( $light_logo['width'] ) ? esc_attr( $light_logo['width'] ) : '150'; ?>"
                        alt="<?php esc_attr( bloginfo( 'name' ) ); ?>"></a>
        <?php else: ?>
            <a class="site-logo light-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img
                        src="<?php echo esc_url( $light_logo ); ?>" width="150" height="45"
                        alt="<?php esc_attr( bloginfo( 'name' ) ); ?>"></a>
        <?php endif; ?>

    </div>

    <div class="main-navigation-area">
        <div id="main-navigation" class="main-navigation">
            <?php wp_nav_menu( $nav_menu_args ); ?>
        </div>
    </div>

    <div class="header-icon-area">
	    <?php if ( Helper::is_chat_enabled() ): ?>
            <a class="header-chat-icon rtcl-chat-unread-count"
               title="<?php esc_html_e( 'Chat', 'cl-classified' ); ?>"
               href="<?php echo esc_url( Link::get_my_account_page_link( 'chat' ) ); ?>"><i class="far fa-comments"></i></a>
	    <?php endif; ?>
        <?php if ( Options::$options['header_login_icon'] && class_exists( 'RtclPro' ) && class_exists( 'Rtcl' ) ): ?>
            <a class="header-login-icon" data-toggle="tooltip" title="<?php echo esc_attr( $login_icon_title ); ?>"
               href="<?php echo esc_url( Link::get_my_account_page_link() ); ?>"><i class="far fa-user"
                                                                                    aria-hidden="true"></i></a>
        <?php endif; ?>
	    <?php if ( Options::$options['header_btn_txt'] && Options::$options['header_btn_url'] ): ?>
            <div class="header-btn-area">
                <a class="header-btn" href="<?php echo esc_url( Options::$options['header_btn_url'] ); ?>"><i
                            class="fas fa-plus"
                            aria-hidden="true"></i><?php echo esc_html( Options::$options['header_btn_txt'] ); ?>
                </a>
            </div>
	    <?php endif; ?>
    </div>

</div>