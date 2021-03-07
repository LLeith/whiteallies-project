<!DOCTYPE html>
  <html lang="en">

  <head>

    <!-- Meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="White allies wordpress theme">
    <meta name="keywords" content="racism, white allies, activism">
    <meta name="author" content="web developer apprentice network">
    <!-- <link rel="icon" href="/wp-content/themes/white-allies/assets/images/white_allies_logo_200x200.png" -->

    <?php
    wp_head();
     ?>
  </head>
  <body>
    <div class="wrapper">
      <!-- navigation -->
      <?php
      if(function_exists('the_custom_logo')){
          $custom_logo_id = get_theme_mod('custom_logo');
          $logo = wp_get_attachment_image_src($custom_logo_id);
      }
      ?>
      <nav class="main">

        <?php the_custom_logo(); ?>
        <?php
          wp_nav_menu(
            array(
                'menu' => 'primary',
                'container' => '',
                'theme_location' => 'primary',
                'items_wrap' => '<ul id="main-nav" class="navigation">%3$s</ul>'
              )
            );
         ?>
         <?php
           wp_nav_menu(
             array(
                 'menu' => 'primary',
                 'container' => '',
                 'theme_location' => 'primary',
                 'items_wrap' => '<div class="mobile-menu-toggle">
                                   <img src="'.get_template_directory_uri() . '/assets/images/hamburger-icon.png" width="30px" id="hamburger">
                                   <ul id="mobile-nav" class="navigation menu">
                                   %3$s
                                   </ul>'
               )
             );
          ?>
      </nav>
