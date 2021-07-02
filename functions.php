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
 * Display a default one page menu when the Primary menu is not assign yet.
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
 * Enqueue scripts and styles.
 */
function sapphire_scripts() {
	/**
	 * Styles.
	 */
	wp_enqueue_style( 'sapphire-main-css', get_template_directory_uri() . '/assets/css/main.css' );
	wp_enqueue_style( 'sapphire-fonts-css', get_template_directory_uri() . '/assets/css/fonts.css' );
	/**
	 * Scripts.
	 */
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'sapphire-theme-js', get_template_directory_uri() . '/assets/js/theme.js', array(), "", true );
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
		if($type) {
			$max_page=$archive_pages / 10;
   		} else {
   			$max_page = $wp_query->max_num_pages;
		}
	}
	if ($max_page > 1) {
		echo '<nav id="page-nav">'; 
		if (!$paged) {
			$paged = 1;
		}
		
		if($paged == 1) {
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


