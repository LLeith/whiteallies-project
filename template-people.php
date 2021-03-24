<?php
/**
* Template Name: People Page
*/
get_header();

$loop = new WP_Query( array(
    'post_type' => 'allies',
    'posts_per_page' => -1
  )
);
?>
<main class="wrap">
  <section class="boxes archive">

  <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

    <a href="<?php the_permalink(); ?>">
      <div class="box">
        <?php the_post_thumbnail(); ?>
        <h2><?php the_title(); echo ' ('.get_field('job_title').')'; ?></h2>
        <p><?php echo get_field('quote'); ?></p>
      </div>
    </a>

  <?php endwhile; wp_reset_query(); ?>

  </section>
</main>

<?php
get_footer();
