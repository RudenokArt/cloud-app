<?php


add_action( 'wp_enqueue_scripts', static function () {
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'script_js', get_template_directory_uri() . '/js/script.js');
	wp_enqueue_style( 'style_css', get_stylesheet_directory_uri() . '/css/style.css' );
});

add_filter( 'show_admin_bar', '__return_false' );

add_theme_support('title_tag');
add_theme_support('menus');

add_action('after_setup_theme', static function () {
	include_once get_template_directory().'/php_core/Config.php';
});

add_action( 'edit_user_profile', static function ( $user) {
	$company_id = get_the_author_meta('company_id', $user->ID);
	include_once get_template_directory().'/components/customfield_user_company/index.php';
});
add_action('edit_user_profile_update', static function( $user) {
	update_user_meta( $user, 'company_id', sanitize_text_field( $_POST['company_id']));
});