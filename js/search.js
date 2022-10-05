$('#search').click(function() {
    $('.search-form').animate({right: 0}, 50);
    $('.search-popup').show();
    $('.search-bg').click(function() {
      $('.search-popup').hide();
      $('.search-form').animate({right: '-100%'}, 50);
    });
  });