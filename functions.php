<?php

function whiteallie_theme_support(){
// Adds dynamic title tag support
add_theme_support('title-tag');
// Adds ability for admin to update Logo
add_theme_support('custom-logo');
// ability to add a thumbnail as a featured image to posts
add_theme_support('post-thumbnails');
// ability to add Excerpts to pages
add_post_type_support('page', 'excerpt');
}
add_action('after_setup_theme', 'whiteallie_theme_support');



// create menus in the cms for the navs
function whiteallie_menus() {
  $locations = array(
    'primary' => "Desktop primary top nav",
    'secondary' => "Action Allies (front page)",
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
      'name' => 'Footer Area',
      'id' => 'footer-1',
      'before_title' => '<h2>',
      'after_title' => '</h2>',
      'before_widget' => '',
      'after_widget' => '<p>White Allies &copy; '.date('Y').'</p>',
      'description' => 'Footer Widget area'
    )
  );
  register_sidebar(
    array(
      'name' => 'Mission',
      'id' => 'mission',
      'before_title' => '<h2>',
      'after_title' => '</h2>',
      'before_widget' => '<section id="mission">',
      'after_widget' => '</section>',
      'description' => 'Put your Mission Statement here'
    )
  );
}
add_action( 'widgets_init', 'whiteallie_widget_areas');

// Adds a Custom Post Type to use for the Slider in the front page template
function waslider_custom_post_type() {
    register_post_type('wa_slider',
        array(
            'labels'      => array(
                'name'          => __('Slides', 'textdomain'),
                'singular_name' => __('Slide', 'textdomain'),
            ),
                'public'      => true,
                'has_archive' => true,
                'menu_icon' => 'dashicons-format-gallery',
        )
    );
}
add_action('init', 'waslider_custom_post_type');
add_post_type_support( 'wa_slider', 'thumbnail' );


// Add page excerpt to menu items for Action Allies menu
function wa_nav_menu_page_excerpts( $title, $item, $args, $depth ) {
  if ( $args->menu->name == 'Action Allies Menu' ) {
    $pid = $item->object_id;
    $text = get_the_excerpt($pid);
    if ( !empty($text) ) {
      $title .= ' <span class="excerpt">- '.$text.'</span>';
    }
  }
  return $title;
}
add_filter( 'nav_menu_item_title', 'wa_nav_menu_page_excerpts', 10, 4 );

// Add custom class to menu items in Action Allies menu
function wa_menu_classes( $classes, $item, $args ) {
  if ( $args->menu->name == 'Action Allies Menu' ) {
    $classes[] = 'action-btn';
  }
  return $classes;
}
add_filter( 'nav_menu_css_class', 'wa_menu_classes', 1, 3 );
?>
