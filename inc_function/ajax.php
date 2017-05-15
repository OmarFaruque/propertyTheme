<?php 
/*
* Ajax Functions
*/

if(!function_exists('property_list_order')){
	function property_list_order(){	
		// Small Form Data Process
			/*Search Query */
		/**
		 * The WordPress Query class.
		 * @link http://codex.wordpress.org/Function_Reference/WP_Query
		 *
		 */
		$priceA = explode('-', $_GET['price']);
			$args = array(
				//Type & Status Parameters
				'post_type'   => $_GET['s'],
				'post_status' => 'publish',

				//order by
				'meta_key' => 'price',
	            'orderby' => 'meta_value_num',
	            'order' => 'DESC',

				//Custom Field Parameters
				'meta_key'       => 'location',
				'meta_value'     => $_GET['location'],
				'meta_compare'   => '=',
				'meta_query'     => array(
					array(
						'key' => 'price',
						'value' => $priceA,
						'compare' => 'BETWEEN',
						'type' => 'numeric'
					),
				//Taxonomy Parameters
				'tax_query' => array(
				'relation'  => 'AND',
					array(
						'taxonomy'         => 'property-category',
						'field'            => 'slug',
						'terms'            => $_GET['type'],
						'include_children' => true,
						'operator'         => 'IN'
					)
				),
			)
		);
		
		$query = new WP_Query( $args );
			
		echo 'success';
		
		die();
	}
	add_action( 'wp_ajax_property_list_order', 'property_list_order' );
	// Add the ajax hooks for front end
	add_action( 'wp_ajax_nopriv_property_list_order', 'ch_booking_insert' );
}
