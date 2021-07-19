<?php
/**
 * 加载 scripts、styles.
 */
function sapphire_scripts() {
	// Jquery
	wp_enqueue_script( 'jquery' );
		
	// 主题 CSS、js
	wp_enqueue_style( 'sapphire-theme-css', get_template_directory_uri() . '/assets/css/theme.css' );
	wp_enqueue_script( 'sapphire-theme-js', get_template_directory_uri() . '/assets/js/theme.js', array(), "", true );
	
	// 图标字体
	wp_enqueue_style( 'sapphire-fonts-css', get_template_directory_uri() . '/assets/css/fonts.css' );
	
	// 代码高亮
	wp_enqueue_style( 'sapphire-prettify-css', get_template_directory_uri() . '/assets/css/prettify.css' );
	wp_enqueue_script( 'sapphire-prettify-js', get_template_directory_uri() . '/assets/js/prettify.js');
	
	// mathjax
	wp_enqueue_script( 'sapphire-mathjax-js', 'http://mathjax.josephjctang.com/MathJax.js?config=TeX-MML-AM_HTMLorMML');
	
	// 目录模块
	wp_enqueue_style( 'sapphire-automenu-css', get_template_directory_uri() . '/assets/css/automenu.css' );
	wp_enqueue_script( 'sapphire-automenu-js', get_template_directory_uri() . '/assets/js/automenu.js' );
	
	// 鼠标点击红心效果
	wp_enqueue_script( 'sapphire-clicklove-js', get_template_directory_uri() . '/assets/js/clicklove.js' );
}
add_action( 'wp_enqueue_scripts', 'sapphire_scripts' );
?>