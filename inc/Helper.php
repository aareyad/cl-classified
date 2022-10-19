<?php
/**
 * @author  RadiusTheme
 * @since   1.0.0
 * @version 1.0.0
 */

namespace RadiusTheme\ClassifiedLite;

class Helper {

	public static function has_sidebar() {
		return ( self::has_full_width() ) ? false : true;
	}

	public static function has_full_width() {
		$theme_option_full_width = Options::$layout == 'full-width';
		$not_active_sidebar      = ! is_active_sidebar( 'sidebar' );
		$bool                    = $theme_option_full_width || $not_active_sidebar;

		return $bool;
	}

	public static function listing_single_style() {
		$opt_layout  = ! empty( Options::$options['single_listing_style'] ) ? Options::$options['single_listing_style'] : '1';
		$meta_layout = get_post_meta( get_the_id(), 'listing_layout', true );
		if ( ! $meta_layout || 'default' == $meta_layout ) {
			return $opt_layout;
		} else {
			return $meta_layout;
		}
	}

	public static function the_layout_class() {
		$fullwidth_col = ( Options::$options['blog_style'] == 'style1' && is_home() ) ? 'col-sm-10 offset-sm-1 col-12' : 'col-sm-12 col-12';

		$layout_class = self::has_sidebar() ? 'col-lg-8 col-sm-12 col-12' : $fullwidth_col;
		if ( Options::$layout == 'left-sidebar' ) {
			$layout_class .= ' order-lg-2';
		}
		echo apply_filters( 'homlisti_layout_class', $layout_class );
	}

	public static function the_sidebar_class() {
		$sidebar_class = self::has_sidebar() ? 'col-lg-4 col-sm-12 sidebar-break-lg' : 'col-sm-12 col-12';
		echo apply_filters( 'homlisti_sidebar_class', $sidebar_class );
	}

	public static function comments_callback( $comment, $args, $depth ) {
		$args2 = get_defined_vars();
		Helper::get_template_part( 'template-parts/comments-callback', $args2 );
	}

	public static function nav_menu_args() {
		$nav_menu_args = [ 'theme_location' => 'primary', 'container' => 'nav', 'fallback_cb' => false ];

		return $nav_menu_args;
	}

	public static function requires( $filename, $dir = false ) {
		if ( $dir ) {
			$child_file = get_stylesheet_directory() . '/' . $dir . '/' . $filename;

			if ( file_exists( $child_file ) ) {
				$file = $child_file;
			} else {
				$file = get_template_directory() . '/' . $dir . '/' . $filename;
			}
		} else {
			$child_file = get_stylesheet_directory() . '/inc/' . $filename;

			if ( file_exists( $child_file ) ) {
				$file = $child_file;
			} else {
				$file = Constants::$theme_inc_dir . $filename;
			}
		}
		if ( file_exists( $file ) ) {
			require_once $file;
		} else {
			return false;
		}
	}

	public static function get_file( $path ) {
		$file = get_stylesheet_directory_uri() . $path;
		if ( ! file_exists( $file ) ) {
			$file = get_template_directory_uri() . $path;
		}

		return $file;
	}

	public static function get_img( $filename ) {
		$path = '/assets/img/' . $filename;

		return self::get_file( $path );
	}

	public static function get_css( $filename ) {
		$path = '/assets/css/' . $filename . '.css';

		return self::get_file( $path );
	}

	public static function get_maybe_rtl_css( $filename ) {
		if ( is_rtl() ) {
			$path = '/assets/css-rtl/' . $filename . '.css';

			return self::get_file( $path );
		} else {
			return self::get_css( $filename );
		}
	}

	public static function get_rtl_css( $filename ) {
		$path = '/assets/css-rtl/' . $filename . '.css';

		return self::get_file( $path );
	}

	public static function get_js( $filename ) {
		$path = '/assets/js/' . $filename . '.js';

		return self::get_file( $path );
	}

	public static function get_template_part( $template, $args = [] ) {
		extract( $args );

		$template = '/' . $template . '.php';

		if ( file_exists( get_stylesheet_directory() . $template ) ) {
			$file = get_stylesheet_directory() . $template;
		} else {
			$file = get_template_directory() . $template;
		}
		if ( file_exists( $file ) ) {
			require $file;
		} else {
			return false;
		}
	}

