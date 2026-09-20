<?php
/**
 * Grandeur Shinohara functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package grandeur-shinohara
 */

if ( ! defined( 'GRANDEUR_SHINOHARA_VERSION' ) ) {
	define( 'GRANDEUR_SHINOHARA_VERSION', '1.0.0' );
}

require get_template_directory() . '/inc/theme-setup.php';
require get_template_directory() . '/inc/assets.php';
require get_template_directory() . '/inc/navigation.php';
require get_template_directory() . '/inc/content-types.php';
require get_template_directory() . '/inc/site-customizer.php';
require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/customizer.php';

if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
