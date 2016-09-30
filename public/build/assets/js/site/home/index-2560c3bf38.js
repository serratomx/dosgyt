$(document).on('ready', function(){
  var $window = $(window),
      $navbar = $('#navbar'),
      $jumbotron = $('#jumbotron'),
      $imgHome = $('#img-home'),
      $sections = $('.section');

  var posYnavbar = ($jumbotron.position().top + $jumbotron.height()) * 0.7;

  $window.scroll(function() {

    if ($window.scrollTop() > posYnavbar) {
      $navbar.addClass('app-navbar-fixed');
    } else {
      $navbar.removeClass('app-navbar-fixed');
    }
  });

  $imgHome.parallax();

  $sections.on('scrollSpy:enter', function() {
    var $this = $(this),
        id = $this.attr('id');

    if (id == 'description') {
      $('.animation-container', $this).toggleClass('animated fadeInUp fade');
    }
  });

  $sections.on('scrollSpy:exit', function() {
    var $this = $(this),
        id = $this.attr('id');

    if (id == 'description') {
      $('.animation-container', $this).toggleClass('animated fadeInUp fade');
    }
  });

  $sections.scrollSpy();
});
//# sourceMappingURL=index.js.map
