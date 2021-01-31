<?php get_header(); ?>
<main class="wrap">
  <section class="content-area content-thin">
    <section class="content-area content-thin">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <article class="article-loop">
    <header>
      <h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
      <h3>By: <?php the_author(); ?></h3>
    </header>
    <?php the_content(); ?>
  </article>
<?php endwhile; else : ?>
  <article>
    <p>Sorry, no page was found!</p>
  </article>
<?php endif; ?>
  </section><?php get_sidebar(); ?>
</main>
<?php get_footer(); ?>