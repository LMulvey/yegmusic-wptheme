<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage yegmusic
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<!-- Front Page Setting -->
<?php
  $featured_artist_id = get_option( 'yegmusic_featured_artist_post' );
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
    <div class="container">

      <!-- About Us -->
      <?php
        $about_page = get_option( 'yegmusic_about_us_page' );
        $about_us = get_post( $about_page );
        $content = apply_filters( 'the_content', $about_us->post_content );
        $title = $about_us->post_title;
        $yegmusic_logo = get_parent_theme_file_uri( '/assets/images/yegmusic-logo.png' );
      ?>

        <div class="row my-5 align-items-center justify-content-center about-us">
          <?php 
            if (has_post_thumbnail()):
              $thumbnail = get_field( 'featured_photo_2', $featured_artist_id ); 
          ?>
            <div class="col-sm-5 mb-5">
              <img class="artist-to-watch" src="<?php echo $thumbnail['sizes']['large']; ?>">
                <div class="artist-to-watch-badge">
                  <h2><?php echo the_field( 'full_name', $featured_artist_id ); ?></h2>
                  <p>Artist to Watch</p>
                </div>
              <img class="artist-to-watch-logo" src="<?php echo $yegmusic_logo; ?>">
            </div>
          <?php endif; ?>

          <div class="col-sm-5 mb-5">
            <h1 class="entry-title"><?php echo $title; ?></h1>
            <?php echo $content; ?>
          </div>
        </div>

      <!-- Events? -->
      <div class="row">
        <div class="col-sm" id="facebook-events">
        </div>
      </div>

      <!-- FAQ -->
      <?php
        $faq_id = get_option( 'yegmusic_faq_page' );
        $faq = get_post( $faq_id );
        $content = get_extended( $faq->post_content );
      
      ?>
      <div class="row justify-content-center">
        <div class="col-10 p-5 faq-head-container">
          <?php echo $content['main']; ?>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-10 p-5 faq-container">
          <?php echo $content['extended']; ?>
        </div>
      </div>
    </div><!-- container -->

      <!-- The Team -->
      <div class="cotainer-fluid meet-the-team">
      <div class="row justify-content-center my-5 text-center">
        <div class="col-sm-4 p-5">
          <img class="team-image" src="<?php echo get_parent_theme_file_uri( '/assets/images/team/chris.png' ); ?>" alt="" data-type="image" />
          <h1>Chris Tarvudd</h1>
          <p>Co-Founder &amp; CEO</p>
          <div class="team-social">
            <a href="https://www.facebook.com/openingband">
              <img src="<?php echo get_parent_theme_file_uri( '/assets/images/facebook.png' ); ?>">
            </a>
          </div>
          <p>Armed with a distinct passion for empowering artists, Chris is tirelessly pushing the 
            boundaries of what is possible in a local music scene. As a lover of musicians, Chris is primarly 
            responsible for the ongoing development of Yeg Music.</p>
        </div>

        <div class="col-sm-4 p-5">
          <img class="team-image" src="<?php echo get_parent_theme_file_uri( '/assets/images/team/michelle.png' ); ?>" alt="" data-type="image" />
          <h1>Michelle Langevin</h1>
          <p>Co-Founder &amp; General Manager</p>
          <div class="team-social">
            <a href="https://www.facebook.com/michelle.langevin2">
              <img src="<?php echo get_parent_theme_file_uri( '/assets/images/facebook.png' ); ?>">
            </a>
          </div>
          <p>With a background in vocal studies, Michelle brings an artist’s perspective to everything 
            she does with Yeg Music. Michelle knows every in-and-out of our business and is an absolute 
            rockstar both on the stage and in admin.</p>
        </div>

        <div class="col-sm-4 p-5">
          <img class="team-image" src="<?php echo get_parent_theme_file_uri( '/assets/images/team/sabrina.png' ); ?>" alt="" data-type="image" />
          <h1>Sabrina Kuhn</h1>
          <p>Co-Founder &amp; Assistant General Manager</p>
          <div class="team-social">
            <a href="https://www.facebook.com/sabrekuhn">
              <img src="<?php echo get_parent_theme_file_uri( '/assets/images/facebook.png' ); ?>">
            </a>
          </div>
          <p>Despite being the youngest owner, Sabrina brings a lifetime of hard work and experience in 
            growth to her role in Yeg Music. She started managing bands in high school and hasn't shown 
            any signs of slowing down.</p>
        </div>

        </div>
      </div>
    </div>


	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer();
