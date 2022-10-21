<?php

namespace RadiusTheme\ClassifiedLite\Customizer;

use RadiusTheme\ClassifiedLite\Customizer\Settings\Blog;
use RadiusTheme\ClassifiedLite\Customizer\Settings\Blog_Layout;
use RadiusTheme\ClassifiedLite\Customizer\Settings\General;
use RadiusTheme\ClassifiedLite\Customizer\Settings\Header;
use RadiusTheme\ClassifiedLite\Customizer\Settings\Footer;
use RadiusTheme\ClassifiedLite\Customizer\Typography\Typography;

class Init {
	protected static $instance = null;

	/**
	 * Create an inaccessible constructor.
	 */
	private function __construct() {
		$this->includes();
	}

	public static function instance() {
		if ( null == self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	private function includes() {
		new General();
		new Header();
		new Footer();
		new Blog();
		new Typography();
		// Layout
		new Blog_Layout();
	}
}