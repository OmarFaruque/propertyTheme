<?php 
/*
* Search Template
*/
$ch_data = new ch_option;
get_header();

	/*Search Query */
		/**
		 * The WordPress Query class.
		 * @link http://codex.wordpress.org/Function_Reference/WP_Query
		 *
		 */
	$priceA = (isset($_GET['price']))?explode('-', $_GET['price']):array();
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
			'meta_value'     => (isset($_GET['location']))?$_GET['location']:'',
			'meta_compare'   => '=',
			'meta_query'     => array(
				array(
					'key' => 'price',
					'value' => $priceA,
					'compare' => 'BETWEEN',
					'type' => 'numeric'
				)
			),
			//Taxonomy Parameters
			'tax_query' => array(
			'relation'  => 'AND',
				array(
					'taxonomy'         => 'property-type',
					'field'            => 'slug',
					'terms'            => array($_GET['propertytype']),
					'include_children' => true,
					'operator'         => 'IN'
				)
			)
	);
	
	if(isset($_GET['type'])){
		array_push($args['tax_query'],
			array(
			'taxonomy'         => 'property-category',
			'field'            => 'slug',
			'terms'            => array($_GET['type']),
			'include_children' => true,
			'operator'         => 'IN'
			) 
		);
	}

	$querys = new WP_Query( $args );
	if($querys->have_posts()):
		?>
		<section id="searchPage" class="mt40">
			<div class="container">
			<div class="rows">
			<div class="col-md-12 col-sm-12 col-xs-12">
			<?php get_template_part( 'inc_part/short', 'form' ); ?>
			<h2 class="colr-blue bold font20"><?= $querys->found_posts; ?> Results found <?= (isset($_GET['location']))?'for '.$_GET['location']:'';  ?></h2>
			</div>
			</div>
			<div id="loopProperty" class="grid">
			<?php 
			while($querys->have_posts()): $querys->the_post();
				get_template_part( 'inc_part/content', 'property' );
			endwhile;
			?>
			</div>
			</div>
		</section>
<?php else: ?>
	<section id="searchError">
		<div class="container pt50 pb50">
			<h1 class="text-center font30 colr-blue bold uppercase">Have no property for <?= (isset($_GET['location']))?$_GET['location']:'';  ?></h1>
		</div>
	</section>
<?php endif; ?>
		<section id="whyResidential" class="bg-dip-blue mb120">
			<div class="container-fluid pl0">
				<div class="col-md-5 col-sm-5 col-xs-12 col-xl-5 leftImg" style="background-image:url(<?= wp_get_attachment_url( $ch_data->ch_get_opt('why_residential_image_id') );  ?>)">
					<img class="img-responsive" style="opacity:0;" src="<?= wp_get_attachment_url( $ch_data->ch_get_opt('why_residential_image_id') );  ?>" alt="Why Residential?">
				</div>
				<div class="col-md-7 col-sm-7 col-xs-12 col-xl-7 residentailContent">
					<div class="innerResidential">
						<?= str_replace('\"', '"', $ch_data->ch_get_opt('why_residential_content'));  ?>
					</div>
				</div>
			</div>
		</section>

<?php get_footer(); ?>