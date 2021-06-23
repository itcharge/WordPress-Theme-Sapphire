<?php get_header(); ?>

<div class="site-content">
	<div id="left-box">
		<div id="home-loop">
			<?php
				if( have_posts() ){
					while( have_posts() ){
						
						// 获取下一篇文章的信息，并且将信息存入全局变量 $post 中
						the_post();
			?>
						<div class="post-item">
							<div class="post-title"><h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><h2></div>
							<div class="post-content"><?php the_content(); ?></div>
							<div class="post-meta">
								<?php _e( 'category', 'huangcong' ); ?>：<?php the_category(','); ?><span>|</span>
								<?php _e( 'author', 'huangcong' ); ?>：<?php the_author(); ?><span>|</span>
								<?php echo __( 'time', 'huangcong' ); ?>：<?php the_time( 'Y-m-d' ); ?>
								<?php edit_post_link( __( 'Edit','huangcong' ), ' <span>|</span> ', '' ); ?>
							</div>
						</div>
			<?php
					}
				}else{
					echo '没有日志可以显示';
				}
			?>
		</div>
	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>