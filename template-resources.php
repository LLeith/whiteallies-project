<?php
/**
* Template Name: Resources Page
*/
get_header();


$post_type = 'resource';

// Get all the taxonomies for this post type
$taxonomies = get_object_taxonomies( array( 'post_type' => $post_type ) );

foreach( $taxonomies as $taxonomy ) :

?>  <section class="boxes"> <?php
    // Gets every "category" (term) in this taxonomy to get the respective posts
    $terms = get_terms( $taxonomy );

    foreach( $terms as $term ) : ?>

            <h2 class="mid-heading"><?php echo $term->name; ?></h2>

        <?php
        $args = array(
                'post_type' => $post_type,
                'posts_per_page' => -1,  //show all posts
								'order' => 'ASC',
								'orderby'   => 'meta_value, title',
                'tax_query' => array(
                    array(
                        'taxonomy' => $taxonomy,
                        'field' => 'slug',
                        'terms' => $term->slug,
                    )
                )
            );
        $posts = new WP_Query($args);

        if( $posts->have_posts() ): while( $posts->have_posts() ) : $posts->the_post(); ?>
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

    <?php endforeach;
    ?></section><?php

endforeach; ?>


<?php
get_footer();
?>
