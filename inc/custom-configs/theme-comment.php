<?php

add_filter( 'get_avatar' , 'local_random_avatar' , 1 , 5 );
function local_random_avatar( $avatar, $id_or_email, $size, $default, $alt) {
	if (filter_var($id_or_email, FILTER_VALIDATE_EMAIL)) { // 判断是否为邮箱
		$email = $id_or_email; // 用户邮箱
		$user = get_user_by( 'email', $email ); // 通过邮箱查询用户信息
	} else {
		$uid = $id_or_email; // 获取用户 ID
		$user = get_user_by( 'id', $uid ); // 通过 ID 查询用户信息
	}

    if ($user) {
		$email = $user->user_email; // 用户邮箱
		$alt = $user->user_nicename; // 用户昵称
		$random = string_covert_hashnum($alt);
	} else {
		$random = rand(1, 10);
	}
	
	$avatar = ''.get_template_directory_uri().'/assets/img/avatar/'. $random .'.png';
	$avatar = "<img alt='{$alt}' src='{$avatar}' class='avatar avatar-{$size} photo' height='{$size}' width='{$size}' />";
	return $avatar;
}

function sa_theme_is_administrator($user_id) {
	$user = get_userdata($user_id);
	if( !empty($user->roles) && in_array('administrator', $user->roles) ) {
		return true;  // 是管理员
	} else {
		return false;  // 非管理员
	}
}


function string_covert_hashnum($user_id) {
	$range = 9;
	$hashslot = bcmod(base_convert(md5($user_id), 16, 10), $range);
	return $hashslot + 1;
}

function sa_theme_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	$author = get_comment_author();
?>
	<li class="comment-list-li" id="comment-list-li-<?php comment_ID(); ?>">
   		<div class="media">
   			<div class="media-left">
        		<?php
					if (function_exists('get_avatar') && get_option('show_avatars')) {
					    if (sa_theme_is_administrator($comment->user_id)) {
							$sa_sidebar_logo = sa_theme_option('sa_sidebar_logo');
							echo '<img alt="'.$author.'" src="'.$sa_sidebar_logo.'" class="avatar avatar-48 photo" height="48" width="48" />';
						} else {
							echo get_avatar($comment->user_id, 48); 
						} 
					} 
				?>
   			</div>
   			<div class="media-body">
				<?php
					echo '<p class="media-author">';
						echo '<span class="author-name">'.$author.'</span>';
						if ( sa_theme_is_administrator($comment->user_id) ) { 
							echo '<span class="author-name-label">站长</span>';
						}
					echo '</p>';
				 	
					if ($comment->comment_approved == '0') {
						echo '<em>评论等待审核...</em><br/>';
					}
		        	comment_text(); 
				?>
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
<?php
}	
?>