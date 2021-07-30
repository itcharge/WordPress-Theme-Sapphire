<?php
/**
 * WordPress 优化配置
 *
 * @package Sapphire
 * @since Sapphire 1.0
 */
?>

<?php

remove_action( 'wp_head', 'wp_generator' );     // 移除 WordPress 版本信息
remove_action( 'wp_head', 'rsd_link' );         // 移除 WordPress 离线编辑器接口
remove_action( 'wp_head', 'wlwmanifest_link' ); // 同上
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );   // 上下文章的url
remove_action( 'wp_head', 'feed_links', 2 );        // 移除文章 feed、评论 feed
remove_action( 'wp_head', 'feed_links_extra', 3 );  // 移除评论 feed
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );           // 移除 短链接
remove_action( 'template_redirect', 'wp_shortlink_header', 11, 0 );
remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );          // 移除 wp-json
remove_action( 'template_redirect', 'rest_output_link_header', 11 ); // 移除 HTTP header 中的 link
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );       // 解决4.2版本部分主题大量404请求问题
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' ); // 解决后台404请求
remove_action( 'wp_print_styles', 'print_emoji_styles' );       // 移除 4.2 版本前台表情样式钩子
remove_action( 'admin_print_styles', 'print_emoji_styles' );    // 移除 4.2 版本后台表情样式钩子
remove_action( 'the_content_feed', 'wp_staticize_emoji' );      // 移除 4.2 emoji 相关钩子
remove_action( 'comment_text_rss', 'wp_staticize_emoji' );      // 移除 4.2 emoji 相关钩子
remove_action( 'init', 'smilies_init', 5 );            // 去除 Emoji 短代码转换

remove_filter( 'the_content', 'wptexturize' );          // 禁止正文代码标点转换
remove_filter( 'comment_text', 'wptexturize' );         // 禁止评论代码标点转换
remove_filter( 'comment_text', 'make_clickable',  9 );  // 移除 WordPress 评论网址自动转链接

add_filter( 'xmlrpc_enabled', '__return_false' );       // 关闭 XML-RPC 的 pingback 端口
add_filter( 'use_default_gallery_style', '__return_false' );        // 去除 wordpress 自带相册样式
add_filter( 'pre_option_link_manager_enabled', '__return_true' );   // 启用链接功能（友链）


// 禁止后台加载谷歌字体
function sa_remove_open_sans_from_wp_core() {
	wp_deregister_style( 'open-sans' );
	wp_register_style( 'open-sans', false );
	wp_enqueue_style('open-sans', '' );
}
add_action( 'sa_remove_open_sans', 'sa_remove_open_sans_from_wp_core' );

// 禁止 WordPress 头部加载 s.w.org 的 dns-prefetch
function sa_remove_dns_prefetch( $hints, $relation_type ) {
	if ( 'dns-prefetch' === $relation_type ) {
		return array_diff( wp_dependencies_unique_hosts(), $hints );
	}
	return $hints;
}
add_filter( 'wp_resource_hints', 'sa_remove_dns_prefetch', 10, 2 );

// 禁用oembed  https://wordpress.org/plugins/disable-embeds/
if ( !function_exists( 'disable_embeds_init' ) ) :
	function disable_embeds_init() {
		/* @var WP $wp */
		global $wp;
		
		// Remove the embed query var.
		$wp->public_query_vars = array_diff( $wp->public_query_vars, array(
			'embed',
		) );
		
		// Remove the REST API endpoint.
		remove_action( 'rest_api_init', 'wp_oembed_register_route' );
		
		// Turn off oEmbed auto discovery.
		add_filter( 'embed_oembed_discover', '__return_false' );
		
		// Don't filter oEmbed results.
		remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );
		
		// Remove oEmbed discovery links.
		remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
		
		// Remove oEmbed-specific JavaScript from the front-end and back-end.
		remove_action( 'wp_head', 'wp_oembed_add_host_js' );
		add_filter( 'tiny_mce_plugins', 'disable_embeds_tiny_mce_plugin' );
		
		// Remove all embeds rewrite rules.
		add_filter( 'rewrite_rules_array', 'disable_embeds_rewrites' );
		
		// Remove filter of the oEmbed result before any HTTP requests are made.
		remove_filter( 'pre_oembed_result', 'wp_filter_pre_oembed_result', 10 );
	}
	
	add_action( 'init', 'disable_embeds_init', 9999 );
	
	/**
	* Removes the 'wpembed' TinyMCE plugin.
	*
	* @since 1.0.0
	*
	* @param array $plugins List of TinyMCE plugins.
	* @return array The modified list.
	*/
	function disable_embeds_tiny_mce_plugin( $plugins ) {
		return array_diff( $plugins, array( 'wpembed' ) );
	}
	
	/**
	* Remove all rewrite rules related to embeds.
	*
	* @since 1.2.0
	*
	* @param array $rules WordPress rewrite rules.
	* @return array Rewrite rules without embeds rules.
	*/
	function disable_embeds_rewrites( $rules ) {
		foreach ( $rules as $rule => $rewrite ) {
			if ( false !== strpos( $rewrite, 'embed=true' ) ) {
				unset( $rules[ $rule ] );
			}
		}
		
		return $rules;
	}
	
	/**
	* Remove embeds rewrite rules on plugin activation.
	*
	* @since 1.2.0
	*/
	function disable_embeds_remove_rewrite_rules() {
		add_filter( 'rewrite_rules_array', 'disable_embeds_rewrites' );
		flush_rewrite_rules();
	}
	
	register_activation_hook( __FILE__, 'disable_embeds_remove_rewrite_rules' );
	
	/**
	* Flush rewrite rules on plugin deactivation.
	*
	* @since 1.2.0
	*/
	function disable_embeds_flush_rewrite_rules() {
		remove_filter( 'rewrite_rules_array', 'disable_embeds_rewrites' );
		flush_rewrite_rules();
	}
	
	register_deactivation_hook( __FILE__, 'disable_embeds_flush_rewrite_rules' );
endif;
?>