<?php 
/*
* Property supplier Home
*/
get_header();
$ch_data = new ch_option;
?>
		<section id="homeSlider">
			  <div class="container" style="position: relative; z-index: 9;">
                    <div id="sliderTitle" class="sliderTitle">
                        <div class="row">
                            <div class="col-md-10 col-xl-10 col-sm-10 col-xs-12 col-md-offset-1 col-xl-offset-1 col-sm-offset-1 flex-center position-ref full-height">
                                <h1 class="center-block text-center colr-wt uppercase fontw600"><?= $ch_data->ch_get_opt('home_slider_title');  ?></h1>
                                <h5 class="sliderSubtitle center-block text-center colr-wt"><?= $ch_data->ch_get_opt('home_slider_sub_title');  ?></h5>
                                	<!-- tab -->
                                	<div class="visiable-desktop">
                                	<?php get_template_part( 'inc_part/search', 'form' ); ?>
                                	</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="carouselSlidesOnly" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner" role="listbox">
                  <?php 
                  	$sliders = new WP_Query(array(
					    'post_type' => 'slider',
					    'post_status' => 'publish',
					    'posts_per_page'=> -1
					));
                    $index = 0;
                    if($sliders->have_posts()): while($sliders->have_posts()): $sliders->the_post();
	                    $slider_id 	= get_post_meta( $post->ID, 'slider_id', true );
						$alt 		= get_post_meta( $slider_id, '_wp_attachment_image_alt', true );
                    ?>
                    <div class="item <?= ($index==0)?'active':''; ?>">
                      <img style="min-width:100%;" class="d-block img-fluid img-responsive" src="<?= wp_get_attachment_url($slider_id);  ?>" alt="<?= $alt; ?>">
                    </div>
                    <?php $index++; endwhile; endif; wp_reset_query();  ?>
                    <div class="crosualControl">
	                    <a class="carousel-control left" href="#carouselSlidesOnly" data-slide="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
	                	<a class="carousel-control right" href="#carouselSlidesOnly" data-slide="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                	</div>
                  </div>
                </div>
                
                <div class="gonext" style="position: absolute; bottom: 25px; text-align: center; width: 100%;">
			        <span class="scroll-btn smooth-scroll-down">
			            <a href="#scroll-header-down">
			                <span class="mouse">
			                    <span>
			                    </span>
			                </span>
			            </a>
			        </span>
			    </div>

                <!--<div class="gonext">
                       <a href="#"><img src="<?php //get_template_directory_uri();  ?>/css/img/gonext.png" alt="go next"></a>
                 </div>-->
		</section>
		<section id="searchFormSection" class="visiable-mobile">
			
			<div class="container">
                                	<?php get_template_part( 'inc_part/search', 'form' ); ?>
             </div>
		</section>

		<section class="wellcome" id="wellcome">
			<div class="container-fluid">
			<div class="row">
				<div class="col-md-5 col-sm-5 col-xs-12 col-xl-5 col-md-offset-1 col-xl-offset-1 col-sm-offset-1">
					<div class="welcomeMessage pt30 pb20">
						<?= $ch_data->ch_get_opt('welcome_message');   ?>
					</div>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-12 col-xl-6" style="padding-right: 0;">
					<div class="welcomeVideo flex-center position-ref full-height" style="background-image:url(<?= wp_get_attachment_url($ch_data->ch_get_opt('video_background_id')); ?>)">
						<div class="youtubeVideo text-center">
							<a href="<?= $ch_data->ch_get_opt('welcome_video');  ?>"><img src="<?= get_template_directory_uri(); ?>/css/img/play_button.png" alt="Play"/></a>
							<div class="videoText text-center">
								<div class="col-md-10 col-sm-10 col-xs-12 col-xl-10 col-md-offset-1 col-xl-offset-1 col-sm-offset-1">
								<h1><span class="colr-wt"><?= $ch_data->ch_get_opt('video_button_text');  ?></span></h1>
								</div>
							</div>
						</div>
					</div>
					</div>
				</div>
			</div>
		</section>
	<?php get_footer(); ?>				