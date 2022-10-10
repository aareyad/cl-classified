<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\HomListi\Customizer\Settings;

use radiustheme\HomListi\Customizer\RDTheme_Customizer;
use radiustheme\HomListi\Customizer\Controls\Customizer_Switch_Control;
use radiustheme\HomListi\Customizer\Controls\Customizer_Separator_Control;
use WP_Customize_Media_Control;

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class RDTheme_Breadcrumb_Settings extends RDTheme_Customizer {

	public function __construct() {
		parent::instance();
		$this->populated_default_data();
		// Add Controls
		add_action( 'customize_register', [ $this, 'register_general_controls' ] );
	}

	public function register_general_controls( $wp_customize ) {
		// Breadcrumb
		$wp_customize->add_setting( 'breadcrumb_style',
			[
				'default'           => $this->defaults['breadcrumb_style'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'rttheme_text_sanitization',
			]
		);
		$wp_customize->add_control( 'breadcrumb_style', [
			'type'    => 'select',
			'section' => 'breadcrumb_section',
			'label'   => esc_html__( 'Breadcrumb', 'homlisti' ),
			'choices' => [
				'style-1' => esc_html__( 'Style 1', 'homlisti' ),
				'style-2' => esc_html__( 'Style 2', 'homlisti' ),
			],
		] );

		// Breadcrumb Image
		$wp_customize->add_setting( 'banner_image',
			[
				'default'           => $this->defaults['banner_image'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'absint',
			]
		);
		$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'banner_image',
			[
				'label'         => esc_html__( 'Banner/Breadcrumb Background Image', 'homlisti' ),
				'description'   => esc_html__( 'Add image to change banner background image', 'homlisti' ),
				'section'       => 'breadcrumb_section',
				'mime_type'     => 'image',
				'button_labels' => [
					'select'       => esc_html__( 'Select File', 'homlisti' ),
					'change'       => esc_html__( 'Change File', 'homlisti' ),
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

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new RDTheme_Breadcrumb_Settings();
}