	/**
	 * Get all sidebar list
	 *
	 * @return array
	 */
	public static function custom_sidebar_fields(): array {
		$base                                      = 'homlisti';
		$sidebar_fields                            = [];
		$sidebar_fields['sidebar']                 = esc_html__( 'Sidebar', 'homlisti' );
		$sidebar_fields['listing-archive-sidebar'] = esc_html__( 'Listing Archive Sidebar', 'homlisti' );
		$sidebar_fields['store-sidebar']           = esc_html__( 'Agency/Store Sidebar', 'homlisti' );
		$sidebar_fields['agent-sidebar']           = esc_html__( 'Agent Sidebar', 'homlisti' );
		if ( class_exists( 'WooCommerce' ) ) {
			$sidebar_fields['woocommerce-archive-sidebar'] = esc_html__( 'WooCommerce Archive Sidebar', 'homlisti' );
			$sidebar_fields['woocommerce-single-sidebar']  = esc_html__( 'WooCommerce Single Sidebar', 'homlisti' );
		}
		$sidebars = get_option( "{$base}_custom_sidebars", [] );
		if ( $sidebars ) {
			foreach ( $sidebars as $sidebar ) {
				$sidebar_fields[ $sidebar['id'] ] = $sidebar['name'];
			}
		}

		return $sidebar_fields;
	}

	/**
	 * Get site header list
	 *
	 * @param string $return_type
	 *
	 * @return array
	 */
	public static function get_header_list( $return_type = '' ): array {
		if ( 'header' === $return_type ) {
			return [
				'1' => [
					'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/header-1.png',
					'name'  => esc_html__( 'Style 1', 'cl-classified' )
				]
			];
		} else {
			return [
				'default' => esc_html__( 'Default', 'cl-classified' ),
				'1'       => esc_html__( 'Layout 1', 'cl-classified' )
			];
		}
	}

	public static function get_custom_listing_template( $template, $echo = true, $args = [], $path = 'custom/' ) {
		$template = 'classified-listing/' . $path . $template;
		if ( $echo ) {
			self::get_template_part( $template, $args );
		} else {
			$template .= '.php';

			return $template;
		}
	}

	public static function get_custom_store_template( $template, $echo = true, $args = [] ) {
		$template = 'classified-listing/store/custom/' . $template;
		if ( $echo ) {
			self::get_template_part( $template, $args );
		} else {
			$template .= '.php';

			return $template;
		}
	}

	public static function is_chat_enabled() {
		/*if ( Options::$options['header_chat_icon'] && class_exists( 'Rtcl' ) ) {
			if ( Fns::is_enable_chat() ) {
				return true;
			}
		}*/

		return false;
	}

	public static function get_primary_color() {
		return apply_filters( 'rdtheme_primary_color', Options::$options['primary_color'] );
	}

	public static function get_secondary_color() {
		return apply_filters( 'rdtheme_secondary_color', Options::$options['secondary_color'] );
	}

	public static function get_body_color() {
		return apply_filters( 'rdtheme_body_color', Options::$options['body_color'] );
	}

	public static function is_header_btn_enabled() {
		$btn_flag = get_theme_mod( 'header_btn' );
		if ( empty( $btn_flag ) ) {
			return false;
		}

		return true;
	}

	public static function is_trheader_enable() {
		$tr_header = get_theme_mod( 'tr_header' );
		if ( empty( $tr_header ) ) {
			return false;
		}

		return true;
	}

	public static function is_copyright_area_enabled() {
		$flag = get_theme_mod( 'copyright_area' );
		error_log($flag . 'test');
		if ( empty( $flag ) ) {
			return false;
		}

		return true;
	}

	public static function is_login_btn_enabled() {
		$btn_flag = get_theme_mod( 'header_login_icon' );
		if ( empty( $btn_flag ) ) {
			return false;
		}

		return true;
	}

	public static function is_fav_btn_enabled() {
		$btn_flag = get_theme_mod( 'header_fav_icon' );
		if ( empty( $btn_flag ) ) {
			return false;
		}

		return true;
	}

	public static function wp_set_temp_query( $query ) {
		global $wp_query;
		$temp     = $wp_query;
		$wp_query = $query;

		return $temp;
	}

	public static function wp_reset_temp_query( $temp ) {
		global $wp_query;
		$wp_query = $temp;
		wp_reset_postdata();
	}

	public static function hex2rgb( $hex ) {
		$hex = str_replace( "#", "", $hex );
		if ( strlen( $hex ) == 3 ) {
			$r = hexdec( substr( $hex, 0, 1 ) . substr( $hex, 0, 1 ) );
			$g = hexdec( substr( $hex, 1, 1 ) . substr( $hex, 1, 1 ) );
			$b = hexdec( substr( $hex, 2, 1 ) . substr( $hex, 2, 1 ) );
		} else {
			$r = hexdec( substr( $hex, 0, 2 ) );
			$g = hexdec( substr( $hex, 2, 2 ) );
			$b = hexdec( substr( $hex, 4, 2 ) );
		}
		$rgb = "$r, $g, $b";

		return $rgb;
	}

