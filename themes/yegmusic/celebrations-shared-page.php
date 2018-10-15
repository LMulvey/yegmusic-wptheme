<?php
/**
 * Template Name: Yeg Celebrations Shared Page
 * Template Post Type: page
 *
 * Shared page template for Yeg Celebrations
 *
 * @package Wordpress
 * @subpackage yegmusic
 * @since 1.0
 * @version 1.0
 */



  $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
  $page_title = get_the_title();
  $this_id = get_the_ID();
  $the_post = get_post();
  $the_slug = $the_post->post_name;

  $descriptionOne = get_field( 'description_one', $this_id );
  $about_section = get_field( 'about_section', $this_id );

  $bronzeTier = get_field( 'bronze_tier', $this_id );
  $silverTier = get_field( 'silver_tier', $this_id );
  $goldTier = get_field( 'gold_tier', $this_id );

  $imageGridTitle = get_field( 'image_grid_title', $this_id );
  $imageGridBlurb = get_field( 'image_grid_blurb', $this_id );
  $imageGrid1 = get_field( 'image_grid_1', $this_id )['sizes']['medium'];
  $imageGrid2 = get_field( 'image_grid_2', $this_id )['sizes']['medium'];
  $imageGrid3 = get_field( 'image_grid_3', $this_id )['sizes']['medium'];
  $imageGrid4 = get_field( 'image_grid_4', $this_id )['sizes']['medium'];
  $imageGrid5 = get_field( 'image_grid_5', $this_id )['sizes']['medium'];
  $imageGrid6 = get_field( 'image_grid_6', $this_id )['sizes']['medium'];
  $imageGrid7 = get_field( 'image_grid_7', $this_id )['sizes']['medium'];
  $imageGrid8 = get_field( 'image_grid_8', $this_id )['sizes']['medium'];


  $contactFormTitle = get_field( 'contact_form_title', $this_id );
  $contactFormBlurb = get_field( 'contact_form_blurb', $this_id );
 ?>
 
