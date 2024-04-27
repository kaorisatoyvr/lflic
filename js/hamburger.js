jQuery(document).ready(function($) {
    const menu_btn = $('.hamburger');
    const mobile_menu = $('.mobile-nav');
  
    menu_btn.on('click', function() {
        menu_btn.toggleClass('is-active');
        mobile_menu.toggleClass('is-active');
    });

     // Close mobile menu when a link inside the mobile menu is clicked
     mobile_menu.on('click', 'a', function() {
        menu_btn.removeClass('is-active');
        mobile_menu.removeClass('is-active');
    });

  });