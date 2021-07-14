<?php
/**
 * Template Name: 页眉模板
 *
 * The template for displaying header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
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
	<title><?php bloginfo('name'); ?></title>
	<meta name="description" content="<? bloginfo('description'); ?>" />
	<?php wp_head(); ?>
</head>
<?php if ( is_single() ): ?>
<body <?php body_class(); ?> onload="prettyPrint()">
<?php else : ?>
<body <?php body_class(); ?> >
<?php endif; ?>
	<?php wp_body_open(); ?>
	<header class="site-header" id="site-header" role="banner">
		<div class="container">
			<div class="site-branding">
				<?php
				if ( is_front_page() && is_home() ) :
					echo '<h1 class="site-title"><a href="' . esc_url( home_url( '/' ) ) . '" rel="home">' . get_bloginfo( 'name' ) . '</a></h1>';
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