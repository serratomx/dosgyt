$(document).on('ready', function() {
  var $ourClients = $('.app-our-clients'),
      $ourClientsContainer = $('.our-clients-container', $ourClients);

  var num_clients = $('.client-container', $ourClientsContainer).length,
        client = 0;

  for (var i = 0; i < 4 && client < num_clients; ++i) {
    $('#client-container-' + client, $ourClientsContainer).toggleClass('hidden fadeInUp');
    ++client;
  }

  if (client < num_clients) {
    var interval = setInterval(function() {
        for (var i = 0; i < 4 && client < num_clients; ++i) {
          $('#client-container-' + client, $ourClientsContainer).toggleClass('hidden fadeInUp');
          ++client;
        }

        if (client == num_clients) {
          clearInterval(interval);
        }
    }, 200);
  }
});