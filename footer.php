<?php $ch_data = new ch_option; ?>
		<section id="register" style="background-image: url(<?= wp_get_attachment_url($ch_data->ch_get_opt('register_background_id'));  ?>)">
			<div class="container">
				<div class="col-md-12 col-sm-12">
				<div id="registerInner" class="bg-white">
					<h3 class="colr-blue uppercase" style="margin-bottom: 0;"><?= $ch_data->ch_get_opt('register_title_(1)');  ?></h3>
					<h3 class="colr-blue uppercase" style="margin-top: 0;"><?= $ch_data->ch_get_opt('register_title_(2)');  ?></h3>
					<p><?= $ch_data->ch_get_opt('register_info'); ?></p>
					<p>
						<a class="btn btn-drk-blue colr-wt" href="<?= $ch_data->ch_get_opt('register_link');  ?>">Sign Up</a>
					</p>
				</div>
				</div>
			</div>
		</section>
		<?php if(is_home()): ?>
		<section id="homeCategoryProperty">
			<div class="container-fluid">
				<div class="row">
					<?php 
						$args = array('hide_empty'=>false);
						$property_terms = get_terms(array('property-category'), $args);
						$count = 1;
						foreach($property_terms as $stax):
					?>
						<div class="<?= ($count%2==1)?'left':'right'; ?> col-md-6 col-xs-12 col-sm-6 col-xl-6 singleCatPart" style="background-image: url(<?= wp_get_attachment_url(get_tax_meta($stax->term_id, 'ba_cat_background_id')['id']);  ?>)">
							<div class="singleCat">
								<h3 class="uppercase colr-wt"><?= $stax->name; ?></h3>
								<article class="colr-wt">
									<?= $stax->description; ?>
								</article>
								<div class="buttonDiv mb20">
									<a class="btn btn-drk-blue colr-wt" href="#">Discover</a>
								</div>
							</div>
						</div>

					<?php $count++; endforeach; ?>
				</div>
			</div>
		</section>
		<?php endif; ?>
		<section id="featuredproperty">
			<div class="container">
				<h1 class="fituredTitle uppercase colr-blue mt40 mb50 font36 text-center"><?= $ch_data->ch_get_opt('home_featured_title'); ?></h1>
				<div class="featuredImtes">
				<?php 
					/**
						 * The WordPress Query class.
						 * @link http://codex.wordpress.org/Function_Reference/WP_Query
						 *
						 */
						$fargs = array(
							//Type & Status Parameters
							'post_type'   => 'property',
							'post_status' => 'publish',
							//Pagination Parameters
							'posts_per_page'         => 3,
							//Custom Field Parameters
							'meta_key'       => 'featured',
							'meta_value'     => 'yes',
						);
					
					$fquery = new WP_Query( $fargs );

					if($fquery->have_posts()): while($fquery->have_posts()): $fquery->the_post();
						get_template_part( 'inc_part/content', 'property' );
				 	endwhile; endif; 
				 	?>
				</div>
			</div>
		</section>
		<?php if(is_home()): ?>
		<section class="mt30 mb40 pb50 pt30" id="ClientTestimonials" style="background-image: url(<?= wp_get_attachment_url($ch_data->ch_get_opt('testimonial_background_id'));  ?>);">
			<?php 
				/**
				 * The WordPress Query class.
				 * @link http://codex.wordpress.org/Function_Reference/WP_Query
				 *
				 */
				$tmargs = array(
					//Type & Status Parameters
					'post_type'   => 'testimonial',
					'post_status' => 'publish',
				);
			
			$tsmquery = new WP_Query( $tmargs );
			if($tsmquery->have_posts()):
			?>
			<div class="container">
				<div class="col-md-12 col-sm-12 testimonialtitle">
					<h4 class="uppercase colr-wt font30 mt30 mb30"><?= $ch_data->ch_get_opt('testimonial_title');  ?></h4>
				</div>
				<div id="owl-demo" class="owl-carousel owl-theme">
					<?php while($tsmquery->have_posts()): $tsmquery->the_post(); ?>
						<div class="singleTestimonial col-md-12 col-sm-12">
							<div class="testmBody colr-wt">
								<span class="font16"><?php the_content( ); ?></span>
								<hr/>
								<h5 class="font20"><?php the_title(); ?></h5>
								<h6 class="font16"><i><?= get_post_meta( $post->ID, 'designation', true );  ?></i></h6>
							</div>
						</div>
					<?php endwhile; ?>
				</div>
			</div>
		<?php endif; ?>
		</section>
		<section id="newsSection" class="pb40">
			<div class="container">
				<h3 class="colr-blue uppercase text-center font36 mt30 mb30"><?= $ch_data->ch_get_opt('news_title');  ?></h3>
				<?php 
						/**
						 * The WordPress Query class.
						 * @link http://codex.wordpress.org/Function_Reference/WP_Query
						 *
						 */
						$newsargs = array(
							//Type & Status Parameters
							'post_type'   => 'news',
							'post_status' => 'publish',
							'posts_per_page' => 4
						);
					
				$newsquery = new WP_Query( $newsargs );
				if($newsquery->have_posts()):
					while($newsquery->have_posts()): $newsquery->the_post();
				?>
					<div class="col-md-3 col-sm-3 col-xl-3 col-xs-12">
						<div class="singleNews">
							<div class="newImg" style="background-image: url(<?= wp_get_attachment_url(get_post_thumbnail_id());  ?>);">
							<?php 
								if(has_post_thumbnail()){
									the_post_thumbnail( 'full', array('class'=>'img-responsive') );
								}
							?>
							</div>
							<h4 class="font16 singlNTitle colr-blue bold"><a class="colr-blue" href="<?= get_permalink();  ?>"><?php the_title(); ?></a></h4>
							<article>
								<?php the_excerpt(); ?>
							</article>
							<div class="readMoreNews">
								<a class="colr-blue" href="<?= get_permalink();  ?>">Learn More</a>
							</div>
						</div>
					</div>
				<?php 
				endwhile; endif;
				?>
			</div>
		</section>
		<?php endif; //only for home ?>
		<section class="pt70" id="footer" style="background-image: url(<?= wp_get_attachment_url($ch_data->ch_get_opt('footer_background_id'));  ?>);">
			<div class="container">
				<div class="footerItemSection">
				<div class="col-md-3 col-xs-12 col-sm-6 col-xl-3 singleFoother">
					<div class="footerItem colr-wt text-center pt30 pb20">
						<div class="icon map">
							<img src="<?= get_template_directory_uri(); ?>/css/img/marker.png" alt="Address">
						</div>
						<div class="title">
							<h2 class="uppercase font24 bold">Address</h2>
						</div>
						<address class="text-center font14">
							<?= get_bloginfo();  ?><br/>
							<?= $ch_data->ch_get_opt('address');  ?>
						</address>
					</div>
				</div>
				<div class="col-md-3 col-xs-12 col-sm-6 col-xl-3 singleFoother">
					<div class="footerItem colr-wt text-center pt30 pb20">
						<div class="icon phone flex-center position-ref">
							<img src="<?= get_template_directory_uri(); ?>/css/img/phone-con.png" alt="Contact Us">
						</div>
						<div class="title">
							<h2 class="uppercase font24 bold">Contact Us</h2>
						</div>
						<address class="text-center font14">
							<?= $ch_data->ch_get_opt('contact_us_(footer)');  ?>
						</address>
					</div>
				</div>
				<div class="col-md-3 col-xs-12 col-sm-6 col-xl-3 singleFoother">
					<div class="footerItem colr-wt text-center pt30 pb20">
						<div class="icon email flex-center position-ref">
							<img src="<?= get_template_directory_uri(); ?>/css/img/email.png" alt="Email">
						</div>
						<div class="title">
							<h2 class="uppercase font24 bold">Email</h2>
						</div>
						<address class="text-center font14">
							<?= $ch_data->ch_get_opt('email');  ?>
							<?= get_site_url();  ?>
						</address>
					</div>
				</div>
				<div class="col-md-3 col-xs-12 col-sm-6 col-xl-3 singleFoother">
					<div class="footerItem colr-wt text-center pt30 pb20">
						<div class="icon email flex-center position-ref">
							<img src="<?= get_template_directory_uri(); ?>/css/img/hour.png" alt="OPening Hours">
						</div>
						<div class="title">
							<h2 class="uppercase font24 bold">Opening Hours</h2>
						</div>
						<address class="text-center font14">
							<?= $ch_data->ch_get_opt('opening_hours');  ?>
						</address>
					</div>
				</div>
				</div> <!-- footerItemSection-->
				<div class="clearfix">...</div>
				<div class="col-md-12 col-sm-12">
					<hr class="fooerhrLine"/>	
				</div>
				<div class="footerMenu center-block text-center mt10">
					<?php
					wp_nav_menu( array(
						'menu'              => 'footer',
						'theme_location'    => 'footer',
						'depth'             => 3,
						'container'         => false,
						'container_class'   => 'collapse navbar-collapse',
						'container_id'      => 'bs-example-navbar-collapse-1',
						'menu_class'        => 'text-center colr-wt list-inline uppercase'
					));
					?>	
				</div>
				<div class="footerSocial mt20">
					<ul class="list-inline text-center center-block">
						<?php for($i=1; $i<=3; $i++ ): 
							$url =  $ch_data->ch_get_opt('social('.$i.')_url');
							$icon = $ch_data->ch_get_opt('social('.$i.')_image');
						?>
						<li class="social"><a href="<?= $url;  ?>"><i class="<?= $icon; ?>" aria-hidden="true"></i></a></li>
								<?php endfor; ?>
					</ul>
				</div>
			</div>
			
		<div class="footerCopyright pt50 pb40 mt30">
			<div class="container">
				<div class="copyrightInner text-center colr-wt">
					<?= str_replace("\'", "", $ch_data->ch_get_opt('footer_(copyright)'));  ?>
				</div>
			</div>
		</div>
		</section>
	<?php wp_footer(); ?>
	</body>
</html>

			