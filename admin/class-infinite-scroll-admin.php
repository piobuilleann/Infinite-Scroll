<?php

class Infinite_Scroll_Admin {

	private $plugin_name;
	private $version;

	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	//add css to admin side
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/infinite-scroll-admin.css', array(), $this->version, 'all' );

	}

	//add js to admin side
	public function enqueue_scripts() {

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/infinite-scroll-admin.js', array( 'jquery' ), $this->version, false );

	}

}
