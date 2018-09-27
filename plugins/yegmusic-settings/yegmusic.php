<?php
/*
Plugin Name: YegMusic Settings
Description: Developer settings in a common place to set/uset more easily
Version: 1.0.0
Author: Lee Mulvey
Author URI: http://www.leemulvey.com/
License: MIT
 */

add_action('admin_menu', 'yegmusic_options_menu');
add_action('admin_init', 'yegmusic_register_settings');
add_action('admin_enqueue_scripts', 'yegmusic_options_enqueue_scripts');
// add_action('init', 'yegmusic_register_post_types');
// add_action('add_meta_boxes', 'yegmusic_add_meta_box');
// add_action('save_post', 'yegmusic_meta_box_save', 1, 2);

register_deactivation_hook(__FILE__, 'flush_rewrite_rules');
register_activation_hook(__FILE__, 'myplugin_flush_rewrites');

function myplugin_flush_rewrites()
{
    // call your CPT registration function here (it should also be hooked into 'init')
    myplugin_custom_post_types_registration();
}

function yegmusic_options_enqueue_scripts()
{
    wp_enqueue_script('yegmusic_options_js', plugins_url('lib/yegmusic.js', __FILE__), array('jquery'), '1.0');
}

function yegmusic_add_meta_box()
{
    add_meta_box(
        'yegmusic_meta_box',
        'Artist City?',
        'yegmusic_meta_box',
        'artist',
        'side',
        'high'
    );
}

function yegmusic_meta_box()
{
    global $post;
    // Nonce field to validate form request came from current site
    wp_nonce_field(basename(__FILE__), 'artist_fields');
    // Get the location data if it's already been entered
    $artist_city = get_post_meta($post->ID, 'artist_city', true);
    $cities = array(
        'edmonton' => array(
            'name' => 'Edmonton',
        ),
        'calgary' => array(
            'name' => 'Calgary',
        ),
    );
    ?>
    <p>
        <label for="artist_city">Which artist is this city in?</label>
        <select name='artist_city' id='artist_city' class="widefat">
            <?php foreach ($cities as $city):
        $selected = ($city['name'] == $artist_city) ? 'selected="selected"' : '';
        ?>
						            <option value="<?php echo esc_attr($city['name']); ?>" <?php echo $selected; ?>>
						              <?php echo esc_html($city['name']); ?>
						              </option>
						            <?php endforeach;?>
        </select>
    </p>
    <?php
}

/**
 * Save the metabox data
 */
function yegmusic_meta_box_save($post_id, $post)
{
    // Return if the user doesn't have edit permissions.
    if (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }
    // Verify this came from the our screen and with proper authorization,
    // because save_post can be triggered at other times.
    if (!isset($_POST['artist_city']) || !wp_verify_nonce($_POST['artist_fields'], basename(__FILE__))) {
        return $post_id;
    }
    // Now that we're authenticated, time to save the data.
    // This sanitizes the data from the field and saves it into an array $artist_meta.
    $artist_meta['artist_city'] = esc_textarea($_POST['artist_city']);
    // Cycle through the $artist_meta array.
    // Note, in this example we just have one item, but this is helpful if you have multiple.
    foreach ($artist_meta as $key => $value):
        // Don't store custom data twice
        if ('revision' === $post->post_type) {
            return;
        }
        if (get_post_meta($post_id, $key, false)) {
            // If the custom field already has a value, update it.
            update_post_meta($post_id, $key, $value);
        } else {
            // If the custom field doesn't have a value, add it.
            add_post_meta($post_id, $key, $value);
        }
        if (!$value) {
            // Delete the meta key if there's no value
            delete_post_meta($post_id, $key);
        }
    endforeach;
}

function yegmusic_register_post_types()
{
    register_post_type('artist',
        array(
            'labels' => array(
                'name' => __('Artists'),
                'singular_name' => __('Artist'),
            ),
            'public' => true,
            'supports' => array(
                'title',
                'editor',
            ),
            'has_archive' => true,
            'rewrite' => array('slug' => 'artists'),
            'menu_icon' => plugins_url('/images/settings-icon.png', __FILE__),
            'menu_position' => 5,
        ));
    flush_rewrite_rules();

}

function yegmusic_register_settings()
{
    /**
     * Featured Artist Settings
     */
    register_setting('yegmusic-options', 'yegmusic_featured_artist_category', array(
        'type' => 'number',
        'description' => 'Post category corresponding to Featured Artists',
    ));
    register_setting('yegmusic-options', 'yegmusic_featured_artist_post', array(
        'type' => 'number',
        'description' => 'Post/Page ID Corresponding to the Featured Artist',
    ));

    /**
     * Front Page Settings
     */
    register_setting('yegmusic-options', 'yegmusic_masthead_once_per_session', array(
        'type' => 'string',
        'description' => 'Boolean toggle to only show the masthead on the front page once per session',
        'default' => "false",
    ));

    register_setting('yegmusic-options', 'yegmusic_about_us_page', array(
        'type' => 'number',
        'description' => 'Page ID for About Us Page',
    ));

    register_setting('yegmusic-options', 'yegmusic_faq_page', array(
        'type' => 'number',
        'description' => 'Page ID for FAQ Page',
    ));

    register_setting('yegmusic-options', 'yegmusic_team_page', array(
        'type' => 'number',
        'description' => 'Page ID for the team page parent',
    ));
}

function yegmusic_options_menu()
{
    add_menu_page('Yeg Music Settings', 'Yeg Music', 'manage_options', 'yegmusic-options', 'yegmusic_options', plugins_url('/images/settings-icon.png', __FILE__));
}

function yegmusic_options()
{
    if (!current_user_can('manage_options')) {
        wp_die(__('You do not have sufficient permissions to access this page.'));
    }

    include 'lib/options.php';
}
?>