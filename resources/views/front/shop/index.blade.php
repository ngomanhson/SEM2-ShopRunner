@extends('front.layout.master')
@section('title', $title)

@section('body')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shop</h4>
                        <div class="breadcrumb__links">
                            <a href="{{url("/")}}">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shop Section Begin -->
    @if($product->isEmpty())
        <section class="shoping-cart spad">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <a href="{{url("/shop")}}" title="Try again!"><img src="front/img/no-result-found.png" width="200" alt="No results were found."></a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p>No products were found for your search.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
        <section class="shop spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="shop__sidebar">
                            <div class="shop__sidebar__search">
                                <form action="shop">
                                    <input type="text" name="search" value="{{request("search")}}" placeholder="Search...">
                                    <button type="submit"><span class="icon_search"></span></button>
                                </form>
                            </div>
                            <div class="shop__sidebar__accordion">
                                <div class="accordion" id="accordionExample">
                                    @include('front.shop.components.products-sidebar-fitel')
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="shop__product__option">
                            <form action="">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="shop__product__option__right">
                                            <p>Sorting :</p>
                                            <select name="sort_by" onchange="this.form.submit();" class="sorting">
                                                <option {{request('sort_by') == 'latest' ? 'selected' : ''}} value="latest">Latest</option>
                                                <option {{request('sort_by') == 'oldest' ? 'selected' : ''}} value="oldest">Oldest</option>
                                                <option {{request('sort_by') == 'name-ascending' ? 'selected' : ''}} value="name-ascending">Name A-Z</option>
                                                <option {{request('sort_by') == 'name-descending' ? 'selected' : ''}} value="name-descending">Name Z-A</option>
                                                <option {{request('sort_by') == 'price-ascending' ? 'selected' : ''}} value="price-ascending">Price Ascending</option>
                                                <option {{request('sort_by') == 'price-descending' ? 'selected' : ''}} value="price-descending">Price Decrease</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="shop__product__option__right">
                                            <p>Show :</p>
                                            <select name="show" onchange="this.form.submit();" class="p-show">
                                                <option {{request('show') == '9' ? 'selected' : ''}} value="9">9</option>
                                                <option {{request('show') == '15' ? 'selected' : ''}} value="15">15</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="row">
                            @foreach($product as $pr)
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product__item">

                                            <div class="product__item__pic set-bg" data-setbg="front/img/product/{{ isset($pr->productImages[0]) ? $pr->productImages[0]->path : 'front/img/hhhh.jpg' }}">
                                                <a href="{{ url("/shop/product/{$pr->slug}") }}" class="shop-image__link"></a>
                                                <ul class="product__hover">
                                                    <li><a href=""><img src="front/img/icon/heart.png" alt=""></a></li>
                                                    <li><a href="javascript:addCart({{ $pr->id }})"><img src="front/img/icon/cart.png" alt=""></a></li>
                                                </ul>
                                            </div>
                                        <div class="product__item__text">
                                            <h6>{{$pr->name}}</h6>
                                            <a href="{{url("/shop/product/{$pr->slug}")}}" class="add-cart">{{$pr->name}}</a>
                                            <div class="rating">
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                            <h5>${{$pr->price}}</h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
{{--                                {!! $product->appends(app("request")->input())->links("pagination::bootstrap-4") !!}--}}
                                @if ($product->lastPage() > 1)
                                    <ul class="pagination">
                                        {{-- Nút Previous --}}
                                        @if ($product->currentPage() > 1)
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $product->url($product->currentPage() - 1) }}" aria-label="Previous">
                                                    <span aria-hidden="true">Previous</span>
                                                </a>
                                            </li>
                                        @endif

                                        @if ($product->currentPage() == 1)
                                            <li class="page-item active">
                                                <span class="page-link">1</span>
                                            </li>
                                        @else
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $product->url(1) }}">1</a>
                                            </li>
                                        @endif

                                        @if ($product->currentPage() > 4)
                                            <li class="page-item disabled">
                                                <span class="page-link">...</span>
                                            </li>
                                        @endif

                                        @for ($i = max(2, $product->currentPage() - 1); $i <= min($product->lastPage() - 1, $product->currentPage() + 1); $i++)
                                            @if ($product->currentPage() == $i)
                                                <li class="page-item active">
                                                    <span class="page-link">{{ $i }}</span>
                                                </li>
                                            @else
                                                <li class="page-item">
                                                    <a class="page-link" href="{{ $product->url($i) }}">{{ $i }}</a>
                                                </li>
                                            @endif
                                        @endfor

                                        @if ($product->currentPage() < $product->lastPage() - 3)
                                            <li class="page-item disabled">
                                                <span class="page-link">...</span>
                                            </li>
                                        @endif

                                        @if ($product->currentPage() == $product->lastPage())
                                            <li class="page-item active">
                                                <span class="page-link">{{ $product->lastPage() }}</span>
                                            </li>
                                        @else
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $product->url($product->lastPage()) }}">{{ $product->lastPage() }}</a>
                                            </li>
                                        @endif

                                        @if ($product->currentPage() < $product->lastPage())
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $product->url($product->currentPage() + 1) }}" aria-label="Next">
                                                    <span aria-hidden="true">Next</span>
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- Shop Section End -->
@endsection
