(function($) {
  function waveIt() {
    console.log('working');
    Waves.init();
    Waves.attach('.is-small', ['waves-button', 'waves-float']);
  }

  $(function() {
    // waveIt();
  });
}(jQuery));
