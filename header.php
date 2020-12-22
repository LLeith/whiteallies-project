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
    <link rel="shortcut icon" href="/wp-content/themes/white-allies/assets/images/white_allies_logo_200x200.png"

    
    <?php 
    wp_head();
     ?>
    

  </head>

  <body>
    <div class="wrapper">
      <!-- navigation -->
      <?php 
      if(function_exists('the_custom_logo')){
          $custom_logo_id = get_theme_mod
          ('custom_logo');
          $logo = wp_get_attachment_image_src
          ($custom_logo_id);
      }
      ?>
      <div class="logo"><a href="<?php echo site_url() ?>"><img src="<?php echo $logo[0]; ?>" width="100" height="100" alt="white allies logo"></a></div>
      <nav>
        
        <?php 
          wp_nav_menu(
            array(
                'menu' => 'primary',
                'container' => '',
                'theme_location' => 'primary',
                'items_wrap' => '<ul id="" class="navigation">%3$s</ul>'
              )    
            );
         ?>
         
        <!-- <ul class="navigation">
          <li class="nav-item"><a href="#mission">Home</a></li>
          <li class="nav-item"><a href="#info">Our Story</a></li>
          <li class="nav-item"><a href="#action_allies">Action Allies</a></li>
          <li class="nav-item"><a href="#">Contact</a></li>
          <li class="nav-item"><a href="#">Donate</a></li>
        </ul> -->
      </nav>