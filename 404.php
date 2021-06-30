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
				<p class="site-404-subtitle">从前有个页面，现在他走丢了~</p>
				<a class="site-404-gohome" href="<?php bloginfo('url');?>">去往首页</a>
				<div class="site-404-content">
					或 <font id="jump">3</font> 秒后返回首页
				</div>
			</div>
			<script>
					function countDown(secs){
						$("#jump").html(secs);
						if(--secs>0){ setTimeout( "countDown(" + secs + ")",1000 ); }
						else{window.location.href="<?php bloginfo('url'); ?>"; }
					}
					countDown(3);
			</script>
		</div>
	</div>
</body>
</html>