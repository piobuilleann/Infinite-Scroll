<article>
	<a href="<?php echo get_permalink( $post->ID ); ?>"><img src="<?php echo get_the_post_thumbnail_url( $post->ID) ; ?>" /></a>
	<h2><a href="<?php echo get_permalink( $post->ID ); ?>"><?php echo esc_attr($post->post_title); ?></a></h2>
</article>