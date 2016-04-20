(function($) {
  function aboutInfo() {
    var $bioBtn = $('#bio'),
      $bio = $('#bio-info'),
      $skillsBtn = $('#skills'),
      $skills = $('#bio-skills'),
      $about = $('.about-info'),
      $close = $('#about-close'),
      open = 'is-open';


    // close button
    $close.click(function() {
      $about.removeClass(open);
      $(this).fadeOut();
    });

    // bio button
    $bioBtn.click(function() {
      $close.fadeIn();

      $bio.addClass(open);
    });

    // skills button
    $skillsBtn.click(function() {
      $close.fadeIn();

      $skills.addClass(open);
    });


  }

  function workItem() {
    var $item = $('.img-container'),
      large = 'is-large';

    $item.click(function() {
      var $self = $(this);

      $self.addClass(large);
    });
  }

  $(function() {
    aboutInfo();
    workItem();
  });
}(jQuery));
