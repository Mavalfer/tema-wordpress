<?php


add_theme_support('post-thumbnails'); //añadir post thumnails en el backend

/**
     * 
     * Deregister WordPress default jQuery
     * Register and Enqueue Google CDN jQuery
     * 
     */
    function load_external_jQuery() { // load external file  
        wp_deregister_script( 'jquery' ); // deregisters the default WordPress jQuery  
        wp_register_script('jquery', "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js", array(), false, false);
        wp_enqueue_script('jquery');
    }  
    add_action('wp_enqueue_scripts', 'load_external_jQuery');

function theme_scripts() {
    
    // wp_register_script('jqueryboot', get_template_directory_uri() . '/vendor/jquery/jquery.js', array('jquery'));
    // wp_enqueue_script('jqueryboot');
     
    // wp_register_script('bootstrap', get_template_directory_uri() . '/vendor/bootstrap/js/bootstrap.js', array('bootstrapbundle'));
    // wp_enqueue_script('bootstrap');
        
    // wp_register_script('bootstrapmin', get_template_directory_uri() . '/vendor/bootstrap/js/bootstrap.min.js', array('bootstrapbundlemin'));
    // wp_enqueue_script('bootstrapmin');
     
    // wp_register_script('', get_template_directory_uri() . '',array('jquery'));
    // wp_enqueue_script('');
    
    // wp_register_script('bootstrapbundle', get_template_directory_uri() . '/vendor/bootstrap/js/bootstrap.bundle.js', array('jquerybootmin'));
    // wp_enqueue_script('bootstrapbundle');
    
    // wp_register_script('jquerybootmin', get_template_directory_uri() . '/vendor/jquery/jquery.min.js', array('jquery'));
    // wp_enqueue_script('jquerybootmin');
    
    wp_register_script('bootstrapbundlemin', get_template_directory_uri() . '/vendor/bootstrap/js/bootstrap.bundle.min.js', array('jquery'));
    wp_enqueue_script('bootstrapbundlemin');

}

add_action('wp_enqueue_scripts','theme_scripts');