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

});