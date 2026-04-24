<?php 
/**
 * Enqueue theme styles
 */
add_action('wp_enqueue_scripts', 'customtheme_enqueue_styles');
function customtheme_enqueue_styles() {
    // Main theme stylesheet
    wp_enqueue_style('customtheme-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'));
    
    // Global styles
    wp_enqueue_style('customtheme-globals', get_template_directory_uri() . '/assets/css/globals.css', array(), wp_get_theme()->get('Version'));
    
    // FAQ styles
    wp_enqueue_style('customtheme-faq', get_template_directory_uri() . '/assets/css/faq.css', array('customtheme-globals'), wp_get_theme()->get('Version'));

		// Services styles
    wp_enqueue_style('customtheme-services', get_template_directory_uri() . '/assets/css/services.css', array('customtheme-globals'), wp_get_theme()->get('Version'));

		// Hero styles
    wp_enqueue_style('customtheme-hero', get_template_directory_uri() . '/assets/css/hero.css', array('customtheme-globals'), wp_get_theme()->get('Version'));
}

add_action('wp_enqueue_scripts', function() {
    wp_enqueue_script('faq-js', get_template_directory_uri() . '/assets/js/faq.js', array('jquery'), '1.0', true);
    wp_enqueue_script('services-js', get_template_directory_uri() . '/assets/js/services.js', array(), '1.0', true);
    wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0', true);
});

add_filter( 'upload_mimes', function( $mimes ) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
} );

if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title'    => 'Site Social Settings',
        'menu_title'    => 'Social Settings',
        'menu_slug'     => 'social-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
}

if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title'    => 'Site Header',
        'menu_title'    => 'Header Settings',
        'menu_slug'     => 'logo-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
}

add_theme_support( 'menus' );
?>