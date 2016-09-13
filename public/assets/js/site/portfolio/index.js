$(document).on('ready', function() {
  var $portfolio = $('.app-portfolio');

  $('.tablist a[data-toggle="tab"]', $portfolio).on('shown.bs.tab', function (e) {
    var $this = $(this);

    window.history.pushState({"html": window.location.href, "pageId": $this.data('id'), "pageTitle": '2G&T | ' +$this.data('title')},"", $this.data('url'));
    document.title = '2G&T | ' + $this.data('title');
  });

  window.onpopstate = function(e){
    if(e.state){
      $('.tablist a[href="#' + e.state.pageId + '"]', $portfolio).tab('show');
      document.title = e.state.pageTitle;
    }
  };
});