/*  ---------------------------------------------------
    Template Name: Male Fashion
    Description: Male Fashion - ecommerce teplate
    Author: Colorib
    Author URI: https://www.colorib.com/
    Version: 1.0
    Created: Colorib
---------------------------------------------------------  */

'use strict';

(function ($) {

    /*------------------
        Preloader
    --------------------*/
    $(window).on('load', function () {
        $(".loader").fadeOut();
        $("#preloder").delay(200).fadeOut("slow");

        /*------------------
            Gallery filter
        --------------------*/
        $('.filter__controls li').on('click', function () {
            $('.filter__controls li').removeClass('active');
            $(this).addClass('active');
        });
        if ($('.product__filter').length > 0) {
            var containerEl = document.querySelector('.product__filter');
            var mixer = mixitup(containerEl);
        }
    });

    /*------------------
        Background Set
    --------------------*/
    $('.set-bg').each(function () {
        var bg = $(this).data('setbg');
        $(this).css('background-image', 'url(' + bg + ')');
    });

    //Search Switch
    $('.search-switch').on('click', function () {
        $('.search-model').fadeIn(400);
    });

    $('.search-close-switch').on('click', function () {
        $('.search-model').fadeOut(400, function () {
            $('#search-input').val('');
        });
    });

    /*------------------
		Navigation
	--------------------*/
    $(".mobile-menu").slicknav({
        prependTo: '#mobile-menu-wrap',
        allowParentLinks: true
    });

    /*------------------
        Accordin Active
    --------------------*/
    $('.collapse').on('shown.bs.collapse', function () {
        $(this).prev().addClass('active');
    });

    $('.collapse').on('hidden.bs.collapse', function () {
        $(this).prev().removeClass('active');
    });

    //Canvas Menu
    $(".canvas__open").on('click', function () {
        $(".offcanvas-menu-wrapper").addClass("active");
        $(".offcanvas-menu-overlay").addClass("active");
    });

    $(".offcanvas-menu-overlay").on('click', function () {
        $(".offcanvas-menu-wrapper").removeClass("active");
        $(".offcanvas-menu-overlay").removeClass("active");
    });

    /*-----------------------
        Hero Slider
    ------------------------*/
    $(".hero__slider").owlCarousel({
        loop: true,
        margin: 0,
        items: 1,
        dots: false,
        nav: true,
        navText: ["<span class='arrow_left'><span/>", "<span class='arrow_right'><span/>"],
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: false
    });

    /*--------------------------
        Select
    ----------------------------*/
    $("select").niceSelect();

    /*-------------------
		Radio Btn
	--------------------- */
    $(".product__color__select label, .shop__sidebar__size label, .product__details__option__size label").on('click', function () {
        $(".product__color__select label, .shop__sidebar__size label, .product__details__option__size label").removeClass('active');
        $(this).addClass('active');
    });

    /*-------------------
		Scroll
	--------------------- */
    $(".nice-scroll").niceScroll({
        cursorcolor: "#0d0d0d",
        cursorwidth: "5px",
        background: "#e5e5e5",
        cursorborder: "",
        autohidemode: true,
        horizrailenabled: false
    });

    /*------------------
        CountDown
    --------------------*/
    // For demo preview start
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    if(mm == 12) {
        mm = '01';
        yyyy = yyyy + 1;
    } else {
        mm = parseInt(mm) + 1;
        mm = String(mm).padStart(2, '0');
    }
    var timerdate = mm + '/' + dd + '/' + yyyy;
    // For demo preview end


    // Uncomment below and use your date //

    /* var timerdate = "2020/12/30" */

    $("#countdown").countdown(timerdate, function (event) {
        $(this).html(event.strftime("<div class='cd-item'><span>%D</span> <p>Days</p> </div>" + "<div class='cd-item'><span>%H</span> <p>Hours</p> </div>" + "<div class='cd-item'><span>%M</span> <p>Minutes</p> </div>" + "<div class='cd-item'><span>%S</span> <p>Seconds</p> </div>"));
    });

    /*------------------
		Magnific
	--------------------*/
    $('.video-popup').magnificPopup({
        type: 'iframe'
    });

    /*-------------------
		Quantity change
	--------------------- */
    var proQty = $('.pro-qty');
    proQty.prepend('<span class=" dec qtybtn-detail">-</span>');
    proQty.append('<span class=" inc qtybtn-detail">+</span>');
    proQty.on('click', '.qtybtn-detail', function () {
        var $button = $(this);
        var oldValue = $button.parent().find('input').val();
        if ($button.hasClass('inc')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 1) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 1;
            }
        }
        $button.parent().find('input').val(newVal);

    });


    var proQty = $('.pro-qty-2');
    proQty.prepend('<span class="fa fa-angle-left dec qtybtn"></span>');
    proQty.append('<span class="fa fa-angle-right inc qtybtn"></span>');
    proQty.on('click', '.qtybtn', function () {
        var $button = $(this);
        var oldValue = $button.parent().find('input').val();
        if ($button.hasClass('inc')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        $button.parent().find('input').val(newVal);
        //update cart
        var rowId = $button.parent().find('input').data('rowid');
        updateCart(rowId,newVal);
    });
    /*-------------------
       Range Slider
   --------------------- */
    var rangeSlider = $(".price-range"),
        minamount = $("#minamount"),
        maxamount = $("#maxamount"),
        minPrice = rangeSlider.data('min'),
        maxPrice = rangeSlider.data('max'),
        minValue = rangeSlider.data('min-value') !== '' ? rangeSlider.data('min-value') : minPrice,
        maxValue =rangeSlider.data('max-value') !== '' ? rangeSlider.data('max-value') : maxPrice;

    rangeSlider.slider({
        range: true,
        min: minPrice,
        max: maxPrice,
        values: [minValue, maxValue],
        slide: function (event, ui) {
            minamount.val('$' + ui.values[0]);
            maxamount.val('$' + ui.values[1]);
        }
    });
    minamount.val('$' + rangeSlider.slider("values", 0));
    maxamount.val('$' + rangeSlider.slider("values", 1));

    /*------------------
        Achieve Counter
    --------------------*/
    $('.cn_num').each(function () {
        $(this).prop('Counter', 0).animate({
            Counter: $(this).text()
        }, {
            duration: 4000,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });

})(jQuery);

function addCart(productId) {

    $.ajax({
        type: "GET",
        url:"cart/add",
        data:{productId: productId,},
        success: function (response){
            $('.cart-count').text(response['count']);
            $('.price').text('$' + response['total']);

            var row_tbody = $('.shopping__cart__table tbody');
            var row_exitstItem = row_tbody.find("tr[data-rowId='"+ response['cart'].rowId +"']");

            if (row_exitstItem.length){
                row_exitstItem.find('.product__cart__item__text h5').text('$'+response['cart'].price.toFixed(2));

            }else {
                var newItem =
                    '                                   <tr data-rowId="'+ response['cart'].rowId +'">\n' +
                    '                                    <td class="product__cart__item">\n' +
                    '                                        <div class="product__cart__item__pic">\n' +
                    '                                            @if(isset($cart->options[\'images\']) && count($cart->options[\'images\']) > 0)\n' +
                    '                                                <img src="'+ response['cart'].options.images[0].path +'" alt="" style="width: 90px;height: 90px; object-fit: cover">\n' +
                    '                                            @endif\n' +
                    '\n' +
                    '                                        </div>\n' +
                    '                                        <div class="product__cart__item__text">\n' +
                    '                                            <h6>'+ response['cart'].name+'</h6>\n' +
                    '                                            <h5>$'+ response['cart'].price.toFixed(2)+'</h5>\n' +
                    '                                        </div>\n' +
                    '                                    </td>\n' +
                    '                                    <td class="quantity__item">\n' +
                    '                                        <div class="quantity">\n' +
                    '                                            <div class="pro-qty-2">\n' +
                    '                                                <input type="text" value="{{$cart->qty}}">\n' +
                    '                                            </div>\n' +
                    '                                        </div>\n' +
                    '                                    </td>\n' +
                    '                                    <td class="cart__price">$\'+ response[\'cart\'].price.toFixed(2)+</td>\n' +
                    '                                    <td class="cart__close"><i onclick="removeCart(\''+ response['cart'] +'\')" class="fa fa-close"></i></td>\n' +
                    '                                </tr>';
                row_tbody.append(newItem);
            }
            var alertMsg = 'Add to cart successfully!';
            showAlert(alertMsg);

            // console.log(response);
        },
        error: function(response) {
            showAlert('Add failed');

            // console.log(response);
        },
    });
}

function showAlert(message) {
    var alertContainer = document.getElementById('alert-container');
    var alertMessage = document.querySelector('.alert-message');

    alertMessage.textContent = message;
    alertContainer.classList.remove('hide');

    setTimeout(function() {
        alertContainer.classList.add('hide');
    }, 3000);
}

function removeCart(rowId){
    $.ajax({
        type: "GET",
        url:"cart/delete",
        data:{rowId: rowId},
        success: function (response){
            // xử lý cart trong master.blade,php
            $('.cart-count').text(response['count']);
            $('.price').text('$' + response['total']);

            var row_tbody = $('.shopping__cart__table tbody');
            var row_exitstItem = row_tbody.find("tr[data-rowId='"+ rowId +"']");
            row_exitstItem.remove();
            // xử lý cart trong cart.blade.php
            var cart_tbody =$('.shopping__cart__table tbody');
            var cart_exitstItem = cart_tbody.find("tr[data-rowId='"+ rowId  +"']");
            cart_exitstItem.remove();

            $('.cart__total ul li:first-child span').text(response['subtotal']);
            $('.cart__total ul li:last-child span').text(response['total']);
            $('.cart__total ul li:nth-child(2) span').text(response['quantity']);

            var vatRate = 10; // Đặt tỷ lệ VAT tùy thuộc vào yêu cầu của bạn
            var subtotal = response['subtotal'];
            var vatAmount = calculateVAT(subtotal, vatRate);

            // Tính giá trị total bằng cách cộng subtotal, vatAmount và giá trị VAT mới
            var total = parseFloat(subtotal) + parseFloat(vatAmount);

            // Cập nhật giá trị total trong phần tổng của giỏ hàng
            $('.cart__total ul li:last-child span').text('$' + total.toFixed(2));

            $('.cart__total ul li:nth-child(2) span').text('$' + vatAmount.toFixed(2));

            var cartCount = parseInt(response['count']);
            if (cartCount === 0) {
                // Nếu số lượng sản phẩm là 0, tải lại trang
                location.reload(true);
            }
        },
        error:function (response){
            alert('Delete failed');
            // console.log(response);
        },
    });
}

function calculateVAT(subtotal, vatRate) {
    var vatAmount = (subtotal * vatRate) / 100;
    return parseFloat(vatAmount.toFixed(2));
}


$('.quantity-input').on('change', function() {
    var rowId = $(this).data('rowid');
    var qty = $(this).val();
    updateCart(rowId, qty);
});

$('.quantity-input').on('keydown', function(e) {
    if (e.keyCode === 13) {
        e.preventDefault();
        var rowId = $(this).data('rowid');
        var qty = $(this).val();
        updateCart(rowId, qty);
    }
});
function updateCart(rowId,qty){
    $.ajax({
        type: "GET",
        url:"cart/update",
        data:{rowId: rowId ,qty: qty},
        success: function (response){
            // xử lý cart trong master.blade,php
            $('.cart-count').text(response['count']);
            $('.price').text('$'+response['total']);

            var row_tbody = $('.shopping__cart__table tbody');
            var row_exitstItem = row_tbody.find("tr[data-rowId='"+ rowId +"']");
            if (qty === 0){
                row_exitstItem.remove();
            }else {
                row_exitstItem.find('.price').text('$'+response['cart'].price.toFixed(2)+'x'+response['cart'].qty);
            }

            // xử lý cart trong cart.blade.php
            var cart_tbody =$('.shopping__cart__table tbody');
            var cart_exitstItem = cart_tbody.find("tr[data-rowId='"+ rowId +"']");
            if (qty === 0){
                cart_exitstItem.remove();
            }else {
                cart_exitstItem.find('.cart__price').text('$'+ (response['cart'].price * response['cart'].qty).toFixed(2));
            }

            $('.cart__total ul li:first-child span').text('$' + response['subtotal']);

            var vatRate = 10; // Đặt tỷ lệ VAT tùy thuộc vào yêu cầu
            var subtotal = response['subtotal'];
            var vatAmount = calculateVAT(subtotal, vatRate);

            // Tính giá trị total bằng cách cộng subtotal, vatAmount và giá trị VAT mới
            var total = parseFloat(subtotal) + parseFloat(vatAmount);

            // Cập nhật giá trị total trong phần tổng của giỏ hàng
            $('.cart__total ul li:last-child span').text('$' + total.toFixed(2));

            $('.cart__total ul li:nth-child(2) span').text('$' + vatAmount.toFixed(2));

            var cartCount = parseInt(response['count']);
            if (cartCount === 0) {
                // Nếu số lượng sản phẩm là 0, tải lại trang
                location.reload(true);
            }
        },
        error:function (response){
            alert('Update failed');
            // console.log(response);
        },
    });
}

//Search Navbar
const searchIcon = document.getElementById("search-icon");
const searchInputContainer = document.querySelector(".search-input-container");
const searchInput = document.getElementById("search-input");

searchIcon.addEventListener("click", function () {
    searchInputContainer.classList.toggle("show-input");
    if (searchInputContainer.classList.contains("show-input")) {
        searchInput.focus();
    } else {
        searchInput.blur();
    }
});

document.addEventListener("click", function (event) {
    const targetElement = event.target;
    if (!targetElement.closest(".search-container")) {
        searchInputContainer.classList.remove("show-input");
        searchInput.blur();
    }
});

//Back to top
window.addEventListener('scroll', function() {
    var backToTopBtn = document.getElementById("back-to-top");

    if (window.scrollY > 20) {
        backToTopBtn.style.display = "block";
    } else {
        backToTopBtn.style.display = "none";
    }
});

function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}

