<?php
/*
Plugin Name: YegMusic Settings
Description: Developer settings in a common place to set/uset more easily
Version: 1.0.0
Author: Lee Mulvey
Author URI: http://www.leemulvey.com/
License: MIT
 */

add_action( 'admin_menu', 'yegmusic_options_menu' );
add_action( 'admin_init', 'yegmusic_register_settings' );
add_action( 'admin_enqueue_scripts', 'yegmusic_options_enqueue_scripts' );

function yegmusic_carousel_shortcode(  ) {
  $CAROUSEL_MAX_IMAGES = 16;
  $id = get_the_id();
  $imageGridArray = [];
  for ($i = 1; $i <= $CAROUSEL_MAX_IMAGES; $i++) {
    array_push( $imageGridArray, array(
      'image' => get_field( 'carousel_image_' . $i, $id )['sizes']['medium'],
      'url' => get_field( 'carousel_url_' . $i, $id )
    ) );
  }
  
  ob_start();
  ?>
  <div class="container">
    <div class="row no-gutters justify-content-center">
      <?php
        foreach ($imageGridArray as $image):
          if ( !empty( $image['image'] ) ):
            ?>
              <div 
              class="col-lg-3 col-md-6 image-grid-item"
              style="background-image: url('<?php echo $image['image']; ?>');"
              >
              <?php if ( !empty( $image['url'] ) ): ?>
                <a href="<?php echo $image['url']; ?>">
                  <?php if ( !empty( $image['url'] ) ): ?>
                    </a>
                  <?php endif; ?>
              <?php endif; ?>
              </div>
            <?php
          endif;
        endforeach;
      ?>
    </div>
  </div>
  <?php

  return ob_get_clean();
}
add_shortcode( 'yegmusic-carousel', 'yegmusic_carousel_shortcode' );

function yegmusic_options_enqueue_scripts()
{
    wp_enqueue_script( 'yegmusic_options_js', plugins_url( 'lib/yegmusic.js', __FILE__), array( 'jquery' ), '1.0' );
}


function yegmusic_register_settings()
{
    /**
     * Featured Artist Settings
     */
    register_setting( 'yegmusic-options', 'yegmusic_featured_artist_category', array(
        'type' => 'number',
        'description' => 'Post category corresponding to Featured Artists',
    ));
    register_setting( 'yegmusic-options', 'yegmusic_featured_artist_post', array(
        'type' => 'number',
        'description' => 'Post/Page ID Corresponding to the Featured Artist',
    ));

    /**
     * Front Page Settings
     */
    register_setting( 'yegmusic-options', 'yegmusic_masthead_once_per_session', array(
        'type' => 'string',
        'description' => 'Boolean toggle to only show the masthead on the front page once per session',
        'default' => "false",
    ));

    register_setting( 'yegmusic-options', 'yegmusic_about_us_page', array(
        'type' => 'number',
        'description' => 'Page ID for About Us Page',
    ));

    register_setting( 'yegmusic-options', 'yegmusic_faq_page', array(
        'type' => 'number',
        'description' => 'Page ID for FAQ Page',
    ));

    register_setting( 'yegmusic-options', 'yegmusic_team_page', array(
        'type' => 'number',
        'description' => 'Page ID for the team page parent',
    ));

    register_setting( 'yegmusic-options', 'yegmusic_event_category', array(
      'type' => 'number',
      'description' => 'Category ID for the event posts',
     ));

     register_setting( 'yegmusic-options', 'yegmusic_max_events', array(
      'type' => 'number',
      'description' => 'Limit amount of events showing on front page',
      'default' => '5'
  ));
}

function yegmusic_options_menu()
{
    add_menu_page( 'Yeg Music Settings', 'Yeg Music', 'manage_options', 'yegmusic-options', 'yegmusic_options', plugins_url( '/images/settings-icon.png', __FILE__));
}

function yegmusic_options()
{
    if (!current_user_can( 'manage_options' )) {
        wp_die(__( 'You do not have sufficient permissions to access this page.' ));
    }

    include 'lib/options.php';
}
?>