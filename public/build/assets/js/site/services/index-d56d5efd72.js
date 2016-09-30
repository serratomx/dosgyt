$(document).on('ready', function(){
  var $services = $('.app-services'),
      $servicesContainer = $('.services-container', $services),
      $serviceslist = $('.services-list', $servicesContainer);

  var service =  0,
      num_services = $serviceslist.length;

  for (var i = 0; i < 2 && service < num_services; ++i) {
    var $sl = $($serviceslist[service]);

    $sl.toggleClass('fadeInUp hidden');
    ++service;
  }

  if (service < num_services) {
    var interval = setInterval(function() {
      for (var i = 0; i < 2 && service < num_services; ++i) {
        var $this = $($serviceslist[service]);

        $this.toggleClass('fadeInUp hidden');
        ++service;

        if (service == num_services) {
          clearInterval(interval);
        }
      }
    }, 200);
  }
});
//# sourceMappingURL=index.js.map
