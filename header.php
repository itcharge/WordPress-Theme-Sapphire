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
	<link rel="shortcut icon" href="<?php echo sa_theme_option('sa_site_favicon'); ?>" />
	<?php
	echo '<title>';
	$sa_seo_connector = sa_theme_option('sa_seo_connector');
	if ($sa_seo_connector == 'midline') {
		$connector = ' - ';
	} elseif ($sa_seo_connector == 'underline') {
		$connector = ' _ ';
	} elseif ($sa_seo_connector == 'verticalline') {
		$connector = ' | ';
	} else {
		$connector = ' - ';
	}
	$blog_title = get_bloginfo('name');
	if ( is_home() ) {
		echo $blog_title.$connector.get_bloginfo('description');
	} elseif ( is_single() || is_page() ) {
		$post_url = $_SERVER['REQUEST_URI']."";
		if ($post_url == '/tag') {
			echo '标签'.$connector.$blog_title;
		} elseif ($post_url == '/category') {
			echo '分类'.$connector.$blog_title;
		} elseif ($post_url == '/archive') {
			echo '归档'.$connector.$blog_title;
		} else {
			echo single_post_title().$connector.$blog_title;
		}
	} elseif ( is_category() ) {
		echo single_cat_title().$connector.$blog_title;
	} elseif ( is_tag() ) {
		echo single_tag_title().$connector.$blog_title;
	} elseif ( is_search() ) {
		echo get_search_query()." 的搜索结果".$connector.$blog_title;
	} elseif ( is_year() ) {
		echo the_time('Y年')." 所有文章".$connector.$blog_title;
	} elseif ( is_month() ) {
		echo the_time('Y年n月')." 份所有文章".$connector.$blog_title;
	} elseif ( is_day() ) {
		echo the_time('Y年n月j日'); echo "所有文章".$connector.$blog_title;
	} elseif ( is_404() ) {
		echo '404'.$connector.$blog_title;
	} elseif ( is_author() ) {
		echo the_author()." 的所有文章".$connector.$blog_title;
	} else {
		wp_title('');
	}
	echo '</title>';
	?>
	
	<?php
	if ( is_single() || is_page() ) {
		$description = get_post_meta($post->ID, 'description', true);
		if (!$description ) {
			$description = sa_post_excerpt(100, '...'. true);
		}
		
		$keywords = get_post_meta($post->ID, 'keywords', true);
		$tags = wp_get_post_tags($post->ID);
		$categories = get_the_category();
		foreach ($tags as $tag) {
			$keywords = $keywords . $tag->name . ",";
		}
		foreach ($categories as $category) {
			$keywords = $keywords . $category->cat_name . ",";
		}
		$keywords = rtrim($keywords, ',');
		$keywords = htmlspecialchars($keywords);
	} elseif ( is_category() ) {
		$description = category_description(get_the_category()->cat_ID);
		$keywords = single_cat_title();
	} elseif ( is_tag() ) {
		$description = trim(strip_tags(tag_description()));
		$keywords = single_tag_title();
	} elseif ( is_home() ) {
		$description = sa_theme_option('sa_seo_site_desc');
		$keywords = sa_theme_option('sa_seo_site_keywords');
	} else {
		$description = sa_theme_option('sa_seo_site_desc');
		$keywords = sa_theme_option('sa_seo_site_keywords');
	}
	?>
	<meta name="description" content="<?php echo $description; ?>"/>
	<meta name="keywords" content="<?php echo $keywords; ?>"/>
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
					echo '<h1 class="site-title"><a href="' . esc_url( home_url( '/' ) ) . '" rel="home">' . $blog_title . '</a></h1>';
				else :
					echo '<p class="site-title"><a href="' .esc_url( home_url( '/' ) ) . '" rel="home">' . $blog_title . '</a></p>';
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