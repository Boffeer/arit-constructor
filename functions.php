<?php
function arit_styles()
{

	if (get_page_template_slug() == 'template-crb-landing.php') {
		wp_enqueue_style('bayan-css', get_template_directory_uri() . '/assets/bayan/bayan.min.css');
		wp_enqueue_script('bayan-js', get_template_directory_uri() . '/assets/bayan/bayan.js', array(), '1.0.0', true);
	}

	wp_enqueue_style('swipercss', 'https://unpkg.com/swiper/swiper-bundle.min.css');
	wp_enqueue_style('poppa-css', get_template_directory_uri() . '/assets/poppa/poppa.min.css');
	wp_enqueue_style('style', get_template_directory_uri() . '/css/style.css');
	wp_register_script('swiperjs', 'https://unpkg.com/swiper/swiper-bundle.min.js', '', '1.0.0', false);
	wp_enqueue_script('swiperjs');
	wp_enqueue_script('poppa-js', get_template_directory_uri() . '/assets/poppa/poppa.js', array(), '1.0.0', true);
	wp_enqueue_script('incdex-scripts', get_template_directory_uri() . '/js/index.js', '', '1.0.0', true);

	if (get_page_template_slug() == 'template-crb-landing.php') {
		wp_enqueue_style('crb-landing', get_template_directory_uri() . '/css/crb-landing.min.css');
		wp_enqueue_script('crb-landing-scripts', get_template_directory_uri() . '/js/crb-landing.js', '', '1.0.0', true);
	}
}
add_action('wp_enqueue_scripts', 'arit_styles');


// add_action( 'init', 'register_post_types' );
// function register_post_types(){
//   register_post_type( 'testimonials', array(
//     'labels'             => array(
//       'name'               => 'Отзыв',
//       'singular_name'      => 'Отзыв',
//       'add_new'            => 'Добавить новый',
//       'add_new_item'       => 'Добавить отзыв',
//       'edit_item'          => 'Редактировать отзыв',
//       'new_item'           => 'Новый отзыв',
//       'view_item'          => 'Посмотреть отзыв',
//       'search_items'       => 'Найти отзыв',
//       'not_found'          => 'Отзывов не найдено',
//       'not_found_in_trash' => 'Удаленных отзывов не найдено',
//       'parent_item_colon'  => '',
//       'menu_name'          => 'Отзывы',
//     ),
//     'public'             => true,
//     'publicly_queryable' => true,
//     'show_ui'            => true,
//     'show_in_menu'       => true,
//     'query_var'          => true,
//     'rewrite'            => true,
//     'capability_type'    => 'post',
//     'has_archive'        => true,
//     'hierarchical'       => false,
//     'menu_position'      => null,
//     'supports'           => array('title','editor','author','thumbnail','excerpt','comments'),
//     'menu_icon'          => 'dashicons-thumbs-up',
//   ) );
// }

/* Должен быть обработчик писем, но не работает так*/
if (function_exists('add_theme_support')) {
	add_theme_support('menus');
}

function mihdan_debug_wp_mail($wp_error)
{
	return error_log(print_r($wp_error, true));
}
add_action('wp_mail_failed', 'mihdan_debug_wp_mail', 10, 1);


/*===   Security   ===*/

// Hide WP version
function wp_version_remove_version()
{
	return '';
}
add_filter('the_generator', 'wp_version_remove_version');


require_once 'includes/carbon-fields/carbon-fields-plugin.php';
