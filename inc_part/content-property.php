<?php 
/*
* Content Property
*/
?>
					<div <?php post_class('col-md-4 mb30 col-xs-12 col-sm-6 col-xl-4 singlefeatured');  ?>>
						<div class="singleImtesf">
							<div class="fimg">
								<a href="<?= get_permalink(); ?>">
								<?php 
									if(has_post_thumbnail()){
										the_post_thumbnail('medium', array('class'=>'img-responsive'));
									}
								?>
								<div class="fituredMeatas">
									<?php  
										$size 		= wp_get_post_terms( $post->ID, 'property-size', array() );
										$bedArray  	= wp_get_post_terms( $post->ID, 'bed', array() );
										$bed 		= array(); 
													  foreach($bedArray as $bedA) array_push($bed, $bedA->name);
										$bathroom 	= get_post_meta( $post->ID, 'bathroom', true );	 
										$price 		= get_post_meta( $post->ID, 'price', true );	 
										$address 	= get_post_meta( $post->ID, 'address', true );	
										$location 	= get_post_meta( $post->ID, 'location', true );	
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
								</a>
							</div>
							<div class="titlepriceAddress">
								<div class="excerpt pt20">
									<?php the_excerpt(); ?>
								</div>
								<h4 class="title"><a href="<?= get_permalink(); ?>">
									<span class="title pull-left text-left font24 colr-blue"><?php the_title(); ?></span>
									<span class="price pull-right text-right font22 colr-blue">&pound;<?=  number_format($price,2); ?></span>
								</a></h4>
								<div class="addressFitured mb10">
									<i class="fa fa-map-marker" aria-hidden="true"></i> <span clas="paddress"><?= $address; ?><b><?= (!empty($location))?', '. $location:'';  ?></b></span>
								</div>
							</div>
						</div>
					</div>