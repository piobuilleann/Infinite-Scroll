<?php
class Infinite_Scroll_Shortcode {

	public function __construct() {

		$this->init_shortcode();
	}

	private function init_shortcode() {
		//this initiates the initial posts within the infinite scroll (before the ajax calls)
		function infinite_scroll_shortcode( $atts ){
			set_query_var('per_post', $atts['perpost']);			
			load_template(plugin_dir_path( dirname( __FILE__ ) )  . 'public/partials/infinite-scroll-template-base.php', true);
		}
		add_shortcode('infinite_scroll', 'infinite_scroll_shortcode');
	}


}
