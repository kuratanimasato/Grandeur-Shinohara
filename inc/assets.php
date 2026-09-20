<?php
/**
 * Theme assets.
 *
 * @package grandeur-shinohara
 */

/**
 * Return a file modification time for a theme asset.
 *
 * @param string $file Theme-relative asset path.
 * @return string|false
 */
function grandeur_shinohara_asset_version( $file ) {
	$path = get_theme_file_path( $file );

	return file_exists( $path ) ? (string) filemtime( $path ) : false;
}

/**
 * Enqueue front-end styles and scripts.
 */
function grandeur_shinohara_enqueue_assets() {
	wp_enqueue_style( 'font-awesome', 'https://use.fontawesome.com/releases/v6.2.0/css/all.css', array(), '6.2.0' );
	wp_enqueue_style( 'swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), '11' );
	wp_enqueue_style( 'custom-style', get_theme_file_uri( '/assets/css/style.css' ), array(), grandeur_shinohara_asset_version( '/assets/css/style.css' ) );
	wp_enqueue_style( 'custom-style-root', get_theme_file_uri( '/style.css' ), array(), grandeur_shinohara_asset_version( '/style.css' ) );
	wp_enqueue_style( 'faq-css', get_theme_file_uri( '/assets/css/faq.css' ), array(), grandeur_shinohara_asset_version( '/assets/css/faq.css' ) );
	wp_enqueue_style( 'main-css', get_theme_file_uri( '/assets/css/main.css' ), array(), grandeur_shinohara_asset_version( '/assets/css/main.css' ) );
	wp_enqueue_style( 'reset-style', get_theme_file_uri( '/assets/css/reset.css' ), array(), grandeur_shinohara_asset_version( '/assets/css/reset.css' ) );

	wp_enqueue_script( 'gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js', array(), '3.12.5', true );
	wp_enqueue_script( 'scrolltrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js', array( 'gsap' ), '3.12.5', true );
	wp_enqueue_script( 'smooth-scroll', 'https://cdnjs.cloudflare.com/ajax/libs/smooth-scroll/16.1.3/smooth-scroll.polyfills.min.js', array( 'gsap' ), '16.1.3', true );
	wp_enqueue_script( 'swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '11', true );
	wp_enqueue_script( 'custom-script', get_theme_file_uri( '/assets/js/script.js' ), array( 'gsap', 'scrolltrigger', 'swiper' ), grandeur_shinohara_asset_version( '/assets/js/script.js' ), true );
	wp_enqueue_script( 'faq-script', get_theme_file_uri( '/assets/js/faq.js' ), array( 'custom-script' ), grandeur_shinohara_asset_version( '/assets/js/faq.js' ), true );
	wp_enqueue_script( 'structured-data', get_theme_file_uri( '/assets/js/structured-data.js' ), array(), grandeur_shinohara_asset_version( '/assets/js/structured-data.js' ), false );
}
add_action( 'wp_enqueue_scripts', 'grandeur_shinohara_enqueue_assets' );

/**
 * Enqueue WebFont configuration and loader once.
 */
function grandeur_shinohara_enqueue_webfont_loader() {
	wp_enqueue_script(
		'grandeur-shinohara-webfont-config',
		get_theme_file_uri( '/assets/js/webfont-config.js' ),
		array(),
		grandeur_shinohara_asset_version( '/assets/js/webfont-config.js' ),
		true
	);
	wp_enqueue_script(
		'webfont-loader',
		'https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js',
		array( 'grandeur-shinohara-webfont-config' ),
		'1.6.26',
		true
	);
}
add_action( 'wp_enqueue_scripts', 'grandeur_shinohara_enqueue_webfont_loader' );
