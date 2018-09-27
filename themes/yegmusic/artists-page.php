<?php
/**
 * Template Name: Artists Listing
 * Template Post Type: post, page, artist
 *
 * Listing template for artist pages.
 *
 * @package Wordpress
 * @subpackage yegmusic
 * @since 1.0
 * @version 1.0
 */

// Just grab the current parent ID so we can setup artists pages
// for Edmonton and Calgary down the line
$artists_parent_id = get_the_ID();
$artist_city = get_post_meta($artists_parent_id, 'artist_city', true);
$all_artists = get_posts(array(
    'post_type' => 'artist',
    'meta_key' => 'artist_city',
    'meta_value' => $artist_city,
    'orderby' => 'title',
    'order' => 'ASC',
));

get_header();
?>

<div class="container-fluid artists-page">
  <div class="card-columns">
  <?php foreach ($all_artists as $artist):
    if ($artist->ID != $artists_parent_id) {
        set_query_var('artist', $artist);
        get_template_part('template-parts/artists/listing', 'item');
    }
endforeach;?>
  </div>
</div>

<?php get_footer();?>

