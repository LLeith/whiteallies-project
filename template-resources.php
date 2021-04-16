<?php
/**
* Template Name: Resources Page
*/
get_header();


$post_type = 'resource';
global $post;
$page_slug = $post->post_name;
$this_taxonomy = $page_slug;

// Get all the taxonomies for this post type
// $taxonomies = get_object_taxonomies( array( 'post_type' => $post_type ) );

// foreach( $taxonomies as $taxonomy ) :

?>  <section class="boxes archive"> <?php
    // Gets every "category" (term) in this taxonomy to get the respective posts
    // $terms = get_terms( $taxonomy );

    // foreach( $terms as $term ) :
      ?>



        <?php
        $args = array(
                'post_type' => 'resource',
                'posts_per_page' => -1,  //show all posts
								'order' => 'ASC',
								'orderby'   => 'meta_value, title',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'resource_type',
                        'field' => 'slug',
                        'terms' => array($this_taxonomy),
                    )
                )
            );
        $posts = new WP_Query($args);
        $term_name = get_term_by('slug', $this_taxonomy, 'resource_type')->name;

        if( $posts->have_posts() ):
          ?> <h2 class="mid-heading"><?php echo $term_name; ?></h2> <?php
          while( $posts->have_posts() ) : $posts->the_post(); ?>
            <a href="<?php the_permalink(); ?>">
              <div class="box">
                    <?php if(has_post_thumbnail()) { ?>
                            <?php the_post_thumbnail(); ?>
                    <?php } ?>
                    <h3>
                        <?php  echo get_the_title(); ?>
                    </h3>
                    <p><?php echo get_field('author');?>
                </div><!-- box -->
              </a>

        <?php endwhile; endif; ?>
        <hr>

    <?php
  // endforeach;
    ?></section><?php

// endforeach; ?>


<?php
get_footer();
