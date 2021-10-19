var scrolltoOffset = $('#NavegacionNavbar').outerHeight() - 1;
$(document).on('click', '.nav a, .mobile-nav a', function(e) {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
        var target = $(this.hash);
        if (target.length) {
            e.preventDefault();

            var scrollto = target.offset().top - scrolltoOffset;

            if ($(this).attr("href") == '#header') {
                scrollto = 0;
            }

            $('html, body').animate({
                scrollTop: scrollto
            }, 1500, 'easeInOutExpo');

            if ($(this).parents('.nav, .mobile-nav').length) {
                $('.nav .active, .mobile-nav .active').removeClass('active');
                $(this).closest('li').addClass('active');
            }

            if ($('body').hasClass('mobile-nav-active')) {
                $('body').removeClass('mobile-nav-active');
                $('.mobile-nav-toggle i').toggleClass('icofont-navigation-menu icofont-close');
                $('.mobile-nav-overly').fadeOut();
            }
            return false;
        }
    }
});