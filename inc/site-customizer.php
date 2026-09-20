<?php
/**
 * Site-specific Customizer settings.
 *
 * @package grandeur-shinohara
 */

/**
 * Register site-specific Customizer settings.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function grandeur_shinohara_site_customize_register( $wp_customize ) {
	$wp_customize->add_section(
		'slide_copy',
		array(
			'title'    => 'スライドコピー',
			'priority' => 30,
		)
	);
	$wp_customize->add_setting(
		'slide_title',
		array(
			'default'           => '群馬県大泉町の広々ワンルーム！！',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'slide_title',
		array(
			'label'   => 'スライドタイトル',
			'section' => 'slide_copy',
			'type'    => 'text',
		)
	);
	$wp_customize->add_setting(
		'slide_subtitle',
		array(
			'default'           => '一人暮らしをより豊かに！',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'slide_subtitle',
		array(
			'label'   => 'スライドサブタイトル',
			'section' => 'slide_copy',
			'type'    => 'text',
		)
	);

	$wp_customize->add_section(
		'concept_section',
		array(
			'title'    => 'コンセプトセクション',
			'priority' => 31,
		)
	);
	$wp_customize->add_setting(
		'concept_title',
		array(
			'default'           => '広さで選ぶなら、グランドールシノハラ。',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'concept_title',
		array(
			'label'   => 'コンセプトタイトル',
			'section' => 'concept_section',
			'type'    => 'text',
		)
	);
	$wp_customize->add_setting(
		'concept_subtitle',
		array(
			'default'           => '家賃3万円なのに、ゆったり暮らせる。',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'concept_subtitle',
		array(
			'label'   => 'コンセプトサブタイトル',
			'section' => 'concept_section',
			'type'    => 'text',
		)
	);

	$wp_customize->add_section(
		'business_hours',
		array(
			'title'    => '営業時間',
			'priority' => 32,
		)
	);
	$wp_customize->add_setting(
		'business_hours_text',
		array(
			'default'           => '平日 9:00～17:00',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'business_hours_text',
		array(
			'label'   => '営業時間',
			'section' => 'business_hours',
			'type'    => 'text',
		)
	);
	$wp_customize->add_setting(
		'business_holiday_text',
		array(
			'default'           => '定休日 水曜日、祭日',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'business_holiday_text',
		array(
			'label'   => '定休日',
			'section' => 'business_hours',
			'type'    => 'text',
		)
	);

	$wp_customize->add_section(
		'my_footer_section',
		array(
			'title'    => 'フッター設定',
			'priority' => 130,
		)
	);
	$wp_customize->add_setting(
		'my_footer_copyright',
		array(
			'default'           => 'グランドール・シノハラⅠ',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'my_footer_copyright_control',
		array(
			'label'    => 'コピーライト表記',
			'section'  => 'my_footer_section',
			'settings' => 'my_footer_copyright',
			'type'     => 'text',
		)
	);
	$wp_customize->add_setting(
		'my_footer_privacy_url',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'my_footer_privacy_url_control',
		array(
			'label'       => 'プライバシーポリシーページのURL',
			'description' => 'リンク先のURL（例: /privacy/）を入力してください。',
			'section'     => 'my_footer_section',
			'settings'    => 'my_footer_privacy_url',
			'type'        => 'text',
		)
	);
}
add_action( 'customize_register', 'grandeur_shinohara_site_customize_register' );
