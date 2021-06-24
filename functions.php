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
endif; // sapphire_setup
add_action( 'after_setup_theme', 'sapphire_setup' );

/**
 * Enqueue scripts and styles.
 */
function sapphire_scripts() {
//	wp_enqueue_style( 'sapphire-fonts', sapphire_fonts_url(), array(), null );
//	wp_enqueue_style( 'sapphire-animate', get_template_directory_uri() .'/assets/css/animate.min.css', array(), '1.0.0' );
//	wp_enqueue_style( 'sapphire-fa', get_template_directory_uri() .'/assets/css/font-awesome.min.css', array(), '4.4.0' );
//	wp_enqueue_style( 'sapphire-style', get_stylesheet_uri() );


	wp_enqueue_script('jquery');
//	wp_enqueue_script( 'sapphire-js-plugins', get_template_directory_uri() . '/assets/js/plugins.js', array(), '1.0.0', true );
	wp_enqueue_script( 'sapphire-theme', get_template_directory_uri() . '/assets/js/theme.js', array(), '20120206', true );
//	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
//		wp_enqueue_script( 'comment-reply' );
//	}

	// Animation from settings
	$sapphire_disable_animation = array( 'sapphire_disable_animation' => get_theme_mod( 'sapphire_animation_disable' ) );
	wp_localize_script('jquery','sapphire_js_settings', $sapphire_disable_animation);

}
add_action( 'wp_enqueue_scripts', 'sapphire_scripts' );


?>