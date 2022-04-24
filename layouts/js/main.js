$(function() {

    $('.open-search').click(function(e) {
        e.preventDefault();
        $('#search').addClass('active');
    });

    $('.close-search').click(function() {
        $('#search').removeClass('active');
    });

    $(window).scroll(function() {
        if ($(this).scrollTop() > 200) {
            $('#go-up').fadeIn();
        } else {
            $('#go-up').fadeOut();
        }
    });

    $('#go-up').click(function() {
        $('body, html').animate({scrollTop: 0}, 500);
    });

    $('.sidebar-toggler .btn').click(function() {
        $('.sidebar-toggle').slideToggle();
    });

})