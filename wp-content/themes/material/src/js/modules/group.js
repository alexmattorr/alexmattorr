(function($) {
  function group() {
    var $group = $('.group'),
      $content = $('.content'),
      content = '.content',
      small = 'is-small',
      large = 'is-large';

    $group.click(function(e) {
      var $self = $(this);

      if ($self.hasClass(small)) {
        $group.removeClass(large).addClass(small);
        $content.hide();

        $self.removeClass(small).addClass(large);
        setTimeout(function() {
          $self.find(content).fadeIn();
        }, 500);
      } else {
        $group.addClass(small);

        $self.removeClass(small).addClass(large);
        setTimeout(function() {
          $self.find(content).fadeIn();
        }, 250);
      }

    });
  }

  $(function() {
    group();
  });
}(jQuery));
