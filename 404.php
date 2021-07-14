<?php 
/**
 * Template Name: 404 页面
 *
 * The template for displaying 404 pages (not found)
 *
 * @package Sapphire
 * @since Sapphire 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<title>404 - <?php bloginfo('name'); ?></title>
	<meta name="description" content="<? bloginfo('description'); ?>" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<header class="site-header" id="site-header" role="banner">
		<div class="container">
			<div class="site-branding">
				<?php
				if ( is_front_page() && is_home() ) :
					echo '<h1 class=" n"><a href="' . esc_url( home_url( '/' ) ) . '" rel="home">' . get_bloginfo( 'name' ) . '</a></h1>';
				else :
					echo '<p class="site-title"><a href="' .esc_url( home_url( '/' ) ) . '" rel="home">' . get_bloginfo( 'name' ) . '</a></p>';
				endif;
				?>
			</div>
			
			<div class="header-right-wrapper">
				<a href="#0" id="nav-toggle" class="cd-nav-trigger">Menu<span></span></a>
				<nav id="site-navigation" class="main-navigation" role="navigation">
					<ul class="sapphire-menu">	
						<?php wp_nav_menu( array('theme_location' => 'primary', 'container' => '', 'items_wrap' => '%3$s', 'fallback_cb' => 'sapphire_primary_menu_fb' ) ); ?>
				    </ul>
				</nav>
			</div>
		</div>
	</header>
	<div class="site-content">
		<div class="site-404-box">
			<div class="site-404-text">
				<h1 class="site-404-title">404</h1>
				<p class="site-404-subtitle">从前有个页面，现在他走丢了 ~</p>
				<a class="site-404-gohome" href="<?php bloginfo('url');?>">去往首页</a>
				<div class="site-404-content">
					<a class="site-404-goup" href="javascript:history.go(-1);">或着  返回上页 ></a>
				</div>
			</div>
			<div class="site-404-image-container">
				<img class="site-404-image" src="<?php bloginfo('template_url');?>/assets/img/404.svg" alt="page error">
			</div>
		</div>
	</div>
</body>
</html>