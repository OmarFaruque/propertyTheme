<?php
/*
* Admin Theme Function
*/
ob_start();
require_once('save_option.php');
require_once('css/dynamic.php');
$path = (is_child_theme())?get_stylesheet_directory_uri():get_template_directory_uri();

/*
* data get function 
*/
function ch_get_option($rdata){
	$ch_data = new ch_option;
	return $ch_data->ch_get_opt($rdata);
} 




/*
* Add menu item in admin 
*/
function addThemeMenuItem() {
	//add_menu_page("Theme Panel", "Theme Panel", "manage_options", "theme-panel", "theme_settings_page", null, 99);
	add_submenu_page('themes.php', "Theme Option", "Theme Option", "manage_options", "theme-panel", "themeSettingsPage", null, 99);
}



/*
* Add Script Logo Uplode
*/
function wpGearManagerAdminScripts() {
	global $path;
	// function for upload script
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_enqueue_script('jquery');
	// wp_enqueue_script( 'my-script-handle', plugins_url('my-script.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
	if (isset($_GET['page'])) {
		if ($_GET['page'] == 'theme-panel' || $_GET['page'] == 'theme-panel-settings') {
			wp_enqueue_script('codeHouseThemeOptionsjs', $path . '/larasoft_framework/js/code_house_adminPanel.js', array('wp-color-picker'), false, true);
			wp_enqueue_media();
		}
	}
}




/*
* Add custom Style for admin 
*/
function wpGearManagerAdminStyles() {
	global $path;
	//  function for upload style
	wp_enqueue_style('thickbox');
	wp_enqueue_style('parent-customThemeStyle', $path . '/larasoft_framework/css/admin-function.css');
	wp_enqueue_style('wp-color-picker');
}
add_action('admin_print_scripts', 'wpGearManagerAdminScripts');
add_action('admin_print_styles', 'wpGearManagerAdminStyles');
add_action("admin_menu", "addThemeMenuItem");






