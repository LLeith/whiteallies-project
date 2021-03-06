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
  wp_enqueue_style('whiteallie-googlefontJura', "https://fonts.googleapis.com/css2?family=Jura&display=swap", array(), '1.0', 'all');
}
add_action( 'wp_enqueue_scripts', 'whiteallie_register_styles');


// enqueue scripts
function whiteallie_register_scripts(){
  wp_enqueue_script('whiteallie-jquery', 'https://code.jquery.com/jquery-3.5.1.slim.min.js', array(), '3.5.1',true);
  wp_enqueue_script('whiteallie-popper', 'https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js', array(), '4.5.3',true);
  wp_enqueue_script('whiteallie-jsicons', 'https://unpkg.com/ionicons@5.1.2/dist/ionicons.js', array(), '5.1.2',true);
  wp_enqueue_script('whiteallie-responsive-menu', get_template_directory_uri() . "/assets/js/responsive-menu.js", array(), '5.1.2',true);
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
      'before_widget' => '<div class="action">',
      'after_widget' => '</div>',
      'description' => 'Put your Mission Statement here'
    )
  );
  register_sidebar(
    array(
      'name' => "Submit your Story",
      'id' => 'story-form',
      'before_title' => '<h2>',
      'after_title' => '</h2>',
      'before_widget' => '<div class="action">',
      'after_widget' => '</div>',
      'description' => 'The Contact Form for story submissions'
    )
  );
  register_sidebar(
    array(
      'name' => "Let's Talk",
      'id' => 'lets-talk',
      'before_title' => '<h2>',
      'after_title' => '</h2>',
      'before_widget' => '<div class="action">',
      'after_widget' => '</div>',
      'description' => 'Twitter feed etc.'
    )
  );
  register_sidebar(
    array(
      'name' => 'Action Allies',
      'id' => 'action',
      'before_title' => '<h2>',
      'after_title' => '</h2>',
      'before_widget' => '<div class="action">',
      'after_widget' => '</div>',
      'description' => 'Links to site resources'
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
    register_post_type('allies',
        array(
            'labels'      => array(
                'name'          => __('Allies', 'textdomain'),
                'singular_name' => __('Ally', 'textdomain'),
            ),
                'public'      => true,
                'has_archive' => 'allies',
                'capability_type' => 'post',
                'menu_icon' => 'dashicons-groups',
                'hierarchical' => false,
                'supports' => array('title','thumbnail','excerpt', 'editor')
        )
    );
    register_post_type('statistic',
        array(
            'labels'      => array(
                'name'          => __('Statistics', 'textdomain'),
                'singular_name' => __('Statistic', 'textdomain'),
            ),
                'public'      => true,
                'has_archive' => true,
                'menu_icon' => 'dashicons-chart-pie',
                'supports' => array('title','thumbnail','excerpt', 'editor')
        )
    );
    register_post_type('resource',
        array(
            'labels'      => array(
                'name'          => __('Resources', 'textdomain'),
                'singular_name' => __('Resource', 'textdomain'),
            ),
                'public'      => true,
                'has_archive' => true,
                'menu_icon' => 'dashicons-paperclip',
                'supports' => array('title','thumbnail','excerpt', 'editor'),
                'taxonomies' => array('resource_category', 'post_tag'),
        )
    );
    $labels = array(
      'name' => _x( 'Resource Types', 'taxonomy general name' ),
      'singular_name' => _x( 'Resource Type', 'taxonomy singular name' ),
      'search_items' =>  __( 'Search Resource Types' ),
      'all_items' => __( 'All Resource Types' ),
      'parent_item' => __( 'Parent Resource Type' ),
      'parent_item_colon' => __( 'Parent Resource Type:' ),
      'edit_item' => __( 'Edit Resource Type' ),
      'update_item' => __( 'Update Resource Type' ),
      'add_new_item' => __( 'Add New Resource Type' ),
      'new_item_name' => __( 'New Resource Type Name' ),
      'menu_name' => __( 'Resource Types' ),
    );
    register_taxonomy('resource_type',array('resource'), array(
      'hierarchical' => true,
      'labels' => $labels,
      'show_ui' => true,
      'show_in_rest' => true,
      'show_admin_column' => true,
      'query_var' => true,
      'rewrite' => array( 'slug' => 'type' ),
  ));
}
add_action('init', 'waslider_custom_post_type');
add_post_type_support( 'wa_slider', 'thumbnail' );


// Add page excerpt to menu items for Action Allies menu
function wa_nav_menu_page_excerpts( $title, $item, $args, $depth ) {
  if ( $args->menu->name == 'Action Allies Menu' ) {
    $pid = $item->object_id;
    $text = get_the_excerpt($pid);
    if ( !empty($text) ) {
      $title .= '<br><span class="excerpt">'.$text.'</span>';
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


// Remove the limit on the number of posts displayed on archive wa_nav_menu_page_excerpts
add_action( 'pre_get_posts', 'wa_no_limit_posts' );
function wa_no_limit_posts( $query ) {
        $query->set( 'posts_per_page', '-1' );
}


// Add a search form to the main nav menus
add_filter( 'wp_nav_menu_items', 'wa_add_menu_item', 10, 2 );
function wa_add_menu_item ( $items, $args ) {
     if( $args->theme_location == 'primary' ) {
         $items .=  '<li class="menu-item menu-item-type-post_type menu-item-object-page">'.get_search_form(false).'</li>';
        }
         return $items;
  }
