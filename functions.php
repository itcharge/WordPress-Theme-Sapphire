<?php
if ( ! function_exists( 'sapphire_setup' ) ) :
function sapphire_setup() {
	/*
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary'	=> esc_html__( 'Primary Menu', 'sapphire' ),
	) );
}
endif; // sapphire_setup
add_action( 'after_setup_theme', 'sapphire_setup' );

/**
 * 默认菜单栏.
 */
function sapphire_primary_menu_fb() {
	?>
	<li class="menu-item"><a href="<?php echo esc_url( home_url( '/' ) ) ?>#about" title="<?php _e( 'About Us', 'sapphire' ) ?>"><?php _e( 'About Us', 'sapphire' ) ?></a></li>
	<li class="menu-item"><a href="<?php echo esc_url( home_url( '/' ) ) ?>#services" title="<?php _e( 'Services', 'sapphire' ) ?>"><?php _e( 'Services', 'sapphire' ) ?></a></li>
	<li class="menu-item"><a href="<?php echo esc_url( home_url( '/' ) ) ?>#projects" title="<?php _e( 'Works', 'sapphire' ) ?>"><?php _e( 'Works', 'sapphire' ) ?></a></li>
	<li class="menu-item"><a href="<?php echo esc_url( home_url( '/' ) ) ?>#team" title="<?php _e( 'Our Team', 'sapphire' ) ?>"><?php _e( 'Our Team', 'sapphire' ) ?></a></li>
	<li class="menu-item"><a href="<?php echo esc_url( home_url( '/' ) ) ?>#news" title="<?php _e( 'News', 'sapphire' ) ?>"><?php _e( 'News', 'sapphire' ) ?></a></li>
	<li class="menu-item"><a href="<?php echo esc_url( home_url( '/' ) ) ?>#contact" title="<?php _e( 'Contact', 'sapphire' ) ?>"><?php _e( 'Contact', 'sapphire' ) ?></a></li>
	<?php
}


/**
 * 加载 scripts、styles.
 */
function sapphire_scripts() {
	/**
	 * Styles.
	 */
	wp_enqueue_style( 'sapphire-main-css', get_template_directory_uri() . '/assets/css/main.css' );
	wp_enqueue_style( 'sapphire-fonts-css', get_template_directory_uri() . '/assets/css/fonts.css' );
	wp_enqueue_style( 'sapphire-prettify-css', get_template_directory_uri() . '/assets/css/prettify.css' );
	wp_enqueue_style( 'sapphire-automenu-css', get_template_directory_uri() . '/assets/css/automenu.css' );
	/**
	 * Scripts.
	 */
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'sapphire-theme-js', get_template_directory_uri() . '/assets/js/theme.js', array(), "", true );
	wp_enqueue_script( 'sapphire-prettify-js', get_template_directory_uri() . '/assets/js/prettify.js');
	wp_enqueue_script( 'sapphire-mathjax-js', 'http://mathjax.josephjctang.com/MathJax.js?config=TeX-MML-AM_HTMLorMML');
	wp_enqueue_script( 'sapphire-automenu-js', get_template_directory_uri() . '/assets/js/automenu.js' );
}
add_action( 'wp_enqueue_scripts', 'sapphire_scripts' );


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


function loadCustomTemplate($template) {
	global $wp_query;
	if(!file_exists($template)) { 
		return;
	}
	$wp_query->is_page = true;
	$wp_query->is_single = false;
	$wp_query->is_home = false;
	$wp_query->comments = false;
	// if we have a 404 status
	if ($wp_query->is_404) {
	// set status of 404 to false
		unset($wp_query->query["error"]);
		$wp_query->query_vars["error"] = "";
		$wp_query->is_404 = false;
	}
	// change the header to 200 OK
	header("HTTP/1.1 200 OK");
	//load our template
	include($template);
	exit;
}
 
/**
* 自定义查找链接
*/
function templateRedirect() {
	$basename = basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']);
	loadCustomTemplate(TEMPLATEPATH.'/assets/custom/'."/$basename.php");
}
add_action('template_redirect', 'templateRedirect');
?>



	
	


