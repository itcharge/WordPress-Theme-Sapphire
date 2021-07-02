<?php
/*
	Template Name: Archives
*/ 
?>
<?php get_header(); ?>
<div class="site-content">
	<div id="left-box">
		<div id="home-loop">
			<?php 
				// WP_Query 所使用的参数 
				$args = array(
					'order' => 'DESC',
					'orderby' => 'date',
					'showposts' => 30
				); 

				// 调用 WP_Query 新建文章查询. 
				$the_query = new WP_Query( $args ); 
				$last = 0000;
			?>
			<?php if ($the_query->have_posts()) :  while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			<?php
				$year = get_the_time('Y');
				if ($last != $year) {
					if ($last == 0000) {
						echo '<section class="archives-wrap"><div class="archive-year-wrap"><a href="/'.$year.'/" class="archive-year">'.$year.'</a></div>';
					} else {
						echo '</section>';
						echo '<section class="archives-wrap"><div class="archive-year-wrap"><a href="/'.$year.'/" class="archive-year">'.$year.'</a></div>';
					}
					$last = $year;
				}				
			?>
			<article class="archive-article archive-type-post">
				<div class="archive-article-inner">
					<header class="archive-article-header">
						<div class="article-meta">
							<h1 class="article-title"><?php the_title(); ?></h1>
							<a href="<?php the_permalink(); ?>" class="archive-article-date">
								<time>
									<i class="icon-calendar icon"></i>
									<?php the_time('Y-m-d') ?>
								</time>
							</a>
						</div>
					</header>
				</div>
			</article>
			<?php endwhile; ?>
				</section>
			<?php endif; ?> 
		</div>
	</div>
	<?php get_sidebar(); ?>
	<div class="clearfix"></div>
</div>

<?php get_footer(); ?>