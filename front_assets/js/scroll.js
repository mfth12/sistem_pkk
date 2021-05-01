(function($) {
    "use strict"
    var btn = $('#button-up');

    $(window).scroll(function() {
        if ($(window).scrollTop() > 250) {
            btn.addClass('show');
        } else {
            btn.removeClass('show');
        }
    });

    btn.on('click', function(e) {
        e.preventDefault();
        // $('html, body').animate({scrollTop: 0}, '2');
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    });
})(jQuery);
