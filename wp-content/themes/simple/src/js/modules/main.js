;
(function($) {
  function overlay() {
    var $overlay = $('.overlay'),
        $main = $('.main');

    $main.fadeToggle();
    $overlay.fadeToggle();
  }

  function mainBtn() {
    var $btn = $('#main-btn');

    $btn.click(function() {
      overlay();
    });
  }
  $(function() {
    mainBtn();
  });
}(jQuery));
