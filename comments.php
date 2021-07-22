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
			<h1 class="comment-title">发表评论</h1>
		</header>
	
		<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
			<div class="comment-alert-info">
				<p>您必须 [<a href="<? echo wp_login_url( get_permalink() ); ?>">登录</a>] 才能发表评论.</p>
			</div>
		<?php else :  // 注册了未登录用户 ?>
		
			<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" class="comment-form" id="comment-form">
				<?php if (is_user_logged_in()) : $current_user = wp_get_current_user(); ?>
					<div class="comment-author-welcome">	
						<?php echo get_avatar($current_user->user_email, 30); ?>
						<a href="<?php echo get_edit_user_link(); ?>" class="links" data-no-instant><?php echo $user_identity; ?></a> 
						<a href="<?php echo wp_logout_url(get_permalink()); ?>" class="links">退出</a>
					</div>	
				<?php endif;  // 登录用户 ?>	
				
				<?php if ( !is_user_logged_in() ) : ?>
					<div class="comment-author-info" id="comment-author-info" <?php if ($comment_author) echo ' hidden'; ?>>
						<div class="comment-author-username">
							<label for="author">昵称<?php if ($req) echo "（必填）"; ?></label>
							<input type="text" name="author" id="author" class="commenttext" value="<?php echo $comment_author; ?>" tabindex="1" <?php if ($req) echo "required"; ?>/>
						</div>
						<div class="comment-author-email">
							<label for="email">邮箱<?php if ($req) echo "（必填）"; ?></label>
							<input type="email" name="email" id="email" class="commenttext" value="<?php echo $comment_author_email; ?>" tabindex="2" <?php if ($req) echo "required"; ?>/>
						</div>
						<div class="comment-author-url">
							<label for="url">网址</label>
							<input type="text" name="url" id="url" class="commenttext" value="<?php echo $comment_author_url; ?>" tabindex="3" />
						</div>
					</div>
				<?php endif; // 非登录用户 ?>
				
				<div class="comment-form-comment">
					<textarea id="comment" name="comment" rows="3" tabindex="4" placeholder="<?php echo '欢迎留言'; ?>" required>
					</textarea>
				</div>
				
				<div class="comment-form-submit">
					<?php comment_id_fields(); do_action('comment_form', $post->ID); ?>
					<button id="submit" type="submit" tabindex="5">提交评论</button>
				</div>
			</form>
		
		<?php endif;  // 非必须登录 ?>

	<?php endif; // 打开评论 ?>
	
	<?php if ( have_comments() ) : ?>
		<!-- 评论列表 -->	
		<ol class="comment-list">
			<?php wp_list_comments(array('callback' => 'mytheme_comment')); ?>
		</ol>
	
		<!-- 评论翻页 -->
	    <?php if( get_comment_pages_count() > 1 && get_option('page_comments') ) : ?>
			<nav class="comment-navi">
				<?php paginate_comments_links('prev_text=«&next_text=»'); ?>
	    	</nav>
	    <?php endif; ?> 
	<?php endif; ?>
	
	<div class="clearfix"></div>
</div>