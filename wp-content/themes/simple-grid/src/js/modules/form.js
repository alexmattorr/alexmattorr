(function($) {

  function inputValidateOnChange() {
    var $input = $('.input-required'),
      invalid = 'invalid';

    $input.bind('change, input', function() {
      if ($(this).val() !== '') {
        $(this).removeClass(invalid);
      } else {
        $(this).addClass(invalid);
      }
    });
  }

  function phoneFormatter() {
    var $phoneField = $('input[type=text].phone');

    $phoneField.on('input', function() {
      var number = $(this).val().replace(/[^\d]/g, '');

      if (number.length === 7) {
        number = number.replace(/(\d{3})(\d{4})/, "$1-$2");
      } else if (number.length === 10) {
        number = number.replace(/(\d{3})(\d{3})(\d{4})/, "($1) $2-$3");
      }

      $(this).val(number);
    });
  }

  function validate() {
    var $input = $('.input-required'),
      invalid = 'invalid';

    $input.each(function() {
      var $self = $(this),
        value = $self.val();

      if (value === '' || value === null) {
        $self.addClass(invalid);
      }
    });
  }

  function sendData(form, formUrl) {
    var $form = $(form),
      data = $form.serialize();

    $.ajax({
      url: formUrl,
      data: data,
      dataType: "xml",
      complete: function() {
        console.log(data);
      }
    });
  }

  function formSubmit(button, formSelector, googleUrl) {
    var $submit = $(button),
      form = formSelector,
      url = googleUrl;

    $submit.click(function(e) {
      e.preventDefault();
      validate();

      var isValid = true;

      $(form).find('.input-required').each(function() {
        if ($(this).val() === '') {
          isValid = false;
        }
      });

      if (isValid === true) {
        sendData(form, url);
      }
      return isValid;
    });
  }


  $(function() {
    inputValidateOnChange();
    phoneFormatter();

  });
}(jQuery));
