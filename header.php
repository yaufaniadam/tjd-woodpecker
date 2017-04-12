<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
	<!--<link href='https://fonts.googleapis.com/css?family=Catamaran:300,400,800' rel='stylesheet' type='text/css'>-->	
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
</head>
<body <?php body_class(); ?>>

<div class="header">	
	<nav class="navbar navbar-default navbar-top">

	  <div class="container">
		<div class="navbar-header">		
		  
		  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav2" aria-expanded="true">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>

		 <h1 class="logo"><a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/logo.png"></a></h1>
		</div>
		
		<div class="collapse navbar-collapse" id="nav2">	  
		
		  <?php 
			wp_nav_menu( array(
				'menu'              => 'primary',
				'theme_location'    => 'primary',
				'depth'             => 2,
				'container'         => 'div',
				'container_id'      => 'top_menu',
				'menu_class'        => 'nav navbar-nav top navbar-right',
				'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',			
				'walker'            => new wp_bootstrap_navwalker())
				); 
		  ?>
		</div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
</div>
<div class="main-nav">
	<nav class="navbar navbar-default">		
		<div class="container">
			<?php 
				wp_nav_menu( array(
					'menu'              => 'primary',
					'theme_location'    => 'primary',
					'depth'             => 2,
					'container'         => 'div',
					'menu_class'        => 'nav navbar-nav primary',
					'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',			
					'walker'            => new wp_bootstrap_navwalker())
				); 
			?>
		</div>	
	</nav>	
</div>	

