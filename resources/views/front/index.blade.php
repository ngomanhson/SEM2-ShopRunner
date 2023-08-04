@extends('front.layout.master')

@section('title','Home')

@section('body')
    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="hero__slider owl-carousel">
            <div class="hero__items set-bg" data-setbg="front/img/hero/hero-1.png">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-7 col-md-8">
                            <div class="hero__text">
                                <h6>Summer Collection</h6>
                                <h2>Fall - Winter Collections 2023</h2>
                                <p>A specialist label creating luxury essentials. Ethically crafted with an unwavering
                                commitment to exceptional quality.</p>
                                <a href="{{url("/shop")}}" class="primary-btn">Shop now <span class="arrow_right"></span></a>
                                <div class="hero__social">
                                    <a href="#!"><i class="fa fa-facebook"></i></a>
                                    <a href="#!"><i class="fa fa-twitter"></i></a>
                                    <a href="#!"><i class="fa fa-pinterest"></i></a>
                                    <a href="#!"><i class="fa fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero__items set-bg" data-setbg="front/img/hero/hero-2.png">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-7 col-md-8">
                            <div class="hero__text">
                                <h6>Summer Collection</h6>
                                <h2>Fall - Winter Collections 2023</h2>
                                <p>A specialist label creating luxury essentials. Ethically crafted with an unwavering
                                commitment to exceptional quality.</p>
                                <a href="{{url("/shop")}}" class="primary-btn">Shop now <span class="arrow_right"></span></a>
                                <div class="hero__social">
                                    <a href="#!"><i class="fa fa-facebook"></i></a>
                                    <a href="#!"><i class="fa fa-twitter"></i></a>
                                    <a href="#!"><i class="fa fa-pinterest"></i></a>
                                    <a href="#!"><i class="fa fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Banner Section Begin -->
    <section class="banner spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 offset-lg-4">
                    <div class="banner__item">
                        <div class="banner__item__pic">
                            <img src="front/img/banner/banner-1.png" alt="">
                        </div>
                        <div class="banner__item__text">
                            <h2>Clothing Collections 2023</h2>
                            <a href="{{url("/shop?price_min=%2410&price_max=%24999&tag=Clothing")}}">Shop now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="banner__item banner__item--middle">
                        <div class="banner__item__pic">
                            <img src="front/img/banner/banner-2.png" alt="">
                        </div>
                        <div class="banner__item__text">
                            <h2>Accessories</h2>
                            <a href="{{url("/shop?price_min=%2410&price_max=%24999&tag=Accessories")}}">Shop now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="banner__item banner__item--last">
                        <div class="banner__item__pic">
                            <img src="front/img/banner/banner-3.png" alt="">
                        </div>
                        <div class="banner__item__text">
                            <h2>Shoes Spring 2023</h2>
                            <a href="{{url("/shop?price_min=%2410&price_max=%24999&tag=Shoes")}}">Shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="filter__controls">
                        <li class="active" data-filter="*">Featured</li>
                        <li data-filter=".new-arrivals">Featured Women</li>
                        <li data-filter=".hot-sales">Featured Men</li>
                    </ul>
                </div>
            </div>
            <div class="row product__filter">
                @foreach($featuredProducts['women']  as $product)
                <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
                    <div class="product__item">

                            <div class="product__item__pic set-bg" data-setbg="front/img/product/{{ isset($product->productImages[0]) ? $product->productImages[0]->path : 'front/img/hhhh.jpg' }}">

                            <a href="{{ url("/shop/product/{$product->slug}") }}" class="shop-image__link"></a>
                            @if($product->discount !=0)
                                <span class="label">Sale</span>
                            @endif
                            <ul class="product__hover">
                                <li><a href="#"><img src="front/img/icon/heart.png" alt=""></a></li>
                                <li><a href="javascript:addCart({{ $product->id }})"><img src="front/img/icon/cart.png" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>{{$product->name}}</h6>
                            <a href="{{ url("/shop/product/{$product->slug}") }}" class="add-cart">{{$product->name}}</a>
                            <div class="rating">
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <h5>${{$product->price}}</h5>
                        </div>
                    </div>
                </div>
                @endforeach
                @foreach($featuredProducts['men']  as $product)
                        <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix hot-sales">
                            <div class="product__item">



                                    <div class="product__item__pic set-bg" data-setbg="front/img/product/{{ isset($product->productImages[0]) ? $product->productImages[0]->path : 'front/img/hhhh.jpg' }}">
                                        <a href="{{ url("/shop/product/{$product->slug}") }}" class="shop-image__link"></a>
                                        @if($product->discount !=0)
                                            <span class="label">Sale</span>
                                        @endif
                                        <ul class="product__hover">
                                            <li><a href="#"><img src="front/img/icon/heart.png" alt=""></a></li>
                                            <li><a href="javascript:addCart({{ $product->id }})"><img src="front/img/icon/cart.png" alt=""></a></li>
                                        </ul>
                                    </div>


                                <div class="product__item__text">
                                    <h6>{{$product->name}}</h6>
                                    <a href="{{ url("/shop/product/{$product->slug}") }}" class="add-cart">{{$product->name}}</a>
                                    <div class="rating">
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <h5>${{$product->price}}</h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
            </div>
        </div>
    </section>
    <!-- Product Section End -->

    <!-- Categories Section Begin -->
    <section class="categories spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="categories__text">
                        <h2>Clothings Hot <br /> <span>Bag Collection</span> <br /> Accessories</h2>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="categories__hot__deal">
                        <img src="front/img/product-sale.png" alt="">
                        <div class="hot__deal__sticker">
                            <span>Sale Of</span>
                            <h5>$29.99</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-1">
                    <div class="categories__deal__countdown">
                        <span>Deal Of The Week</span>
                        <h2>Multi-pocket Chest Bag Black</h2>
                        <div class="categories__deal__countdown__timer" id="countdown">
                            <div class="cd-item">
                                <span>3</span>
                                <p>Days</p>
                            </div>
                            <div class="cd-item">
                                <span>1</span>
                                <p>Hours</p>
                            </div>
                            <div class="cd-item">
                                <span>50</span>
                                <p>Minutes</p>
                            </div>
                            <div class="cd-item">
                                <span>18</span>
                                <p>Seconds</p>
                            </div>
                        </div>
                        <a href="#" class="primary-btn">Shop now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Instagram Section Begin -->
    <section class="instagram spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="instagram__pic">
                        <div class="instagram__pic__item set-bg" data-setbg="front/img/instagram/instagram-1.jpg"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="front/img/instagram/instagram-2.jpg"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="front/img/instagram/instagram-3.jpg"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="front/img/instagram/instagram-4.jpg"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="front/img/instagram/instagram-5.jpg"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="front/img/instagram/instagram-6.jpg"></div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="instagram__text">
                        <h2>Instagram</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.</p>
                        <h3>#Shop Runner</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Instagram Section End -->

    <!-- Latest Blog Section Begin -->
    <section class="latest spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Latest News</span>
                        <h2>Fashion New Trends</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($blogs as $blog)
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="{{$blog->image}}"></div>
                        <div class="blog__item__text">
                            <span><img src="front/img/icon/calendar.png" alt="">{{date('M d,Y',strtotime($blog->created_at))}}</span>
                            <h5>{{$blog->title}}</h5>
                            <a href="{{url("/blog/{$blog->slug}")}}">Read More</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Latest Blog Section End -->
@endsection
