$(function(){
  var $btnMenu = $('#btn-menu');

  // Add slideDown animation to dropdown
  $btnMenu.on('show.bs.dropdown', function(e){
    $(this).find('.dropdown-menu').first().stop(true, true)
    .slideDown(200, function() {
      $(this).css('min-height', '368px');
    });
  });

  // Add slideUp animation to dropdown
  $btnMenu.on('hide.bs.dropdown', function(e){
    $(this).find('.dropdown-menu').first().stop(true, true)
    .css('min-height', '')
    .slideUp(200);
  });

  $('.anchorLink').anchorAnimate();

  $btnMenu.hover(
  function(){
    var $this = $(this);

    $('.dropdown-menu', $this).stop(true, true)
    .slideDown(200, function() {
      $(this).css('min-height', '368px');
    });
  }, 
  function(){
    var $this = $(this);

    $('.dropdown-menu', $this).stop(true, true)
    .css('min-height', '')
    .slideUp(200);
  });

  $.validator.addMethod("regex", function(value, element, regexp) {
        var re = new RegExp(regexp);
        return this.optional(element) || re.test(value);
    },
    "Please check your input."
  );
});