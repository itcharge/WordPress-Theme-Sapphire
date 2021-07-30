<?php
/**
 * Template Name: 首页模板
 *
 * The template for displaying home
 *
 * @package Sapphire
 * @since Sapphire 1.0
 */
get_header(); 
?>

<div class="site-content">
	<div id="left-box">
		<div id="home-loop">
		<?php
			$flag = false;
			if ( is_category() ) {
				$banner_title = '分类';
				$banner_sub_title = '与「'.single_cat_title('', false).'」相关的内容';
				$flag = true;
			} elseif ( is_tag() ) {
				$banner_title = '标签';
				$banner_sub_title = '与「'.single_tag_title('', false).'」相关的内容';
				$flag = true;
			} elseif ( is_day() ) {
				$banner_title = '归档';
				$banner_sub_title = get_the_time('Y年m月d日的文章');
				$flag = true;
			} elseif ( is_month() ) {
				$banner_title = '归档';
				$banner_sub_title = get_the_time('Y年m月的文章');
				$flag = true;
			} elseif ( is_year() ) {
				$banner_title = '归档';
				$banner_sub_title = get_the_time('Y年的文章');
				$flag = true;
			} elseif ( is_author() ) {
				$banner_title = '作者';
				$banner_sub_title = wp_title('', false) . ' 的所有文章';
				$flag = true;
			} elseif ( is_search() ) {
				$banner_title = '搜索';
				$counts = $wp_query->found_posts;
				if($counts) {
					$banner_sub_title = '找到 ' . $counts . '+ 与『'.get_search_query().'』相关的内容';
				} else {
					$banner_sub_title = '没找到与『'.get_search_query().'』相关的内容';
				}
				$flag = true;
			}
			
			if ( $flag ) {
				echo '<div class="banner-box"><div class="banner-header"><h1 class="banner-title">'. $banner_sub_title .'</h1></div></div>';
			}
		?>
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
								<i class="icon-tuding icon"></i>
								<a class="color0">置顶</a>
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
												echo '<a class="article-category-link color'.rand(1, 10).'" href="'.get_category_link($category->cat_ID).'">'.$category->cat_name.'</a>'; 
											echo '</li>';
										}
									echo '</ul>';
								echo '</div>';
							}
							$tags = get_the_tags();
							if ($tags) {
								echo '<div class="article-cat-tag tagcloud">';
									echo '<i class="icon-price-tags icon"></i>';
									echo '<ul class="cat-tag-list">';
										foreach ($tags as $key => $tag) {
											echo '<li class="cat-tag-list-item">';
												echo '<a class="article-tag-link color'.rand(1, 10).'" href="'.get_tag_link($tag->term_id).'">'.$tag->name.'</a>'; 
											echo '</li>';
										}
									echo '</ul>';
								echo '</div>';
							}
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
