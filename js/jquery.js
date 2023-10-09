(function($) {
    $('.js-nav-menu-toggle').on('click', function(e) {
      $(this).parents('.navigation-menu').toggleClass('navigation-menu--open');
      if(!$(e.target).closest('.js-nav-menu').length &&
      ($('.js-nav-menu').hasClass('navigation-menu--open'))) {
        $('.js-nav-menu').removeClass('navigation-menu--open');
    }
    });
    
    $('html').on('click', function(e) {
      if(!$(e.target).closest('.js-nav-menu').length &&
        ($('.js-nav-menu').hasClass('navigation-menu--open'))) {
          $('.js-nav-menu').removeClass('navigation-menu--open');
      }
    });
 
    
  })(jQuery);


 