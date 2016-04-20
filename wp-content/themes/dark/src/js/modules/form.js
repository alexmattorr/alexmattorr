;(function($){
  $(function(){
		form_submit();
  });

  function add_invalid() {
    var $input  = $('input, textarea, select').not(':input[type=button], :input[type=submit], :input[type=reset]'),
        invalid = 'invalid';

    $input.removeClass(invalid);
    $input.each(function() {
      var $self = $(this);
      value = $self.val();
      if (value == '' || value == null) {
        $self.addClass(invalid)
      }
    });
  }

  function form_data() {
    var name      = $("#name").val(),
        tel       = $('#tel').val(),
        email     = $('#email').val(),
        message   = $('#message').val(),
        homeURL   = location.origin,
        thankURL  = homeURL + '/thank-you',
        // google ajax post url
        url       = '';

    $.ajax({
      url: url,
      data: {
      	// add google form id here
        ""   : name,
        ""  : tel,
        ""  : email,
        ""  : message
      },
      type: "POST",
      crossDomain: true,
      dataType: "xml",
      complete: function() {
        window.location = thankURL;
      }
    });
  }

  function form_submit() {
    var $submit = $('#submit');

    $submit.click(function() {
      var name    = $("#name").val(),
          tel     = $('#tel').val(),
          email   = $('#email').val(),
          message = $('#message').val();

      if (name == '' || name == null || tel == '' || tel == null || email == '' || email == null) {
        add_invalid();
      } else {
        form_data();
      }
    });
  }
}(jQuery));
