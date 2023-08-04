@extends('front.layout.master')
@section('title','Blog')
@section('body')

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-blog set-bg" data-setbg="front/img/breadcrumb-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Our Blog</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Blog Section Begin -->
    <section class="blog spad">
        <div class="container">
            <div class="row">
                @foreach($blogs as $blog)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic set-bg" data-setbg="{{ $blog->image }}"></div>
                            <div class="blog__item__text">
                                <span><img src="front/img/icon/calendar.png" alt=""> {{ $blog->created_at }}</span>
                                <h5>{{ $blog->title }}</h5>
                                <a href="{{url("/blog/{$blog->slug}")}}">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-lg-12">
                    {!! $blogs->appends(request()->input())->links("pagination::bootstrap-4") !!}
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

    <!-- Footer Section Begin -->
@endsection
