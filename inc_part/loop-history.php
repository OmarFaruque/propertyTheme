<?php 
/*
* Loop History
*/
?>
<div class="view-content history-wrapper">
<?php 
	/**
	 * The WordPress Query class.
	 * @link http://codex.wordpress.org/Function_Reference/WP_Query
	 *
	 */
	global $wpdb;
	$tableN = $wpdb->prefix . 'postmeta';
	$allMetas =  $wpdb->get_results( "SELECT * FROM `$tableN` WHERE `meta_key` LIKE 'his_year'" );
	$years = array();
	foreach($allMetas as $smeta):
		$meta_value_array = ($smeta->meta_value)?explode('-', $smeta->meta_value):array();
		if($meta_value_array){
			$years[$meta_value_array[0]][] = $smeta->post_id;	
		}
 	endforeach; 
	
 	foreach($years as $k => $year):
	$args = array(
		//Type & Status Parameters
		'post_type'   	=> 'history',
		'post_status' 	=> 'publish',
		//Pagination Parameters
		'posts_per_page'=> -1,
		'post__in' 		=> $year,
		'orderby' 		=> array( 
	        'his_year' 	=> 'DESC'
    		),
		);

	$query = new WP_Query( $args );
	if($query->have_posts()):
?>

	<div class="YEAR_INDICATOR">
        <div class="Forma"><?= $k;  ?></div>
    </div>  

	<ul>
	<?php while($query->have_posts()): $query->the_post(); ?>
	    <li>
	    <div class="month BlueCircle"></div>
	    <div class="balloon">
	        <div class="Pointer"></div>
	        <div class="PointerBorder"></div>
	        <div class="history-infoblock clearfix">
	            <?php 
	            	if(has_post_thumbnail()){
	            		the_post_thumbnail( 'full', array('class'=>'historyThumb img-responsive') );
	            	}
	            ?>
	            <h2><?= get_the_excerpt();  ?></h2>
	        </div>
	    </div>
	</li>
	<?php endwhile; ?>
	</ul>    
	
<?php endif; endforeach; ?>

</div>
