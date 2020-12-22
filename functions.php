<?php 

function whiteallie_theme_support(){
// Adds dynamic title tag support
add_theme_support('title-tag');
// Adds ability for admin to update Logo 
add_theme_support('custom-logo');
// ability to add a thumbnail as a featured image to posts
add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'whiteallie_theme_support');



// create menus in the cms for the navs
function whiteallie_menus() {
  $locations = array(
    'primary' => "Desktop primary top nav",
    'footer' => "Footer menu items"
  );
  register_nav_menus($locations);
}
add_action('init','whiteallie_menus');




// enqueue styles
function whiteallie_register_styles(){
  
  $version = wp_get_theme()->get( 'Version' );
  wp_enqueue_style('whiteallie-style', get_template_directory_uri() . "/style.css", array('whiteallie-bootstrap'), $version, 'all');
  wp_enqueue_style('whiteallie-bootstrap', "https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css", array(), '4.5.3', 'all');
  wp_enqueue_style('whiteallie-googlefontKrona', "https://fonts.googleapis.com/css2?family=Krona+One&display=swap", array(), '1.0', 'all');
  wp_enqueue_style('whiteallie-googlefontSpartan', "https://fonts.googleapis.com/css2?family=Spartan&display=swap", array(), '1.0', 'all');
}
add_action( 'wp_enqueue_scripts', 'whiteallie_register_styles');


// enqueue scripts
function whiteallie_register_scripts(){  
  wp_enqueue_script('whiteallie-jquery', 'https://code.jquery.com/jquery-3.5.1.slim.min.js', array(), '3.5.1',true);
  wp_enqueue_script('whiteallie-popper', 'https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js', array(), '4.5.3',true);
  wp_enqueue_script('whiteallie-jsicons', 'https://unpkg.com/ionicons@5.1.2/dist/ionicons.js', array(), '5.1.2',true);  
}
add_action( 'wp_enqueue_scripts', 'whiteallie_register_scripts');


// allows admin to add widgets into a footer area.
function whiteallie_widget_areas(){
  register_sidebar(
    array(
      'before_title' => '<h2>',
      'after_title' => '</h2>',
      'before_widget' => '',
      'after_widget' => '',
      'name' => 'Footer Area',
      'id' => 'footer-1',
      'description' => 'Footer Widget area'
    )
  );
}
add_action( 'widgets_init', 'whiteallie_widget_areas');

 ?>