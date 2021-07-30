<?php
/**
 * Template Name: 全部标签模板
 *
 * The template for displaying all single posts
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
					<h1 class="banner-title">标 签（<?php echo wp_count_terms('post_tag'); ?>）</h1>
				</div>
			</div>
			<div class="tag-wrap">
				<div class="tag-entry">
				<?php wp_tag_cloud('smallest=12&largest=30&order=DESC'); ?>
				</div>
			</div>
		</div>
	</div>
	<?php get_sidebar(); ?>
	<div class="clearfix"></div>
</div>

<?php get_footer(); ?>