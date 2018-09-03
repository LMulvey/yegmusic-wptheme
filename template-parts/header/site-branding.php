<?php
/**
 * Displays header site branding
 *
 * @package WordPress
 * @subpackage yegmusic
 * @since 1.0
 * @version 1.0
 */

?>
<div class="site-branding">
	<div class="wrap">

		<?php the_custom_logo(); ?>

		<div class="site-branding-text">
			<?php if ( is_front_page() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php endif; ?>

			<?php
			$description = get_bloginfo( 'description', 'display' );

			if ( $description || is_customize_preview() ) :
			?>
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
			<?php endif; ?>
		</div><!-- .site-branding-text -->

		<?php if ( ( yegmusic_is_frontpage() || ( is_home() && is_front_page() ) ) ) : ?>
		<a href="#content"><div class="menu-scroll-down">ENTER SITE<span class="screen-reader-text"><?php _e( 'ENTER SITE', 'yegmusic' ); ?></span></div></a>
	<?php endif; ?>

	</div><!-- .wrap -->
</div><!-- .site-branding -->
