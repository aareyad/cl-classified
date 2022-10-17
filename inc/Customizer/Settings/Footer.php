<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace RadiusTheme\ClassifiedLite\Customizer\Settings;

use RadiusTheme\ClassifiedLite\Customizer\Controls\Image_Radio;
use RadiusTheme\ClassifiedLite\Customizer\Controls\Switcher;
use RadiusTheme\ClassifiedLite\Customizer\Customizer;
use WP_Customize_Media_Control;

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class Footer extends Customizer {

	public function __construct() {
		parent::instance();
		$this->populated_default_data();
		// Add Controls
		add_action( 'customize_register', [ $this, 'register_footer_controls' ] );
	}

	public function register_footer_controls( $wp_customize ) {
		// Footer Style
		$wp_customize->add_setting( 'footer_style',
			[
				'default'           => $this->defaults['footer_style'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'rttheme_radio_sanitization',
			]
		);
		$wp_customize->add_control( new Image_Radio( $wp_customize, 'footer_style',
			[
				'label'       => __( 'Footer Layout', 'homlisti' ),
				'description' => esc_html__( 'Select the header style', 'homlisti' ),
				'section'     => 'footer_section',
				'choices'     => [
					'1' => [
						'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/footer-1.png',
						'name'  => __( 'Style 1', 'homlisti' ),
					],
					'2' => [
						'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/footer-2.png',
						'name'  => __( 'Style 2', 'homlisti' ),
					],
				],
			]
		) );
		// Footer Border
		$wp_customize->add_setting( 'footer_border',
			[
				'default'           => $this->defaults['footer_border'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'rttheme_switch_sanitization',
			]
		);
		$wp_customize->add_control( new Switcher( $wp_customize, 'footer_border',
			[
				'label'   => __( 'Footer Border Top', 'homlisti' ),
				'section' => 'footer_section',
			]
		) );

		// Copyright Area Control
		$wp_customize->add_setting( 'copyright_area',
			[
				'default'           => $this->defaults['copyright_area'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'rttheme_switch_sanitization',
			]
		);
		$wp_customize->add_control( new Switcher( $wp_customize, 'copyright_area',
			[
				'label'   => __( 'Display Copyright Area', 'homlisti' ),
				'section' => 'footer_section',
			]
		) );
		// Copyright Text
		$wp_customize->add_setting( 'copyright_text',
			[
				'default'           => $this->defaults['copyright_text'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'sanitize_textarea_field',
			]
		);
		$wp_customize->add_control( 'copyright_text',
			[
				'label'           => __( 'Copyright Text', 'homlisti' ),
				'section'         => 'footer_section',
				'type'            => 'textarea',
				'active_callback' => ['\RadiusTheme\ClassifiedLite\Helper', 'is_copyright_area_enabled'],
			]
		);

		// Footer Background Image
		$wp_customize->add_setting( 'footer_bg_image',
			[
				'default'           => $this->defaults['footer_bg_image'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'absint',
			]
		);
		$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'footer_bg_image',
			[
				'label'         => __( 'Footer-2 Background Image', 'homlisti' ),
				'description'   => esc_html__( 'This background will work only for Footer-2. Always choose a dark background for best view.', 'homlisti' ),
				'section'       => 'footer_section',
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
	}
}