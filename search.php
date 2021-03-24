<?php
  get_header();
?>

<article class="">

  <!-- search facility if page not found from 404 -->
  <?php
    if( have_posts() ){

      while( have_posts() ){

        the_post();

        get_template_part( 'template-parts');
      }

    }
   ?>
</article>


<?php
  get_footer();
