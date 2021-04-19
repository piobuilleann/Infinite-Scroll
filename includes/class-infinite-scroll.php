<?php

class Infinite_Scroll {

	protected $loader;
	protected $plugin_name;
	protected $version;

	public function __construct() {
		if ( defined( 'INFINITE_SCROLL_VERSION' ) ) {
			$this->version = INFINITE_SCROLL_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'infinite-scroll';

		$this->load_dependencies();
		$this->define_admin_hooks();
		$this->define_public_hooks();


	}


	private function load_dependencies() {

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-infinite-scroll-loader.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-infinite-scroll-admin.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-infinite-scroll-public.php';

		$this->loader = new Infinite_Scroll_Loader();
	}
	
	// All hooks for the admin section
	private function define_admin_hooks() {

		$plugin_admin = new Infinite_Scroll_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

	}


	// All hooks for the public section
	private function define_public_hooks() {

		$plugin_public = new Infinite_Scroll_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
		$this->loader->add_action( 'wp_ajax_request_infinite_scroll', $plugin_public, 'infinite_scroll_request' );
		$this->loader->add_action( 'wp_ajax_nopriv_request_infinite_scroll', $plugin_public, 'infinite_scroll_request' );

	}

	public function run() {
		$this->loader->run();
	}

	public function get_plugin_name() {
		return $this->plugin_name;
	}

	public function get_loader() {
		return $this->loader;
	}

	public function get_version() {
		return $this->version;
	}

}
