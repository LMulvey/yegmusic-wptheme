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

get_header();?>

<!-- Front Page Setting -->
<?php
$featured_artist_id = get_option('yegmusic_featured_artist_post');
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
    <div class="container">

      <!-- About Us -->
<?php
$about_page = get_option('yegmusic_about_us_page');
$about_us = get_post($about_page);
$content = apply_filters('the_content', $about_us->post_content);
$title = $about_us->post_title;
$yegmusic_logo = get_parent_theme_file_uri('/assets/images/yegmusic-logo.png');
?>

        <div class="row my-5 align-items-center justify-content-center about-us">
          <?php
if (has_post_thumbnail()):
    $thumbnail = get_field('featured_photo_2', $featured_artist_id);
    ?>
			            <div class="col-sm-5 mb-5">
			              <img class="artist-to-watch" src="<?php echo $thumbnail['sizes']['large']; ?>">
			                <div class="artist-to-watch-badge">
			                  <h2><?php echo the_field('full_name', $featured_artist_id); ?></h2>
			                  <p>Artist to Watch</p>
			                </div>
			              <img class="artist-to-watch-logo" src="<?php echo $yegmusic_logo; ?>">
			            </div>
			          <?php endif;?>

          <div class="col-sm-5 mb-5">
            <h1 class="entry-title"><?php echo $title; ?></h1>
            <?php echo $content; ?>
          </div>
        </div>

      <!-- Events? -->
      <?php 
        $events = get_posts(array(
          'category' => get_option('yegmusic_event_category'),
          'posts_per_page'	=> -1,
          'orderby' => 'meta_value',
          'meta_key' => 'event_date',
          'order' => 'ASC'
        ));
        
        date_default_timezone_set( 'America/Edmonton' );

        $filtered_events = array_filter( $events, function($val) {
          $today = date('Ymd');
          return !( get_field( 'event_date', $val->ID ) < $today );
        } );
        
        /* Limit results */
        $filtered_events = array_slice( $filtered_events, 0, get_option('yegmusic_max_events') );
      ?>

  </div>
      <div class="container-fluid my-5" style="background: rgb(51, 51, 51);">
        <div class="row justify-content-center">
          <div class="col-auto mt-5">
            <div class="event-title">
              <h1>Upcoming Events</h1>
            </div>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-10 p-5">
            <div class="container">
              <div class="row justify-content-center">
                <?php foreach ($filtered_events as $event): 
                  $id = $event->ID;
                  $event_name = $event->post_title;
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

                  <div class="col-sm-6" id="facebook-events">
                    <a href="<?php echo $resolvedLink; ?>">
                      <div class="event-tile" style="background: url('<?php echo $poster['sizes']['large']; ?>') center top no-repeat; background-size: cover;">
                        <div class="event-inner">
                          <h4><?php echo $event_name; ?></h4>
                          <h6><?php echo $event_date->format('M j, Y'); ?></h6>
                          <p><?php echo $ticket_price; ?></p>
                        </div>
                      </div>
                    </a>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container">

      <!-- FAQ -->
      <?php
$faq_id = get_option('yegmusic_faq_page');
$faq = get_post($faq_id);
$content = get_extended($faq->post_content);

?>
      <div class="row justify-content-center">
        <div class="col-10 p-5 faq-head-container">
          <?php echo $content['main']; ?>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-10 p-5 faq-container">
          <?php echo $content['extended']; ?>
        </div>
      </div>
    </div><!-- container -->

      <!-- The Team -->
    <?php
$team_id = get_option('yegmusic_team_page');
$team_posts = get_pages(array(
    'parent' => $team_id,
));
?>
    <div class="container-fluid meet-the-team">
      <div class="row justify-content-center my-5 text-center">
        <?php
foreach ($team_posts as $page) {
    $id = $page->ID;
    $title = $page->post_title;
    $content = $page->post_content;

    $position = get_field('position', $id);
    $photo = get_field('member_photo', $id);
    $facebook = get_field('facebook', $id);
    $twitter = get_field('twitter', $id);
    ?>
        <div class="col-sm-4 p-5">
          <img class="team-image" src="<?php echo $photo['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" data-type="image" />
          <h1><?php echo $title; ?></h1>
          <p><?php echo $position; ?></p>
          <div class="team-social">
          <?php if ($facebook): ?>
            <a href="<?php echo $facebook; ?>">
              <img src="<?php echo get_parent_theme_file_uri('/assets/images/facebook.png'); ?>">
            </a>
          <?php endif;?>
          <?php if ($twitter): ?>
            <a href="<?php echo $twitter; ?>">
              <img src="<?php echo get_parent_theme_file_uri('/assets/images/twitter.png'); ?>">
            </a>
          <?php endif;?>
          </div>
          <p><?php echo $content; ?></p>
        </div>
      <?php }?>
        </div>
      </div>


	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer();
