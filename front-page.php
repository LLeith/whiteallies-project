<?php
  get_header();
?>

      <section class="top-container">

        <?php
        $args = array(
                'post_type' => 'wa_slider',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'orderby' => 'date',
                'order' => 'ASC',
            );

            $loop = new WP_Query( $args );

            if ( $loop->have_posts() ) :
              ?>
              <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <?php
                  $i = 0;
                  $active = 'active';
                  while ( $loop->have_posts() ) : $loop->the_post();
                    ?>
                    <li data-target="#myCarousel" data-slide-to="<?php echo $i; ?>" class="<?php echo $active; ?>"></li>
                    <?php
                    $i++;
                    $active = null;
                  endwhile;
                  ?>
                </ol>
                <header class="showcase">
                  <div class="carousel-inner">
                    <?php
                    $j = 0;
                    while ( $loop->have_posts() ) : $loop->the_post();
                      // $featured_img = wp_get_attachment_image_src( $post->ID );
                      $title = get_the_title();
                      $excerpt = get_the_excerpt();
                      $link = get_field('link');
                      if ( $j == 0 ) { $active = 'active'; } else { $active = null; }
                      ?>
                      <div class="carousel-item <?php echo $active; ?>">
                        <?php the_post_thumbnail( $post->ID, 'full' ); ?>
                        <div class="overlay-image-1"></div>
                        <div class="container">
                          <h1><?php echo $title; ?></h1>
                          <p><?php echo $excerpt; ?></p>
                          <a href="<?php echo $link['url']; ?>" class="button" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>
                        </div>
                      </div>
                      <?php
                      $j++;
                    endwhile;
                    wp_reset_postdata();
                    ?>
                    <a href="#myCarousel" class="carousel-control-prev" role="button" data-slide="prev">
                      <span class="sr-only">Previous</span>
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </a>
                    <a href="#myCarousel" class="carousel-control-next" role="button" data-slide="next">
                      <span class="sr-only">Previous</span>
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </a>
                </div>
              </header>
              </div>
            <?php
            endif;
        ?>
        <!--slider-->

      <div class="top-box top-box-b">
          <?php echo do_shortcode('[contact-form-7 id="45" title="Submit Your Story"]'); ?>
      </div>
    </section>


    <!-- mission Section -->
    <?php
    if ( is_active_sidebar( 'mission' ) ) {
        dynamic_sidebar( 'mission' );
    }
    ?>

    <!-- Boxes Section -->
    <section class="boxes">
    	<?php
		// Set our arguments for how we're sorting the Categories
		$cat_args=array(
		  'orderby' => 'name',
		  'order' => 'ASC'
		   );
		// Get a list of Post Categories using our sorting arguments
		$categories=get_categories($cat_args);
			//For each Category we retrieved, check if it contains any Posts
		  foreach($categories as $category) {
		    $args=array(
		      'showposts' => -1,
		      'category__in' => array($category->term_id),
		      'caller_get_posts'=>1
		    );
		    $posts=get_posts($args);
		      // If this Category is used by any Posts, display a link to the page for that Category
		      if ($posts) {
		      	?>
		      	<a href="<?php echo get_category_link( $category->term_id ); ?>">
			      	<div class="box">
			      		<h2><?php echo $category->name; ?></h2>
			      		<p><?php echo $category->description; ?></p>
			      	</div>
			    </a>
		      	<?php
		      }
		    }
		?>
    </section>

    <!-- info -->
    <section class="lets_talk">
      <div id="info">
        <h2>Let's talk...so the world will listen</h2>
        <blockquote>"Like many, I am tired of explaining to people my daily experience only to be dismissed. So, then I thought and wondered if we heard more stories of white privilege, it would help those who don't understand or
          believe our experiences to stop and think? Even being listened to, believed and understood is a privilege many black people simply don't have! I think this is an opportunity for the many decent, kind and wonderful white people to be allies
          and to
          stand in solidarity with their black and minority ethnic brothers and sisters. So, I thought, when I feel brave enough, I am going to call upon white people to share personal stories that highlight and help others understand white
          privilege."
        </blockquote>
        <p><small>Josephine (Whiteallies.org founder, UK resident of 30 years, proud African immigrant)</small></p>
      </div>
      <div id="twitter_feed">
        <p>Twitter feed</p>
      </div>
    </section>

    <!-- Action section -->
    <section class="action" id="action">
      <img src="<?php bloginfo('template_url');?>/assets/images/pexels-andrea-piacquadio-3865557.jpg" alt="multiple races of people putting hands together and smiling">
      <div id="action_allies">
        <h2>Action Allies</h2>
        <a href="#" class="action-btn">Statistics</a>
        <p>ia soluta eligendi, eum. Maiores voluptates eius odit laborum autem molestiae sapiente.
        </p>
        <a href="#" class="action-btn">Action</a>
        <p>ia soluta eligendi, eum. Maiores voluptates eius odit laborum autem molestiae sapiente.
        </p>
        <a href="#" class="action-btn">Resources</a>
        <p>ia soluta eligendi, eum. Maiores voluptates eius odit laborum autem molestiae sapiente.
        </p>
        <a href="#" class="action-btn">Donate</a>
      </div>
    </section>

    <!--footer-->


  <?php
    get_footer()
   ?>
