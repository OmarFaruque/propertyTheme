<?php 
/*
* Single Property
*/
get_header();
$ch_data = new ch_option;
?>
<section id="singleProperty">
	<div class="container">
		<div class="col-md-8 col-sm-8 col-xs-12 col-xl-8 leftCol">
			<?php 
			if(have_posts()): while(have_posts()): the_post();
				$previous_post 	= get_previous_post();
				$next_post 		= get_next_post();
			?>
			<div class="innerSingProperty">
				<div class="topPagination">
					<?php if(!empty($previous_post->ID)): ?>
					<span class="pull-left text-left"><a href="<?= get_permalink( $previous_post->ID );  ?>">Previous Property</a></span>
					<?php endif; ?>
					<span class="pull-right text-right"><a href="<?= get_permalink( $next_post->ID );  ?>">Next Property </a></span>
					<hr class="border-gray-2" style="width:100%; display: block; float: left;">
				</div>
				<?php $gallerys 	= get_post_meta( $post->ID, 'gallery', true );
				if(!empty($gallerys)): ?>
				<div id="propertyslider">
					<div class="sliderItems">
						<div id="propertyCrousal" class="carousel slide" data-ride="carousel">
		                  <div class="carousel-inner" role="listbox">
		                  <?php 
		                    $index = 0;
		                    	foreach( explode(',', $gallerys)  as $galery):
								$alt 		= get_post_meta( $galery, '_wp_attachment_image_alt', true );
		                    ?>
		                    <div class="item <?= ($index==0)?'active':''; ?>">
		                      <img style="min-width:100%;" class="d-block img-fluid img-responsive" src="<?= wp_get_attachment_url($galery);  ?>" alt="<?= $alt; ?>">
		                    </div>
		                    <?php $index++; endforeach;  ?>
		                    <div class="crosualControl">
			                    <a class="carousel-control left" href="#propertyCrousal" data-slide="prev"><img src="<?= get_template_directory_uri(); ?>/css/img/left-arrow.png"></a>
			                	<a class="carousel-control right" href="#propertyCrousal" data-slide="next"><img src="<?= get_template_directory_uri(); ?>/css/img/left-arrow.png"></a>
		                	</div>
		                  </div>
		                </div>
					</div>
					<div class="col-md-12 col-sm-12 col-xl-12 col-xs-12">
					<div class="fituredMeatas singproperty">
									<?php  
										$size 		= wp_get_post_terms( $post->ID, 'property-size', array() );
										$bedArray  	= wp_get_post_terms( $post->ID, 'bed', array() );
										$bed 		= array(); 
													  foreach($bedArray as $bedA) array_push($bed, $bedA->name);
										$bathroom 	= get_post_meta( $post->ID, 'bathroom', true );	 
										$price 		= get_post_meta( $post->ID, 'price', true );	 
										$addressM 	= get_post_meta( $post->ID, 'address', true );	
										
										$addressA 	= explode(',', $addressM); 
										end($addressA);
										$lastKey 	=  key($addressA);
										$addressA[$lastKey] = '<b>'.end($addressA).'</b>';
										$address 	= implode(', ', $addressA);
										
									?>
									<div class="col-md-4 col-sm-4 col-xs-4 col-xl-4 singleMeta">
										<span class="size"><?= $size[0]->name; ?> sqft</span>
									</div>
									<div class="col-md-4 col-sm-4 col-xs-4 col-xl-4 singleMeta text-center">
										<i class="fa fa-bed" aria-hidden="true"></i>  <span class="bed">&nbsp;<?= implode(',', $bed); ?></span>
									</div>
									<div class="col-md-4 col-sm-4 col-xs-4 col-xl-4 singleMeta text-right">
										<span class="bathroom"><?= $bathroom; ?></span>
									</div>
					</div>	
					
				</div>
				</div> <!-- End Slider -->
				<?php endif; ?>
				<div class="titlepriceAddress mt20">
						<h4 class="title">
						<span class="title pull-left text-left font24 colr-blue"><?php the_title(); ?></span>
						<span class="price pull-right text-right font22 colr-blue">&pound;<?=  number_format($price,2); ?></span>
						</h4>
						<hr style="width:100%; float: left;" />
						<div class="content">
							<?php the_content(); ?>
						</div>
				</div>
			</div>
			<?php endwhile; endif; ?>
		</div>
		<div class="col-md-4 col-sm-4 col-xs-12 colRight col-xs-4 pt40">
			<?php get_sidebar(); ?>
		</div>
	</div>
</section>
<section id="whyInvest" class="bg-dip-blue colr-white pt30 pb50 mb100">
	<div class="container">
		<?= str_replace('\"', '"', $ch_data->ch_get_opt('why_invest'));  ?>
	</div>
</section>

<?php get_footer(); ?>