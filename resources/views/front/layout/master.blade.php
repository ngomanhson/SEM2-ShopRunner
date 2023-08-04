<!DOCTYPE html>
<html lang="zxx">
<head>
    <base href="{{asset('/')}}">
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | Shop Runner</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="front/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="front/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="front/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="front/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/style.css" type="text/css">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="front/img/favicon.ico">

</head>

<body>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Offcanvas Menu Begin -->
<div class="offcanvas-menu-overlay"></div>
<div class="offcanvas-menu-wrapper">
    <div class="offcanvas__option">
        <div class="offcanvas__links">
            <a href="#">Sign in</a>
            <a href="#">FAQs</a>
        </div>
        <div class="offcanvas__top__hover">
            <span>Usd <i class="arrow_carrot-down"></i></span>
            <ul>
                <li>USD</li>
                <li>EUR</li>
                <li>USD</li>
            </ul>
        </div>
    </div>
    <div class="offcanvas__nav__option">
        <a href="#" class="search-switch"><img src="front/img/icon/search.png" alt=""></a>
        <a href="#"><img src="front/img/icon/heart.png" alt=""></a>
        <a href=".cart/"><img src="front/img/icon/cart.png" alt=""> <span>0</span></a>
        <div class="price">$0.00</div>
    </div>
    <div id="mobile-menu-wrap"></div>
    <div class="offcanvas__text">
        <p>Free shipping, 30-day return or refund guarantee.</p>
    </div>
</div>
<!-- Offcanvas Menu End -->

<!-- Header Section Begin -->
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-7">
                    <div class="header__top__left">
                        <p>Free shipping, 30-day return or refund guarantee.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-5">
                    <div class="header__top__right">
                        <div class="header__top__hover">
                            <span>Usd <i class="arrow_carrot-down"></i></span>
                            <ul>
                                <li>USD</li>
                                <li>EUR</li>
                                <li>USD</li>
                            </ul>
                        </div>
                        <div class="header__top__links">
                            <a href="#">FAQs</a>
                            @if(Auth::check())
                                <a href="{{url("/account/logout")}}">{{Auth::user()->name}} <i class="fa fa-sign-out" aria-hidden="true"></i></a>
                            @else
                                <a href="{{url("/account/login")}}"><i class="fa fa-user"></i> Login</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="header__logo">
                    <a href="{{url("/")}}"><img src="front/img/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <nav class="header__menu mobile-menu">
                    <ul>
                        <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="{{ url('/') }}">Home</a></li>
                        <li class="{{ request()->is('shop') ? 'active' : '' }}"><a href="{{ url('/shop') }}">Shop</a></li>
                        <li class="{{ request()->is('blog') ? 'active' : '' }}"><a href="{{ url('/blog') }}">Blog</a></li>
                        <li class="{{ request()->is('contact') ? 'active' : '' }}"><a href="{{ url('/contact') }}">Contacts</a></li>
                        <li><a>Pages</a>
                            <ul class="dropdown">
                                <li><a href="{{url("/account/my-order")}}">My Order</a></li>
                                <li><a href="{{url("/cart")}}">Shopping Cart</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3 col-md-3">
                <div class="header__nav__option d-flex justify-content-end">
                    <div class="search-container">
                        <i class="fa fa-search" id="search-icon"></i>
                        <div class="search-input-container">
                            <form action="#!">
                                <input type="text" id="search-input" name="search" placeholder="Search..." />
                            </form>
                            <div class="triangle-icon"></div>
                        </div>
                    </div>
                    <a href="#"><img src="front/img/icon/heart.png" alt=""></a>
                    <a href="{{url("/cart")}}" style="" class="count"><img src="front/img/icon/cart.png" alt=""> <span class="cart-count">{{Cart::count()}}</span></a>
                    <div class="price">${{Cart::subtotal()}}</div>
                </div>
            </div>
        </div>
        <div class="canvas__open"><i class="fa fa-bars"></i></div>
    </div>
</header>
<!-- Header Section End -->


{{--body here--}}
@yield('body')

<div id="alert-container" class="hide">
    <div id="alert-content">
        <div class="alert-icon">
            <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                <circle class="checkmark-circle" cx="26" cy="26" r="25" fill="none"/>
                <path class="checkmark-check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
            </svg>
        </div>
        <div class="alert-message"></div>
    </div>
</div>

<div class="back-to-top-container">
    <button onclick="scrollToTop()" id="back-to-top" title="Back to top">
        <i class="fa fa-angle-double-up"></i>
    </button>
</div>
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer__about">
                    <div class="footer__logo">
                        <a href="#"><img src="front/img/footer-logo.png" alt=""></a>
                    </div>
                    <p>The customer is at the heart of our unique business model, which includes design.</p>
                    <a href="#"><img src="front/img/payment.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                <div class="footer__widget">
                    <h6>Shopping</h6>
                    <ul>
                        <li><a href="#!">Clothing Store</a></li>
                        <li><a href="#!">Trending Shoes</a></li>
                        <li><a href="#!">Accessories</a></li>
                        <li><a href="#!">Sale</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6">
                <div class="footer__widget">
                    <h6>Shopping</h6>
                    <ul>
                        <li><a href="#!">Contact Us</a></li>
                        <li><a href="#!">Payment Methods</a></li>
                        <li><a href="#!">Delivary</a></li>
                        <li><a href="#!">Return & Exchanges</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 offset-lg-1 col-md-6 col-sm-6">
                <div class="footer__widget">
                    <h6>NewLetter</h6>
                    <div class="footer__newslatter">
                        <p>Be the first to know about new arrivals, look books, sales & promos!</p>
                        <form action="#">
                            <input type="text" placeholder="Your email" required>
                            <button type="submit"><span class="icon_mail_alt"></span></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="footer__copyright__text">
                    <p>
                        Copyright © 2023 All rights reserved | This template is made with
                        <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#" target="_blank">Code One Min</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Js Plugins -->
<script src="front/js/jquery-3.3.1.min.js"></script>
<script src="front/js/bootstrap.min.js"></script>
<script src="front/js/jquery.nice-select.min.js"></script>
<script src="front/js/jquery-ui.min.js"></script>
<script src="front/js/jquery.nicescroll.min.js"></script>
<script src="front/js/jquery.magnific-popup.min.js"></script>
<script src="front/js/jquery.countdown.min.js"></script>
<script src="front/js/jquery.slicknav.js"></script>
<script src="front/js/mixitup.min.js"></script>
<script src="front/js/owl.carousel.min.js"></script>
<script src="front/js/main.js"></script>
</body>

</html>

