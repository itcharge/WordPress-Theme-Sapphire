<?php
/**
 * Template Name: 边栏模板
 *
 * The sidebar containing the main widget area.
 *
 * @package Sapphire
 * @since Sapphire 1.0
 */
?>
<div id="right-box">
	<?php if( is_dynamic_sidebar() ){ dynamic_sidebar(); }else{ ?>
		<div class="intro-inner">
			<div class="overlay"></div>
			<header class="intro-header">
				<a class="profilepic" href="<?php get_option('home'); ?>">
					<img class="intro-portrait" src="<?php bloginfo('template_url');?>/assets/img/head.jpg">
				</a>
				<hgroup>
					<h1 class="header-author">
						<a href="/"><?php bloginfo('name'); ?></a>
					</h1>
				</hgroup>
				<p class="intro-subtitle"><?php bloginfo('description') ?></p>
			</header>
			<nav class="intro-site-state">
				<div class="intro-site-state-item">
					<a class="intro-articles" href="<?php get_option('home'); ?>/archive">
						<span class="intro-site-state-item-count"><?php $count_posts = wp_count_posts(); echo  $count_posts->publish; ?></span>
						<span class="intro-site-state-item-name">文 章</span>
					</a>
				</div>
				<div class="intro-site-state-item">
					<a class="intro-articles" href="<?php get_option('home'); ?>/category">
						<span class="intro-site-state-item-count"><?php echo wp_count_terms('category'); ?></span>
						<span class="intro-site-state-item-name">分 类</span>
					</a>
				</div>
				<div class="intro-site-state-item">
					<a class="intro-articles" href="<?php get_option('home'); ?>/tag">
						<span class="intro-site-state-item-count"><?php echo wp_count_terms('post_tag'); ?></span>
						<span class="intro-site-state-item-name">标 签</span>
					</a>
				</div>
			</nav>
		</div>
		<div class="side-box recent-posts" id="side-box-recent-posts">
			<div class="side-box-header">
				<h1 class="side-box-title">
					最近文章
				</h1>
			</div>
			<div class="side-box-entry">
				<?php 
					// WP_Query 所使用的参数 
					$args = array(
						'order' => 'DESC',
						'orderby' => 'date',
						'posts_per_page' => 5
					); 

					// 调用 WP_Query 新建文章查询. 
					$the_query = new WP_Query( $args ); 
					$post_count = 0;
				?>
				<?php if ($the_query->have_posts()) :  while ( $the_query->have_posts() && $post_count < 5) : $the_query->the_post(); echo "<h1>".the_title()."</h1>"; $post_count++; ?>
				<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
		<div class="side-box friend-link" id="side-box-friend-link">
			<div class="side-box-header">
				<h1 class="side-box-title">
					友情链接
				</h1>
			</div>
			<div class="side-box-entry">
				<ul>
					<?php get_links(); ?>
				</ul>
			</div>
		</div>
		<div class="side-box feature-page" id="side-box-feature-page">
			<div class="side-box-header">
				<h1 class="side-box-title">
					功能
				</h1>
			</div>
			<div class="side-box-entry">
				<ul>
					<?php wp_register(); ?>
					<?php wp_loginout(); ?>
				</ul>
			</div>
		</div>
		<?php if ( is_single() ): ?>
		<div class="side-box article-toc" id="side-box-article-toc">
			<div class="side-box-header">
				<h1 class="side-box-title">目 录</h1>
			</div>
			<div class="autoMenu" id="autoMenu" data-autoMenu></div>
		</div>
		<?php endif; ?>
	<?php } ?>
</div>