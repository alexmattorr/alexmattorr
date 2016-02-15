;
(function($) {
  function interactiveBg() {
    var $bg = $('.bg');
    $bg.interactive_bg({
      strength: 25,
      scale: 1.05,
      animationSpeed: "100ms",
      contain: true,
      wrapContent: false
    });

    $(window).resize(function() {
      $(".bg > .ibg-bg").css({
        width: $(window).outerWidth(),
        height: $(window).outerHeight()
      });
    });
  }
  $(function() {
    interactiveBg();
  });
}(jQuery));
