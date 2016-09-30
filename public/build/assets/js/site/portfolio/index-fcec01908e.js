$(document).on('ready', function() {
  var $portfolio = $('.app-portfolio'),
      $tabPaneActive = $('.tab-content > .tab-pane.active', $portfolio);

  window.onpopstate = function(e){
    if(e.state){
      $('.tablist a[href="#' + e.state.pageId + '"]', $portfolio).tab('show');
      document.title = e.state.pageTitle;
    }
  };

  var num_clients = $('.client-container', $tabPaneActive).length,
        client = 0;

  for (var i = 0; i < 4 && client < num_clients; ++i) {
    $('#client-container-' + client, $tabPaneActive).toggleClass('hidden fadeInUp');
    ++client;
  }

  if (client < num_clients) {
    var interval = setInterval(function() {
        for (var i = 0; i < 4 && client < num_clients; ++i) {
          $('#client-container-' + client, $tabPaneActive).toggleClass('hidden fadeInUp');
          ++client;
        }
        if (client == num_clients) {
          clearInterval(interval);
        }
    }, 200);
  }

  $('ul.tablist a[data-toggle="tab"]', $portfolio).on('shown.bs.tab', function (e) {
    var $this = $(this),
        $tabPane = $($this.attr('href'));

    window.history.pushState({"html": window.location.href, "pageId": $this.data('id'), "pageTitle": '2G&T | ' +$this.data('title')},"", $this.data('url'));
    document.title = '2G&T | ' + $this.data('title');

    var num_clients = $('.client-container', $tabPane).length,
        client = 0;

    for (var i = 0; i < 4 && client < num_clients; ++i) {
      $('#client-container-' + client, $tabPane).toggleClass('hidden fadeInUp');
      ++client;
    }

    if (client < num_clients) {
      var interval = setInterval(function() {
          for (var i = 0; i < 4 && client < num_clients; ++i) {
            $('#client-container-' + client, $tabPane).toggleClass('hidden fadeInUp');
            ++client;
          }
          if (client == num_clients) {
            clearInterval(interval);
          }
      }, 200);
    }
  });

  $('ul.tablist a[data-toggle="tab"]', $portfolio).on('hide.bs.tab', function (e) {
    var $this = $(this),
        $tabPane = $($this.attr('href'));

    $('.client-container', $tabPane).each(function() {
      var $this = $(this);

      $this.toggleClass('hidden fadeInUp');
    });
  });
});
//# sourceMappingURL=index.js.map
