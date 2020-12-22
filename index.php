<?php get_header(); ?>
<main class="wrap">
  <section class="content-area content-thin">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<article class="article-loop">
  <header>
<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"<?php the_title(); ?></a></h2>
<h3>By: <?php the_author(); ?></h3>
<h4>Posted on <?php the_time('F jS, Y') ?></h4>
</header>
<p><?php the_excerpt(); ?></p>
</article>
<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>


</section><?php get_sidebar(); ?>

</main>
<?php get_footer(); ?>