<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace RadiusTheme\ClassifiedLite\Customizer\Settings;

use RadiusTheme\ClassifiedLite\Customizer\Controls\Separator;
use RadiusTheme\ClassifiedLite\Customizer\Controls\Switcher;
use RadiusTheme\ClassifiedLite\Customizer\Customizer;
use RadiusTheme\ClassifiedLite\Helper;
use WP_Customize_Media_Control;

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class General extends Customizer {

	public function __construct() {
		parent::instance();
		$this->populated_default_data();
		// Add Controls
		add_action( 'customize_register', [ $this, 'register_general_controls' ] );
	}

	public function register_general_controls( $wp_customize ) {
		// Main Logo
		$wp_customize->add_setting( 'logo',
			[
				'default'           => $this->defaults['logo'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'absint',
			]
		);
		$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'logo',
			[
				'label'         => __( 'Main Logo', 'cl-classified' ),
				'description'   => esc_html__( 'Add site main logo', 'cl-classified' ),
				'section'       => 'general_section',
				'mime_type'     => 'image',
				'button_labels' => [
					'select'       => esc_html__( 'Select Logo', 'cl-classified' ),
					'change'       => esc_html__( 'Change Logo', 'cl-classified' ),
					'default'      => esc_html__( 'Default', 'cl-classified' ),
					'remove'       => esc_html__( 'Remove', 'cl-classified' ),
					'placeholder'  => esc_html__( 'No file selected', 'cl-classified' ),
					'frame_title'  => esc_html__( 'Select File', 'cl-classified' ),
					'frame_button' => esc_html__( 'Choose File', 'cl-classified' ),
				],
			]
		) );

		$wp_customize->selective_refresh->add_partial( 'logo', [
			'selector'        => '.site-logo',
			'render_callback' => '__return_false',
		] );

		// Transparent Header Logo
		$wp_customize->add_setting( 'logo_light',
			[
				'default'           => $this->defaults['logo_light'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'absint',
			]
		);
		$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'logo_light',
			[
				'label'         => __( 'Light Logo', 'homlisti' ),
				'description'   => esc_html__( 'Add logo for transparent header', 'homlisti' ),
				'section'       => 'general_section',
				'mime_type'     => 'image',
				'button_labels' => [
					'select'       => esc_html__( 'Select Logo', 'homlisti' ),
					'change'       => esc_html__( 'Change Logo', 'homlisti' ),
					'default'      => esc_html__( 'Default', 'homlisti' ),
					'remove'       => esc_html__( 'Remove', 'homlisti' ),
					'placeholder'  => esc_html__( 'No file selected', 'homlisti' ),
					'frame_title'  => esc_html__( 'Select File', 'homlisti' ),
					'frame_button' => esc_html__( 'Choose File', 'homlisti' ),
				],
			]
		) );

		// Mobile Logo
		$wp_customize->add_setting( 'mobile_logo',
			[
				'default'           => $this->defaults['mobile_logo'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'absint',
			]
		);
		$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'mobile_logo',
			[
				'label'         => esc_html__( 'Mobile Logo', 'homlisti' ),
				'description'   => esc_html__( 'Add logo for mobile header', 'homlisti' ),
				'section'       => 'general_section',
				'mime_type'     => 'image',
				'button_labels' => [
					'select'       => esc_html__( 'Select Logo', 'homlisti' ),
					'change'       => esc_html__( 'Change Logo', 'homlisti' ),
					'default'      => esc_html__( 'Default', 'homlisti' ),
					'remove'       => esc_html__( 'Remove', 'homlisti' ),
					'placeholder'  => esc_html__( 'No file selected', 'homlisti' ),
					'frame_title'  => esc_html__( 'Select File', 'homlisti' ),
					'frame_button' => esc_html__( 'Choose File', 'homlisti' ),
				],
			]
		) );

		//Logo Width Height
		$wp_customize->add_setting( 'logo_width',
			[
				'default'           => $this->defaults['logo_width'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'rttheme_text_sanitization',
			]
		);
		$wp_customize->add_control( 'logo_width',
			[
				'label'           => __( 'Logo max width', 'cl-classified' ),
				'section'         => 'general_section',
				'type'            => 'text',
				'active_callback' => [ '\RadiusTheme\ClassifiedLite\Helper', 'is_header_btn_enabled' ],
				'description'     => __( 'Enter logo width. Eg: 196px', 'cl-classified' ),
				'input_attrs'     => [
					'placeholder' => __( '196px', 'cl-classified' ),
				],
			]
		);
		/**
		 * Separator
		 */
		$wp_customize->add_setting( 'separator_general1', [
			'default'           => '',
			'sanitize_callback' => 'esc_html',
		] );
		$wp_customize->add_control( new Separator( $wp_customize, 'separator_general1', [
			'settings' => 'separator_general1',
			'section'  => 'general_section',
		] ) );


		// Add our Checkbox switch setting and control for opening URLs in a new tab
		$wp_customize->add_setting( 'preloader',
			[
				'default'           => $this->defaults['preloader'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'rttheme_switch_sanitization',
			]
		);
		$wp_customize->add_control( new Switcher( $wp_customize, 'preloader',
			[
				'label'   => esc_html__( 'Preloader', 'homlisti' ),
				'section' => 'general_section',
			]
		) );

		// Preloader Image
		$wp_customize->add_setting( 'preloader_image',
			[
				'default'           => $this->defaults['preloader_image'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'absint',
			]
		);
		$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'preloader_image',
			[
				'label'         => esc_html__( 'Preloader Image', 'homlisti' ),
				'description'   => esc_html__( 'Add preloader image to change default image', 'homlisti' ),
				'section'       => 'general_section',
				'mime_type'     => 'image',
				'button_labels' => [
					'select'       => esc_html__( 'Select Image', 'homlisti' ),
					'change'       => esc_html__( 'Change Image', 'homlisti' ),
					'default'      => esc_html__( 'Default', 'homlisti' ),
					'remove'       => esc_html__( 'Remove', 'homlisti' ),
					'placeholder'  => esc_html__( 'No file selected', 'homlisti' ),
					'frame_title'  => esc_html__( 'Select File', 'homlisti' ),
					'frame_button' => esc_html__( 'Choose File', 'homlisti' ),
				],
			]
		) );

		// Add our Checkbox switch setting and control for opening URLs in a new tab
		$wp_customize->add_setting( 'magnific_popup',
			[
				'default'           => $this->defaults['magnific_popup'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'rttheme_switch_sanitization',
			]
		);
		$wp_customize->add_control( new Switcher( $wp_customize, 'magnific_popup',
			[
				'label'   => esc_html__( 'Magnific Popup', 'homlisti' ),
				'section' => 'general_section',
			]
		) );

		// Add our Checkbox switch setting and control for opening URLs in a new tab
		$wp_customize->add_setting( 'sticky_sidebar',
			[
				'default'           => $this->defaults['sticky_sidebar'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'rttheme_switch_sanitization',
			]
		);
		$wp_customize->add_control( new Switcher( $wp_customize, 'sticky_sidebar',
			[
				'label'   => esc_html__( 'Sticky Sidebar', 'homlisti' ),
				'section' => 'general_section',
			]
		) );

		// Add our Checkbox switch setting and control for opening URLs in a new tab
		$wp_customize->add_setting( 'back_to_top',
			[
				'default'           => $this->defaults['back_to_top'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'rttheme_switch_sanitization',
			]
		);
		$wp_customize->add_control( new Switcher( $wp_customize, 'back_to_top',
			[
				'label'   => esc_html__( 'Back to Top', 'homlisti' ),
				'section' => 'general_section',
			]
		) );


		// Add our Checkbox switch setting and control for opening URLs in a new tab
		$wp_customize->add_setting( 'remove_admin_bar',
			[
				'default'           => $this->defaults['remove_admin_bar'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'rttheme_switch_sanitization',
			]
		);
		$wp_customize->add_control( new Switcher( $wp_customize, 'remove_admin_bar',
			[
				'label'       => esc_html__( 'Remove Admin Bar', 'homlisti' ),
				'section'     => 'general_section',
				'description' => esc_html__( 'This option not work for administrator users.', 'homlisti' ),
			]
		) );

	}

}
