<?php

class Infinite_Scroll_Public {
	
	private $plugin_name;
	private $version;

	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	//add css to public side
	public function enqueue_styles() {		
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/infinite-scroll-public.css', array(), $this->version, 'all' );
	}

	//add js to public side
	public function enqueue_scripts() {
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/infinite-scroll-public.js', array( 'jquery' ), $this->version, false );
	}
	
	//this is the response from the ajax call to fill in the infinita scroll
	public function infinite_scroll_request(){
		$to_page = absint( $_GET['to_page'] );
		$order = sanitize_text_field( $_GET['order'] );
		$orderby = sanitize_text_field( $_GET['orderby'] );
		$posts_per_page = absint( $_GET['posts_per_page'] );
		$offset = (($to_page * $posts_per_page) - $posts_per_page)  ;
		
		$args = array(
			'post_type'      => 'post',
			'posts_per_page' => $posts_per_page,
			'offset'         => $offset,
			'order'          => $order,
			'orderby'        => $orderby,
			'post_status'    => 'publish',
		);
		$module_posts = new WP_Query( $args );
		$posts = $module_posts->get_posts();		
		
		foreach($posts as $post){		
			include(plugin_dir_path( dirname( __FILE__ ) )  . 'public/partials/infinite-scroll-template-post.php');
		}
		
		die();
	}	

}
