@extends('front.layout.master')
@section('title', $title)
@section('body')
    <!-- Blog Details Hero Begin -->
    <section class="blog-hero spad">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-9 text-center">
                    <div class="blog__hero__text">
                        <h2>{{ $blog->title }}</h2>
                        <ul>
                            <li>By Deercreative</li>
                            <li>{{ $blog->created_at }}</li>
                            <li>8 Comments</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Hero End -->

    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-12">
                    <div class="blog__details__pic">
                        <img src="{{ $blog->image }}" alt="{{ $blog->title }}">
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="blog__details__content">
                        <div class="blog__details__share">
                            <span>share</span>
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#" class="youtube"><i class="fa fa-youtube-play"></i></a></li>
                                <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                        <div class="blog__details__text">
                                <p>{{ $blog->content }}</p>

                        </div>
                        <div class="blog__details__quote">
                            <i class="fa fa-quote-left"></i>
                            <p>“When designing an advertisement for a particular product many things should be
                                researched like where it should be displayed.”</p>
                            <h6>_ John Smith _</h6>
                        </div>
                        <div class="blog__details__text">
                            <p>Vyo-Serum along with tightening the skin also reduces the fine lines indicating aging of
                                skin. Problems like dark circles, puffiness, and crow’s feet can be control from the
                                strong effects of this serum.</p>
                            <p>Hydroderm is a multi-functional product that helps in reducing the cellulite and giving
                                the body a toned shape, also helps in cleansing the skin from the root and not letting
                                the pores clog, nevertheless also let’s sweeps out the wrinkles and all signs of aging
                                from the sensitive near the eyes.</p>
                        </div>
                        <div class="blog__details__option">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="blog__details__author">
                                        <div class="blog__details__author__pic">
                                            <img src="front/img/blog/details/blog-author.jpg" alt="">
                                        </div>
                                        <div class="blog__details__author__text">
                                            <h5>Aiden Blair</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="blog__details__tags">
                                        <a href="#">#Fashion</a>
                                        <a href="#">#Trending</a>
                                        <a href="#">#2020</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="blog__details__btns">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <a href="" class="blog__details__btns__item">
                                        <p><span class="arrow_left"></span> Previous Pod</p>
                                        <h5>It S Classified How To Utilize Free Classified Ad Sites</h5>
                                    </a>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <a href="" class="blog__details__btns__item blog__details__btns__item--next">
                                        <p>Next Pod <span class="arrow_right"></span></p>
                                        <h5>Tips For Choosing The Perfect Gloss For Your Lips</h5>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="blog__details__comment">
                            <h4>Leave A Comment</h4>
                            <form action="#">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4">
                                        <input type="text" placeholder="Name">
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <input type="text" placeholder="Email">
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <input type="text" placeholder="Phone">
                                    </div>
                                    <div class="col-lg-12 text-center">
                                        <textarea placeholder="Comment"></textarea>
                                        <button type="submit" class="site-btn">Post Comment</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->
@endsection
