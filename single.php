<?php get_header(); ?>

<div class="site-content">
	<div id="left-box">
		<div id="home-main">
			<?php if (have_posts()) : the_post(); update_post_caches($posts); ?>
			<article class="article article-type-post">
				<div class='article-inner'>
					<header class="article-header">
						<h1 class="article-title"><?php the_title(); ?></h1>
						<a href="<?php the_permalink(); ?>" class="article-date">
							<time><?php the_time('Y-m-d') ?></time>
						</a>
					</header>
					
					<div class="article-entry" itemprop="articleBody">
						<?php the_content(); ?>
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
						</p>
			      		<div class="clearfix"></div>
					</div>
				</div>
			</article>
			<?php endif; ?>
		</div>
	</div>
	<?php get_sidebar(); ?>
	<div class="clearfix"></div>
</div>

<a href="#" id="back-top">
	<i class="icon-font icon-plane"></i>
</a>

<?php get_footer(); ?>