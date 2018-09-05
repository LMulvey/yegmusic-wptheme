<?php
/**
 * Displays content for front page
 *
 * @package WordPress
 * @subpackage yegmusic
 * @since 1.0
 * @version 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('yegmusic-panel '); ?> >
	<div class="panel-content">
		<div class="wrap"> 
    <?php if (has_post_thumbnail()):
        $thumbnail = get_field( 'featured_photo' ); ?>
			<div class="entry-header">
        <img class="artist-to-watch" src="<?php echo $thumbnail['sizes']['large']; ?>">
        <div class="artist-to-watch-badge">
          <h2><?php echo the_field( 'full_name' ); ?></h2>
          <p>Artist to Watch</p>
        </div>
        <img class="artist-to-watch-logo" src="<?php echo get_parent_theme_file_uri( '/assets/images/yegmusic-logo.png' ); ?>">

        	

          
        <?php
    endif; ?>
         <!-- Edit Link <?php yegmusic_edit_link(get_the_ID()); ?> -->
  </div><!-- .entry-header -->

			<div class="entry-content">
      <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
     <?php the_content(
         sprintf(
             __(
                 'Continue reading<span class="screen-reader-text"> "%s"</span>',
                 'yegmusic'
             ),
             get_the_title()
         )
     ); ?>
			</div><!-- .entry-content -->

		</div><!-- .wrap -->
	</div><!-- .panel-content -->

</article><!-- #post-## -->
