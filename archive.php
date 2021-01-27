<?php
  get_header();
?>

<article class="boxes">

  <?php
    if( have_posts() ){

      while( have_posts() ){

        the_post();

        get_template_part( 'template-parts/template-article.php');
      }

    }
   ?>
   <?php $page_object = get_queried_object(); ?>
<?php $categoryID= $page_object->cat_ID; ?>

<?php query_posts("cat=$categoryID"); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<a href="<?php the_permalink(); ?>">
  <div class="box">
    <h2><?php the_title(); ?></h2>
    <p><?php the_excerpt(); ?></p>
  </div>
</a>
<?php endwhile; endif; ?>
</article>


<?php
  get_footer();
?>
