<?php

//adding css and js files

function krpiceKodBubice_setup()
{
    wp_enqueue_style('google-fonts', '//fonts.googleapis.com/css?family=Roboto|Roboto+Condensed|Roboto+Slab&display=swap');
    wp_enqueue_style('fontawesome', '//use.fontawesome.com/releases/v5.1.0/css/all.css');
    wp_enqueue_style('style', get_stylesheet_uri(), NULL, microtime(), 'all');
    wp_enqueue_script("main", get_theme_file_uri('/js/main.js'), NULL, microtime(), true);
}

add_action('wp_enqueue_scripts', 'krpiceKodBubice_setup');

function krpiceKodBubice_init()
{
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support(
        'html5',
        [
            'comment-list',
            'comment-form',
            'search-form'
        ]
    );
}
add_action('after_setup_theme', 'krpiceKodBubice_init');

//podt type

function krpiceKodBubice_custom_post_type()
{
    register_post_type(
        'shop',
        [
            'rewrite' => ['slug' => 'shops'],
            'labels' => [
                'name' => 'Shop',
                'singular_name' => 'Shop',
                'add_new_item' => 'Add New Item',
                'edit_item' => 'Edit Item'
            ],
            'menu-icon' => 'dashicons-plus',
            'public' => true,
            'has_archive' => true,
            'supports' =>
            [
                'title', 'thumbnail', 'editor', 'excerpt', 'comments'
            ]
        ]
    );
}
add_action('init', 'krpiceKodBubice_custom_post_type');

function krpiceKodBubice_widgets()
{
    register_sidebar([
        'name' => 'Main Sidebar',
        'id' => 'main_sidebar',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ]);
}
add_action('widgets_init', 'krpiceKodBubice_widgets');
