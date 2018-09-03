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

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

  <!-- About Us -->
  <?php
    $about_us = get_post( 2 );
    $content = apply_filters( 'the_content', $about_us->post_content );
    $title = $about_us->post_title;
  ?>
  <article id="post-<?php the_ID(); ?>" <?php post_class('yegmusic-panel '); ?> >
	<div class="panel-content about-us">
		<div class="wrap"> 
    <?php if (has_post_thumbnail()):
        $thumbnail = get_field( 'featured_photo', 2 ); ?>
			<div class="entry-header">
        <img class="artist-to-watch" src="<?php echo $thumbnail['sizes']['large']; ?>">
        <div class="artist-to-watch-badge">
          <h2><?php echo the_field( 'full_name', 2 ); ?></h2>
          <p>Artist to Watch</p>
        </div>
        <img class="artist-to-watch-logo" src="<?php echo get_parent_theme_file_uri( '/assets/images/yegmusic-logo.png' ); ?>">

        	

          
        <?php
    endif; ?>
         <!-- Edit Link <?php yegmusic_edit_link(get_the_ID()); ?> -->
  </div><!-- .entry-header -->

			<div class="entry-content">
        <h1 class="entry-title"><?php echo $title; ?></h1>
        <?php echo $content; ?>
			</div><!-- .entry-content -->

		</div><!-- .wrap -->
	</div><!-- .panel-content -->

</article><!-- #post-## -->

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer();
