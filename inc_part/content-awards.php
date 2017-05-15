<?php 
/*
* Awards contents
*/
?>

<div class="ctabs">
      <div class="clearfix carousal-years-wrapper">
            <div id="carousal-years" class="carousal-years slick-initialized slick-slider">
              <?php
                global $wpdb;
                $tableN = $wpdb->prefix . 'postmeta';
                $tableP = $wpdb->prefix . 'posts';
                $allMetas =  $wpdb->get_results( "SELECT * FROM $tableN LEFT JOIN `$tableP` ON $tableN.post_id = $tableP.ID WHERE $tableN.meta_key LIKE 'his_year' AND $tableP.post_type = 'award'" );

                $years = array();
                foreach($allMetas as $smeta):
                  $meta_value_array = ($smeta->meta_value)?explode('-', $smeta->meta_value):array();
                  if($meta_value_array){
                    $years[$meta_value_array[0]][] = $smeta->post_id; 
                  }
                endforeach; 
                asort($years);
                foreach($years as $k => $yr): ?>            	
                  <div class="awrd-href"><a href="#award-<?= $k; ?>"><?= $k; ?></a></div>
                <?php endforeach; ?>
            </div>
      </div>
      <?php $i= 0; foreach($years as $ks => $year): ?>
      <div id="award-<?= $ks; ?>" class="view-content awards ctabs-content <?= ($i!=0)?'hide':'';  ?>">
          <div class="tabsContent">
	         <?php
            $args = array(
            //Type & Status Parameters
            'post_type'     => 'award',
            'post_status'   => 'publish',
            //Pagination Parameters
            'posts_per_page'=> -1,
            'post__in'    => $year,
            'orderby'     => array( 
                  'his_year'  => 'DESC'
                ),
            ); 
            $query = new WP_Query( $args );
            if($query->have_posts()): while($query->have_posts()): $query->the_post();
           ?>
          <h3 class="award-group-title"><?php the_title(); ?></h3>  
              <div class="singleTab">
                <div class="col-md-9 col-sm-9 col-xs-12 col-xl-9 no-padding-left">
                 <?php the_content(); ?>
                </div>  
                <div class="col-md-3 col-sm-3 col-xs-12 col-xl-3 no-padding-left">
                  <?php 
                  if(has_post_thumbnail( )){
                    the_post_thumbnail( 'full', array('class'=>'img-responsive award-thumbnail') );
                  }
                  ?>
                </div>
                 
          </div>  
        <?php endwhile; endif; ?>
      </div>
        </div>
      <?php $i++; endforeach; ?>
    </div>