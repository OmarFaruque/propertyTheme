<?php 
/*
* The Property Supplider Index
*/
get_header();
$ch_data = new ch_option;
?>
<section id="pageContent" <?php post_class('pb50'); ?>>
	<div class="container-fluid">
		<div class="no-row">
			<?php if(have_posts()): while(have_posts()): the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; endif; ?>
		</div>
	</div>
	<div id="pageWelcomeVideo" class="hidden">
	<div class="welcomeVideo flex-center position-ref " style="background-image:url(<?= wp_get_attachment_url($ch_data->ch_get_opt('video_background_id')); ?>)">
		<div class="youtubeVideo text-center pt150 pb100">
			<a href="<?= $ch_data->ch_get_opt('welcome_video');  ?>"><img src="<?= get_template_directory_uri(); ?>/css/img/play_button.png" alt="Play"/></a>
			<div class="videoText text-center">
				<div class="col-md-10 col-sm-10 col-xs-12 col-xl-10 col-md-offset-1 col-xl-offset-1 col-sm-offset-1">
					<h1><span class="colr-wt"><?= $ch_data->ch_get_opt('video_button_text');  ?></span></h1>
				</div>
			</div>
		</div>
	</div>

	</div>
</section>
<?php get_footer(); ?>
