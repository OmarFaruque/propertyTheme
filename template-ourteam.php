<?php 
/*
* Template Name: Our Team
*/

get_header();
$ch_data 		= new ch_option;
$layout 		= $ch_data->ch_get_opt('page_layout'); 
$ac_title 		= get_post_meta($post->ID, 'ac_title', true);
?>
<section id="pageContent" <?php post_class('pb50'); ?>>
	<div class="container">
		<div class="col-sm-12 col-md-12 mt50 mb50">
			<?php if(have_posts()): while(have_posts()): the_post();
			$sidebar = get_post_meta($post->ID, 'sidebar', true);
			if($sidebar && $layout == 'right'){ ?>
				<div class="col-md-8 col-xs-12 col-sm-4 col-xl-8 bg-white">
					<div class="row">
						<div class="p25p">
								<?php if($ac_title == 1): ?>
									<h3 class="uppercase font30 mt0 bold mb20 colr-blue"><?php the_title();  ?></h3>
								<?php endif; ?>
							<?php the_content(); ?>
							<?php get_template_part( 'inc_part/loop', 'team' ); ?>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-xs-12 col-sm-4 col-xl-4 pr0">
							<?php get_sidebar('page'); ?>
				</div>
			<?php }elseif($sidebar && $layout == 'left'){ ?>
				<div class="col-md-4 col-xs-12 col-sm-4 col-xl-4 pl0">
							<?php get_sidebar('page'); ?>
				</div>
				<div class="col-md-8 col-xs-12 col-sm-4 col-xl-8 bg-white">
					<div class="row">
						<div class="p25p">'
								<?php if($ac_title == 1): ?>
									<h3 class="uppercase font30 mt0 bold mb20 colr-blue"><?php the_title();  ?></h3>
								<?php endif; ?>
								<?php the_content(); ?>
								<?php get_template_part( 'inc_part/loop', 'team' ); ?>
						</div>
					</div>
				</div>
			<?php }else{ ?>
					<div class="col-md-12 col-xs-12 col-sm-12 col-xl-12 bg-white">
					<div class="row">
						<div class="p25p">
							<?php if($ac_title == 1): ?>
								<h3 class="uppercase font30 mt0 bold mb20 colr-blue"><?php the_title();  ?></h3>
							<?php endif; ?>
							<?php the_content(); ?>
						</div>
					</div>
				</div>
			<?php } ?>
			</div></div></div>	
			<?php endwhile; endif; ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>
