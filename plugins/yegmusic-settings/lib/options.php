<div class="wrap">
  <h1>Yeg Music - Settings</h1>
    
  <form method="post" action="options.php" id="yegsettings-form"> 
    <?php
      settings_fields( 'yegmusic-options' );
      do_settings_sections( 'yegmusic-options' );
    ?>

    <table class="widefat">
      <thead>
        <tr>
          <th colspan="2" class="row-title">Featured Artist Settings</th>
        </tr>
      </thead>
      

      <tr valign="top">
        <td scope="row">
          <label for="tablecell">Featured Artist?</label> 
        </td>
        <td>
          <select name="yegmusic_featured_artist_post">
          <?php
            $all_pages = get_posts( array(
              'category' => get_option( 'yegmusic_featured_artist_category' )
            ) );

            foreach( $all_pages as $page ) {
              $id = $page->ID;
              $title = $page->post_title;
              ?>
              <option 
                value="<?php echo esc_attr( $id ); ?>" 
                <?php if ( $id == get_option('yegmusic_featured_artist_post') ) { echo 'selected="selected"'; } ?> 
              >
                <?php echo $title; ?>
              </option>
              <?php
            }
          ?>
          </select>
        </td>
      </tr>
      </table>

      <br />

      <table class="widefat">
      <thead>
        <tr>
          <th colspan="2" class="row-title">Front Page Settings</th>
        </tr>
      </thead>
      
      <tr valign="top">
        <td scope="row">
          <label for="tablecell">Show header/landing page once per session?</label> 
        </td>
        <td>
          <select name="yegmusic_masthead_once_per_session">
          <?php $once_per_session = get_option('yegmusic_masthead_once_per_session'); ?>
            <option value="true"
            <?php echo ($once_per_session === "true" ) ? 'selected="selected"' : '' ?>>
              Yes
            </option>
            <option value="false"
            <?php echo ( $once_per_session === "false" ) ? 'selected="selected"' : '' ?>>
              No
            </option>
          </select>
        </td>
      </tr>

      <tr valign="top">
        <td scope="row">
          <label for="tablecell">About Us Page</label> 
        </td>
        <td>
          <select name="yegmusic_about_us_page">
          <?php
            $all_pages = get_pages();

            foreach( $all_pages as $page ) {
              $id = $page->ID;
              $title = $page->post_title;
              ?>
              <option 
                value="<?php echo esc_attr( $id ); ?>" 
                <?php if ( $id == get_option('yegmusic_about_us_page') ) { echo 'selected="selected"'; } ?> 
              >
                <?php echo $title; ?>
              </option>
              <?php
            }
          ?>
          </select>
        </td>
      </tr>

      <tr valign="top">
        <td scope="row">
          <label for="tablecell">FAQ Page</label> 
        </td>
        <td>
          <select name="yegmusic_faq_page">
          <?php
            $all_pages = get_pages();

            foreach( $all_pages as $page ) {
              $id = $page->ID;
              $title = $page->post_title;
              ?>
              <option 
                value="<?php echo esc_attr( $id ); ?>" 
                <?php if ( $id == get_option('yegmusic_faq_page') ) { echo 'selected="selected"'; } ?> 
              >
                <?php echo $title; ?>
              </option>
              <?php
            }
          ?>
          </select>
        </td>
      </tr>

      </table>

      <br />

    <table class="widefat">
      <thead>
        <tr>
          <th colspan="2" class="row-title">
          Advanced Settings
          <div class="notice notice-error inline">
            <p>Please only touch if you know what you're doing. These can break things.</p>
          </div>
          </th>
        </tr>
      </thead>

      <tr valign="top">
        <td scope="row">
            <label for="tablecell">Featured Artist - Post Category</label> 
        </td>
        <td>
          <select id="yegmusic-featured-artist-category-select" name="yegmusic_featured_artist_category">
          <?php
            $all_categories = get_categories();

            foreach( $all_categories as $category ) {
              $id = $category->term_id;
              $name = $category->name;
              ?>
              <option 
                value="<?= esc_attr( $id ) ?>" 
                <?php if ( $id == get_option('yegmusic_featured_artist_category') ) { 
                  echo 'selected="selected"'; 
                } ?> 
              >
                <?= $name ?>
              </option>
              <?php
            }
          ?>
          </select>
        </td>
      </tr>

    </table>

    <?php submit_button(
      'Save Changes',
      'primary',
      null
    ); ?>
  </form>
</div>  

