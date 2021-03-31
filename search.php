<?php
  get_header();
  global $wp_query;
?>

<main class="wrap">
  <h1 class="search-title"> <?php echo $wp_query->found_posts; ?>
        <?php _e( 'Search Results Found For', 'locale' ); ?>: "<?php the_search_query(); ?>" </h1>
  <section id="results" class="boxes">

  <!-- search facility if page not found from 404 -->
  <?php
    if( have_posts() ){

      while( have_posts() ){

        the_post(); ?>
        <a href="<?php echo get_permalink(); ?>">
          <div class="box">
             <h3><?php the_ID(); ?>: <?php the_title();  ?></h3>
           </div>
         </a>
         <?php
      }

    }
   ?>
   </section>
</main>


<?php
  get_footer();
