<?php 
/*
* Sidebar 
*/
$ch_data = new ch_option; 
?>
<div id="sidebarMap">
	<div id="projects_map_wrapper_sidebar" style="height: 300px;">
		<div id="map_canvas"></div>
		<a class="btn btn-lrg btn-large btn-block map-button" style="z-index: 1;" href="https://www.google.com.bd/maps/place/<?= get_post_meta($post->ID, 'address', true);  ?>" target="_blank">View Large Map</a>
	</div>
</div>
<div class="contactAgent mt20">
	<a class="btn btn-block btn-large bg-dip-blue colr-wt" href="tel:<?= $ch_data->ch_get_opt('tel');  ?>">Contact Agent</a>
</div>
<div class="brochure mt20">
	<?php $brochure	= get_post_meta($post->ID, 'brochure', true); ?>
	<a class="btn btn-block border-blue-2 colr-blue bg-white btn-large" target="_blank" href="<?= wp_get_attachment_url( $brochure ); ?>">Click here for the Afinity Living Brochure</a>
</div>
<div class="enquire mt20">
	<?= do_shortcode( '[contact-form-7 id="162" title="Enquiry"]' );  ?>
</div>
<div class="brochure mortcageCalculator mt20">
	<?php $brochure	= get_post_meta($post->ID, 'brochure', true); ?>
	<a class="btn btn-block border-blue-2 colr-blue bg-white btn-large" href="#mortgageForm">Mortgage calculator</a>
	<div id="mortgageForm">
		<?= do_shortcode('[mortgagecalculator]'); ?>
	</div>
</div>
<div class="floorplan contactAgent mt20 mb150">
	<?php 
		$floorplan_id = get_post_meta($post->ID, 'floorplan', true);
	?>
	<a class="btn btn-block btn-large bg-dip-blue colr-wt" download="<?= basename(wp_get_attachment_url( $floorplan_id ));  ?>" href="<?= wp_get_attachment_url( $floorplan_id );  ?>">Download Floorplan</a>
</div>
<script>
	jQuery(function($) {
		var marArray = [];
		// Asynchronously Load the map API 
		var script = document.createElement('script');
		script.src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyCoylIh85a8cDjnTEu4uWt5SpiXl-PezhU&callback=initialize";
		document.body.appendChild(script);
		});
	 function initialize() {
	 	<?php 
	 		$map 		= get_post_meta( $post->ID, 'map', true );
	 		$latleng = (!empty($map))?$map:'53.483100, -2.254840';
	 		$lat = explode(',', $latleng);
	 	?>
        var uluru = {lat: <?= $lat[0]; ?>, lng: <?= $lat[1]; ?> };

        /*var map = new google.maps.Map(document.getElementById('map_canvas'), {
          zoom: 16,
          center: uluru
        });*/
     
		var map = new google.maps.Map(document.getElementById('map_canvas'), {
          zoom: 16,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });


      }
	
</script>