	public static function socials() {
		$rdtheme_socials = [
			'facebook'  => [
				'icon' => 'fab fa-facebook-square',
				'url'  => Options::$options['facebook'],
			],
			'twitter'   => [
				'icon' => 'fab fa-twitter',
				'url'  => Options::$options['twitter'],
			],
			'linkedin'  => [
				'icon' => 'fab fa-linkedin-in',
				'url'  => Options::$options['linkedin'],
			],
			'youtube'   => [
				'icon' => 'fab fa-youtube',
				'url'  => Options::$options['youtube'],
			],
			'pinterest' => [
				'icon' => 'fab fa-pinterest',
				'url'  => Options::$options['pinterest'],
			],
			'instagram' => [
				'icon' => 'fab fa-instagram',
				'url'  => Options::$options['instagram'],
			],
			'skype'     => [
				'icon' => 'fab fa-skype',
				'url'  => Options::$options['skype'],
			],
		];

		return array_filter( $rdtheme_socials, [ __CLASS__, 'filter_social' ] );
	}

	public static function post_share_on_social() {
		$sharer = [];
		if ( Options::$options['social_facebook'] ) {
			$sharer[] = 'facebook';
		}
		if ( Options::$options['social_twitter'] ) {
			$sharer[] = 'twitter';
		}
		if ( Options::$options['social_linkedin'] ) {
			$sharer[] = 'linkedin';
		}
		if ( Options::$options['social_pinterest'] ) {
			$sharer[] = 'pinterest';
		}
		if ( Options::$options['social_tumblr'] ) {
			$sharer[] = 'tumblr';
		}
		if ( Options::$options['social_reddit'] ) {
			$sharer[] = 'reddit';
		}
		if ( Options::$options['social_vk'] ) {
			$sharer[] = 'vk';
		}

		return $sharer;
	}

	public static function filter_social( $args ) {
		return ( $args['url'] != '' );
	}

	// Get user social info

