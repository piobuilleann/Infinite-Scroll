<script type="text/javascript">
    var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
</script>

<div id="infiniteContainer" data-per-post="<?php echo $per_post; ?>">

	<?php
		$args = array(
			'post_type'      => 'post',
			'posts_per_page' => $per_post,
			'offset'         => 0,
			'order'          => 'desc',
			'orderby'        => 'date',
			'post_status'    => 'publish',
		);

		$module_posts = new WP_Query( $args );
		$posts = $module_posts->get_posts();

		foreach($posts as $post){
			include('infinite-scroll-template-post.php');
		}
	?>
	
	<div id="infiniteBottom"></div>
</div>