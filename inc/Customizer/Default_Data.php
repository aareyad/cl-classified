<?php
/**
 * @author  RadiusTheme
 * @since   1.0.0
 * @version 1.0.0
 */

namespace RadiusTheme\ClassifiedLite\Customizer;

class Default_Data {

	// Customizer Default Data

	public static function default_values() {
		$customizer_defaults = [

			// General
			'logo'                         => '',
			'logo_light'                   => '',
			'mobile_logo'                  => '',
			'logo_width'                   => '',
			'preloader'                    => '',
			'preloader_image'              => '',
			'banner_image'                 => '',
			'back_to_top'                  => 1,
			'remove_admin_bar'             => 0,

			// Header
			'top_bar'                      => 0,
			'tr_header'                    => 0,
			'sticky_header'                => 0,
			'header_btn'                   => 0,
			'header_btn_txt'               => 'Add Listing',
			'header_btn_url'               => '#',
			'breadcrumb'                   => 1,
			'header_login_icon'            => 1,
			'header_fav_icon'              => 1,
			'header_chat_icon'             => 0,
			'header_style'                 => '1',
			'header_width'                 => 'box-width',
			'menu_alignment'               => 'menu-right',
			'header_transparent_color'     => 'rgba(0, 0, 0, .56)',

			// Blog Archive
			'blog_style'                   => 'style1',
			'blog_date'                    => 1,
			'blog_author_name'             => 1,
			'blog_cat_visibility'          => 1,
			'blog_comment_num'             => 1,
			'excerpt_length'               => 40,
			'blog_button'                  => 1,

			// Footer
			'footer_style'                 => '1',
			'copyright_area'               => 1,
			'copyright_text'               => date( 'Y' ) . '© All right reserved by Radiustheme',
			'footer_bg_image'              => '',

			// Blog Layout
			'blog_layout'                    => 'right-sidebar',
			'blog_sidebar'                   => 'sidebar',
			'blog_top_bar'                   => 'default',
			'blog_header_style'              => 'default',
			'blog_menu_alignment'            => 'default',
			'blog_header_width'              => 'default',
			'blog_tr_header'                 => 'default',
			'blog_breadcrumb'                => 'default',
			'blog_padding_top'               => '',
			'blog_padding_bottom'            => '90px',
			'blog_footer_style'              => 'default',

			// Color
			'primary_color'                => '#00c194',
			'primary_lighiten'             => '#50ffe4',
			'primary_lighiten2'            => '#dceeea',
			'primary_lighiten3'            => '#EAF7F4',
			'primary_dark'                 => '#00a376',
			'secondary_color'              => '#07c196',
			'body_color'                   => '#788593',
			'menu_color'                   => '#000000',
			'menu_background'              => '',
			'sticky_menu_background'       => '',
			'sub_menu_color'               => '#3a3a3a',
			'menu_hover_color'             => '',
			'transparent_menu_color'       => '',
			'transparent_menu_color_hover' => '',
			'menu_arrow_color'             => '',
			'btn_color'                    => '',
			'btn_hover_color'              => '',
			'menu_icon_color'              => '',
			'menu_icon_hover_color'        => '',

			'breadcrumb_style'               => 'style-1',
			'breadcrumb_bg1'                 => '',
			'breadcrumb_bg2'                 => '',
			'breadcrumb_color'               => '#878c9f',
			'breadcrumb_active_color'        => '',

			// Page Layout
			'page_layout'                    => 'right-sidebar',
			'page_sidebar'                   => 'sidebar',
			'page_padding_top'               => '',
			'page_padding_bottom'            => '',
			'page_breadcrumb'                => 'default',
			'page_footer_style'              => 'default',
			'page_header_style'              => 'default',
			'page_header_width'              => 'default',
			'page_menu_alignment'            => 'default',
			'page_tr_header'                 => 'default',
			'page_top_bar'                   => 'default',

			// Error Layout
			'error_padding_top'              => '',
			'error_padding_bottom'           => '',
			'error_breadcrumb'               => 'default',
			'error_top_bar'                  => 'default',
			'error_header_style'             => 'default',
			'error_header_width'             => 'default',
			'error_menu_alignment'           => 'default',
			'error_tr_header'                => 'default',
			'error_footer_style'             => 'default',

			// Single Post Layout
			'single_post_layout'             => 'right-sidebar',
			'single_post_sidebar'            => 'sidebar',
			'single_post_top_bar'            => 'default',
			'single_post_header_style'       => 'default',
			'single_post_header_width'       => 'default',
			'single_post_menu_alignment'     => 'default',
			'single_post_tr_header'          => 'default',
			'single_post_padding_top'        => '',
			'single_post_padding_bottom'     => '',
			'single_post_breadcrumb'         => 'default',
			'single_post_footer_style'       => 'default',
			'agent_single_padding_top'       => '',
			'agent_single_padding_bottom'    => '',

			// Agent Archive Layout
			'agent_archive_layout'           => 'left-sidebar',
			'agent_archive_sidebar'          => 'listing-archive-sidebar',
			'agent_archive_breadcrumb'       => 'default',
			'agent_archive_top_bar'          => 'default',
			'agent_archive_header_style'     => 'default',
			'agent_archive_header_width'     => 'default',
			'agent_archive_menu_alignment'   => 'default',
			'agent_archive_footer_style'     => 'default',
			'agent_archive_tr_header'        => 'default',
			'agent_archive_padding_top'      => '',
			'agent_archive_padding_bottom'   => '',


			// Agent Single Layout
			'agent_single_layout'            => 'right-sidebar',
			'agent_single_sidebar'           => 'agent-sidebar',
			'agent_single_breadcrumb'        => 'default',
			'agent_single_footer_style'      => 'default',
			'agent_single_header_style'      => 'default',
			'agent_single_header_width'      => 'default',
			'agent_single_menu_alignment'    => 'default',
			'agent_single_top_bar'           => 'default',
			'agent_single_tr_header'         => 'default',

			// Listing Archive Layout
			'listing_archive_layout'         => 'left-sidebar',
			'listing_archive_sidebar'        => 'listing-archive-sidebar',
			'listing_archive_padding_top'    => '',
			'listing_archive_padding_bottom' => '90px',
			'listing_archive_breadcrumb'     => 'default',
			'listing_archive_top_bar'        => 'default',
			'listing_archive_header_style'   => 'default',
			'listing_archive_header_width'   => 'default',
			'listing_archive_menu_alignment' => 'default',
			'listing_archive_tr_header'      => 'default',
			'listing_archive_footer_style'   => 'default',

			// Listing Single Layout
			'listing_single_layout'          => 'right-sidebar',
			'listing_single_padding_top'     => '',
			'listing_single_padding_bottom'  => '90px',
			'listing_single_breadcrumb'      => 'default',
			'listing_single_footer_style'    => 'default',
			'listing_single_header_style'    => 'default',
			'listing_single_header_width'    => 'default',
			'listing_single_menu_alignment'  => 'default',
			'listing_single_tr_header'       => 'default',
			'listing_single_top_bar'         => 'default',

			// Store Archive Layout
			'store_archive_layout'           => 'right-sidebar',
			'store_archive_sidebar'          => 'store-sidebar',
			'store_archive_header_style'     => 'default',
			'store_archive_header_width'     => 'default',
			'store_archive_menu_alignment'   => 'default',
			'store_archive_tr_header'        => 'default',
			'store_archive_top_bar'          => 'default',
			'store_archive_padding_top'      => '',
			'store_archive_padding_bottom'   => '',
			'store_archive_breadcrumb'       => 'default',
			'store_archive_footer_style'     => 'default',

			// Single Post
			'post_date'                      => 1,
			'post_author_name'               => 1,
			'post_comment_num'               => 1,
			'post_details_related_section'   => 0,
			'post_details_reading_time'      => 0,
			'post_author_about'              => 0,
			'post_social_icon'               => 0,
			'post_tag'                       => 1,
			'post_navigation'                => 0,
			'post_cats'                      => 1,
			'social_facebook'                => 1,
			'social_twitter'                 => 1,
			'social_linkedin'                => 1,
			'social_pinterest'               => 0,
			'social_tumblr'                  => 1,
			'social_reddit'                  => 0,
			'social_vk'                      => 0,

			// Listings Settings
			'single_listing_style'           => 1,
			'custom_group_individual'        => '4315',
			'listing_detail_sidebar'         => 1,
			'walkscore_control'              => 1,
			'walkscore_title'                => 'Walk Score',
			'walkscore_api_key'              => '',
			'remove_listing_type_prefix'     => 0,
			'listing_type_prefix_text'       => '',
			'show_floating_menu'             => 1,
			'show_listing_button_area'       => 1,
			'show_related_listing'           => 1,
			'show_listing_custom_fields'     => 1,
			'overview_show_hide'             => 1,
			'overview_text'                  => 'Overview',
			'details_show_hide'              => 1,
			'details_text'                   => 'Details',
			'feature_aminities_show_hide'    => 1,
			'feature_text'                   => 'Features & Amenities',
			'show_user_info_on_details'      => 'show_owner_info',
			'listing_owner_widget_title'     => '',
			'listing_widget_min_price'       => '0',
			'listing_widget_max_price'       => '20000',
			'listing_excerpt_limit'          => '',

			// Error
			'error_bodybanner'               => '',
			'error_text'                     => 'ERROR PAGE',
			'error_subtitle'                 => 'Sorry! This Page is <br> Not Available!',
			'error_buttontext'               => 'Go Back To Home Page',

			// Newsletter
			'newsletter_section'             => 0,

			// Contact Info
			'contact_address'                => '121 King St, Melbourne den 3000, Australia',
			'contact_phone'                  => '(+123) 596 000',
			'contact_email'                  => 'info@example.com',
			'contact_website'                => '',
			'facebook'                       => '#',
			'twitter'                        => '#',
			'instagram'                      => '#',
			'youtube'                        => '',
			'pinterest'                      => '',
			'linkedin'                       => '#',
			'skype'                          => '',

			// Body Typography
			'typo_body'                      => json_encode(
				[
					'font'          => 'Lato',
					'regularweight' => 'normal',
				]
			),
			'typo_body_size'                 => '16px',
			'typo_body_height'               => '30px',

			//Menu Typography
			'typo_menu'                      => json_encode(
				[
					'font'          => 'Nunito',
					'regularweight' => '500',
				]
			),
			'typo_menu_size'                 => '15px',
			'typo_menu_height'               => '16px',

			//Sub Menu Typography
			'typo_submenu_size'              => '14px',
			'typo_submenu_height'            => '22px',

			// Heading Typography
			'typo_heading'                   => json_encode(
				[
					'font'          => 'Nunito',
					'regularweight' => '700',
				]
			),
			'typo_h1'                        => json_encode(
				[
					'font'          => '',
					'regularweight' => '700',
				]
			),
			'typo_h1_size'                   => '36px',
			'typo_h1_height'                 => '46px',

			'typo_h2'        => json_encode(
				[
					'font'          => '',
					'regularweight' => '700',

				]
			),
			'typo_h2_size'   => '30px',
			'typo_h2_height' => '40px',

			'typo_h3'        => json_encode(
				[
					'font'          => '',
					'regularweight' => '700',

				]
			),
			'typo_h3_size'   => '22px',
			'typo_h3_height' => '32px',

			'typo_h4'        => json_encode(
				[
					'font'          => '',
					'regularweight' => '700',

				]
			),
			'typo_h4_size'   => '20px',
			'typo_h4_height' => '30px',

			'typo_h5'        => json_encode(
				[
					'font'          => '',
					'regularweight' => '700',

				]
			),
			'typo_h5_size'   => '18px',
			'typo_h5_height' => '28px',

			'typo_h6'        => json_encode(
				[
					'font'          => '',
					'regularweight' => '700',

				]
			),
			'typo_h6_size'   => '16px',
			'typo_h6_height' => '26px',

		];

		return apply_filters( 'rttheme_customizer_defaults', $customizer_defaults );
	}
}