function loadItem($viewer, url, submenu, item) {
  var $title        = $('.app-title', $viewer),
      $subtitle     = $('.app-subtitle', $viewer),
      $description  = $('.app-description', $viewer),
      $coverPage    = $('.app-cover-page', $viewer),
      $prevItem     = $('.app-prev-item', $viewer),
      $nextItem     = $('.app-next-item', $viewer);

  $.ajax({
    type: 'GET',
    url: url+'/portfolio/'+submenu+'/viewer/'+item+'.json',
    dataType: 'json',
    beforeSend: function() {

    },
    success: function(resp) {
      if (resp.status == 'SUCCESS') {
        var submenu        = resp.data.submenu,
            current_item  = resp.data.current_item,
            prev_item     = resp.data.prev_item.keyword,
            next_item     = resp.data.next_item.keyword;

        if ($coverPage.length == 1) {
          $coverPage
            .attr({
              src: current_item.cover_page_link,
              title: current_item.name,
              alt: current_item.name
            });
        }

        if ($title.length == 1) {
          $title.text(current_item.name ? current_item.name : '');
        }

        if ($subtitle.length == 1) {
          $subtitle.text(submenu.name ? submenu.name : '');
        }

        if ($description.length == 1) {
          $description.text(current_item.description ? current_item.description : '');
        }

        if (prev_item !== null) {
          $prevItem.data('item', prev_item).removeClass('disabled');
        } else {
          $prevItem.data('item', null).addClass('disabled');
        }

        if (next_item !== null) {
          $nextItem.data('item', next_item).removeClass('disabled');
        } else {
          $nextItem.data('item', null).addClass('disabled');
        }
      }
    },
    error: function(res, textStatus, jqxhr) {
      alert("AJAX Error");
    }
  });  
}

$(document).on('ready', function(){
  var $viewer = $('.app-viewer'),
      $prevItem = $('.app-prev-item', $viewer),
      $nextItem = $('.app-next-item', $viewer);

  loadItem($viewer, __current_url, __submenu, __current_item);

  $prevItem.click(function(event){
    event.preventDefault();
    var $this = $(this),
        item  = $this.data('item');

    loadItem($viewer, __current_url, __submenu, item);
  });

  $nextItem.click(function(event){
    event.preventDefault();
    var $this = $(this),
        item  = $this.data('item');

    loadItem($viewer, __current_url, __submenu, item);
  });
});