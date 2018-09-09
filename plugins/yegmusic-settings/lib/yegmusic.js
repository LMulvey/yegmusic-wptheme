(function($) {
  $(document).ready(() => {


    /** onChange handler for category select dropdown */
    $('#yegmusic-featured-artist-category-select').change(e => {
      console.log('hello there', e)
      $('#yegsettings-form').submit();
    }); 


  })
})(jQuery);