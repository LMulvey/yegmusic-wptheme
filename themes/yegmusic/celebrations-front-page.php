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
    <title><?php echo $page_title; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo get_parent_theme_file_uri( '/assets/css/bootstrap.min.css' ); ?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo get_parent_theme_file_uri( '/style/celebrations.css' ); ?>" rel="stylesheet">

  </head>

  <body style="background: url('<?php echo $featured_image[0];  ?>') no-repeat center center fixed;">

    <div class="container">
      <div class="row mt-5 justify-content-center align-items-center">
        <div class="col-xs-2">
          <img style="width: 80%;" src="<?php echo get_parent_theme_file_uri( '/assets/images/yegmusic-logo.png' ); ?>" alt="Yeg Music">
        </div>
        <div class="col-md">
          <h1 class="page-title">Yeg Celebrations</h1>
        </div>
      </div>
      <div class="row my-5 d-flex justify-content-center align-items-center">
        <?php 
          foreach($pages as $page):
            $the_image = wp_get_attachment_image_src( get_post_thumbnail_id( $page->ID ), 'medium' );
        ?>
        <div class="col-sm-4 mx-auto">
          <div class="celebration-type">
            <div class="celebration-type-image" style="background-image: url('<?php echo $the_image[0]; ?>');">
            </div>
          </div>
          <h3 class="celebration-type-title"><?php echo $page->post_title; ?></h3>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  
    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo get_parent_theme_file_uri( '/assets/js/bootstrap.min.js' ); ?>"></script>

  </body>

</html>