$(function () {

    // Cart
    function showCart(cart) {
        $('#cart-modal .modal-cart-content').html(cart);
        const myModalEl = document.querySelector('#cart-modal');
        const modal = bootstrap.Modal.getOrCreateInstance(myModalEl);
        modal.show();

        if ($('.cart-amount').text()) {
            $('.count-items').text($('.cart-amount').text());
        } else {
            $('.count-items').text('0');
        }
    }


    $('#get-cart').on('click', function (e) {
        e.preventDefault();
        $.ajax({
            url: 'cart/show',
            type: 'GET',
            success: function (res) {
                showCart(res);
            },
            error: function () {
                alert('Error!');
            }
        });
    });


    $('#cart-modal .modal-cart-content').on('click', '.del-item', function(e) {
        e.preventDefault();
        const id = $(this).data('id');
        $.ajax({
            url: 'cart/delete',
            type: 'GET',
            data: {id: id},
            success: function (res) {
                showCart(res);
                $('#product-' + id).find('i').removeClass('bi-cart-check-fill').addClass('bi-cart');
            },
            error: function () {
                alert('Error!');
            }
        });
    });

    $('#cart-modal .modal-cart-content').on('click', '#clear-cart', function() {
        $.ajax({
            url: 'cart/clear',
            type: 'GET',
            success: function (res) {
                showCart(res);
                $('.add-to-cart i').removeClass('bi-cart-check-fill').addClass('bi-cart');
            },
            error: function () {
                alert('Error!');
            }
        });
    });


    $('.add-to-cart').on('click', function (e) {
        e.preventDefault();
        const id = $(this).data('id');
        const amount = $('#input-amount').val() ? $('#input-amount').val() : 1;
        const obj = $(this);
        $.ajax({
            url: 'cart/add',
            type: 'GET',
            data: {id: id, amount: amount},
            success: function (res) {
                showCart(res);
                obj.find('i').removeClass('bi-cart').addClass('bi-cart-check-fill');
            },
            error: function () {
                alert('Error!');
            }
        });
    });

    // END Cart

    $('#input-sort').on('change', function () {
        window.location = PATH + window.location.pathname + '?' + $(this).val();
    });

    $('.open-search').click(function (e) {
        e.preventDefault();
        $('#search').addClass('active');
    });

    $('.close-search').click(function () {
        $('#search').removeClass('active');
    });

    $(window).scroll(function () {
        if ($(this).scrollTop() > 200) {
            $('#go-up').fadeIn();
        } else {
            $('#go-up').fadeOut();
        }
    });

    $('#go-up').click(function () {
        $('body, html').animate({ scrollTop: 0 }, 500);
    });

    $('.sidebar-toggler .btn').click(function () {
        $('.sidebar-toggle').slideToggle();
    });

    $('.thumbnails').magnificPopup({
        type: 'image',
        delegate: 'a',
        gallery: {
            enabled: true
        },
        removalDelay: 500,
        callbacks: {
            beforeOpen: function () {
                // just a hack that adds mfp-anim class to markup 
                this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
                this.st.mainClass = this.st.el.attr('data-effect');
            }
        }
    });


    $('#languages button').on('click', function() {
        const lang_code = $(this).data('langcode');
        window.location = PATH + '/language/change?lang=' + lang_code;
    });

})