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
	}
}
?>