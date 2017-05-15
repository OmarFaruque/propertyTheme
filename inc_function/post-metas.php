<?php
/*
* All post metas
*/


/**
* Add Media necessary js
*/
 function my_media_lib_uploader_enqueue() {
    wp_enqueue_media();
    wp_enqueue_script('jquery-ui-datepicker');
    wp_enqueue_style('jquery-ui-css', get_template_directory_uri() . '/css/jquery-ui.css');
 }
 add_action('admin_enqueue_scripts', 'my_media_lib_uploader_enqueue');


/**
 * Adds a box to the main column on the Post and Page edit screens.
 */
function ps_meta_box() {

	$screens = array( 'slider' );
	$desnations = array('testimonial', 'team');
	$dates = array('history', 'award');
	foreach ( $screens as $screen ) {
		add_meta_box(
			'psSlider', __( 'Slider Image', 'Property Supplier' ), 'slider_meta_box_callback', $screen 
		);
	}
	add_meta_box('psMeta', __( 'Meta', 'Property Supplier' ), 'property_meta_box_callback', 'property', 'body', 'default' );
	foreach ( $desnations as $des ){
		add_meta_box('tsMeta', __( 'Meta', 'Metas' ), 'testimonial_meta_box_callback', $des);
	}
	add_meta_box('pageMeta', __( 'Page Meta', 'Property Supplier' ), 'page_meta_box_callback', 'page', 'side', 'low' );

	foreach($dates as $dat):
	add_meta_box('historyMeta', __( 'Meta', 'Property Supplier' ), 'history_meta_box_callback', $dat, 'side', 'low' );
	endforeach;

	//Designation
}
add_action( 'add_meta_boxes', 'ps_meta_box' );



/**
*
* History Meta
*
**/
if(!function_exists('history_meta_box_callback')){
	function history_meta_box_callback($post){
		// Add a nonce field so we can check for it later.
		wp_nonce_field( 'product_meta_box', 'product_meta_box_nonce' );
		wp_nonce_field( basename( __FILE__ ), 'prfx_nonce' );
	    $prfx_stored_meta = get_post_meta( $post->ID );
		/*
		 * Use get_post_meta() to retrieve an existing value
		 * from the database and use the value for the form.
		*/
		$his_year = (get_post_meta( $post->ID, 'his_year', true ))?date('F d, Y', strtotime(get_post_meta( $post->ID, 'his_year', true ))):''; 
		
		echo '<label style="margin-top:0px; display:inline-block;" for="his_year">Year</label>'; //Price
		echo '<input style="width:100%;" type="text" value="'.$his_year.'" id="his_year" name="his_year"/>'; ?>
		<script type="text/javascript" charset="utf-8" async defer>
			 jQuery(document).ready(function($){
			 	$( "#his_year" ).datepicker({
			        changeMonth: true,
			        changeYear: true
    			});
			 });
		</script>
<?php
	}
}

