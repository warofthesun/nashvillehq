<?php
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {

    $parent_style = 'twentytwenty-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}

// 1. customize ACF path
add_filter('acf/settings/path', 'my_acf_settings_path');
function my_acf_settings_path( $path ) {
    // update path
    $path = get_stylesheet_directory() . '/inc/acf/';
    // return
    return $path;
}
// 2. customize ACF dir
add_filter('acf/settings/dir', 'my_acf_settings_dir');
function my_acf_settings_dir( $dir ) {
    // update path
    $dir = get_stylesheet_directory_uri() . '/inc/acf/';
    // return
    return $dir;
}
// 3. Hide ACF field group menu item
//add_filter('acf/settings/show_admin', '__return_false');

// 4. Include ACF
include_once( get_stylesheet_directory() . '/inc/acf/acf.php' );

// Turn on ACF Options Page
//if( function_exists('acf_add_options_page') ) {
//
//	acf_add_options_page(array(
//		'page_title' 	=> 'Theme General Settings',
//		'menu_title'	=> 'Theme Settings',
//		'menu_slug' 	=> 'theme-general-settings',
//		'capability'	=> 'edit_posts',
//		'redirect'		=> false
//	));
//
//	acf_add_options_sub_page(array(
//		'page_title' 	=> 'Theme Header Settings',
//		'menu_title'	=> 'Header',
//		'parent_slug'	=> 'theme-general-settings',
//	));
//
//	acf_add_options_sub_page(array(
//		'page_title' 	=> 'Theme Footer Settings',
//		'menu_title'	=> 'Footer',
//		'parent_slug'	=> 'theme-general-settings',
//	));

};
