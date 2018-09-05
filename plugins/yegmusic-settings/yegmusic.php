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

  function yegmusic_options_enqueue_scripts() {
    wp_enqueue_script( 'yegmusic_options_js', plugins_url( 'lib/yegmusic.js', __FILE__ ), array('jquery'), '1.0' );
  }

  function yegmusic_register_settings() {
    register_setting( 'yegmusic-options', 'yegmusic_featured_artist_category', array(
      'type'    => 'number',
      'description'   => 'Post category corresponding to Featured Artists'
    ) );
    register_setting( 'yegmusic-options', 'yegmusic_featured_artist_post', array(
      'type'    => 'number',
      'description'   => 'Post/Page ID Corresponding to the Featured Artist'
    ) );
  }

  function yegmusic_options_menu() {
    add_menu_page( 'Yeg Music Settings', 'Yeg Music', 'manage_options', 'yegmusic-options', 'yegmusic_options', plugins_url( '/images/settings-icon.png', __FILE__ ) );
  }

  function yegmusic_options() {
    if ( !current_user_can( 'manage_options' ) )  {
      wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
    }
    
    include( 'lib/options.php' );
  }
?>