$(document).on('ready', function(){
  var $window = $(window),
      $body = $('body'),
      $contact_form = $('#contact-form');

  $contact_form.validate({
    rules: {
      "contact[name]": {
        required: true,
        maxlength: 60
      },
      "contact[company]": {
        required: true,
        maxlength: 60
      },
      "contact[telephone]": {
        required: true,
        regex: /^[0-9]{10,10}$/
      },
      "contact[email]": {
        required: true,
        email: true,
        maxlength: 250
      },
      "contact[msg]": {
        required: true,
        maxlength: 2048
      }
    },
    messages: {
      "contact[name]": {
        required: "Por favor, introduzca su nombre."
      },
      "contact[company]": {
        required: "Por favor, introduzca el nombre de su empresa.",
      },
      "contact[telephone]": {
        required: "Por favor, introduzca su número de teléfono o celular.",
        regex: "El número telefónico únicamente debe estar conformado por dígitos."
      },
      "contact[email]": {
        required: "Por favor, introduzca su correo electrónico.",
        email: "Correo electrónico inválido.",
      },
      "contact[msg]": {
        required: "Introduzca algún mensaje..."
      }
    },
    submitHandler: function(form) {
      var $form = $(form);

      $.ajax({
        type: "POST",
        url: $form.attr('action'),
        data: $form.serialize(),
        dataType : 'json',

        beforeSend: function() { 
          $body.loading({
            message: "Cargando...",
            theme: 'light',
            onStart: function(loading) {
              loading.overlay.slideDown(400);
            },
            onStop: function(loading) {
              loading.overlay.slideUp(400);
            }
          });
        },
        success: function(res) {
          if (res.status == 'SUCCESS') {
            $('#form-contact input, #form-contact textarea').each(function() {
              var e = $(this);

              if(e.attr('type') != 'hidden') {
                e.val('').removeClass('error');
              }
            });

            $('#form-contact label.error').each(function() {
              $(this).remove();
            });
            
            $body
              .loading('toggle')
              .loading({
                theme: 'light',
                message: res.msg,
                onStart: function(loading) {
                  loading.overlay.slideDown(400);
                },
                onStop: function(loading) {
                  loading.overlay.slideUp(400);
                }
              });
            setTimeout( function ( ) { 
              $body.loading('stop'); 
            }, 3200); 
          }
          else if (res.status == 'VALIDATION_ERROR') {
            $body
              .loading('toggle')
              .loading({
                theme: 'light',
                message: res.msg,
                onStart: function(loading) {
                  loading.overlay.slideDown(400);
                },
                onStop: function(loading) {
                  loading.overlay.slideUp(400);
                }
              });
            setTimeout( function ( ) { 
              $body.loading('stop'); 
            }, 3200); 
          } 
          else if(res.status == 'ERROR_CONNECTION') {
            $body
              .loading('toggle')
              .loading({
                theme: 'light',
                message: res.msg,
                onStart: function(loading) {
                  loading.overlay.slideDown(400);
                },
                onStop: function(loading) {
                  loading.overlay.slideUp(400);
                }
              });
            setTimeout( function ( ) { 
              $body.loading('stop'); 
            }, 3200);     
          }
        },
        error: function(res, textstatus, jqxhr) {
          $body
            .loading('toggle')
            .loading({
              theme: 'light',
              message: 'Existe un error en la conexión <br/>¡Por favor, intentelo más tarde!',
              onStart: function(loading) {
                loading.overlay.slideDown(400);
              },
              onStop: function(loading) {
                loading.overlay.slideUp(400);
              }
            });
          setTimeout( function ( ) { 
            $body.loading('stop'); 
          }, 3200);
        }
      });
      return false;
    }
  });
});