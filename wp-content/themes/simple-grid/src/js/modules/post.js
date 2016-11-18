(function($) {

  function postToggle() {
    var $title = $('.post h3'),
        open = 'is-open',
        timing = 'fast';

    $title.click(function() {
      var $self = $(this),
          $parent = $self.closest('.post'),
          $info = $parent.find('.post-info');

        $parent.toggleClass(open);
        $info.slideToggle(timing);
    });
  }

  $(function() {
    postToggle();
  });
}(jQuery));
