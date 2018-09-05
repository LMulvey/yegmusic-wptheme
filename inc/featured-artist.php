<?php
/**
 * Custom header implementation
 *
 * @link https://codex.wordpress.org/Custom_Headers
 *
 * @package WordPress
 * @subpackage yegmusic
 * @since 1.0
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses yegmusic_header_style()
 */
function yegmusic_custom_header_setup() {

	/**
	 * Filter YEGMusic custom-header support arguments.
	 *
	 * @since YEGMusic 1.0
	 *
	 * @param array $args {
	 *     An array of custom-header support arguments.
	 *
	 *     @type string $default-image     		Default image of the header.
	 *     @type string $default_text_color     Default color of the header text.
	 *     @type int    $width                  Width in pixels of the custom header image. Default 954.
	 *     @type int    $height                 Height in pixels of the custom header image. Default 1300.
	 *     @type string $wp-head-callback       Callback function used to styles the header image and text
	 *                                          displayed on the blog.
	 *     @type string $flex-height     		Flex support for height of header.
	 * }
	 */

  $fp_id = 46;
  $featured_artist_id = get_field( 'featured_artist_post', $fp_id )->ID;
  $header_image = get_field( 'featured_photo_1', $featured_artist_id );
  // echo $full_image;

	add_theme_support( 'custom-header', apply_filters( 'yegmusic_custom_header_args', array(
		'default-image'      => $header_image['sizes']['large'],
		'width'              => 2000,
		'height'             => 1200,
		'flex-height'        => true,
    'video'              => true,
    'uploads'            => false,
		'wp-head-callback'   => 'yegmusic_header_style',
	) ) );

	register_default_headers( array(
		'default-image' => array(
			'url'           => $header_image['sizes']['large'],
			'thumbnail_url' => $header_image['sizes']['thumbnail'],
			'description'   => __( 'Default Header Image', 'yegmusic' ),
		),
	) );
}
add_action( 'after_setup_theme', 'yegmusic_custom_header_setup' );

if ( ! function_exists( 'yegmusic_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog.
 *
 * @see yegmusic_custom_header_setup().
 */
function yegmusic_header_style() {
	$header_text_color = get_header_textcolor();

	// If no custom options for text are set, let's bail.
	// get_header_textcolor() options: add_theme_support( 'custom-header' ) is default, hide text (returns 'blank') or any hex value.
	if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
		return;
	}

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style id="yegmusic-custom-header-styles" type="text/css">
	<?php
		// Has the text been hidden?
		if ( 'blank' === $header_text_color ) :
	?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that.
		else :
	?>
		.site-title a,
		.colors-dark .site-title a,
		.colors-custom .site-title a,
		body.has-header-image .site-title a,
		body.has-header-video .site-title a,
		body.has-header-image.colors-dark .site-title a,
		body.has-header-video.colors-dark .site-title a,
		body.has-header-image.colors-custom .site-title a,
		body.has-header-video.colors-custom .site-title a,
		.site-description,
		.colors-dark .site-description,
		.colors-custom .site-description,
		body.has-header-image .site-description,
		body.has-header-video .site-description,
		body.has-header-image.colors-dark .site-description,
		body.has-header-video.colors-dark .site-description,
		body.has-header-image.colors-custom .site-description,
		body.has-header-video.colors-custom .site-description {
			color: #<?php echo esc_attr( $header_text_color ); ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif; // End of yegmusic_header_style.

/**
 * Customize video play/pause button in the custom header.
 *
 * @param array $settings Video settings.
 * @return array The filtered video settings.
 */
function yegmusic_video_controls( $settings ) {
	$settings['l10n']['play'] = '<span class="screen-reader-text">' . __( 'Play background video', 'yegmusic' ) . '</span>' . yegmusic_get_svg( array( 'icon' => 'play' ) );
	$settings['l10n']['pause'] = '<span class="screen-reader-text">' . __( 'Pause background video', 'yegmusic' ) . '</span>' . yegmusic_get_svg( array( 'icon' => 'pause' ) );
	return $settings;
}
add_filter( 'header_video_settings', 'yegmusic_video_controls' );
