(function($) {

  function work() {
    var $item = $('.sidebar-item'),
      $content = $('.content-item'),
      $aPrev = $('.left-btn'),
      $aNext = $('.right-btn'),
      $active = $('.item-active'),
      active = 'item-active';


    function arrowClick() {

      $aPrev.on('click', function() {
        var $li = $('.sidebar-item'),
          $curr = $('.item-active'),
          $prev = $curr.prev();

        if ($prev.length === 0) {
          $prev = $li.last();
        }

        $curr.removeClass(active);
        $prev.addClass(active);

        $content.hide();

        $content.hide();
        $('#' + $prev.data('item')).show();
      });

      $aNext.on('click', function() {
        var $li = $('.sidebar-item'),
          $curr = $('.item-active'),
          $next = $curr.next();

        if ($next.length === 0) {
          $next = $li.first();
        }

        $curr.removeClass(active);
        $next.addClass(active);

        $content.hide();
        $('#' + $next.data('item')).show();
      });

    }

    function itemClick() {
      var $content = $('.content-item');

      $item.click(function() {
        var $self = $(this),
          data = $self.data('item'),
          $data = $('#' + data);

        $content.hide();
        $data.show();


        $item.removeClass(active);
        $self.addClass(active);
      });
    }

    arrowClick();
    itemClick();
  }

  $(function() {
    work();
  });
}(jQuery));
