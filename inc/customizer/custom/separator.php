<?php
/**
 * MT Blog functions and definitions
 *
 * @link https://mightythemes.com
 *
 * @package Mighty Themes
 * @subpackage MT_Blog
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( class_exists( 'WP_Customize_Section' ) && ! class_exists( 'Horizontal_Separator' ) ) {
	/**
	 * Create our upsell section.
	 * Escape your URL in the Customizer using esc_url().
	 *
	 * @since unknown
	 */
	class Horizontal_Separator extends WP_Customize_Section {
		public $type = 'horizontal-separator';		
		public $pro_text = '';
		public $id = '';

		public function json() {
			$json = parent::json();
			$json['pro_text'] = $this->pro_text;
			$json['id'] = $this->id;
			return $json;
		}

		protected function render_template() {
			?>
			<hr>
			<strong>
				<p style="text-align:center;">{{ data.pro_text }} </p>
			</strong>
			<hr>
			<?php
		}
	}
}

if ( ! function_exists( 'mighty_customizer_controls_css' ) ) {
	add_action( 'customize_controls_enqueue_scripts', 'mighty_customizer_controls_css' );
	/**
	 * Add CSS for our controls
	 *
	 * @since 1.3.41
	 */
	function mighty_customizer_controls_css() {
		
		wp_enqueue_script( 'mighty-separator', trailingslashit( get_template_directory_uri() ) . 'inc/customizer/js/section-customizer.js', array( 'customize-controls' ), false, true );

	}
}
