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
				<?php wp_tag_cloud('smallest=8&largest=20&number=30&order=DESC'); ?>
				<?php
					$args = array(
						'orderby' 	=> 	'count', 
						'order' 	=> 	'DESC', 
						'show_count'=>	1,
						'hide_empty'=> 	false
					);
					$tags_list = get_tags($args);
					$count = 0; 
					if ($tags_list) {
						echo '<div class="side-info-index"><div class="side-tag tagcloud"><ul class="cat-tag-list">';
						foreach($tags_list as $tag) {
							$count++;
							echo '<li class="cat-tag-list-item">';
								echo '<a class="article-tag-link color'.rand(1, 6).'" href="'.get_tag_link($tag->term_id).'">'.$tag->name.'（'.$tag->count.'）</a>';
							echo '</li>';
							if( $count > 20 ) break;
						}
						echo '</ul></div><div class="clearfix"></div></div>';
					}
				?>
				</div>
			</div>
		</div>
	</div>
	<?php get_sidebar(); ?>
	<div class="clearfix"></div>
</div>

<?php get_footer(); ?>