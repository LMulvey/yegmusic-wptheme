<?php
/**
 * The template for displaying archive pages
 * 
 * @package WordPress
 * @subpackage yegmusic
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="container">

  <div class="row justify-content-center">
    <div class="col-10 m-5">
      <div class="event-title">
        <h2>Upcoming Events</h2>
      </div>
    </div>
  </div>
  <div class="row justify-content-center">

    <?php
     // First, initialize how many posts to render per page
      $display_count = get_option( 'posts_per_page' );

      // Next, get the current page
      $page = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

      // After that, calculate the offset
      $offset = ( $page - 1 ) * $display_count;

      $args = array(
      'cat' => get_option('yegmusic_event_category'),
      'orderby' => 'meta_value',
      'meta_key' => 'event_date',
      'order' => 'ASC',
      'showposts'     =>  $display_count,
      'page'       =>  $page,
      'offset'     =>  $offset
      );
      
      $events_query = new WP_Query($args);
      
			/* Start the Loop */
			while ( $events_query->have_posts() ) : $events_query->the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/post/content', 'event' );

			endwhile;

			the_posts_pagination( array(
				'prev_text' => yegmusic_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous page', 'yegmusic' ) . '</span>',
				'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'yegmusic' ) . '</span>' . yegmusic_get_svg( array( 'icon' => 'arrow-right' ) ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'yegmusic' ) . ' </span>',
			) );
  ?>
  </div>
  <?php get_footer();
  