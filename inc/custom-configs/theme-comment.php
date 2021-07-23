<?php

function sa_theme_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; 
?>
	<li class="comment-list-li" id="comment-list-li-<?php comment_ID(); ?>">
   		<div class="media">
   			<div class="media-left">
        		<?php 
					if (function_exists('get_avatar') && get_option('show_avatars')) { 
						echo get_avatar($comment, 48); 
					} 
				?>
   			</div>
   			<div class="media-body">
   				<?php printf(__('<p class="author_name">%s</p>'), get_comment_author_link()); ?>
		        <?php if ($comment->comment_approved == '0') : ?>
		            <em>评论等待审核...</em><br/>
				<?php endif; ?>
				<?php comment_text(); ?>
   			</div>
   		</div>
   		<div class="comment-metadata">
   			<span class="comment-pub-time">
   				<?php echo get_comment_time('Y-m-d H:i'); ?>
   			</span>
   			<span class="comment-btn-reply">
 				<i class="fa fa-reply"></i> <?php comment_reply_link(array_merge( $args, array('reply_text' => '回复','depth' => $depth, 'max_depth' => $args['max_depth']))) ?> 
   			</span>
   		</div>
	</li>
<?php
}	
?>