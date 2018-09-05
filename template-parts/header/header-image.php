<?php
/**
 * Displays header media
 *
 * @package WordPress
 * @subpackage yegmusic
 * @since 1.0
 * @version 1.0
 */

?>
<?php if ( yegmusic_is_frontpage() ) { ?>
  <div class="custom-header">
  
		<div class="custom-header-media">
      <?php
      $featured_artist_id = $featured_artist_id = get_option( 'yegmusic_featured_artist_post' );
      $header_image = get_field( 'featured_photo_1', $featured_artist_id )['sizes']['yegmusic-featured-image'];
      ?>
      <div id="wp-custom-header" class="wp-custom-header">
      <img src="<?php echo $header_image; ?>" width="2000" height="1200" alt="Yeg Music">
      </div>
      
			<!-- <?php the_custom_header_markup(); ?> -->
      </div>
      
      <?php get_template_part( 'template-parts/header/site', 'branding' ); ?>
      
      </div><!-- .custom-header -->
<?php } ?>
      