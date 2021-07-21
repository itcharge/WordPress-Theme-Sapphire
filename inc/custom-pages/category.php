<?php
/**
 * Template Name: 全部分类模板
 *
 * The template for displaying category pages
 *
 * @package Sapphire
 * @since Sapphire 1.0
 */
?>

<?php get_header(); ?>
<div class="site-content">
	<div id="left-box">
		<div id="home-loop">
			<div class="banner-box">
				<div class="banner-header">
					<h1 class="banner-title">分 类（<?php echo wp_count_terms('category'); ?>）</h1>
				</div>
			</div>
			<div class="category-wrap">
				<ul class="category-list">
					<?php
						$args = array(
							'orderby'	=>	'count',
							'order'		=>	'DESC',
							'style'		=>	'list',
							'title_li'	=>	'',
							'depth'		=> 	2,
							'show_count'=>	1,
							'hide_empty'=>	1
						);
						wp_list_categories($args); 
					?>
				</ul>
			</div>
		</div>
	</div>
	<?php get_sidebar(); ?>
	<div class="clearfix"></div>
</div>

<a href="#" id="back-top">
	<i class="icon-font icon-plane"></i>
</a>

<?php get_footer(); ?>
