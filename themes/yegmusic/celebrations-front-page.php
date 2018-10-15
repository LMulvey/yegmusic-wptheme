<?php
/**
 * Template Name: Yeg Celebrations Front Page
 * Template Post Type: page
 *
 * Landing page for Yeg Celebrations
 *
 * @package Wordpress
 * @subpackage yegmusic
 * @since 1.0
 * @version 1.0
 */

  $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
  $page_title = get_the_title();
  $this_id = get_the_ID();
  $pages  = get_pages( array(
    'parent' => $this_id
  ) );

 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?php echo $page_title; ?></title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="<?php echo get_parent_theme_file_uri( '/style/celebrations-front-page.css' ); ?>" rel="stylesheet">

  </head>

  <body style="background-image: url('<?php echo $featured_image[0];  ?>'); background-size: cover;">

    <div class="container text-center text-sm-left">
      <div class="row my-3">
        <div class="col">
          <img src="<?php echo get_parent_theme_file_uri( '/assets/images/yegmusic-logo.png' ); ?>" alt="Yeg Music">
        </div>
        <div class="col my-5 my-sm-0 text-center text-sm-left">
          <h1 class="page-title">Yeg Celebrations</h1>
        </div>
      </div>

      <div class="row justify-content-center text-center text-sm-left">
        <?php 
          foreach($pages as $page):
            $the_image = wp_get_attachment_image_src( get_post_thumbnail_id( $page->ID ), 'medium' );
            $the_link = get_page_link( $page->ID );
        ?>
        <div class="col-md-3 mx-auto my-3 my-sm-0">
          <a class="celebration-type-link" href="<?php echo $the_link; ?>">
            <div class="celebration-type text-xs-center text-sm-left">
              <div class="celebration-type-image" style="background-image: url('<?php echo $the_image[0]; ?>');">
              </div>
            </div>
            <h3 class="celebration-type-title text-center"><?php echo $page->post_title; ?></h3>
          </a>
        </div>
        <?php endforeach; ?>

      </div> <!-- /row -->
    </div> <!-- /container -->
    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo get_parent_theme_file_uri( '/assets/js/bootstrap.min.js' ); ?>"></script>

  </body>

</html>