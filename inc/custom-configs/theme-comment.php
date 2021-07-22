<?php
/**
 * 自定义评论模板
 *
 * @package Sapphire
 * @since Sapphire 1.0
 */
?>

<?php

function sa_theme_comment($comment, $args='', $depth='') {
	$GLOBALS['comment'] = $comment;
	
	$is_parent = true;
	
	if ($args) {
		extract($args, EXTR_SKIP);
		
		$comorder = get_option('comment_order');
		if ($comorder == 'asc') {
			global $commentcount;
			if (!$commentcount) {
				$page = (int) get_query_var('cpage');
				if ($page > 0) {
					$page--;
				} 
				$cpp = (int) get_option('comments_per_page');
				$commentcount = $cpp * $page;
			}
		} else {
			global $commentcount, $wpdb, $post;
			if (!$commentcount) {
				$comments = $wpdb->get_results("SELECT * FROM $wpdb->$comments WHERE comment_post_ID = $post->ID AND comment_type = '' AND comment_approved = '1' AND !comment_parent");
				$cnt = count($comments);
				$page = (int) get_query_var('cpage');
				$cpp = (int) get_option('comments_per_page');
				if ($page == 0 || ceil($cnt/$cpp) == 1 || ($page > 1 && $page == ceil($cnt/$cpp))) {
					$commentcount = $cnt + 1;
				} else {
					$commentcount = $cpp * $page + 1;
				}
			}
		}
		if ( empty($args['has_children'])) {
			$isParent = false;
		}
	}  else {
		if ($depth > 0) {
			$isParent = false;
			echo '<ul class="children">';
		}
	}
?>

<li <?php comment_class( $isParent? 'parent': ''); ?> id="comment-<?php comment_ID() ?>" data-no-instant>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
		<div class="comment-avatar-area">
			<?php echo get_avatar($comment->comment_author_email, 50, '', $comment->comment_author); ?>
		</div>
		
		<div class="comment-content-area">
			<div class="comment-content-user">
				<span class="comment-auth"><?php comment_author_link(); ?></span>
<!-- 				<?php mk_author_level($comment); ?> -->
			</div>
			
			<div class="comment-content-text">
				<?php comment_text(); ?>
				<?php if ( $comment->comment_approved == '0' ) : ?>
				<p class="comment-awaiting-moderation">
					<i class="fa fa-lock"></i> 该评论正在审核中...
				</p>
				<?php endif; ?>
			</div>
			
			<?php if($args) { ?>
			<div class="comment-content-info" data-no-instant>
				<?php if(!$comment->comment_parent) { ?>
				<span>
					<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
					<?php
						if($comorder == 'asc') {
							$commentcount++;    // 在页面顶部显示 旧的 评论
						} else {
							$commentcount--;    // 在页面顶部显示 新的 评论
						}
						switch ($commentcount) {
							case 1: echo '沙发'; break;
							case 2: echo '板凳'; break;
							case 3: echo '地板'; break;
							default: printf('#%1$s', $commentcount);
						}
					?>
					</a>
				</span>
				<?php } ?>
				
				<span>
				<?php 
				printf( __('%1$s at %2$s'), get_comment_date( 'Y-m-d' ),  get_comment_time('H:i') );
				?>
				</span>
				
				<?php
				if ( is_user_logged_in() ) {
					echo '
					<span>
						<a class="comment-delete-link" id="delete-'.$comment->comment_ID .'" 
						  href="'.get_bloginfo('url').'/wp-admin/comment.php?action=trash&c='.$comment->comment_ID.'#wpbody-content">
							删除
						</a>
					</span>';
					
					edit_comment_link('编辑', '<span>', '</span>');
				}
				?>
				
				<span><?php 
				if(comments_open()) {
					$link = sprintf(
						"<a rel='nofollow' class='comment-reply-link' href='%s' onclick='replyComments(%s); return false;'>回复</a>",
						esc_url(
							add_query_arg(
								array(
									'replytocom'      => $comment->comment_ID,
									'unapproved'      => false,
									'moderation-hash' => false,
								)
							)
						) . '#respond',
						$comment->comment_ID
					);
					echo $link;
				}
				?></span>
			</div>  <!-- comment-content-info -->
			<?php } ?>
		</div>      <!-- comment-content-area -->
	</div>      <!-- .comment-body -->
		
	<?php

	if(!$args && !$isParent) echo '</ul>';
}
?>