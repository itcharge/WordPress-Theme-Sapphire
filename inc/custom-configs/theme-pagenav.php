<?php
/**
* 自定义数字分页函数
* @Param int $range            数字分页的宽度
* @Return string|empty        输出分页的HTML代码        
*/
function pagenav($type=null, $archive_pages=0) {
	global $paged, $wp_query;
	$range = 4;
	if (!$max_page) {
		if ($type) {
			$max_page = $archive_pages / 10;
   		} else {
   			$max_page = $wp_query->max_num_pages;
		}
	}
	if ($max_page > 1) {
		echo '<nav id="page-nav">'; 
		if (!$paged) {
			$paged = 1;
		}
		
		if ($paged == 1) {
			echo '<a class="extend" style="visibility:hidden" href="'.get_pagenum_link($paged-1).'">上一页</a>';
		} else {
			echo '<a class="extend" href="'.get_pagenum_link($paged-1).'">上一页</a>';
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
			echo '<a class="extend" style="visibility:hidden" href="'.get_pagenum_link($paged+1).'">下一页</a>';
		} else {
			echo '<a class="extend" href="'.get_pagenum_link($paged+1).'">下一页</a>';
		}
		echo '</nav>';
	}
}
?>