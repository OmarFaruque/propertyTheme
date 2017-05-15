<?php 
/*
* Property supplier functions 
*/

require_once('larasoft_framework/admin-function.php'); 
require_once('inc_function/post-types.php'); 
require_once('inc_function/post-metas.php'); 
require_once('inc_function/category-extra-field/category-extra-field.php');
require_once('inc_function/gallery-metabox/galleryMeta.php');
require_once('inc_function/ajax.php');


function property_script(){
	// All Style
	wp_enqueue_style( 'property_theme', get_stylesheet_uri() ); // Main Stylesheet
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css' ); // Bootstrap Stylesheet
	wp_enqueue_style( 'fontAwesome', get_template_directory_uri() . '/css/font-awesome.min.css' ); // Bootstrap Stylesheet
	wp_enqueue_style( 'owl-crousal', get_template_directory_uri() . '/ins_asset/OwlCarousel/assets/owl.carousel.min.css' ); // owlcrousal Stylesheet
	wp_enqueue_style( 'owl-theme', get_template_directory_uri() . '/ins_asset/OwlCarousel/assets/owl.theme.default.min.css' ); // owlcrousal Stylesheet
	wp_enqueue_style( 'custom', get_template_directory_uri() . '/css/custom.css' ); // Bootstrap Stylesheet
	wp_enqueue_style( 'responsive', get_template_directory_uri() . '/css/responsive.css');
	
	//javaScript 
	wp_enqueue_script( 'jQuery'); // Jquery
	wp_enqueue_script( 'bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '1.0.1', true); // 
	wp_enqueue_script( 'lazy', get_template_directory_uri() . '/js/jquery.lazy.min.js', array(), '1.0.2', true); // Bootstrap 
	wp_enqueue_script( 'owl-crousal', get_template_directory_uri() . '/ins_asset/OwlCarousel/owl.carousel.min.js', array(), '1.0.3', true);
	wp_enqueue_script( 'ajax-script', get_template_directory_uri() . '/js/ajax.js', array(), '1.0.4', true);
	wp_enqueue_script('jquery-ui-accordion');
	wp_enqueue_script('jquery-ui-tabs');
	wp_enqueue_script( 'custom-script', get_template_directory_uri() . '/js/custom.js', array(), '1.0.13', true); // customjs
	wp_localize_script( 'ajax-script', 'the_ajax_script', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
}
add_action( 'wp_enqueue_scripts', 'property_script' );

//Top Menu
register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'Property Supplier' ),
    'footer' => __( 'Footer Menu', 'Property Supplier' )
) );

/* Thumbnail Support */
add_theme_support( 'post-thumbnails', array( 'post', 'property', 'testimonial', 'news', 'team', 'history', 'award' ) ); // Posts and Movies


/*******************************
C U S T O M   F U N C T I O N   L A R A S O F T
*************************************/
function get_all_meta($metaname){
	global $wpdb;
	$prefix = $wpdb->prefix;
	$locations = $wpdb->get_results("SELECT meta_value FROM `".$prefix."postmeta` WHERE meta_key='".$metaname."' GROUP BY meta_value");
	return $locations;
}


/*Admin Custom Login Logo */
function property_login_logo() { 
	$ch_data = new ch_option;
	$filename = wp_get_attachment_url($ch_data->ch_get_opt('custom_login_logo_id'));
	$size = getimagesize($filename);
	?>
    <style type="text/css">
        #login h1 a, .login h1 a {
        background-image: url(<?= ( $ch_data->ch_get_opt('custom_login_logo_id'))?wp_get_attachment_url($ch_data->ch_get_opt('custom_login_logo_id')):''; ?>);
		height:<?= ($size[1])?$size[1]:'0'; ?>px;
		width:100%;
		background-size: 100% <?= ($size[1])?$size[1]:'0'; ?>px;
		background-repeat: no-repeat;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'property_login_logo' );


function property_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'property_login_logo_url' );

function property_login_logo_url_title() {
    return get_bloginfo();
}
add_filter( 'login_headertitle', 'property_login_logo_url_title' );


/* C O L O R  C O N V E R T  T O  R G B A  */

 
/* Convert hexdec color string to rgb(a) string */
 
function hex2rgba($color, $opacity = false) {
 
	$default = 'rgb(0,0,0)';
 
	//Return default if no color provided
	if(empty($color))
          return $default; 
 
	//Sanitize $color if "#" is provided 
        if ($color[0] == '#' ) {
        	$color = substr( $color, 1 );
        }
 
        //Check if color has 6 or 3 characters and get values
        if (strlen($color) == 6) {
                $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        } elseif ( strlen( $color ) == 3 ) {
                $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
        } else {
                return $default;
        }
 
        //Convert hexadec to rgb
        $rgb =  array_map('hexdec', $hex);
 
        //Check if opacity is set(rgba or rgb)
        if($opacity){
        	if(abs($opacity) > 1)
        		$opacity = 1.0;
        	$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
        } else {
        	$output = 'rgb('.implode(",",$rgb).')';
        }
 
        //Return rgb(a) color string
        return $output;
}



if(!function_exists('property_hook_header')){
	function property_hook_header(){
	$ch_data = new ch_option;
	?>
		<!-- Required meta tags always come first-->
	 	<meta charset="<?php bloginfo( 'charset' ); ?>" />				
		<meta name="viewport" content="width=device-width" />

		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php						
		/*						
		* Print the <title> tag based on what is being viewed.						
		*/				
	
		global $page, $paged;
		wp_title( '|', true, 'right' );				 					
		// Add the blog name.
		bloginfo( 'name' );				 						
		// Add the blog description for the home/front page.						
		$site_description = get_bloginfo( 'description' );						
		if ( $site_description && ( is_home() || is_front_page() ) )							
			echo " | $site_description";				 						
		// Add a page number if necessary:	
		
		if ( $paged >= 2 || $page >= 2 )							
			echo ' | ' . sprintf( __( 'Page %s', 'shape' ), max( $paged, $page ) ); 				
		?></title>	
		<?php $favicon = ($ch_data->ch_get_opt('favicon_id'))? wp_get_attachment_url( $ch_data->ch_get_opt('favicon_id') ) : bloginfo('template_directory') . '/css/img/favicon.png'; ?>
		<link rel="shortcut icon" href="<?= $favicon; ?>" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <?php
	}
	add_action('wp_head','property_hook_header');
}


/* Register Sidebar */
register_sidebar( 
	array(
	'name'          => __('Page Sidebar'),
    'id'            => 'page_sidebar',          
	'description'   => 'Page Sidebar for default page.',
	'class'         => 'page_sidebar',
	'before_widget' => '<div id="%1$s" class="widget page_sidebar %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h4 class="colr-blue WidgetTitle">',
	'after_title'   => '</h4>'
	)
);


?>

