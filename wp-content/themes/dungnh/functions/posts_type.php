<?php

// Method 1: Filter.
function my_acf_google_map_api( $api ){
    $api['key'] = 'AIzaSyCJ-80rtZ_3IqgB9_Q7OwK_20qPf3NlArs';
    return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

function pp_create_post_type($args)
{

    if (!is_array($args) || !$args['post_type'] || !$args['name'] || !$args['single'] || !$args['slug']) return;

    $post_type = $args['post_type'];

    $name = $args['name'];

    $single = $args['single'];

    $icon = $args['icon'] ? $args['icon'] : "dashicons-star-filled";

    $archive = isset($args['archive']) ? $args['archive'] : true;

    $slug = $args['slug'];

    $rewrite = (isset($args['rewrite'])) ? $args['rewrite'] : $args['slug'];

    $supports = isset($args['supports']) ? $args['supports'] : array('title', 'editor', 'revisions', 'thumbnail', 'author', 'excerpt', 'comments');

    $public = isset($args['public']) ? $args['public'] : true;

    $capabilities = isset($args['capabilities']) ? $args['capabilities'] : array();

    register_post_type($post_type, array(

        'labels' => array(

            'name' => __($name, 'pp'),

            'singular_name' => __($single, 'pp'),

            'add_new' => __('Add New ' . $single, 'pp'),

            'add_new_item' => __('Add New ' . $single, 'pp'),


            'edit_item' => __('Edit ' . $single, 'pp'),


            'new_item' => __('New' . $single, 'pp'),


            'all_items' => __('All ' . $name, 'pp'),


            'view_item' => __('View ' . $single, 'pp'),


            'search_items' => __('Filter By ' . $name, 'pp'),


            'not_found' => __('Not Found ' . $single, 'pp'),


            'not_found_in_trash' => __('Not Found ' . $single . ' In Trash', 'pp'),


            'parent_item_colon' => '',


            'menu_name' => __($name, 'pp')


        ),


        'public' => $public,
        'exclude_from_search' => false,
        'menu_position' => 6,
        'menu_icon' => $icon,
        'has_archive' => $archive,
        'taxonomies' => array($post_type),
        'rewrite' => array('slug' => $rewrite),
        'publicly_queryable' => $public,
        'supports' => $supports,
        'capabilities' => $capabilities,
    ));
}


add_action('init', 'create_new_custom_post_type');


function create_new_custom_post_type()
{
    $args = array(
        array(
            "post_type" => 'can-ho',
            "name" => __('Rent', 'dungh.dev'),
            "single" => __('Rent', 'dungh.dev'),
            "slug" => "can-ho",
            "rewrite" => 'cho-thue',
            "supports" => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'revisions', 'comments'),
            "icon" => 'dashicons-star-filled',
            "archive" => true,
        ),

        // array(
        //     "post_type" => 'property',
        //     "name" => __('Property', 'dungh.dev'),
        //     "single" => __('Property', 'dungh.dev'),
        //     "slug" => "property",
        //     "rewrite" => "mua-ban-bds",
        //     "supports" => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'revisions', 'comments'),
        //     "icon" => 'dashicons-star-filled',
        //     "archive" => true,
        // ),

    );

    foreach ($args as $arg) {
        if ($arg['post_type']) {
            pp_create_post_type($arg);
        }
    }
}


function pp_create_taxonomy($args)
{

    if (!is_array($args) || !$args['post_type'] || !$args['name'] || !$args['single'] || !$args['taxonomy'] || !$args['slug']) return;

    $post_type = $args['post_type'];

    $name = $args['name'];

    $single = $args['single'];

    $slug = $args['slug'];

    $rewrite = (isset($args['rewrite'])) ? $args['rewrite'] : $slug;

    $taxonomy = $args['taxonomy'];

    $labels = array(

        'name' => __($name, 'pp'),

        'singular_name' => __($single, 'pp'),

        'search_items' => __('Filter By ' . $name, 'pp'),

        'popular_items' => __('Popular ' . $name, 'pp'),

        'all_items' => __('All ' . $name, 'pp'),

        'parent_item' => null,

        'parent_item_colon' => null,

        'edit_item' => __('Edit ' . $single, 'pp'),

        'update_item' => __('Update ' . $single, 'pp'),

        'add_new_item' => __('Add New ' . $single, 'pp'),

        'new_item_name' => __('Add New ' . $single, 'pp'),

        'menu_name' => __($name, 'pp'),

    );


    $args = array(

        'hierarchical' => true,

        'labels' => $labels,

        'show_ui' => true,

        'show_admin_column' => true,

        'query_var' => true,

        'rewrite' => array('slug' => $rewrite),

    );

    register_taxonomy($taxonomy, $post_type, $args);
}


function create_custom_taxonomies()


{
    $args = array(
        // array(

        //     "post_type" => array('property'),

        //     "name" => __('Loại BĐS', 'dungh.dev'),

        //     "single" => __('Loại BĐS', 'dungh.dev'),

        //     "slug" => "loai-bds",

        //     "rewrite" => "loai-bds",

        //     "taxonomy" => "loai-bds",
        // ),
        
		// array(
        //     "post_type" => array('property'),
        //     "name" => __('Hướng', 'dungh.dev'),
        //     "single" => __('Hướng', 'dungh.dev'),
        //     "slug" => "huong-nha",
        //     "rewrite" => "huong-nha",
        //     "taxonomy" => "huong-nha",
        // ),

        array(
            "post_type" => array('can-ho'),
            "name" => __('Dự án', 'dungh.dev'),
            "single" => __('Dự án', 'dungh.dev'),
            "slug" => "du-an",
            "rewrite" => "du-an",
            "taxonomy" => "du-an",
        ),

        array(
            "post_type" => array('can-ho'),
            "name" => __('Danh mục căn hộ', 'dungh.dev'),
            "single" => __('Danh mục căn hộ', 'dungh.dev'),
            "slug" => "danh-muc-can-ho",
            "rewrite" => "danh-muc-can-ho",
            "taxonomy" => "danh-muc-can-ho",
        ),

        array(
            "post_type" => array('can-ho'),
            "name" => __('Danh mục loại phòng', 'dungh.dev'),
            "single" => __('Danh mục loại phòng', 'dungh.dev'),
            "slug" => "danh-muc-loai-phong",
            "rewrite" => "danh-muc-loai-phong",
            "taxonomy" => "danh-muc-loai-phong",
        ),


    );


    foreach ($args as $arg) {
        if (!empty($arg['post_type'])) {
            pp_create_taxonomy($arg);
        }
    }
}

add_action('init', 'create_custom_taxonomies', 0);