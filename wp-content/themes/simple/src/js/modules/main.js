;
(function($) {
  function overlay() {
    var $overlay = $('.overlay'),
      $main = $('.main');

    $main.fadeToggle();
    $overlay.fadeToggle();
  }

  function overlayClicks() {
    var $btn = $('#main-btn'),
      $close = $('.overlay-close');

    $btn.click(function() {
      overlay();
    });

    $close.click(function() {
      overlay();
    });

    $(document).keyup(function(e) {
      if (e.keyCode === 27) {
        overlay();
      }
    });
  }

  $(function() {
    overlayClicks();
  });
}(jQuery));
