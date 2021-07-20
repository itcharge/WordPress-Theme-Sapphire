<?php
/**
 * Template Name: 边栏模板
 *
 * The sidebar containing the main widget area.
 *
 * @package Sapphire
 * @since Sapphire 1.0
 */
?>
<div id="right-box">
	<?php if( is_dynamic_sidebar() ){ dynamic_sidebar(); }else{ ?>
		<div class="intro-inner">
			<div class="overlay"></div>
			<header class="intro-header">
				<a class="profilepic" href="<?php get_option('home'); ?>">
					<img class="intro-portrait" src="<?php bloginfo('template_url');?>/assets/img/head.jpg">
				</a>
				<hgroup>
					<h1 class="header-author">
						<a href="/"><?php bloginfo('name'); ?></a>
					</h1>
				</hgroup>
				<p class="intro-subtitle"><?php bloginfo('description') ?></p>
			</header>
			<nav class="intro-site-state">
				<div class="intro-site-state-item">
					<a class="intro-articles" href="<?php get_option('home'); ?>/archive">
						<span class="intro-site-state-item-count"><?php $count_posts = wp_count_posts(); echo  $count_posts->publish; ?></span>
						<span class="intro-site-state-item-name">文 章</span>
					</a>
				</div>
				<div class="intro-site-state-item">
					<a class="intro-articles" href="<?php get_option('home'); ?>/category">
						<span class="intro-site-state-item-count"><?php echo wp_count_terms('category'); ?></span>
						<span class="intro-site-state-item-name">分 类</span>
					</a>
				</div>
				<div class="intro-site-state-item">
					<a class="intro-articles" href="<?php get_option('home'); ?>/tag">
						<span class="intro-site-state-item-count"><?php echo wp_count_terms('post_tag'); ?></span>
						<span class="intro-site-state-item-name">标 签</span>
					</a>
				</div>
			</nav>
		</div>
		<?php
			$sa_sidebar_recent_posts = sa_theme_option('sa_sidebar_recent_posts');
			if ($sa_sidebar_recent_posts && $sa_sidebar_recent_posts == 'open') :
		?>
		<div class="side-box recent-posts" id="side-box-recent-posts">
			<div class="side-box-header">
				<h1 class="side-box-title">
					最新文章
				</h1>
			</div>
			<div class="side-box-entry">
				
				<?php 
					// WP_Query 所使用的参数 
					$args = array(
						'order' => 'DESC',
						'orderby' => 'date',
						'posts_per_page' => 5
					); 

					// 调用 WP_Query 新建文章查询. 
					$the_query = new WP_Query( $args ); 
					$post_count = 0;
				?>
				<?php if ($the_query->have_posts()) :  echo '<ul class="recent-posts">'; while ( $the_query->have_posts() && $post_count < 5) : $the_query->the_post(); $post_count++; ?>
					<li class="recent-post"><a class="recent-post-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
				<?php endwhile; ?>
				<?php echo '</ul>'; endif; ?> 
			</div>
		</div>
		<?php
			endif;
			$sa_sidebar_hot_tags = sa_theme_option('sa_sidebar_hot_tags');
			if ($sa_sidebar_hot_tags && $sa_sidebar_hot_tags == 'open'):
		?>
		<div class="side-box friend-link" id="side-box-friend-link">
			<div class="side-box-header">
				<h1 class="side-box-title">
					热门标签
				</h1>
			</div>
			<div class="side-box-entry">
				<?php
					$tags_list = get_tags( array('number' => '50', 'orderby' => 'count', 'order' => 'DESC', 'hide_empty' => false) );
					$count = 0; 
					if ($tags_list) {
						echo '<div class="side-info-index"><div class="side-tag tagcloud"><ul class="cat-tag-list">';
						foreach($tags_list as $tag) {
							$count++;
							echo '<li class="cat-tag-list-item">';
								echo '<a class="article-tag-link color'.rand(1, 6).'" href="'.get_tag_link($tag->term_id).'">'.$tag->name.'</a>';
							echo '</li>';
							if( $count > 20 ) break;
						}
						echo '</ul></div><div class="clearfix"></div></div>';
					}
				?>
			</div>
		</div>
		<?php
			endif;
			$sa_sidebar_contact = sa_theme_option('sa_sidebar_contact');
			if ($sa_sidebar_contact && $sa_sidebar_contact == 'open'):
		?>
		<div class="side-box contact" id="side-box-contact">
			<div class="side-box-header">
				<h1 class="side-box-title">
					联系方式
				</h1>
			</div>
			<div class="side-box-entry">
				<div class="side-info-index">
					<nav class="social-nav">
						<div class="social">
							<?php 
								global $theme_options;
								$social_options = $theme_options['panel_social'];
								foreach ($social_options as $social_option) {
									$social_url = sa_theme_option($social_option['id']);
									if ($social_url && $social_url != '') {
										echo '<a class="'.$social_option['short'].'" target="_blank" href="'.$social_url.'" title="'.$social_option['short'].'"><i class="icon-'.$social_option['short'].'"></i></a>';
									}
								}
							?>				        
						</div>
					</nav>
				</div>
			</div>
		</div>
		<?php
			endif;
			$sa_sidebar_post_toc = sa_theme_option('sa_sidebar_post_toc');
			if (is_single() && $sa_sidebar_post_toc && $sa_sidebar_post_toc == 'open') : 
		?>
		<div class="side-box article-toc" id="side-box-article-toc">
			<div class="side-box-header">
				<h1 class="side-box-title">目 录</h1>
			</div>
			<div class="autoMenu" id="autoMenu" data-autoMenu></div>
		</div>
		<?php endif; ?>
	<?php } ?>
</div>