	public static function get_user_social_info( $social_links ) {
		if ( count( $social_links ) < 1 && ! is_array( $social_links ) ) {
			return;
		}
		ob_start();
		?>
        <ul class="agent-social">
            <li class="social-item">
                <a href="#" class="social-hover-icon social-link">
                    <i class="fas fa-share-alt"></i>
                </a>
                <ul class="team-social-dropdown">
					<?php foreach ( $social_links as $icon ) : ?>

                        <li class="social-item">
                            <a
                                    href="<?php echo esc_html( $icon['social_link'] ) ?>"
                                    class="social-link" target="_blank"
                                    title="<?php echo esc_html( $icon['social_title'] ) ?>">
								<?php \Elementor\Icons_Manager::render_icon( $icon['social_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                            </a>
                        </li>

					<?php endforeach; ?>
                </ul>
            </li>
        </ul>
		<?php
		echo ob_get_clean();
	}

	// Time Elapsed
	public static function time_elapsed_string() {
		$ptime = get_the_time( 'U' );
		$etime = time() - $ptime;

		if ( $etime < 1 ) {
			return '0 seconds';
		}

		$a        = [
			365 * 24 * 60 * 60 => 'year',
			30 * 24 * 60 * 60  => 'month',
			24 * 60 * 60       => 'day',
			60 * 60            => 'hour',
			60                 => 'minute',
			1                  => 'second',
		];
		$a_plural = [
			'year'   => 'years',
			'month'  => 'months',
			'day'    => 'days',
			'hour'   => 'hours',
			'minute' => 'minutes',
			'second' => 'seconds',
		];

		foreach ( $a as $secs => $str ) {
			$d = $etime / $secs;
			if ( $d >= 1 ) {
				$r = round( $d );

				return $r . ' ' . ( $r > 1 ? $a_plural[ $str ] : $str ) . ' ago';
			}
		}
	}

	//Post reading time calculate
	public static function reading_time_count( $content = '', $is_zero = false ) {
		global $post;
		$post_content = $content ? $content : $post->post_content; // wordpress users only
		$word         = str_word_count( strip_tags( strip_shortcodes( $post_content ) ) );
		$m            = floor( $word / 200 );
		$s            = floor( $word % 200 / ( 200 / 60 ) );
		if ( $is_zero && $m < 10 ) {
			$m = '0' . $m;
		}
		if ( $is_zero && $s < 10 ) {
			$s = '0' . $s;
		}
		if ( $m < 1 ) {
			return $s . ' second' . ( $s == 1 ? '' : 's' );
		}

		return $m . ' min' . ( $m == 1 ? '' : 's' );
	}

	// Modify Color
	public static function rt_modify_color( $hex, $steps ) {
		$steps = max( - 255, min( 255, $steps ) );
		// Format the hex color string
		$hex = str_replace( '#', '', $hex );
		if ( strlen( $hex ) == 3 ) {
			$hex = str_repeat( substr( $hex, 0, 1 ), 2 ) . str_repeat( substr( $hex, 1, 1 ), 2 ) . str_repeat( substr( $hex, 2, 1 ), 2 );
		}
		// Get decimal values
		$r = hexdec( substr( $hex, 0, 2 ) );
		$g = hexdec( substr( $hex, 2, 2 ) );
		$b = hexdec( substr( $hex, 4, 2 ) );
		// Adjust number of steps and keep it inside 0 to 255
		$r     = max( 0, min( 255, $r + $steps ) );
		$g     = max( 0, min( 255, $g + $steps ) );
		$b     = max( 0, min( 255, $b + $steps ) );
		$r_hex = str_pad( dechex( $r ), 2, '0', STR_PAD_LEFT );
		$g_hex = str_pad( dechex( $g ), 2, '0', STR_PAD_LEFT );
		$b_hex = str_pad( dechex( $b ), 2, '0', STR_PAD_LEFT );

		return '#' . $r_hex . $g_hex . $b_hex;
	}


	// Number Shorten
	public static function rt_number_shorten( $number, $precision = 3, $divisors = null ) {
		if ( $number < 1000 ) {
			return $number;
		}
		// Setup default $divisors if not provided
		if ( ! isset( $divisors ) ) {
			$divisors = [
				pow( 1000, 0 ) => '', // 1000^0 == 1
				pow( 1000, 1 ) => esc_html__( 'K', 'homlisti' ), // Thousand
				pow( 1000, 2 ) => esc_html__( 'M', 'homlisti' ), // Million
				pow( 1000, 3 ) => esc_html__( 'B', 'homlisti' ), // Billion
				pow( 1000, 4 ) => esc_html__( 'T', 'homlisti' ), // Trillion
				pow( 1000, 5 ) => esc_html__( 'Qa', 'homlisti' ), // Quadrillion
				pow( 1000, 6 ) => esc_html__( 'Qi', 'homlisti' ) // Quintillion
			];
		}

		// Loop through each $divisor and find the
		// lowest amount that matches
		foreach ( $divisors as $divisor => $shorthand ) {
			if ( abs( $number ) < ( $divisor * 1000 ) ) {
				// We found a match!
				break;
			}
		}

		// We found our match, or there were no matches.
		// Either way, use the last defined value for $divisor.
		return number_format( $number / $divisor, $precision ) . $shorthand;
	}

	//Custom pagination for page template
	static function homlisti_list_posts_pagination( $query = '' ) {
		if ( ! $query ) {
			global $query;
		}
		if ( $query->max_num_pages > 1 ) :
			$big   = 999999999; // need an unlikely integer
			$items = paginate_links( [
				'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format'    => '?paged=%#%',
				'prev_next' => true,
				'current'   => max( 1, get_query_var( 'paged' ) ),
				'total'     => $query->max_num_pages,
				'type'      => 'array',
				'prev_text' => '<i class="fas fa-angle-double-left"></i>',
				'next_text' => '<i class="fas fa-angle-double-right"></i>',
			] );

			$pagination = '<div class="pagination-number"><ul class="pagination clearfix"><li>';
			$pagination .= join( "</li><li>", (array) $items );
			$pagination .= "</li></ul></div>";

			return $pagination;
		endif;

		return;
	}

	/**
	 * Get Listing author image
	 *
	 * @param       $listing
	 * @param int $size
	 */
	static public function get_listing_author_iamge( $listing, $size = 40, $default = 'Author', $args = [] ) {
		$manager_id = get_post_meta( $listing->get_id(), '_rtcl_manager_id', true );
		$owner_id   = $manager_id ? $manager_id : $listing->get_owner_id();
		$pp_id      = absint( get_user_meta( $owner_id, '_rtcl_pp_id', true ) );
		if ( $pp_id ) {
			echo wp_get_attachment_image( $pp_id, [ $size, $size ] );
		} else {
			echo get_avatar( $listing->get_author_id(), $size );
		}
	}

	/**
	 * Get Homlisti thumb carousel markup
	 *
	 * @param          $listing_id
	 * @param string $size
	 */

	public static function homlisti_thumb_carousel( $listing_id, $size = 'rtcl-thumbnail' ) { ?>
        <div class="listing-archive-carousel">
            <div class="swiper-wrapper">
				<?php $images = Functions::get_listing_images( $listing_id ); ?>
				<?php foreach ( $images as $index => $image ): ?>
					<?php $thumb_img = wp_get_attachment_image_src( $image->ID, $size ); ?>
                    <div class="swiper-slide">
                        <div class="thumbnail-bg"
                             style="background-image:url(<?php echo esc_url( $thumb_img[0] ) ?>)"></div>
                    </div>
				<?php endforeach; ?>
            </div>
            <div class="listing-archive-pagination">
                <div class="swiper-button-prev listing-navigation">
                    <i class="fas fa-angle-left"></i>
                </div>
                <div class="swiper-button-next listing-navigation">
                    <i class="fas fa-angle-right"></i>
                </div>
            </div>
        </div>
		<?php
	}

}