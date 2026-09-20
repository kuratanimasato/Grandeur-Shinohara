<?php
/**
 * Custom post types, taxonomies, and blog archive handling.
 *
 * @package grandeur-shinohara
 */

/**
 * Register custom post types and taxonomies.
 */
function grandeur_shinohara_register_content_types() {
	register_post_type(
		'property',
		array(
			'labels'       => array(
				'name'          => 'お部屋情報',
				'singular_name' => 'property',
				'menu_name'     => 'お部屋情報',
				'add_new'       => '新規追加',
				'add_new_item'  => '新しいお部屋情報を追加',
				'edit_item'     => 'お部屋情報を編集',
			),
			'public'       => true,
			'has_archive'  => true,
			'menu_icon'    => 'dashicons-admin-home',
			'show_in_rest' => true,
			'supports'     => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
			'taxonomies'   => array( 'post_tag' ),
			'rewrite'      => array( 'slug' => 'property' ),
		)
	);

	register_post_type(
		'blog',
		array(
			'labels'       => array(
				'name'          => 'ブログ',
				'singular_name' => 'blog',
				'menu_name'     => 'ブログ',
				'add_new'       => '新規追加',
				'add_new_item'  => '新しいブログを追加',
				'edit_item'     => 'ブログを編集',
			),
			'public'       => true,
			'has_archive'  => true,
			'menu_icon'    => 'dashicons-edit',
			'show_in_rest' => true,
			'supports'     => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments', 'custom-fields' ),
			'taxonomies'   => array( 'blog_category' ),
			'hierarchical' => false,
			'rewrite'      => array( 'slug' => 'blog' ),
		)
	);

	register_taxonomy( 'blog_category', 'blog', grandeur_shinohara_blog_category_args() );
	register_taxonomy( 'property_category', 'property', grandeur_shinohara_property_category_args() );
}
add_action( 'init', 'grandeur_shinohara_register_content_types' );

/**
 * Return blog category registration arguments.
 *
 * @return array
 */
function grandeur_shinohara_blog_category_args() {
	return array(
		'labels'            => array(
			'name'              => 'カテゴリー',
			'singular_name'     => 'blog_category',
			'search_items'      => 'カテゴリーを検索',
			'all_items'         => 'すべてのカテゴリー',
			'parent_item'       => '親のカテゴリー',
			'parent_item_colon' => '親のカテゴリー:',
			'edit_item'         => 'カテゴリーを編集',
			'update_item'       => 'カテゴリーを更新',
			'add_new_item'      => '新しいカテゴリーを追加',
			'new_item_name'     => '新規カテゴリー名',
			'menu_name'         => 'カテゴリー',
		),
		'hierarchical'      => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_rest'      => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'blog-category' ),
	);
}

/**
 * Return property category registration arguments.
 *
 * @return array
 */
function grandeur_shinohara_property_category_args() {
	return array(
		'labels'            => array(
			'name'              => '物件種別',
			'singular_name'     => 'property_category',
			'search_items'      => '物件種別を検索',
			'all_items'         => 'すべての物件種別',
			'parent_item'       => '親の種別',
			'parent_item_colon' => '親の種別:',
			'edit_item'         => '物件種別を編集',
			'update_item'       => '物件種別を更新',
			'add_new_item'      => '新しい物件種別を追加',
			'new_item_name'     => '新規物件種別名',
			'menu_name'         => '物件種別',
		),
		'hierarchical'      => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_rest'      => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'property-type' ),
	);
}

/**
 * Filter the SQL clause used for blog archives.
 *
 * @param string $where Existing SQL WHERE clause.
 * @param array  $r     Archive arguments.
 * @return string
 */
function grandeur_shinohara_blog_archives_where( $where, $r ) {
	if ( is_singular( 'blog' ) || is_post_type_archive( 'blog' ) || is_tax( 'blog_category' ) || ( isset( $r['post_type'] ) && 'blog' === sanitize_key( $r['post_type'] ) ) ) {
		$where = str_replace( "post_type = 'post'", "post_type = 'blog'", $where );
	}
	return $where;
}
add_filter( 'getarchives_where', 'grandeur_shinohara_blog_archives_where', 10, 2 );

/**
 * Add the blog post type to archive links.
 *
 * @param string $link_html Archive link HTML.
 * @param string $url       Archive URL.
 * @param string $text      Archive link text.
 * @param string $format    Archive link format.
 * @param string $before    Content before the link.
 * @param string $after     Content after the link.
 * @return string
 */
function grandeur_shinohara_blog_archives_link( $link_html, $url, $text, $format, $before, $after ) {
	$post_type = isset( $_GET['post_type'] ) ? sanitize_key( wp_unslash( $_GET['post_type'] ) ) : '';
	if ( is_singular( 'blog' ) || is_post_type_archive( 'blog' ) || is_tax( 'blog_category' ) || 'blog' === $post_type ) {
		$new_url   = add_query_arg( 'post_type', 'blog', $url );
		$link_html = str_replace( esc_url( $url ), esc_url( $new_url ), $link_html );
	}
	return $link_html;
}
add_filter( 'get_archives_link', 'grandeur_shinohara_blog_archives_link', 10, 6 );
