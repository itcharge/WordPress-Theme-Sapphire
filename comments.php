<?php
/**
 * Template Name: 评论模板
 *
 * The template for displaying comments 
 *
 * @package Sapphire
 * @since Sapphire 1.0
 */
?>
<div class="comments-box">
	<ol class="comments-list">
		<?php if( !comments_open()) { ?>
			<li class="tip-box"><p>评论功能已经关闭!</p></li>
		<?php } else if ( post_password_required() ) { ?>
			<li class="tip-box"><p>请输入密码再查看评论内容!</p></li>
		<?php } else if ( !have_comments() ) { ?>
			<li class="tip-box"><p><a href="#respond">还没有任何评论，你来说两句吧</a></p></li>
		<?php } else { ?>
			<header class="comment-header"><h1>评论</h1></header>
		<?php wp_list_comments(); } ?>
	</ol>
	<div class="clearfix"></div>
	<? if ( get_option('comment_registration') && !is_user_logged_in() ) { ?>
		<p>你必须 <a href="<? echo wp_login_url( get_permalink() ); ?>">登录</a> 才能发表评论.</p>
	<? } else if( comments_open() ){ comment_form(); } ?>
</div>