<!DOCTYPE html>
<html lang="en">
  <head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?php echo $page_title; ?> | Yeg Celebrations</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="<?php echo get_parent_theme_file_uri( '/style/celebrations-shared.css' ); ?>" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>


  </head>

  <body id="page-top">
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="<?php echo esc_url( home_url( '/yeg-celebrations/' ) ); ?>">Yeg Celebrations</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger <?php if ($the_slug === 'corporate'): echo 'active'; endif;?>" href="<?php echo esc_url( home_url( '/yeg-celebrations/corporate' ) ); ?>">Corporate</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger <?php if ($the_slug === 'weddings'): echo 'active'; endif;?>" href="<?php echo esc_url( home_url( '/yeg-celebrations/weddings' ) ); ?>">Weddings</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger <?php if ($the_slug === 'other-special-events'): echo 'active'; endif;?>" href="<?php echo esc_url( home_url( '/yeg-celebrations/other-special-events' ) ); ?>">Special Events</a>
            </li>
            <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <header class="masthead text-center text-white d-flex" style="background-image: url('<?php echo $featured_image[0]; ?>');">
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-10 mx-auto">

            <h1 class="masthead-title">
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>" alt="Yeg Music">
                <img src="<?php echo get_parent_theme_file_uri( '/assets/images/yegmusic-logo.png' ); ?>" alt="Yeg Music"><br />
              </a>  
              <strong><?php echo $page_title; ?></strong>
              </h1>
            <hr>
          </div>
          <div class="col-lg-8 mx-auto">
            <p class="mb-5"><?php echo $descriptionOne; ?></p>
            <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">Tell me more!</a>
          </div>
        </div>
      </div>
    </header>

    <section class="bg-primary" id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading text-white">We've got what you need!</h2>
            <hr class="light my-4">
            <p class="text-faded mb-4"><?php echo $about_section; ?></p>
            <a class="btn btn-light btn-xl js-scroll-trigger" href="#contact">Get In Touch!</a>
          </div>
        </div>
      </div>
    </section>

    <section id="services">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">Levels of Service</h2>
            <hr class="my-4">
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6 px-4 text-center">
            <div class="service-box mt-5 mx-auto">
              <img class="service-icon" src="<?php echo get_parent_theme_file_uri( '/assets/images/laurel-bronze.svg' ); ?>">
              <h3 class="mb-3">Bronze</h3>
              <p class="text-muted mb-0 "><?php echo $bronzeTier; ?></p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 px-4 text-center">
            <div class="service-box mt-5 mx-auto">
            <img class="service-icon" src="<?php echo get_parent_theme_file_uri( '/assets/images/laurel-silver.svg' ); ?>">
              <h3 class="mb-3">Silver</h3>
              <p class="text-muted mb-0 "><?php echo $silverTier; ?></p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 px-4 text-center">
            <div class="service-box mt-5 mx-auto">
            <img class="service-icon" src="<?php echo get_parent_theme_file_uri( '/assets/images/laurel-gold.svg' ); ?>">
              <h3 class="mb-3">Gold</h3>
              <p class="text-muted mb-0 "><?php echo $goldTier; ?></p>
            </div>
          </div>
          <!-- <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fas fa-4x fa-heart text-primary mb-3 sr-icon-4"></i>
              <h3 class="mb-3">Made with Love</h3>
              <p class="text-muted mb-0 ">You have to make your websites with love these days!</p>
            </div>
          </div> -->
        </div>
      </div>
    </section>

    <section class="bg-dark text-white">
      <div class="container text-center">
        <h2 class="section-heading text-white"><?php echo $imageGridTitle; ?></h2>
        <hr class="light my-4">
        <p class="text-faded mb-4"><?php echo $imageGridBlurb; ?></p>
        
        <div class="container">
          <div class="row no-gutters">
            <div class="col-lg-3 col-md-6 image-grid-item">
              <img class="image-grid-image" src="<?php echo $imageGrid1; ?>">
            </div>
            <div class="col-lg-3 col-md-6 image-grid-item">
              <img class="image-grid-image" src="<?php echo $imageGrid2; ?>">
            </div>
            <div class="col-lg-3 col-md-6 image-grid-item">
              <img class="image-grid-image" src="<?php echo $imageGrid3; ?>">
            </div>
            <div class="col-lg-3 col-md-6 image-grid-item">
              <img class="image-grid-image" src="<?php echo $imageGrid4; ?>">
            </div>
            <div class="col-lg-3 col-md-6 image-grid-item">
              <img class="image-grid-image" src="<?php echo $imageGrid5; ?>">
            </div>
            <div class="col-lg-3 col-md-6 image-grid-item">
              <img class="image-grid-image" src="<?php echo $imageGrid6; ?>">
            </div>
            <div class="col-lg-3 col-md-6 image-grid-item">
              <img class="image-grid-image" src="<?php echo $imageGrid7; ?>">
            </div>
            <div class="col-lg-3 col-md-6 image-grid-item">
              <img class="image-grid-image" src="<?php echo $imageGrid8; ?>">
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="contact" class="text-white" style="background: url('<?php echo get_parent_theme_file_uri( '/assets/images/background.png' );?>'); no-repeat center center; background-size: cover;'">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading"><?php echo $contactFormTitle; ?></h2>
            <hr class="my-4">
            <p class="mb-5"><?php echo $contactFormBlurb; ?></p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 ml-auto text-center">
            <?php echo do_shortcode( '[contact-form-7 id="204" title="Celebrations Contact"]' ); ?>
          </div>
          </div>
        </div>
      </div>
    </section>

   <!-- Bootstrap core JavaScript -->
   <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
   <script src="<?php echo get_parent_theme_file_uri( '/assets/js/bootstrap.min.js' ); ?>"></script>
   <script src="<?php echo get_parent_theme_file_uri( '/assets/js/global.js' ); ?>"></script>

       <!-- Plugin JavaScript -->
       <script src="<?php echo get_parent_theme_file_uri( '/assets/vendor/jquery-easing/jquery.easing.min.js '); ?>"></script>
    <script src="<?php echo get_parent_theme_file_uri( '/assets/vendor/scrollreveal/scrollreveal.min.js '); ?>"></script>
    <script src="<?php echo get_parent_theme_file_uri( '/assets/vendor/magnific-popup/jquery.magnific-popup.min.js '); ?>"></script>

  </body>

</html>