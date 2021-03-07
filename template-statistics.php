<?php
/**
* Template Name: Statistics Page
*/
get_header();

$loop = new WP_Query( array(
    'post_type' => 'statistic',
    'posts_per_page' => -1
  )
);
?>
<section class="boxes archive">

<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

  <a href="<?php the_permalink(); ?>">
    <div class="box">
      <?php the_post_thumbnail(); ?>
      <h2><?php the_title();; ?></h2>
      <p><?php the_excerpt(); ?></p>
    </div>
  </a>

<?php endwhile; wp_reset_query(); ?>

</section>

<?php
get_footer();
?>
