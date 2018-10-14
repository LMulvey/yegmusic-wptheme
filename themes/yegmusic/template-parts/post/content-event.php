<?php
/**
 * Template part for displaying events
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage yegmusic
 * @since 1.0
 * @version 1.2
 */


    $id = get_the_ID();
    $event = get_post( $id );
    $event_name = get_the_title();
    $poster = get_field('poster', $id);
    $event_date = new DateTime( get_field('event_date', $id) );
    $event_link = get_field('event_link', $id);

    if ( empty($event_link) ) {
      $resolvedLink = $event->guid;
    } else if ( !strpos($event_link, 'http://') || !strpos($event_link, 'https://') ) {
      $resolvedLink = 'https://' . $event_link;
    }

    $ticket_price = get_field('ticket_price', $id);
  ?>
  <div class="col-sm-4 m-3 p-3" style="background: rgb(51, 51, 51);">
    <div class="event-header" style="background: url('<?php echo $poster['sizes']['large']; ?>') center top no-repeat; background-size: cover;">
    </div>
        <h4><?php echo $event_name; ?></h4>
        <h6><?php echo $event_date->format('M j, Y'); ?></h6>
        <p><?php echo $ticket_price; ?></p>

    <div class="entry-content">
      <?php
      /* translators: %s: Name of current post */
      the_content( sprintf(
        __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'yegmusic' ),
        get_the_title()
      ) );

      wp_link_pages( array(
        'before'      => '<div class="page-links">' . __( 'Pages:', 'yegmusic' ),
        'after'       => '</div>',
        'link_before' => '<span class="page-number">',
        'link_after'  => '</span>',
      ) );
      ?>
	  </div><!-- .entry-content -->
  </div>


