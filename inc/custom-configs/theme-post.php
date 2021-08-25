<?php
/**
 * 自定义获取文章字数、阅读时间、自定义数字分页函数、获取文章摘要
 *
 * @package Sapphire
 * @since Sapphire 1.0
 */
?>
<?php
/**
* 自定义获取文章字数、阅读时间     
*/
function read_words_times($text='') {
	global $post;
	if ($text == '') {
		$text = $post->post_content;
	}
	if (mb_strlen($text, 'UTF-8') > 0) {
		$count = mb_strlen(preg_replace('/\s/','',html_entity_decode(strip_tags($post->post_content))),'UTF-8');
	} else {
		$count = 0;
	}
	if ($count < 1000) {
		echo '<div class="article-read-count"><span class="read-count"><i class="icon-statistics icon"></i><span class="article-word-count"> '.$count.' 字</span></span>'; 
	} else {
		$k_count = round($count / 100.0, 2) / 10;
		echo '<div class="article-read-count"><span class="read-count"><i class="icon-statistics icon"></i><span class="article-word-count">'.$k_count.'k 字</span></span>'; 
	}
	echo '&nbsp; | &nbsp;';
	$read_time = ceil($count / 300); // 修改数字 300 调整时间
	echo '<span class="read-count"><i class="icon-book icon"></i><span class="article-time-count">'.$read_time.' 分钟</span></span></div>';
}

/**
* 自定义数字分页函数
* @Param int $range            数字分页的宽度
* @Return string|empty        输出分页的HTML代码        
*/
function pagenav($type=null, $archive_pages=0) {
	global $paged, $wp_query;
	$range = 4;
	if ($type) {
		$max_page = $archive_pages / 10;
	} else {
		$max_page = $wp_query->max_num_pages;
	}
	if ($max_page > 1) {
		echo '<nav id="page-nav">'; 
		if (!$paged) {
			$paged = 1;
		}
		
		if ($paged == 1) {
			echo '<a class="extend" style="visibility:hidden" href="'.get_pagenum_link($paged-1).'">«</a>';
		} else {
			echo '<a class="extend" href="'.get_pagenum_link($paged-1).'">«</a>';
		}
		if ($max_page > $range) {
			if ($paged < $range) {
				for ($i = 1; $i <= ($range +1); $i++) {
					echo "<a href='".get_pagenum_link($i) ."' class='page-number ";
					if($i == $paged) { 
						echo "current";
					}
					echo "'>$i</a>";
				}
			} elseif ($paged >= $max_page - ceil($range/2)) {
				for ($i = $max_page - $range; $i <= $max_page; $i++) {
					echo "<a href='".get_pagenum_link($i) ."' class='page-number ";
					if($i == $paged) { 
						echo "current";
					}
					echo "'>$i</a>";
				}
			} elseif ($paged >= $range && $paged < $max_page - ceil($range/2)) {
				for ($i = ($paged - ceil($range/2)); $i <= $paged + ceil($range/2); $i++) {
					echo "<a href='".get_pagenum_link($i) ."' class='page-number ";
					if($i == $paged) { 
						echo "current";
					}
					echo "'>$i</a>";
				}
			}
		} else {
			for ($i = 1; $i <= $max_page; $i++) {
				echo "<a href='".get_pagenum_link($i) ."' class='page-number ";
				if($i == $paged) { 
					echo "current";
				}
				echo "'>$i</a>";
			}
		}
		if ($paged == $max_page) {
			echo '<a class="extend" style="visibility:hidden" href="'.get_pagenum_link($paged+1).'">»</a>';
		} else {
			echo '<a class="extend" href="'.get_pagenum_link($paged+1).'">»</a>';
		}
		echo '</nav>';
	}
}

/**
* 获取文章摘要     
*/
function sa_post_excerpt($width_or_words, $more = '...', $words = false) {
	global $post;
	
	if ($post->post_password) {   // 密码保护
		$excerpt = '本文已加密，请输入密码后访问'; 
	} else if ($post->post_excerpt) {     // 有摘要，获取摘要
		$excerpt = $post->post_excerpt;
	} else {
		$excerpt = apply_filters('the_content', $post->post_content);
	}
	
	$excerpt = strip_tags($excerpt);
	$excerpt = str_replace(array("\r\n", "\r", "\n"), '', $excerpt);  
	
	if($words) {     
		$excerpt = wp_trim_words($excerpt, $width_or_words, $more);     // 按字数截取
	} else {
		$excerpt = mb_strimwidth($excerpt, 0, $width_or_words, $more);  // 按字符串宽度截断
	}
	
	return $excerpt;
}

/**
* 自定义文章摘要长度
*/
function sa_excerpt_length(){
    return 100;
}
add_filter( 'excerpt_length', 'sa_excerpt_length');
?>