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
				<a class="intro-articles" href="<?php bloginfo('template_url');?>/archives">
					<span class="intro-site-state-item-count"><?php $count_posts = wp_count_posts(); echo  $count_posts->publish; ?></span>
					<span class="intro-site-state-item-name">文 章</span>
				</a>
			</div>
			<div class="intro-site-state-item">
				<a class="intro-articles" href="<?php bloginfo('template_url');?>/categories">
					<span class="intro-site-state-item-count"><?php echo wp_count_terms('category'); ?></span>
					<span class="intro-site-state-item-name">分 类</span>
				</a>
			</div>
			<div class="intro-site-state-item">
				<a class="intro-articles" href="<?php bloginfo('template_url');?>/tags">
					<span class="intro-site-state-item-count"><?php echo wp_count_terms('post_tag'); ?></span>
					<span class="intro-site-state-item-name">标 签</span>
				</a>
			</div>
		</nav>
	</div>
	<div class="side-box recent-posts">
		<div class="side-box-header">
			<h1 class="side-box-title">
				页面列表
			</h1>
		</div>
		<ul>
			<?php wp_list_pages(); ?>
		</ul>
	</div>
	<div class="side-box friend-link">
		<div class="side-box-header">
			<h1 class="side-box-title">
				友情链接
			</h1>
		</div>
		<ul>
			<?php get_links(); ?>
		</ul>
	</div>
	<div class="side-box feature-page">
		<div class="side-box-header">
			<h1 class="side-box-title">
				功能
			</h1>
		</div>
		<ul>
			<?php wp_register(); ?>
			<?php wp_loginout(); ?>
		</ul>
	</div>
	<?php } ?>
</div>