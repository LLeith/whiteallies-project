<?php 
  get_header();
?>

<article class="">
  
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
?>