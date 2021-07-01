<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<title>404 - <?php bloginfo('name'); ?></title>
	<meta name="description" content="<? bloginfo('description'); ?>" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div class="site-content">
		<div class="site-404-box">
			<div class="site-404-text">
				<h1 class="site-404-title">404</h1>
				<p class="site-404-subtitle">从前有个页面，现在他走丢了 ~</p>
				<a class="site-404-gohome" href="<?php bloginfo('url');?>">去往首页</a>
				<div class="site-404-content">
					<a class="site-404-goup" href="javascript:history.go(-1);">或着  返回上页 ></a>
				</div>
			</div>
			<div class="site-404-image-container">
				<img class="site-404-image" src="<?php bloginfo('template_url');?>/assets/img/404.svg" alt="page error">
			</div>
		</div>
	</div>
</body>
</html>