(function($) {

  function navToggle() {
    var $item = $('.nav-item'),
      $aboutContent = $('#about-sidebar'),
      $aboutSide = $('#about-sidebar'),
      $about = $('.about-item'),
      $workContent = $('#work-content'),
      $workSide = $('#work-sidebar'),
      $work = $('.work-item'),
      active = 'is-active';

    $item.click(function() {
      var id = $(this).attr('id');

      $item.removeClass(active);
      $(this).addClass(active);

      if (id === 'work') {
        $about.removeClass(active);
        $work.addClass(active);
      } else {
        $work.removeClass(active);
        $about.addClass(active);
      }
    });
  }

  function work() {
    var $item = $('.sidebar-item'),
      $content = $('.content-item'),
      active = 'item-active';

    $item.click(function() {
      var data = $(this).data('item'),
        $info = $('#side-info-' + data),
        $image = $('#content-image-' + data);

      $content.removeClass(active);

      $info.addClass(active);
      $image.addClass(active);
      $(this).addClass(active);
    });

  }

  $(function() {
    navToggle();
    work();
  });
}(jQuery));
