<?php
/**
* 自定义获取文章字数、阅读时间     
*/
function read_words_times($text='') {
	global $post;
	if ($text == '') {
		$text = $post->post_content;
	}
	if (mb_strlen($count, 'UTF-8') < mb_strlen($text, 'UTF-8')) {
		$count = mb_strlen(preg_replace('/\s/','',html_entity_decode(strip_tags($post->post_content))),'UTF-8');
	} else {
		$count = 0;
	}
	if ($count < 1000) {
		echo '<div class="article-read-count"><span class="read-count"><i class="icon-statistics icon"></i><span class="article-word-count"> '.$count.' 字</span></span>'; 
	} else {
		$count = round($count / 100.0, 2) / 10;
		echo '<div class="article-read-count"><span class="read-count"><i class="icon-statistics icon"></i><span class="article-word-count">'.$count.'k 字</span></span>'; 
	}
	echo '&nbsp; | &nbsp;';
	$read_time = ceil($count / 300); // 修改数字 300 调整时间
	echo '<span class="read-count"><i class="icon-book icon"></i><span class="article-time-count">'.$read_time.' 分钟</span></span></div>';
}
?>