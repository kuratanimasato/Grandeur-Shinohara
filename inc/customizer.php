<?php
/**
 * grandeur-shinohara Theme Customizer
 *
 * @package grandeur-shinohara
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function grandeur_shinohara_customize_register($wp_customize)
{
	$wp_customize->get_setting('blogname')->transport = 'postMessage';
	$wp_customize->get_setting('blogdescription')->transport = 'postMessage';
	$wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

	if (isset($wp_customize->selective_refresh)) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector' => '.site-title a',
				'render_callback' => 'grandeur_shinohara_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector' => '.site-description',
				'render_callback' => 'grandeur_shinohara_customize_partial_blogdescription',
			)
		);
	}
}
add_action('customize_register', 'grandeur_shinohara_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function grandeur_shinohara_customize_partial_blogname()
{
	bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function grandeur_shinohara_customize_partial_blogdescription()
{
	bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function grandeur_shinohara_customize_preview_js()
{
	wp_enqueue_script('grandeur-shinohara-customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), _S_VERSION, true);
}
add_action('customize_preview_init', 'grandeur_shinohara_customize_preview_js');



/**************************************************
電話番号のカスタマイザー
**************************************************/

function customize_register($wp_customize)
{
	$wp_customize->add_section(
		'contact_section',
		array(
			'title' => __('電話番号の追加', 'yourtheme'),
			'priority' => 30,
		)
	);
	$wp_customize->add_setting(
		'phone_number',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'phone_number',
		array(
			'label' => __('電話番号', 'yourtheme'),
			'section' => 'contact_section',
			'settings' => 'phone_number',
			'type' => 'text',
		)
	);
}

add_action('customize_register', 'customize_register');


/**************************************************
会社情報のカスタマイザー
**************************************************/
function add_company_name_customizer($wp_customize)
{
	$wp_customize->add_section(
		'company_info',
		array(
			'title' => '会社情報',
			'priority' => 30,
		)
	);

	$wp_customize->add_setting(
		'company_name',
		array(
			'default' => 'サクセス不動産',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'company_name',
		array(
			'label' => '会社名',
			'section' => 'company_info',
			'type' => 'text',
		)
	);
}
add_action('customize_register', 'add_company_name_customizer');