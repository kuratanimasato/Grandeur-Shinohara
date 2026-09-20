<?php
/**
 * Navigation, term links, and breadcrumbs.
 *
 * @package grandeur-shinohara
 */

/**
 * Exclude unpublished posts from the header menu.
 *
 * @param array    $items Menu items.
 * @param WP_Term  $menu  Menu object.
 * @param stdClass $args  Menu arguments.
 * @return array
 */
function grandeur_shinohara_exclude_unpublished_rooms_from_header_menu( $items, $menu, $args ) {
	if ( is_admin() || ( isset( $args->theme_location ) && 'header' !== $args->theme_location ) ) {
		return $items;
	}

	return array_filter(
		$items,
		function ( $item ) {
			if ( 'post' === $item->object || 'page' === $item->object || 'post_type' === $item->type ) {
				return 'publish' === get_post_status( $item->object_id );
			}

			return true;
		}
	);
}
add_filter( 'wp_get_nav_menu_items', 'grandeur_shinohara_exclude_unpublished_rooms_from_header_menu', 10, 3 );

/**
 * Add a custom class to menu list items.
 *
 * @param array    $classes Menu item classes.
 * @param WP_Post  $item    Menu item.
 * @param stdClass $args    Menu arguments.
 * @return array
 */
function grandeur_shinohara_add_li_class( $classes, $item, $args ) {
	if ( isset( $args->add_li_class ) ) {
		$classes[] = $args->add_li_class;
	}
	return $classes;
}
add_filter( 'nav_menu_css_class', 'grandeur_shinohara_add_li_class', 1, 3 );

/**
 * Add a mobile custom class to menu list items.
 *
 * @param array    $classes Menu item classes.
 * @param WP_Post  $item    Menu item.
 * @param stdClass $args    Menu arguments.
 * @return array
 */
function grandeur_shinohara_add_mobile_li_class( $classes, $item, $args ) {
	if ( isset( $args->add_li_class_sp ) ) {
		$classes[] = $args->add_li_class_sp;
	}
	return $classes;
}
add_filter( 'nav_menu_css_class', 'grandeur_shinohara_add_mobile_li_class', 1, 3 );

/**
 * Add a footer custom class to menu list items.
 *
 * @param array    $classes Menu item classes.
 * @param WP_Post  $item    Menu item.
 * @param stdClass $args    Menu arguments.
 * @return array
 */
function grandeur_shinohara_add_footer_li_class( $classes, $item, $args ) {
	if ( isset( $args->footer_add_li_class ) ) {
		$classes[] = $args->footer_add_li_class;
	}
	return $classes;
}
add_filter( 'nav_menu_css_class', 'grandeur_shinohara_add_footer_li_class', 1, 3 );

/**
 * Add custom attributes to header menu links.
 *
 * @param array    $atts  Link attributes.
 * @param WP_Post  $item  Menu item.
 * @param stdClass $args  Menu arguments.
 * @return array
 */
function grandeur_shinohara_add_link_class( $atts, $item, $args ) {
	if ( isset( $args->add_a_class ) ) {
		$atts['class'] = $args->add_a_class;
	}
	if ( 'お部屋情報' === $item->title ) {
		$atts['href']    = '#';
		$atts['onclick'] = 'return false;';
		$atts['style']   = 'cursor: default;';
	}
	return $atts;
}
add_filter( 'nav_menu_link_attributes', 'grandeur_shinohara_add_link_class', 1, 3 );

/**
 * Add custom attributes to mobile menu links.
 *
 * @param array    $atts  Link attributes.
 * @param WP_Post  $item  Menu item.
 * @param stdClass $args  Menu arguments.
 * @return array
 */
function grandeur_shinohara_add_mobile_link_class( $atts, $item, $args ) {
	if ( isset( $args->add_a_class_sp ) ) {
		$atts['class'] = $args->add_a_class_sp;
	}
	if ( 'お部屋情報' === $item->title ) {
		$atts['href']    = '#';
		$atts['onclick'] = 'return false;';
	}
	return $atts;
}
add_filter( 'nav_menu_link_attributes', 'grandeur_shinohara_add_mobile_link_class', 1, 3 );

/**
 * Customize property category term links.
 *
 * @param string  $link     Term link.
 * @param WP_Term $term     Term object.
 * @param string  $taxonomy Taxonomy name.
 * @return string
 */
function grandeur_shinohara_custom_term_link( $link, $term, $taxonomy ) {
	if ( 'property_category' === $taxonomy ) {
		return add_query_arg( 'apartment', $term->slug, get_permalink( get_page_by_path( 'property' ) ) );
	}
	return $link;
}
add_filter( 'term_link', 'grandeur_shinohara_custom_term_link', 10, 3 );

/**
 * Render the site breadcrumb list.
 */
function grandeur_shinohara_breadcrumb() {
	$home = '<li><a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'ホーム', 'grandeur-shinohara' ) . '</a></li>';
	echo '<ul class="breadcrumb">';

	if ( is_post_type_archive() ) {
		echo wp_kses_post( $home );
		echo '<li>' . esc_html( post_type_archive_title( '', false ) ) . '</li>';
	} elseif ( is_single() ) {
		echo wp_kses_post( $home );
		$tags = get_the_tags();
		if ( $tags ) {
			foreach ( $tags as $tag ) {
				echo '<li><a href="' . esc_url( get_tag_link( $tag->term_id ) ) . '">' . esc_html( $tag->name ) . '</a></li>';
			}
		}
		echo '<li>' . esc_html( get_the_title() ) . '</li>';
	} elseif ( is_page() ) {
		echo wp_kses_post( $home );
		echo '<li>' . esc_html( get_the_title() ) . '</li>';
	} elseif ( is_404() ) {
		echo wp_kses_post( $home );
		echo '<li>' . esc_html__( 'ページが見つかりません', 'grandeur-shinohara' ) . '</li>';
	}

	echo '</ul>';
}

add_filter(
	'get_the_archive_title',
	function ( $title ) {
		if ( is_category() ) {
			return single_cat_title( '', false );
		}
		if ( is_tag() ) {
			return single_tag_title( '', false );
		}
		if ( is_month() ) {
			return single_month_title( '', false );
		}
		if ( is_post_type_archive() ) {
			return post_type_archive_title( '', false );
		}
		if ( is_archive() ) {
			return 'ブログ';
		}
		return $title;
	}
);
