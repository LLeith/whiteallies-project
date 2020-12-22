<?php  
  get_header();
?>

      <section class="top-container">
        <!--slider-->
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
          </ol>
          <header class="showcase">

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="<?php bloginfo('template_url');?>/assets/images/pexels-ekaterina-bolovtsova-4049517.jpg" alt="people relaxing">
                <div class="overlay-image-1"></div>
                <div class="container">
                  <h1>White Allies</h1>
                  <p>Test.</p>
                  <a href="#mission" class="btn">
                    Read more
                  </a>
                </div>
              </div>
              <div class="carousel-item">
                <img src="<?php bloginfo('template_url');?>/assets/images/pexels-pixabay-45842.jpg" alt="holding hands">
                <div class="overlay-image-2"></div>
                <div class="container">
                  <h1>White Allies</h1>
                  <p>Share your story.</p>
                  <a href="#mission" class="btn">
                    Read more
                  </a>
                </div>
              </div>
              <div class="carousel-item">
                <img src="<?php bloginfo('template_url');?>/assets/images/pexels-rfstudio-3810760.jpg" alt="people sharing stories">
                <div class="overlay-image-3"></div>
                <div class="container">
                  <h1>White Allies</h1>
                  <p>Share your story.</p>
                  <a href="#mission" class="btn">
                    Read more
                  </a>
                </div>
              </div>
            </div>

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
    
      
      <div class="top-box top-box-b">
          <?php echo do_shortcode('[contact-form-7 id="45" title="Submit Your Story"]'); ?>
      </div>
    </section>


    <!-- mission Section -->
    <section id="mission">
      <h2>Our Mission</h2>
      <p>To create a global community of white allies consisting of individuals within families, institutions, companies, organisations and even governments. <br>These will be people who care and want to bring an end to the scourge of racism in our
        society. <br>White allies will stand with black people wherever they are in their endeavors to shine a light on racism, demand change and celebrate when that change becomes reality.</p>
    </section>

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
  