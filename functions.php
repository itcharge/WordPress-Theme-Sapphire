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
	wp_enqueue_style('sapphire-main-css', get_template_directory_uri() . '/assets/css/main.css');
	/**
	 * Scripts.
	 */
	wp_enqueue_script( 'sapphire-theme-js', get_template_directory_uri() . '/assets/js/theme.js', array(), '20210624', true );
	wp_enqueue_script( 'sapphire-cssrefresh-js', get_template_directory_uri() . '/assets/js/cssrefresh.js', array(), '20210624', true );
}
add_action( 'wp_enqueue_scripts', 'sapphire_scripts' );


?>