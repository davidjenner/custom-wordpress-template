<?php
/*
Mistake log
- when I added the url it had a '/' at the start and the whole function didn't work
- I didn't close off 'followandrew-jquery with a ', so I got an error message
*/

//adds dynamic title theme support
function followandrew_theme_support(){
    add_theme_support('title-tag'); //it's a dash
    add_theme_support('custom-logo'); 
    add_theme_support('post-thumbnails'); 
}



//add it into a hook
add_action('after_setup_theme','followandrew_theme_support');

function followandrew_register_styles(){
    wp_enqueue_style('followandrew-style', get_template_directory_uri() . "/style.css", array('followandrew-bootstrap'), '1.1', 'all');
    wp_enqueue_style('followandrew-bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css", array(), '4.4.1', 'all');
    wp_enqueue_style('followandrew-fontawesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css", array(), '5.13.0', 'all');    
}
add_action( 'wp_enqueue_scripts', 'followandrew_register_styles');

function followandrew_register_scripts(){
//don't use the same script name twice

//jQuery
    wp_enqueue_script('followandrew-jquery', '//code.jquery.com/jquery-3.4.1.slim.min.js', array(), '3.4.1', true);

//Popper
    wp_enqueue_script('followandrew-popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', array(), '3.4.1', true);
    
//Bootstrap
    wp_enqueue_script('followandrew-bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', array(), '3.4.1', true);
    
//self hosted JS - test this again to make sure it loads
    wp_enqueue_script('followandrew-main', get_template_directory_uri(), "/assets/js/main.js". array(), '1.0', true);
}
add_action('wp_enqueue_scripts', 'followandrew_register_scripts');


//menu options and location
function followandrew_menus(){

    $locations = array(
        'primary' => __( 'Primary Menu'),
        'footer'  => __( 'Footer Menu'),
    );
    register_nav_menus($locations);
}

//this adds the menu
add_action('init','followandrew_menus');


function followandrew_widget_areas(){

    register_sidebar(
        array(
            'before_title' => '',
            'after_title' => '',
            'before_widget' => '<ul class="social-list list-inline py-3 mx-auto">',
            'after_widget' => '</ul>',
            'name' => 'Sidebar Area',
            'id' => 'sidebar-1',
            'description' => 'Sidebar Widget Area'
        )
    );

    register_sidebar(
        array(
            'before_title' => '',
            'after_title' => '',
            'before_widget' => '<ul class="social-list list-inline py-3 mx-auto">',
            'after_widget' => '</ul>',
            'name' => 'Footer Area',
            'id' => 'footer-1',
            'description' => 'Footer Widget Area'
        )
    );
}
add_action( 'widgets_init', 'followandrew_widget_areas');
//make sure you say widgets not widgets

?>