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

})