<?php
/**
 * @author  RadiusTheme
 * @since   1.0.0
 * @version 1.0.0
 */

use RadiusTheme\ClassifiedLite\Customizer\Init;

require_once __DIR__ . './../vendor/autoload.php';

final class Includes {
	private $suffix;
	private $version;
	private static $singleton = false;

	/**
	 * Create an inaccessible constructor.
	 */
	private function __construct() {
		$this->suffix  = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
		$this->version = ( defined( 'WP_DEBUG' ) && WP_DEBUG ) ? time() : RTCL_CLASSSIFIED_VERSION;

		$this->load_scripts();
		$this->init();
	}

	/**
	 * Fetch an instance of the class.
	 */
	final public static function getInstance() {
		if ( self::$singleton === false ) {
			self::$singleton = new self();
		}

		return self::$singleton;
	}

	/**
	 * Classified Listing Constructor.
	 */
	protected function init() {
		$this->define_constants();
		$this->load_language();
		$this->hooks();
	}

	private function load_scripts() {

	}

	private function define_constants() {

	}

	public function load_language() {

	}

	private function hooks() {
		if ( class_exists( 'WP_Customize_Control' ) ) {
			Init::instance();
		}
	}

}

/**
 * @return bool|Includes
 */
function Includes() {
	return Includes::getInstance();
}

Includes();
