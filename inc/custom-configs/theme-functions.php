<?php
/**
 * 按需加载 scripts、styles.
 *
 * @package Sapphire
 * @since Sapphire 1.0
 */
?>

<?php
function sapphire_scripts() {
	// Jquery
	wp_enqueue_script( 'jquery' );
	
	// 主题 CSS、js
	wp_enqueue_style( 'sapphire-theme-css', get_template_directory_uri() . '/assets/css/theme.css' );
	wp_enqueue_script( 'sapphire-theme-js', get_template_directory_uri() . '/assets/js/theme.js', array(), "", true );
	
	// 图标字体
	wp_enqueue_style( 'sapphire-fonts-css', get_template_directory_uri() . '/assets/css/fonts.css' );
	
	$sa_site_clicklove = sa_theme_option('sa_site_clicklove');
	if ($sa_site_clicklove && $sa_site_clicklove == 'open') {
		// 鼠标点击红心效果
		wp_enqueue_script( 'sapphire-clicklove-js', get_template_directory_uri() . '/assets/js/clicklove.js' );
	}
	
	$sa_site_progressbar = sa_theme_option('sa_site_progressbar');
	if ($sa_site_progressbar && $sa_site_progressbar == 'open') {
		// 进度条显示
		wp_enqueue_style( 'sapphire-progressbar-css', get_template_directory_uri() . '/assets/css/pace-minimal.css' );
		wp_enqueue_script( 'sapphire-progressbar-js', get_template_directory_uri() . '/assets/js/pace.min.js');
	}
	
	$sa_post_prettify = sa_theme_option('sa_post_prettify');
	if ($sa_post_prettify && $sa_post_prettify == 'open') {
		// 代码高亮
		wp_enqueue_style( 'sapphire-prettify-css', get_template_directory_uri() . '/assets/css/prettify.css' );
		wp_enqueue_script( 'sapphire-prettify-js', get_template_directory_uri() . '/assets/js/prettify.js');
	}
	
	$sa_post_mathjax = sa_theme_option('sa_post_mathjax');
	if ($sa_post_mathjax && $sa_post_mathjax == 'open') {
		// mathjax
		wp_enqueue_script( 'sapphire-mathjax-js', 'http://mathjax.josephjctang.com/MathJax.js?config=TeX-MML-AM_HTMLorMML');
	}
	
	$sa_sidebar_post_toc = sa_theme_option('sa_sidebar_post_toc');
	if ($sa_sidebar_post_toc && $sa_sidebar_post_toc == 'open') {
		// 目录模块
		wp_enqueue_style( 'sapphire-automenu-css', get_template_directory_uri() . '/assets/css/automenu.css' );
		wp_enqueue_script( 'sapphire-automenu-js', get_template_directory_uri() . '/assets/js/automenu.js' );
	}
}
add_action( 'wp_enqueue_scripts', 'sapphire_scripts' );
?>