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
<?php if ( yegmusic_is_frontpage() && !wp_is_mobile() ) { ?>
  <div class="custom-header">
  
		<div class="custom-header-media">
      <?php
        $featured_artist_id = $featured_artist_id = get_option( 'yegmusic_featured_artist_post' );
        $header_image = get_field( 'featured_photo_1', $featured_artist_id )['sizes']['yegmusic-featured-image'];
        $full_name = get_field( 'full_name', $featured_artist_id );
        
        $photographer_name = get_field( 'photographer_name', $featured_artist_id );
        $photographer_url = get_field( 'photographer_url', $featured_artist_id );
        $photographer_logo = get_field( 'photographer_logo', $featured_artist_id )['sizes']['thumbnail'];

        $data_artist = preg_replace( '/\s/', '', $full_name );
      ?>
      <div id="wp-custom-header" class="wp-custom-header">
        
          <?php if (!empty($photographer_url)): echo '<a href="' . $photographer_url . '">';  endif;?>  
          <?php if (!empty($photographer_logo)): ?>
            <img class="photo-credit" src="<?php echo $photographer_logo; ?>">
          <?php else: ?>
            <h4 class="photo-credit">Photo Credit: <?php echo $photographer_name; ?></h4>
          <?php endif; ?>
          <?php if ($photographer_url): echo '</a>'; endif; ?>  
      <img id="featured-artist-header" data-artist="<?php echo $data_artist; ?>" src="<?php echo $header_image; ?>" width="2000" height="1200" alt="Yeg Music">
    </div>
      
			<!-- <?php the_custom_header_markup(); ?> -->
      </div>
      
      <?php get_template_part( 'template-parts/header/site', 'branding' ); ?>
      
      </div><!-- .custom-header -->
<?php } ?>
      