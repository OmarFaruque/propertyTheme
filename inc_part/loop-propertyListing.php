<?php 
/*
* PropertyListing Loop
*/

	/**
	 * The WordPress Query class.
	 * @link http://codex.wordpress.org/Function_Reference/WP_Query
	 *
	 */
	$args = array(		
		//Type & Status Parameters
		'post_type'   => 'property',
		'post_status' => 'publish',

		//Pagination Parameters
		'posts_per_page'         => 10,
		'posts_per_archive_page' => 10,
		'paged'                  => get_query_var('paged')
	);

$query = new WP_Query( $args );
if($query->have_posts()):
	echo '<div id="loopProperty" class="grid row">';
		while($query->have_posts()): $query->the_post();
				get_template_part( 'inc_part/content', 'property' );
		endwhile;
	echo '</div>';
endif;