// Shipping
document.addEventListener('DOMContentLoaded', function() {
    const subtotalGet = document.getElementById('subtotal');
    const vatAmountGet = document.getElementById('vatAmount');
    const shippingFeeGet = document.getElementById('shipping_fee');
    const totalGet = document.getElementById('total');
    const radioChecked = document.querySelectorAll('input[name="shipping_method"]');

    const shippingPrices = {
        'Standard Shipping': 10,
        'Express Shipping': 30
    };

    function updateTotal() {
        const subtotal = parseFloat(subtotalGet.textContent.replace('$', ''));
        const vatAmount = parseFloat(vatAmountGet.textContent.replace('$', ''));
        const checkedShipping = document.querySelector('input[name="shipping_method"]:checked').value;
        const shippingPrice = shippingPrices[checkedShipping];
        const total = subtotal + vatAmount + shippingPrice;
        totalGet.textContent = '$' + total.toFixed(2);
        shippingFeeGet.textContent = '$' + shippingPrice.toFixed(2);

        const data = {
            shipping_fee: shippingPrice,
            total: total,
            _token: $('meta[name="csrf-token"]').attr('content'),
        };

        $.ajax({
            url: '/checkout/update-total',
            method: 'POST',
            data: data,
        });
    }

    radioChecked.forEach(function(radio) {
        radio.addEventListener('change', function() {
            updateTotal();
        });
    });

    const defaultShippingMethod = document.querySelector('input[name="shipping_method"]:checked');
    if (defaultShippingMethod) {
        updateTotal();
    }
});

//Sticky checkout order
window.addEventListener("scroll", function() {
    var checkoutOrder = document.querySelector(".checkout__order");
    var scrollPosition = window.pageYOffset || document.documentElement.scrollTop;

    if (scrollPosition >= 380) {
        checkoutOrder.classList.add("sticky");
    } else {
        checkoutOrder.classList.remove("sticky");
    }
});
