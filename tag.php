<?php
/**
 * Template Name: 标签模板
 *
 * The template for displaying all single posts
 *
 * @package Sapphire
 * @since Sapphire 1.0
 */
get_header(); 
?>

<div class="site-content">
	<div id="left-box">
		<div id="home-loop">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<article class="article article-type-post article-index">
				<div class='article-inner'>
					<header class="article-header">
						<h1 class="article-title">
							<a class="article-title-url" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h1>
						<a href="<?php the_permalink(); ?>" class="article-date">
							<time>
								<i class="icon-calendar icon"></i>
								<?php the_time('Y-m-d') ?>
							</time>
						</a>
					</header>
					<div class="article-entry" id="article-entry-excerpt">
						<?php the_excerpt(); ?>
					</div>
					
					<div class="article-info-index">
						<?php if (is_sticky() && is_home()): ?>
							<div class="article-pop-out tagcloud">
								<a class="color<?php echo rand(1,6) ?>">置顶</a>
							</div>
						<?php endif; ?>
						<?php 
							$cat = get_the_category();
							if ($cat) {
								echo '<div class="article-cat-tag tagcloud">';
									echo '<i class="icon-book icon"></i>';
									echo '<ul class="cat-tag-list">';
										foreach ($cat as $key => $category) {
											echo '<li class="cat-tag-list-item">';
												echo '<a class="article-category-link color'.rand(1, 6).'" href="'.get_category_link($category->cat_ID).'">'.$category->cat_name.'</a>'; 
											echo '</li>';
										}
									echo '</ul>';
								echo '</div>';
							}
//							$tags = get_the_tags();
//							if ($tags) {
//								echo '<div class="article-cat-tag tagcloud">';
//									echo '<i class="icon-price-tags icon"></i>';
//									echo '<ul class="cat-tag-list">';
//										foreach ($tags as $key => $tag) {
//											echo '<li class="cat-tag-list-item">';
//												echo '<a class="article-tag-link color'.rand(1, 6).'" href="'.get_tag_link($tag->term_id).'">'.$tag->name.'</a>'; 
//											echo '</li>';
//										}
//									echo '</ul>';
//								echo '</div>';
//							}
						?>
						<span class="article-more-link">
							<?php edit_post_link('编辑', '', ''); ?>
							<a class="article-more-a" href="<?php the_permalink(); ?>">阅读全文 >> </a>
						</span>
			      		<div class="clearfix"></div>
					</div>
				</div>
			</article>
		<?php endwhile; ?>
		<?php endif; ?>
		<?php pagenav();?>
		</div>
	</div>
	<?php get_sidebar(); ?>
	<div class="clearfix"></div>
</div>

<a href="#" id="back-top">
	<i class="icon-font icon-plane"></i>
</a>

<?php get_footer(); ?>