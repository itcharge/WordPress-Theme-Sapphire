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

<?php
	// 需要密码 或者 没有开启评论	
	if ( post_password_required() || !have_comments() && !comments_open() ) {
		return;
	}
?>

<div class="comments-box">
	<?php if ( comments_open() ) : ?>
		<!-- 开启评论 -->
		<header class="comment-header">
			<h1 class="comment-title">评论（<?php echo comments_number();  ?>）</h1>
		</header>
		
		<?php if ( have_comments() ) : ?>
			<div class="comment-list-box">
				<ol class="comment-list">
					<?php
						$args = array(
							'style'			=>	'ol',
							'short_ping'	=>	true,
							'avater_size'	=>	48,
							'type'			=>	'comment',
							'callback'		=>	'sa_theme_comment',
						);
					 	wp_list_comments($args);
					?>
				</ol>
			</div>
		
			<?php if ( get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
				<nav class="comments-nav">
					<?php paginate_comments_links(array('prev_next'=>true)); ?>
				</nav>
			<?php endif; // 评论分页 ?>
		
		<?php endif; // 评论列表 ?>
		
		<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
			<!-- 要求登录 -->
			<div class="comment-alert-info">
				<p>您必须 [<a href="<? echo wp_login_url( get_permalink() ); ?>">登录</a>] 才能发表评论.</p>
			</div>
		<?php else :  // 非必须登录 ?>
			<div class="comment-form-box">
				<form action="<?php get_option('siteurl'); ?>/wp-comments-post.php" method="post" class="comment-form" id="comment-form">
				<?php if(is_user_logged_in()) : $current_user = wp_get_current_user(); ?>
					<!-- 登录用户 -->
					<p class="warning-text" style="margin-bottom:10px">以<a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>身份登录&nbsp;|&nbsp;<a class="link-logout" href="<?php echo wp_logout_url(get_permalink()); ?>">注销 &raquo;</a></p>
					<textarea class="comment-form-content" rows="3" id="comment-form-content" onkeydown="if(event.ctrlKey&&event.keyCode==13){document.getElementById('submit').click();return false};" placeholder="欢迎留言，广告绕道~~" tabindex="1" name="comment"></textarea>
				<?php else: ?>
					<!-- 非登录用户 -->
					<textarea class="comment-form-content" rows="3" id="comment-form-content" onkeydown="if(event.ctrlKey&&event.keyCode==13){document.getElementById('submit').click();return false};" placeholder="欢迎留言，广告绕道~~" tabindex="1" name="comment"></textarea>
					<div class="comment-form-info">
						<input class="form-control" id="author" type="text" tabindex="2" value="<?php echo $comment_author; ?>" name="author" placeholder="昵称 [必填]" required>
						<input class="form-control" id="email" type="text" tabindex="3" value="<?php echo $comment_author_email; ?>" name="email" placeholder="邮箱 [必填]" required>
					</div>					
				<?php endif; ?>
					<div class="comment-submit-button" role="group">
						<input name="submit" type="submit" id="submit" class="submit-button" tabindex="5" value="发表评论" /></div>
					<?php comment_id_fields(); ?>
				</form>
			</div>
		<?php endif; ?>
	<?php endif;  // 开启评论 ?>
	<div class="clearfix"></div>
</div>