/*
* Main Theme Settings Page 
*/
function themeSettingsPage() {
	$ch_data = new ch_option;
	if(isset($_POST['submit'])){
		$ch_data->data_save($_POST);
	}
?>
<div class="wrap">
	<form method="post" action="">
		<?php
		global $path;
		settings_fields("section");
		do_settings_sections("theme-options");
		$itemArray = array(
		'general' => array(
			'general info' => array(
				array(
					'title' => 'logo',
					'note' => 'Add a Custom Logo from your Media Library',
					'type' => 'upload'
				),
				array(
					'title' => 'Favicon',
					'note' => 'Add a 16px x 16px Png/Gif image that will represent your website\'s favicon.',
					'type' => 'upload'
				),
				array(
					'title' => 'Custom Login Logo',
					'note' => 'Add a custom logo for the Wordpress login screen.',
					'type' => 'upload'
				),
				array(
					'title' => 'Email',
					'note' => 'Add a site email for user.',
					'type' => 'email'
				),
				array(
					'title' => 'Tel',
					'note' => 'Add a site telephone & mobile.',
					'type' => 'text'
				),
				array(
					'title' => 'Contact Us (Footer)',
					'note' => 'Add a site Contact Us for Footer (use "&lt;br/&gt;" for line break)',
					'type' => 'text'
				),
				array(
					'title' => 'Address',
					'note' 	=> 'Add a site Address.',
					'type' 	=> 'textarea'
				),
				array(
					'title'	=> 	'Opening Hours', 
					'note'	=> 	'Opening hours (use "&lt;br/&gt;" for line break)',
					'type'	=>	'text'
				),
				array(
					'title'	=> 	'Home Featured Title',
					'note'	=>	'Add home featured section title',
					'type'	=> 	'text'
				),
				array(
					'title'	=>	'Footer Background',
					'note'	=> 	'Add footer background image',
					'type'	=> 	'upload'
				)
			),
			'footer' => array(
				array(
					'title' => 'Back to Top',
					'note' => 'Display the back to top button.',
					'type' => 'checkbox',
					'checkbox_value' => array('yes', 'no')
				),
				array(
					'title' => 'Footer (Copyright)',
					'note' => 'Write your Copyright infos.',
					'type' => 'text'
				),
				array(
					'title' => 'Tracking Code',
					'note' => 'Paste your Google analytics (or other) ID here.',
					'type' => 'text'
				)
			)
		),
		'styling' => array(
			'layout' => array(
				array(
					'title' => 'Layout Color Style',
					'note' => 'Choose your Layout Style.',
					'type' => 'dropdown',
					'dropdown_value' => array('light', 'dark')
				),
				array(
					'title' => 'Main Color',
					'note' => 'Please make sure that you use a correct color code.',
					'type' => 'color_picker'
				),
				array(
					'title'	=> 	'Menu Background',
					'note'	=>	'Top Menu Background',
					'type'	=> 	'color_picker'
				),
				array(
					'title'	=> 	'Menu Hover Background',
					'note'	=>	'Top Menu Hover Background',
					'type'	=> 	'color_picker'
				),
				array(
					'title'	=> 	'Default Heading Color',
					'note'	=>	'All Heading Default Color',
					'type'	=> 	'color_picker'
				),
				array(
					'title'	=> 	'Button Color',
					'note'	=>	'All Button Default Color',
					'type'	=> 	'color_picker'
				),
				array(
					'title'	=> 	'Link Text Color',
					'note'	=>	'Link Text Color',
					'type'	=> 	'color_picker'
				),
				array(
					'title'	=> 	'Link Hover Background',
					'note'	=>	'Item Hover Background Color',
					'type'	=> 	'color_picker'
				),
				array(
					'title'	=> 	'Hover Text Color',
					'note'	=>	'Item Hover Text Color',
					'type'	=> 	'color_picker'
				),
				array(
					'title' => 'Text Color for Colored Background',
					'note' 	=> 'Choose your color style for all content/objects that have your main color as background. ',
					'type' 	=> 'color_picker'
				),
				array(
					'title' => 'Footer Background Color',
					'note' 	=> 'Choose your footer background color.',
					'type' 	=> 'color_picker'	
				),
				array(
					'title'	=>	'Footer Background Taxture',
					'note'	=> 	'Choose Footer Background Taxture.',
					'type'	=> 	'upload'
				),
				array(
					'title' => 'Direction for Animation',
					'note' => 'Choose the direction for the animation.',
					'type' => 'radio',
					'nature' => 'animation',
					'radio_value' => array('left', 'right')
				)
			),
			'template layout' => array(
				array(
					'title' => 'Page Layout',
					'note' => 'Choose your page template style',
					'type' => 'radio',
					'nature' => 'layout_style',
					'radio_value' => array('left', 'right', 'no'),
					'extra_input' => 'widget-list'
				),
				array(
					'title' => 'Portfolio Layout',
					'note' => 'Choose your Portfolio Page style',
					'type' => 'radio',
					'nature' => 'layout_style',
					'radio_value' => array('left', 'right', 'no'),
					'extra_input' => 'widget-list'
				),
				array(
					'title' => 'Fixed Footer Position',
					'note' => 'Display the back to top button.',
					'type' => 'checkbox',
					'checkbox_value' => array('yes', 'no')
				)
			)
		),
		'Typography' => array(
			'Body' => array(
					array(
					'title'	=> 'Body Font',
					'note'	=> 	'select body font family',
					'type'	=> 	'dropdown',
					'dropdown_value' => array('default', 'Montserrat', 'Raleway', 'Roboto Condensed', 'Yrsa', 'Open Sans Condensed', 'Ubuntu', 'Titillium Web', 'PT Sans Narrow', 'Cabin', 'Poiret One', 'Josefin Sans', 'Catamaran', 'Quicksand', 'Libre Franklin', 'Kavoon', 'Concert One', 'EB Garamond', 'Chewy', 'Comfortaa', 'Copse', 'Cormorant', 'ABeeZee', 'Gudea', 'Mukta Vaani', 'Cantarell', 'Economica', 'Droid Sans Mono', 'Reem Kufi', 'Yanone Kaffeesatz', 'Play'
						)
					),
					array(
					'title'	=> 	'Body Font Size',
					'note'	=> 	'Chooce the body font size',
					'type'	=> 	'dropdown',
					'dropdown_value'=> array('10px', '12px', '14px', '16px', '18px', '20px', '22px', '24px', '26px', '28px', '30px')
					), 

					array(
					'title'	=> 	'Body Font Line-Height',
					'note'	=> 	'Chooce the body font line height',
					'type'	=>	'dropdown',
					'dropdown_value'=> array('10px', '12px', '14px', '16px', '18px', '20px', '22px', '24px', '26px', '28px', '30px')
					)
				),
			'Headings' => array(
					array(
					'title'	=> 'Heading Font',
					'note'	=> 	'select heading font family',
					'type'	=> 	'dropdown',
					'dropdown_value' => array('default', 'Montserrat', 'Raleway', 'Roboto Condensed', 'Yrsa', 'Open Sans Condensed', 'Ubuntu', 'Titillium Web', 'PT Sans Narrow', 'Cabin', 'Poiret One', 'Josefin Sans', 'Catamaran', 'Quicksand', 'Libre Franklin', 'Kavoon', 'Concert One', 'EB Garamond', 'Chewy', 'Comfortaa', 'Copse', 'Cormorant', 'ABeeZee', 'Gudea', 'Mukta Vaani', 'Cantarell', 'Economica', 'Droid Sans Mono', 'Reem Kufi', 'Yanone Kaffeesatz', 'Play'
						)
					),
					array(
					'title'	=> 	'Heading Font Weight',
					'note'	=> 	'Chooce heading font weight',
					'type'	=>	'dropdown',
					'dropdown_value'=> array('default', 'normal', 'bold')
					)
				),
			'Navigation' => array(
					array(
					'title'	=> 'Navigation Font',
					'note'	=> 	'select navigation font family',
					'type'	=> 	'dropdown',
					'dropdown_value' => array('default', 'Montserrat', 'Raleway', 'Roboto Condensed', 'Yrsa', 'Open Sans Condensed', 'Ubuntu', 'Titillium Web', 'PT Sans Narrow', 'Cabin', 'Poiret One', 'Josefin Sans', 'Catamaran', 'Quicksand', 'Libre Franklin', 'Kavoon', 'Concert One', 'EB Garamond', 'Chewy', 'Comfortaa', 'Copse', 'Cormorant', 'ABeeZee', 'Gudea', 'Mukta Vaani', 'Cantarell', 'Economica', 'Droid Sans Mono', 'Reem Kufi', 'Yanone Kaffeesatz', 'Play'
						)
					),
					array(
					'title'	=> 	'Navigation Font Size',
					'note'	=> 	'Chooce the body font size',
					'type'	=> 	'dropdown',
					'dropdown_value'=> array('10px', '12px', '14px', '16px', '18px', '20px', '22px', '24px', '26px', '28px', '30px')
					), 

					array(
					'title'	=> 	'Navigation Font Weight',
					'note'	=> 	'Chooce navigation font weight',
					'type'	=>	'dropdown',
					'dropdown_value'=> array('default', 'normal', 'bold')
					)
				)
		),
		'Social' => array(
			'Social Icons' => array(
				array(
					'title' => 'Social(1)',
					'note' => 'Use FontAwasome Icon class & set url.',
					'type'	=> 	'list',
					'item'	=>	array('title', 'url', 'image')
				),
				array(
					'title' => 'Social(2)',
					'note' => 'Use FontAwasome Icon class & set url.',
					'type'	=> 	'list',
					'item'	=>	array('title', 'url', 'image')
				),
				array(
					'title' => 'Social(3)',
					'note' => 'Use FontAwasome Icon class & set url.',
					'type'	=> 	'list',
					'item'	=>	array('title', 'url', 'image')
				),
				array(
					'title' => 'Language Selection',
					'note' => 'Top Language Selection.',
					'type' => 'checkbox',
					'checkbox_value' => array('yes', 'no')
				)

			)
		),
		'Slider' => array(
			'Slider Settings' => array(
				array(
					'title' => 'Home Slider Title',
					'note' 	=> 'Home Slider Settings',
					'type' 	=> 'text'
				),
				array(
					'title' => 'Home Slider Sub Title',
					'note' 	=> 'Home Slider Settings',
					'type' 	=> 'text'
				),
			)
		),
		'Welcome' => array(
			'Welcome Section Settings' => array(
				array(
					'title' => 'Welcome Message',
					'note' 	=> 'Home Welcome Message (Left)',
					'type' 	=> 'visual_editor'
				),
				array(
					'title' => 'Video Background',
					'note' 	=> 'Youtube Video Background',
					'type' 	=> 'upload'
				),
				array(
					'title' => 'Video Button Text',
					'note' 	=> 'Video Button Text',
					'type' 	=> 'text'
				),
				array(
					'title' => 'Welcome Video',
					'note' 	=> 'Youtube / Others video link',
					'type' 	=> 'text'
				)
			)
		),
		'Home Register Section' => array(
			'Home Register Section Settings' => array(
				array(
					'title' => 'Register Title (1)',
					'note' 	=> 'Register Title',
					'type' 	=> 'text'
				),
				array(
					'title' => 'Register Title (2)',
					'note' 	=> 'Register Collus Information',
					'type' 	=> 'text'
				),
				array(
					'title' => 'Register Info',
					'note' 	=> 'REgister Information for User',
					'type' 	=> 'text'
				),
				array(
					'title' => 'Register Link',
					'note' 	=> 'Registration Link',
					'type' 	=> 'text'
				),
				array(
					'title' => 'Register Background',
					'note' 	=> 'Register Section Background',
					'type' 	=> 'upload'
				)
			)
		),
		'Testimonial and News' => array(
			'Client’s Testimonials' => array(
				array(
					'title'	=> 	'Testimonial Title',
					'note' 	=> 	'Home page client testimonial title',
					'type'	=> 	'text'
				),
				array(
					'title'	=> 	'Testimonial Background',
					'note' 	=> 	'Home page client testimonial background',
					'type'	=> 	'upload'
				),
				array(
					'title'	=> 	'News Title',
					'note' 	=> 	'Home News Section title',
					'type'	=> 	'text'
				)

			)
		),
		'Single Property' => array(
			'Single Property Settings' => array(
				array(
					'title' => 'Why Invest',
					'note' 	=> 'Why Invest In Affinity Living?',
					'type' 	=> 'visual_editor'
				),
				array(
					'title' => 'Invest Background Color',
					'note' 	=> 'Why Invest Background Color',
					'type' 	=> 'color_picker'
				)
			)
		),
		'Why Residential' 	=> array(
			'Our Latest Residential Properties' => array(
				array(
					'title'	=> 'Why Residential Image',
					'note' 	=> 'Set Why Residential Image',
					'type' 	=> 'upload'
				),
				array(
					'title'	=> 'Why Residential Content',
					'note' 	=> 'Set Why Residential Content',
					'type' 	=> 'visual_editor'
				),
				array(
					'title'	=> 'Residential Background',
					'note' 	=> 'Set Why Residential Background Color',
					'type' 	=> 'color_picker'
				)
			)

		),
		'Custom' => array(
			'Custom CSS'=> array(
				array(
					'title'	=>	'Custom CSS Code',
					'note'	=> 	'Custom CSS',
					'type'	=> 	'textarea'
				)
			)
		)
		//'styling', 'blog', 'portfolio', 'layout', 'colors', 'fonts', 'social'
		);
		?>
		<?php
		/*
		echo '<pre>';
			print_r($itemArray);
		echo '</pre>';*/
		;?>
		<div class="themeOption">
			<div class="leftManu">
				<div class="topbar logotop">
					<div class="icon">
						<img src="<?= $path; ?>/larasoft_framework/img/1462632628_Settings.png" alt="setting icon"/>
					</div>
					<div class="Logotitle">
						<h3><span style="color:red;">Theme</span><span>Options</span></h3>
						<span class="themeoption_powerBy">Powered by <a target="_blank" href="http://www.larasoftbd.com">LaraSoft</a></span>
					</div>
				</div>
				<div class="ThOleftMenuItem">
					<ul>
						<?php foreach ($itemArray as $key => $tab): ?>
						<li><a href="#<?= str_replace(' ', '_', $key );?>"><?=ucfirst($key);?></a></li>
						<?php endforeach;?>
					</ul>
				</div>
			</div>
			<div class="themeOptionBody">
				<div class="topbar bodytop">
					<h3><span class="topTitle">General</span></h3>
					<?php submit_button();?>
				</div>
				<?php foreach ($itemArray as $key => $mainBody): ?>
				<div class="ThOMainBody" id="<?= str_replace(' ', '_', $key);?>">
					<?php foreach ($mainBody as $mainKey => $singBody): ?>
					<div class="section">
						<div class="sectionhead">
							<h3><?=$mainKey;?></h3>
						</div>
						<div class="sectionbody">
							<?php for ($i = 0; $i < count($singBody); $i += 1): ?>
							<div class="sectionPart">
								<div class="part_left">
								<label for="id-<?=$ch_data->ch_stringReplace($singBody[$i]['title']);?>"><h4><?=$singBody[$i]['title'];?></h4></label>	
								</div>
								
								<?php
								switch ($singBody[$i]['type']):
								case 'upload':
								?>
								<div class="partRight">
									<input type="hidden" value="<?= $ch_data->ch_get_opt($singBody[$i]['title'] . '_id'); ?>" name="<?=$ch_data->ch_stringReplace($singBody[$i]['title']) . '_id';?>"/>
									<input type="text" value="<?= wp_get_attachment_url($ch_data->ch_get_opt($singBody[$i]['title'] . '_id')); ?>" name="<?=$ch_data->ch_stringReplace($singBody[$i]['title']);?>" id="id-<?=$ch_data->ch_stringReplace($singBody[$i]['title']);?>"/>
									<button class="button button-submit add-image">Add Image</button>
								</div>
								<?php
								break;
								case 'checkbox':
								?>
								<div class="partRight">
									<input type="checkbox" style="display: none;" value="<?= $ch_data->ch_get_opt($singBody[$i]['title']); ?>" <?= ($ch_data->ch_get_opt($singBody[$i]['title']) == 'yes')?'checked':''; ?> name="<?=$ch_data->ch_stringReplace($singBody[$i]['title']);?>" id="id-<?=$ch_data->ch_stringReplace($singBody[$i]['title']);?>"/>
									<a href="#"  class="checkbox-status <?= ($ch_data->ch_get_opt($singBody[$i]['title']) == 'yes')?'active':''; ?>">Checkbox</a>
								</div>
								
								<?php
								break;
								case 'text':
								?>
								<div class="partRight">
									<input type="text" style="width:99%;" value="<?= ($ch_data->ch_get_opt($singBody[$i]['title']) )?str_replace("\'", "'", $ch_data->ch_get_opt($singBody[$i]['title'])):''; ?>" name="<?=$ch_data->ch_stringReplace($singBody[$i]['title']);?>" id="id-<?=$ch_data->ch_stringReplace($singBody[$i]['title']);?>"/>
								</div>
								<?php
								break;

								case 'visual_editor':
								define('OPTION_ID', 'my-editor');
								$meta_box_id = OPTION_ID;
						        $editor_id 	 = $ch_data->ch_stringReplace($singBody[$i]['title']);
						        $exvalue 	 = $ch_data->ch_get_opt($singBody[$i]['title']);
						        $label   	 = 'label[for="id-'.$editor_id.'"]';
						        $iframe_id 	 = $editor_id . '_ifr';
						

						        //Add CSS & jQuery goodness to make this work like the original WYSIWYG
						        echo "
						                <style type='text/css'>
						                        #$meta_box_id #edButtonHTML, #$meta_box_id #edButtonPreview {background-color: #F1F1F1; border-color: #DFDFDF #DFDFDF #CCC; color: #999;}
						                        #$editor_id{width:100%; height:150px;}
						                        #$meta_box_id #editorcontainer{background:#fff !important;}
						                        #$meta_box_id #$editor_id_fullscreen{display:none;}
						                		iframe#$iframe_id{min-height:200px;}
						                </style>           
						                <script type='text/javascript'>
						                        jQuery(function($){
						                        	    $('$label').parent('.part_left').css({'width':'100%', 'margin-bottom':'10px' });
						                                $('#$meta_box_id #editor-toolbar > a').click(function(){
						                                        $('#$meta_box_id #editor-toolbar > a').removeClass('active');
						                                        $(this).addClass('active');
						                                });                               
						                                if($('#$meta_box_id #edButtonPreview').hasClass('active')){
						                                        $('#$meta_box_id #ed_toolbar').hide();
						                                }
						                                
						                                $('#$meta_box_id #edButtonPreview').click(function(){
						                                        $('#$meta_box_id #ed_toolbar').hide();
						                                });
						                                
						                                $('#$meta_box_id #edButtonHTML').click(function(){
						                                        $('#$meta_box_id #ed_toolbar').show();
						                                });

										//Tell the uploader to insert content into the correct features editor
										$('#media-buttons a').bind('click', function(){
											var customEditor = $(this).parents('#$meta_box_id');
											if(customEditor.length > 0){
												edCanvas = document.getElementById('$editor_id');
											}
											else{
												edCanvas = document.getElementById('$editor_id');
											}
										});

						                });
						                </script>
						        ";
						          the_editor(str_replace('\"', '"', $exvalue), $editor_id);
						                  //Clear The Room!
        						  echo "<div style='clear:both; display:block;'></div>";
								break;
								
								case 'email':
								?>
								<div class="partRight">
									<input type="email" style="width:99%;" value="<?= $ch_data->ch_get_opt($singBody[$i]['title']); ?>" name="<?=$ch_data->ch_stringReplace($singBody[$i]['title']);?>" id="id-<?=$ch_data->ch_stringReplace($singBody[$i]['title']);?>"/>
								</div>
								<?php
								break;

								case 'textarea':
								?>
								<div class="partRight">
									<textarea name="<?=$ch_data->ch_stringReplace($singBody[$i]['title']);?>" id="id-<?=$ch_data->ch_stringReplace($singBody[$i]['title']);?>"><?= $ch_data->ch_get_opt($singBody[$i]['title']); ?></textarea>
								</div>
								<?php
								break;
								
								case 'dropdown':
								?>
								<div class="partRight">
										
									<select name="<?=$ch_data->ch_stringReplace($singBody[$i]['title']);?>" id="id-<?=$ch_data->ch_stringReplace($singBody[$i]['title']);?>">
										<option value="">Select <?=$singBody[$i]['title'];?> </option>
										<?php foreach ($singBody[$i]['dropdown_value'] as $singleDropdown): ?>
										<option <?= ($ch_data->ch_get_opt($singBody[$i]['title']) == strtolower($singleDropdown) ?'selected':''); ?> value="<?=strtolower($singleDropdown);?>"><?=ucfirst($singleDropdown);?></option>
										<?php endforeach;?>
									</select>
								</div>
								<?php
								break;
								case 'color_picker':
								?>
								<div class="partRight">
									<input type="text" class="codeHouseColorPicker" value="<?= $ch_data->ch_get_opt($singBody[$i]['title']); ?>" name="<?=$ch_data->ch_stringReplace($singBody[$i]['title']);?>" id="id-<?=$ch_data->ch_stringReplace($singBody[$i]['title']);?>">
								</div>
								<?php
								break;
								case 'radio':
								?>
								<div class="partRight animationDiv">
									<?php foreach ($singBody[$i]['radio_value'] as $radioVal): ?>
									<input style="display:none;" <?= ($ch_data->ch_get_opt($singBody[$i]['title']) == $radioVal)?'checked="checked"':'';  ?> name="<?=$ch_data->ch_stringReplace($singBody[$i]['title']);?>" type="radio" class="" value="<?=$radioVal;?>">
									<a href="javascript:void(0)" class="radio-status <?= ($ch_data->ch_get_opt($singBody[$i]['title']) == $radioVal)?'active':'';  ?> <?php if ($singBody[$i]['nature'] == 'layout_style') {echo 'sidebar';} elseif ($singBody[$i]['nature'] == 'animation') {echo 'animation';}?> <?=$radioVal;?>" title="<?=$radioVal;?>"><?=$radioVal;?></a>
									<?php endforeach;?>
								</div>
								<?php
								break;
								case 'list':
								?>
									<div class=""></div>
									<div class="partRight listStyle">
										<?php 
											foreach($singBody[$i]['item'] as $s_item):
												//echo 'item: ' .$ch_data->ch_stringReplace($singBody[$i]['title']) . '<br/>';
												switch($s_item):
													case 'image':
														echo '<span><b>'.	$s_item.'</b></span>';
														echo '<input type="hidden" value="'.$ch_data->ch_get_opt($singBody[$i]['title'].'_'.$s_item .'_id').'" name="'.$ch_data->ch_stringReplace($singBody[$i]['title'].'_'.$s_item). '_id' .'"/>';
														echo '<input type="text" value="'.$ch_data->ch_get_opt($singBody[$i]['title'].'_'.$s_item).'" name="'.$ch_data->ch_stringReplace($singBody[$i]['title'].'_'.$s_item).'"/>';
														echo '<button class="button button-submit add-image">Add Image</button>';
														if($ch_data->ch_get_opt($singBody[$i]['title'].'_'.$s_item)){
															echo '<div class="imgPreview">';
															$strLen = strlen( $ch_data->ch_get_opt($singBody[$i]['title'].'_'.$s_item) );
															if( $strLen > 30){
															 echo '<img src="'.$ch_data->ch_get_opt($singBody[$i]['title'].'_'.$s_item).'"/>';
															} 
															echo '</div>';
														}
													break;

													case 'description':
														echo '<span><b>'.	$s_item.'</b></span>';
														echo '<textarea name="'.$ch_data->ch_stringReplace($singBody[$i]['title'].'_'.$s_item).'" id="id-'.$ch_data->ch_stringReplace($singBody[$i]['title'].'_'.$s_item).'">'.$ch_data->ch_get_opt($singBody[$i]['title'].'_'.$s_item).'</textarea>';
													break;

													default:
														echo '<span><b>'.$s_item.'</b></span>';
														echo '<input type="text" value="'.$ch_data->ch_get_opt($singBody[$i]['title'].'_'.$s_item).'" name="'.$ch_data->ch_stringReplace($singBody[$i]['title'].'_'.$s_item).'"/>';
												endswitch;
											endforeach;
										?>
									</div>
								<?php break; ?>
								<?php endswitch;?>
								<div class="imgPreview">
									<span><i><?=$singBody[$i]['note'];?></i></span>
									<div class="img">
										<?php 	
										if($singBody[$i]['type'] == 'upload' && $ch_data->ch_get_opt($singBody[$i]['title']) ) {
											echo '<img src="'.wp_get_attachment_url($ch_data->ch_get_opt($singBody[$i]['title'] . '_id')).'" alt="'.$singBody[$i]['title'].'">';
										}
										?>
									</div>
								</div>
							</div>
							<?php endfor;?>
						</div>
					</div>
					<?php endforeach;?>
				</div>
				<?php endforeach;?>
				<div class="ThOMainBody" id="blog">
					<span>Generalddd</span>
				</div>
			</div>
		</div>
		<?php
		submit_button();
		?>
	</form>
</div>
<?php
}
ob_end_clean();
?>