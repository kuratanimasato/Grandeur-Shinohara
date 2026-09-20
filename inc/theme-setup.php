<?php
/**
 * Theme setup and shared WordPress configuration.
 *
 * @package grandeur-shinohara
 */

/**
 * Set the number and order of posts shown on the home and information archives.
 *
 * @param WP_Query $query The query instance.
 */
function grandeur_shinohara_change_posts_per_page( $query ) {
	if ( is_admin() || ! $query->is_main_query() ) {
		return;
	}

	if ( $query->is_home() ) {
		$query->set( 'posts_per_page', 5 );
		$query->set( 'orderby', 'date' );
		$query->set( 'order', 'DESC' );
		$query->set( 'ignore_sticky_posts', 1 );
	}

	if ( $query->is_post_type_archive( 'information' ) ) {
		$query->set( 'posts_per_page', 10 );
		$query->set( 'orderby', 'date' );
		$query->set( 'order', 'DESC' );
	}

	if ( $query->is_post_type_archive( 'property' ) ) {
		$query->set( 'posts_per_page', 8 );
	}
}
add_action( 'pre_get_posts', 'grandeur_shinohara_change_posts_per_page' );

/**
 * Set up theme features and navigation menus.
 */
function grandeur_shinohara_setup() {
	load_theme_textdomain( 'grandeur-shinohara', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	register_nav_menus(
		array(
			'header' => esc_html__( 'ヘッダー', 'grandeur-shinohara' ),
			'mobile' => esc_html__( 'モバイル', 'grandeur-shinohara' ),
			'footer' => esc_html__( 'フッター', 'grandeur-shinohara' ),
		)
	);
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);
	add_theme_support(
		'custom-background',
		apply_filters(
			'grandeur_shinohara_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);
	add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'grandeur_shinohara_setup' );

/**
 * Set the content width.
 */
function grandeur_shinohara_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'grandeur_shinohara_content_width', 640 );
}
add_action( 'after_setup_theme', 'grandeur_shinohara_content_width', 0 );

/**
 * Register widget areas.
 */
function grandeur_shinohara_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'grandeur-shinohara' ),
			'id'            => 'side-widget',
			'description'   => esc_html__( 'ここがウェジェットエリア', 'grandeur-shinohara' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	add_filter( 'widget_title', 'grandeur_shinohara_remove_widget_title' );
}
add_action( 'widgets_init', 'grandeur_shinohara_widgets_init' );

/**
 * Preserve the existing empty widget title behavior.
 *
 * @param string $widget_title Widget title.
 * @return string
 */
function grandeur_shinohara_remove_widget_title( $widget_title ) {
	return '';
}

add_filter( 'use_widgets_block_editor', '__return_false' );

/**
 * Add editor styles to the block editor and front end.
 */
function grandeur_shinohara_add_editor_styles() {
	add_theme_support( 'editor-styles' );
	add_editor_style( 'editor-style.css' );
}
add_action( 'after_setup_theme', 'grandeur_shinohara_add_editor_styles' );

/**
 * Enqueue editor styles on the front end.
 */
function grandeur_shinohara_enqueue_editor_styles() {
	wp_enqueue_style(
		'editor-style',
		get_theme_file_uri( '/assets/css/editor-styles.css' ),
		array(),
		grandeur_shinohara_asset_version( '/assets/css/editor-styles.css' )
	);
}
add_action( 'wp_enqueue_scripts', 'grandeur_shinohara_enqueue_editor_styles' );

/**
 * Use the theme favicon when no site icon URL is available.
 *
 * @param string $url Site icon URL.
 * @return string
 */
function grandeur_shinohara_site_icon_url( $url ) {
	return get_theme_file_uri( '/favicon.ico' );
}
add_filter( 'get_site_icon_url', 'grandeur_shinohara_site_icon_url' );
