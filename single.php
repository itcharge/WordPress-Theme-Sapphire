<?php 
/**
 * Template Name: 文章模板
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
		<div id="home-main">
			<?php if (have_posts()) : the_post(); update_post_caches($posts); ?>
			<article class="article article-type-post">
				<div class='article-inner'>
					<header class="article-header">
						<h1 class="article-title"><?php the_title(); ?></h1>
						<a href="<?php the_permalink(); ?>" class="article-date">
							<time>
								<i class="icon-calendar icon"></i>
								<?php the_time('Y-m-d') ?>
							</time>
						</a>
						<?php read_words_times(); ?>
					</header>
					
					<div class="article-entry" id="article-entry-content">
						<?php the_content(); ?>
					</div>
					<?php 
						$sa_post_copyright = sa_theme_option('sa_post_copyright');
						if ($sa_post_copyright && $sa_post_copyright == 'open') :
							$sa_post_copyright_name = sa_theme_option('sa_post_copyright_name');
							$sa_post_copyright_url = sa_theme_option('sa_post_copyright_url');
					?>
					<div class="article-copyright">
						<ul>
							<li class="article-copyright-author">
								<strong>本文作者：</strong>
								<?php the_author(); ?>
							</li>
							<li class="article-copyright-link">
								<strong>本文链接：</strong>
								<a href="<?php get_permalink(); ?>" title="<?php the_title(); ?>"><?php echo get_permalink(); ?></a>
							</li>
							<li class="article-copyright-license">
								<strong>版权声明：</strong>
								本站所有文章除特别声明外，均采用 <a href="<?php echo $sa_post_copyright_url; ?>"><?php echo $sa_post_copyright_name;?></a> 许可协议。
							</li>
						</ul>
					</div>
					<?php endif; ?>
					<div class="article-info article-info-index">
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
//								echo '<div class="article-category tagcloud">';
//									echo '<i class="icon-price-tags icon"></i>';
//									echo '<ul class="article-tag-list">';
//										foreach ($tags as $key => $tag) {
//											echo '<li class="article-tag-list-item">';
//												echo '<a class="article-tag-link color'.rand(1, 6).'" href="'.get_tag_link($tag->term_id).'">'.$tag->name.'</a>'; 
//											echo '</li>';
//										}
//									echo '</ul>';
//								echo '</div>';
//							}
						?>
						<span class="article-more-link">
							<?php edit_post_link('编辑', '', ''); ?>
						</span>
			      		<div class="clearfix"></div>
					</div>
				</div>
			</article>
			
			<?php comments_template(); ?>
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