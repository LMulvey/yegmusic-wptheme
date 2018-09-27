(function($) {
  $(document).ready(() => {


    /** onChange handler for category select dropdown */
    $('#yegmusic-featured-artist-category-select').change(e => {
      $('#yegsettings-form').submit();
    }); 


  })
})(jQuery);