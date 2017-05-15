<?php 
/*
* Team Loop
*/
/**
 * The WordPress Query class.
 * @link http://codex.wordpress.org/Function_Reference/WP_Query
 *
*/
	$args = array( // Query from Team 
		'post_type'   => 'team',
		'post_status' => 'publish'
	);	
	$query = new WP_Query( $args );
	if($query->have_posts()): while($query->have_posts()): $query->the_post(); ?>
		<div class="row">
			<div class="col-md-4 col-xs-12 col-sm-4 colxl-4">
				<div class="teamImage">
					<?php 
					if(has_post_thumbnail()){
						the_post_thumbnail( 'full', array('class'=>'thumbTeam img-responsive') );
					} 
					?>
				</div>
			</div>
			<div class="col-md-8 col-xs-12 col-sm-8 colxl-8 pl-d-0">
				<div class="temcontent expend">
					<div class="full">
						<?php the_content(); ?>		
					</div>
					<div class="short">
						<?php the_excerpt(); ?>
					</div>	
					<div class="bbutton">
						<a class="uppercase knowMore" href="javascript:void(0)">Know More</a>
						<a class="uppercase button_close" href="javascript:void(0)">Close</a>
					</div>
				</div>
			</div>
		</div>
		<hr class="bg-gray mt30 mb30">
	<?php endwhile; endif; ?>