/**
*
* Page Meata
*
**/
if(!function_exists('page_meta_box_callback')){
	function page_meta_box_callback($post){

	// Add a nonce field so we can check for it later.
	wp_nonce_field( 'product_meta_box', 'product_meta_box_nonce' );
	wp_nonce_field( basename( __FILE__ ), 'prfx_nonce' );
    $prfx_stored_meta = get_post_meta( $post->ID );
	/*
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$sidebar 		= get_post_meta($post->ID, 'sidebar', true);
	$yeschecked 	= ($sidebar == 1)?'checked="checked"':'';
	$nochecked 		= ($sidebar != 1)?'checked="checked"':'';

	$ac_title 		= get_post_meta($post->ID, 'ac_title', true);
	$noactive 		= ($ac_title  == '0')?'checked="checked"':'';
	$yesactive 		= (!$ac_title || $ac_title  == 1)?'checked="checked"':'';
	
	// Slider tur / false
	echo '<p>Active Sidebar <small>Select Yes / No</small></p>';
	echo '<label><input type="radio" name="sidebar" '.$yeschecked.' value="1">Yes</label>&nbsp; &nbsp; &nbsp;';
	echo '<label><input type="radio" name="sidebar" '.$nochecked.' value="0">No</label>';

	echo '<p>Active Title <small>Select Yes / No</small></p>';
	echo '<label><input type="radio" name="ac_title" '.$yesactive.' value="1">Yes</label>&nbsp; &nbsp; &nbsp;';
	echo '<label><input type="radio" name="ac_title" '.$noactive.' value="0">No</label>';

	}
}




/**
 * Prints the box content.
 * 
 * @param WP_Post $post The object for the current post/page.
 */
 

function property_meta_box_callback( $post ){
		// Add a nonce field so we can check for it later.
	wp_nonce_field( 'product_meta_box', 'product_meta_box_nonce' );
	wp_nonce_field( basename( __FILE__ ), 'prfx_nonce' );
    $prfx_stored_meta = get_post_meta( $post->ID );
	/*
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */

	$bathroom 			= get_post_meta($post->ID, 'bathroom', true);
	$price 				= get_post_meta($post->ID, 'price', true);
	$map 				= get_post_meta($post->ID, 'map', true);
	$location 			= get_post_meta($post->ID, 'location', true);
	$address 			= get_post_meta($post->ID, 'address', true);
	$featured 			= get_post_meta($post->ID, 'featured', true);
	$brochure			= get_post_meta($post->ID, 'brochure', true);
	$floorplan 			= get_post_meta($post->ID, 'floorplan', true);
	$brochurebutton		= (!empty($brochure))?'Change Brochure':'Select Brochure';
	$floorplanbutton	= (!empty($floorplan))?'Change Floorplan':'Select Floorplan';
	$bathArray 			= array(1,2,3,4,5,6,7,8,9,10);

	

	echo '<label for="bathroom">Bathroom</label>';
	echo '<select style="width:100%;" name="bathroom" id="bathroom">';
	echo '<option value="">Select Bathroom</option>';
		foreach($bathArray as $bathr):
		$selec = ($bathr == $bathroom && $bathroom !=0 )?'selected':'';
		echo '<option '.$selec.' value="'.$bathr.'">'.$bathr.'</option>';
		endforeach;
	echo '</select>';
	
	echo '<label style="margin-top:10px; display:inline-block;" for="price">Price</label>'; //Price
	echo '<input style="width:100%;" type="number" value="'.$price.'" id="price" name="price"/>';

	echo '<label style="margin-top:10px; display:inline-block;" for="location">Location</label>'; //location
	echo '<input style="width:100%;" type="text" value="'.$location.'" id="location" name="location"/>';

	echo '<label style="margin-top:10px; display:inline-block;" for="address">Address</label>'; //address
	echo '<input style="width:100%;" type="text" value="'.$address.'" id="address" name="address"/>';

	echo '<label style="margin-top:10px; display:inline-block;" for="map">Map <small><i>latitude, longitude</i></small></label>';
	echo '<input style="width:100%;" type="text" value="'.$map.'" id="map" placeholder="000000,000000" name="map"/>';


	//Browser pdf
	echo '<label style="margin-top:10px; display:inline-block;" for="brochure_show">Brochure <small><i>Add Brochure PDF file</i></small></label><br/>';
	echo '<input style="min-width:70%; width:70%; margin-right:10px;" id="brochure" type="hidden" value="'.$brochure.'" name="brochure" />';
	echo '<input type="text" style="min-width:70%; width:70%; margin-right:10px;" name="brochure_show" id="brochure_show" value="'.wp_get_attachment_url( $brochure ).'"/>';
	echo '<input id="uploadBrochure" type="button" class="button button-primary" value="'.$brochurebutton.'" />';

	//Floor Plan
	echo '<label style="margin-top:10px; display:inline-block;" for="floorplan_show">Floorplan <small><i>Add Floorplan file</i></small></label><br/>';
	echo '<input style="min-width:70%; width:70%; margin-right:10px;" id="floorplan" type="hidden" value="'.$floorplan.'" name="floorplan" />';
	echo '<input type="text" style="min-width:70%; width:70%; margin-right:10px;" name="floorplan_show" id="floorplan_show" value="'.wp_get_attachment_url( $floorplan ).'"/>';
	echo '<input id="uploadFloorplan" type="button" class="button button-primary" value="'.$floorplanbutton.'" />';


	echo '<p style="margin-bottom:0;">Featured</p>'; ?>
	<label><input type="radio" <?= ($featured == 'yes')?'checked="checked"':''; ?> value="yes" name="featured"> Yes</label>
	<label style="margin-left:20px;"><input <?= ($featured != 'yes')?'checked="checked"':''; ?> type="radio" value="no" name="featured"> No</label>

	<script type="text/javascript">
		jQuery(document).ready(function($){
		$('#uploadBrochure').click(function(e) {
			var mediaUploader;
			e.preventDefault();
			// If the uploader object has already been created, reopen the dialog
			  if (mediaUploader) {
			  mediaUploader.open();
			  return;
			}
			// Extend the wp.media object
			mediaUploader = wp.media.frames.file_frame = wp.media({
			  title: 'Choose Brochure PDF',
			  button: {
			  text: 'Choose Brochure PDF'
			}, multiple: false });
		 
			// When a file is selected, grab the URL and set it as the text field's value
			mediaUploader.on('select', function() {
			  attachmentdrawing = mediaUploader.state().get('selection').first().toJSON();
			  $('#brochure').val(attachmentdrawing.id);
			  $('#brochure_show').val(attachmentdrawing.url);
			});
			// Open the uploader dialog
			mediaUploader.open();
		  });

		/* Floorplan */
		$('#uploadFloorplan').click(function(e) {
			var mediaUploader;
			e.preventDefault();
			// If the uploader object has already been created, reopen the dialog
			  if (mediaUploader) {
			  mediaUploader.open();
			  return;
			}
			// Extend the wp.media object
			mediaUploader = wp.media.frames.file_frame = wp.media({
			  title: 'Choose Floorplan PDF',
			  button: {
			  text: 'Choose Floorplan PDF'
			}, multiple: false });
		 
			// When a file is selected, grab the URL and set it as the text field's value
			mediaUploader.on('select', function() {
			  attachmentdrawing = mediaUploader.state().get('selection').first().toJSON();
			  $('#floorplan').val(attachmentdrawing.id);
			  $('#floorplan_show').val(attachmentdrawing.url);
			});
			// Open the uploader dialog
			mediaUploader.open();
		  });
	  
		}); // End Document Ready 
	</script>
	<?php

}


function testimonial_meta_box_callback($post){
	// Add a nonce field so we can check for it later.
	wp_nonce_field( 'product_meta_box', 'product_meta_box_nonce' );
	wp_nonce_field( basename( __FILE__ ), 'prfx_nonce' );
    $prfx_stored_meta = get_post_meta( $post->ID );
	/*
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$designation = get_post_meta($post->ID, 'designation', true);

	echo '<label for="designation">Designation</label>'; //Price
	echo '<input style="width:100%;" type="text" value="'.$designation.'" id="designation" name="designation"/>';

}
 
function slider_meta_box_callback( $post ) {
	// Add a nonce field so we can check for it later.
	wp_nonce_field( 'product_meta_box', 'product_meta_box_nonce' );
	wp_nonce_field( basename( __FILE__ ), 'prfx_nonce' );
    $prfx_stored_meta = get_post_meta( $post->ID );
	/*
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$slider_id 	= get_post_meta( $post->ID, 'slider_id', true );
	$buttonText = (!empty($slider_id))?'Edit Slider Image':'Uplode Slider Image';
	$alt 		= get_post_meta( $slider_id, '_wp_attachment_image_alt', true );
	$prev 		= (!empty($slider_id))?'<img style="max-width:100%; min-width:100%;" src="'.wp_get_attachment_url( $slider_id ).'" alt="'.$alt.'"/>':'';

	//Slider Image 
	echo '<input style="min-width:70%; margin-right:10px;" id="slider_id" type="hidden" value="'.$slider_id.'" name="slider_id" />';
	echo '<div id="img_prev">'. $prev .'</div>';
	echo '<input id="uploadSliderImageButton" type="button" class="button button-primary" value="'.$buttonText.'" />';	
	
	?>
	<script type="text/javascript">
		jQuery(document).ready(function($){
		$('#uploadSliderImageButton').click(function(e) {
			var mediaUploader;
			e.preventDefault();
			// If the uploader object has already been created, reopen the dialog
			  if (mediaUploader) {
			  mediaUploader.open();
			  return;
			}
			// Extend the wp.media object
			mediaUploader = wp.media.frames.file_frame = wp.media({
			  title: 'Choose Slider Image',
			  button: {
			  text: 'Choose Slider Image'
			}, multiple: false });
		 
			// When a file is selected, grab the URL and set it as the text field's value
			mediaUploader.on('select', function() {
			  attachmentdrawing = mediaUploader.state().get('selection').first().toJSON();
			  $('#slider_id').val(attachmentdrawing.id);
			  $('#img_prev').html('<img style="max-width:100%; min-width:100%;" src="'+attachmentdrawing.url+'" alt="Slider Image"/>');
			});
			// Open the uploader dialog
			mediaUploader.open();
		  });
	  
		}); // End Document Ready 
	</script>
	<style type="text/css">
		#titlediv div.inside,
		div#normal-sortables{
			display: none;
		}

	</style>
	<?php
}





/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function slider_save_meta_box_data( $post_id ) {

	/*
	 * We need to verify this came from our screen and with proper authorization,
	 * because the save_post action can be triggered at other times.
	 */

	// Check if our nonce is set.
	if ( ! isset( $_POST['product_meta_box_nonce'] ) ) {
		return;
	}

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['product_meta_box_nonce'], 'product_meta_box' ) ) {
		return;
	}

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// Check the user's permissions.
	if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}

	} else {

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}

	/* OK, it's safe for us to save the data now. */
	
	// Make sure that it is set.
	/*if ( ! isset( $_POST['product_model'] ) ) {
		return;
	}*/


	// Sanitize user input.
	$my_data_slider 	= sanitize_text_field( $_POST['slider_id'] ); // Slider id
	$my_data_bathroom 	= sanitize_text_field( $_POST['bathroom'] ); // Bathroom Qty
	$my_data_price 		= sanitize_text_field( $_POST['price'] ); // Price
	$my_data_map 		= sanitize_text_field( $_POST['map'] ); // Map
	$my_data_address 	= sanitize_text_field( $_POST['address'] ); // Address
	$my_data_featured 	= sanitize_text_field( $_POST['featured'] ); // featured
	$my_data_deson 		= sanitize_text_field( $_POST['designation'] ); // designation
	$my_data_brochure 	= sanitize_text_field( $_POST['brochure'] ); // brochure
	$my_data_floorplan 	= sanitize_text_field( $_POST['floorplan'] ); // floorplan
	$my_data_location 	= sanitize_text_field( $_POST['location'] ); //location
	$my_data_sidebar 	= sanitize_text_field( $_POST['sidebar'] ); //page sidebar
	$my_data_ac_title 	= sanitize_text_field( $_POST['ac_title'] ); //page Title Show / hide
	$my_data_his_year 	= sanitize_text_field(date('Y-m-d H:i:s', strtotime($_POST['his_year'] ))); //his_year
	
	
	

	// Update the meta field in the database.
	update_post_meta( $post_id, 'slider_id', $my_data_slider ); //Slider id save
	update_post_meta( $post_id, 'bathroom', $my_data_bathroom ); //bathroom qty save
	update_post_meta( $post_id, 'price', $my_data_price ); //price save
	update_post_meta( $post_id, 'map', $my_data_map ); //map save
	update_post_meta( $post_id, 'address', $my_data_address ); //Address save
	update_post_meta( $post_id, 'featured', $my_data_featured ); //featured
	update_post_meta( $post_id, 'designation', $my_data_deson); // Designation 
	update_post_meta( $post_id, 'brochure', $my_data_brochure); // brochure 
	update_post_meta( $post_id, 'floorplan', $my_data_floorplan); // floorplan 
	update_post_meta( $post_id, 'location', $my_data_location); // location 
	update_post_meta( $post_id, 'sidebar', $my_data_sidebar); // sidebar
	update_post_meta( $post_id, 'ac_title', $my_data_ac_title); // Page title Show / No
	update_post_meta( $post_id, 'his_year', $my_data_his_year); // his_year
	
}
add_action( 'save_post', 'slider_save_meta_box_data' );


?>
