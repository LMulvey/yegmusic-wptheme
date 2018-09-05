<?php
/**
 * Displays footer site info
 *
 * @package WordPress
 * @subpackage yegmusic
 * @since 1.0
 * @version 1.0
 */

?>
<div class="site-info">
	<?php
	if ( function_exists( 'the_privacy_policy_link' ) ) {
		the_privacy_policy_link( '', '<span role="separator" aria-hidden="true"></span>' );
	}
	?>
  <h5>Copyright &copy; <script>document.write(new Date().getFullYear())</script> YegMusic</h5>
  <div class="social-icons">
          <a href="https://www.facebook.com/theyegmusic/">
            <img src="<?php echo get_parent_theme_file_uri( '/assets/images/facebook.png' ); ?>">
          </a>

           <a href="https://www.twitter.com/yeg_music/">
            <img src="<?php echo get_parent_theme_file_uri( '/assets/images/twitter.png' ); ?>">
          </a>

           <a href="https://www.instagram.com/yegmusic/">
            <img src="<?php echo get_parent_theme_file_uri( '/assets/images/instagram.png' ); ?>">
          </a>

           <a href="http://snapchat.com/add/yeg_music">
            <img src="<?php echo get_parent_theme_file_uri( '/assets/images/snapchat.png' ); ?>">
          </a>

           <a href="https://www.youtube.com/channel/UCWfYBUJ0wEplNZodIT_myRQ">
            <img src="<?php echo get_parent_theme_file_uri( '/assets/images/youtube.png' ); ?>">
          </a>

           <a href="https://open.spotify.com/user/sabrekuhn/playlist/6QnX30dGHOSpGfHKVxHcsw">
            <img src="<?php echo get_parent_theme_file_uri( '/assets/images/spotify.png' ); ?>">
          </a>
        </div>
</div><!-- .site-info -->
