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
	<title>
		<?php
			$blog_title = get_bloginfo('name');
			if ( is_home() ) {
				echo $blog_title.' | '.get_bloginfo('description');
			} elseif ( is_single() || is_page() ) {
				echo single_post_title()." | ".$blog_title;
			} elseif (is_category() ) {
				echo single_cat_title()." | ".$blog_title;
			} elseif ( is_tag() ) {
				echo single_tag_title()." | ".$blog_title;
			} elseif ( is_search() ) {
				echo get_search_query()." 的搜索结果 | ".$blog_title;
			} elseif ( is_year() ) {
				echo the_time('Y年')." 所有文章 | ".$blog_title;
			} elseif ( is_month() ) {
				echo the_time('Y年n月')." 份所有文章 | ".$blog_title;
			} elseif ( is_day() ) {
				echo the_time('Y年n月j日'); echo "所有文章 | ".$blog_title;
			} elseif ( is_404() ) {
				echo '404 | '.$blog_title;
			} elseif ( is_author() ) {
				echo the_author()." 的所有文章 | ".$blog_title;
			} else {
				echo $blog_title;
			}
		?>
	</title>
	<meta name="description" content="<? bloginfo('description'); ?>" />
	<?php wp_head(); ?>
</head>
<?php 
if ( is_single() ):
	$sa_post_prettify = sa_theme_option('sa_post_prettify');
	if ($sa_post_prettify && $sa_post_prettify == 'open'):
?>
<body <?php body_class(); ?> onload="prettyPrint()">
	<?php else : ?>
<body <?php body_class(); ?> >
	<?php endif; ?>
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