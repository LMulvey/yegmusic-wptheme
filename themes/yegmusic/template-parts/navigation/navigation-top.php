<?php
/**
 * Displays top navigation
 *
 * @package WordPress
 * @subpackage yegmusic
 * @since 1.0
 * @version 1.2
 */

?>
<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'yegmusic' ); ?>">
  <div class="site-navigation-yeg-logo">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" alt="Yeg Music">
      <img class="site-navigation-yeg-logo" src="<?php echo get_parent_theme_file_uri( '/assets/images/yegmusic-logo.png' ); ?>">  
    </a>
  </div>
  <button class="menu-toggle" aria-controls="top-menu" aria-expanded="false">
		<?php
		echo yegmusic_get_svg( array( 'icon' => 'bars' ) );
		echo yegmusic_get_svg( array( 'icon' => 'close' ) );
		_e( 'Menu', 'yegmusic' );
		?>
	</button>

	<?php wp_nav_menu( array(
		'theme_location' => 'top',
		'menu_id'        => 'top-menu',
	) ); ?>

	<!-- Scroll Down <?php if ( ( yegmusic_is_frontpage() || ( is_home() && is_front_page() ) ) && has_custom_header() ) : ?>
		<a href="#content" class="menu-scroll-down"><?php echo yegmusic_get_svg( array( 'icon' => 'arrow-right' ) ); ?><span class="screen-reader-text"><?php _e( 'Scroll down to content', 'yegmusic' ); ?></span></a>
	<?php endif; ?> -->
</nav><!-- #site-navigation -->
