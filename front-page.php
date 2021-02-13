<?php
get_header();
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
<main class="wrap">

    <!-- mission Section -->
    <?php if ( is_active_sidebar( 'mission' ) ) { ?>
      <section class="mission grey-area" id="mission">
        <?php dynamic_sidebar( 'mission' ); ?>
      </section>
    <?php } ?>
    <!-- mission Section -->
    <?php if ( is_active_sidebar( 'story-form' ) ) { ?>
      <section class="story-form grey-area" id="story-form">
        <?php dynamic_sidebar( 'story-form' ); ?>
      </section>
    <?php } ?>

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

    <!-- Let's Talk -->
    <?php if ( is_active_sidebar( 'lets-talk' ) ) { ?>
      <section class="action grey-area" id="lets-talk">
        <h2>Let's talk... so the world will listen</h2>
        <?php dynamic_sidebar( 'lets-talk' ); ?>
      </section>
    <?php } ?>

    <!-- Action section -->
    <?php if ( is_active_sidebar( 'action' ) ) { ?>
      <section class="action grey-area" id="action">
        <h2>Action Allies</h2>
        <?php dynamic_sidebar( 'action' ); ?>
      </section>
    <?php } ?>

    <!--footer-->
  </main>


  <?php
    get_footer()
   ?>
