<?php 
/*
* The Property Supplier Header
*/
?>
<?php $ch_data = new ch_option; ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
	 	
        <?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?> >
		<section id="header">
			<header class="bg-dip-blue pt10 pb10">
				<div class="container">
					<div class="col-md-6 col-xs-12 col-xl-6 col-sm-6">
						<div class="headerMail colr-wt">
							<i class="fa fa-envelope-o" aria-hidden="true"></i>&nbsp;<span class="colr-wt"><?= $ch_data->ch_get_opt('email');  ?></span>
						</div>
					</div>
					<div class="col-md-6 col-xs-12 col-xl-6 col-sm-6">
						<div class="headerTel colr-wt text-right pull-right">
							<span class="phone-icon colr-wt"><?= $ch_data->ch_get_opt('tel');  ?></span>
						</div>
					</div>
				</div>				
			</header>
			<article class="logoAddressSocial pt10 ">
				<div class="container">
					<div class="col-md-4 col-xl-4 col-sm-4 col-xs-12 text-left mt20">
						<address>
							<?= $ch_data->ch_get_opt('address');  ?>
						</address>
					</div>
					<div class="col-md-4 col-xl-4 col-sm-4 col-xs-12 text-center">
						<div class="brand">
							<a href="<?= home_url(); ?>"><?= ( $ch_data->ch_get_opt('logo_id') )?'<img alt="The Property Supplier Logo" class="siteLogo img-responsive center-block" src="'. wp_get_attachment_url( $ch_data->ch_get_opt('logo_id') ) .'"/>':'';  ?></a>
						</div>
					</div>
					<div class="col-md-4 col-xl-4 col-sm-4 col-xs-12 pull-right text-right">
						<div class="headerSocial mt30">
							<ul class="list-inline">
								<?php for($i=1; $i<=3; $i++ ): 
									$url =  $ch_data->ch_get_opt('social('.$i.')_url');
									$icon = $ch_data->ch_get_opt('social('.$i.')_image');
								?>
								<li class="social"><a href="<?= $url;  ?>"><i class="<?= $icon; ?>" aria-hidden="true"></i></a></li>
								<?php endfor; ?>
								<li class="dropdown">
					                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">|  English: <img src="<?= get_template_directory_uri();  ?>/css/img/flg.jpg" alt="flag"> <i class="fa fa-angle-down" aria-hidden="true"></i></a>
					                <ul class="dropdown-menu" role="menu">
					                    <li><a href="#">English: <i class="fa fa-angle-down" aria-hidden="true"></i></a></li>
					                    <li><a href="#">US: <i class="fa fa-angle-down" aria-hidden="true"></i></a></li>
					                </ul>
					            </li>
							</ul>
						</div>
					</div>
				</div>
			</article>
			<footer class="topMenu" id="topMenu">
				<div class="container">
					   	<nav id="mainNav" class="navbar navbar-default">
			            
			                <!-- Brand and toggle get grouped for better mobile display -->
			                <div class="navbar-header">
			                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			                        <span class="sr-only">Toggle navigation</span>
			                        <span class="icon-bar"></span>
			                        <span class="icon-bar"></span>
			                        <span class="icon-bar"></span>
			                    </button>
			                </div>

			                <!-- Collect the nav links, forms, and other content for toggling -->
			                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			                    <?php
								wp_nav_menu( array(
									'menu'              => 'primary',
									'theme_location'    => 'primary',
									'depth'             => 3,
									'container'         => false,
									'container_class'   => 'collapse navbar-collapse',
									'container_id'      => 'bs-example-navbar-collapse-1',
									'menu_class'        => 'nav navbar-nav pull-md-right pull-xs-left list-inline'
								));
								?>	
			                </div>
			                <!-- /.navbar-collapse -->
			        </nav>
				</div>
			</footer>
		</section>
		<?php if(!is_home()): ?>
		<section id="formSection" class="bg-transperent">
			<div class="container">
				<div class="row">
					<div class="pl0 pr0 col-md-10 col-xl-10 col-sm-10 col-xs-12 col-md-offset-1 col-xl-offset-1 col-sm-offset-1 flex-center position-ref">
							<?php get_template_part( 'inc_part/search', 'form' ); ?>
					</div>
				</div>
			</div>
		</section>
		<?php endif; ?>