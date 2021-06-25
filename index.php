<?php get_header(); ?>

<div class="site-content">
	<div id="left-box">
		<div id="home-loop">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<article class="article article-type-post">
				<div class='article-inner'>
					<header class="article-header">
						<h1>
							<a class="article-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h1>
						<a href="<?php the_permalink(); ?>" class="article-date">
							<time><?php the_time('Y-m-d') ?></time>
						</a>
					</header>
					<div class="article-entry">
						<?php the_excerpt(); ?>
					</div>
					
					<div class="article-info article-info-index">
						<?php if (is_sticky() && is_home()): ?>
							<div class="article-pop-out tagcloud">
								<a class="color<?php echo rand(1,6) ?>">置顶</a>
							</div>
						<?php endif; ?>
						<?php 
							$cat = get_the_category();
							if ($cat) {
								echo '<div class="article-category tagcloud">';
								foreach ($cat as $key => $category) {
									$color_cat = rand(1, 6);
									echo '<a class="article-category-link color'.$color_cat.'" href="'.get_category_link($category->cat_ID).'">'.$category->cat_name.'</a>'; 
								}
								echo '</div>';
							}
						?>
						<?php
							$tags = get_the_tags();
							if ($tags) {
								echo '<div class="article-tag tagcloud">';
								foreach ($tags as $key => $tag) {
									echo '<a class="article-tag-link color'.rand(1, 6).'" href="'.get_tag_link($tag->term_id).'">'.$tag->name.'</a>'; 
								}
								echo '</div>';
							}
						?>
						<p class="article-more-link">
							<?php edit_post_link('编辑', '', ''); ?>
							<a class="article-more-a" href="<?php the_permalink(); ?>">阅读全文 >> </a>
						</p>
			      		<div class="clearfix"></div>
					</div>
				</div>
			</article>
		<?php endwhile; ?>
		<?php endif; ?>
		</div>
	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>