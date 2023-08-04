@extends('front.layout.master')
@section('title', $title)
@section('body')
    <!-- Shop Details Section Begin -->
    <section class="shop-details">
        <div class="product__details__pic">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product__details__breadcrumb">
                            <a href="{{url("/")}}">Home</a>
                            <a href="{{url("/shop")}}">Shop</a>
                            <span>Product Details</span>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-rows d-flex justify-content-between">
                    <div class="col-lg-2 col-md-2">
                        <ul class="nav nav-tabs" role="tablist">
                            @foreach($product->productImages as $key => $productImages)
                            <li class="nav-item">
                                <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#tabs-{{$productImages->id}}" role="tab">
                                    <div class="product__thumb__pic set-bg" data-setbg="front/img/product/{{$productImages->path}}">
                                    </div>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-9">
                        <div class="tab-content">
                            @foreach($product->productImages as $key => $productImages)
                            <div class="tab-pane {{ $loop->first ? 'active' : '' }}" id="tabs-{{$productImages->id}}" role="tabpanel" style="width: 555px; height: 555px; overflow: hidden">
                                <div class="product__details__pic__item">
                                    <img src="front/img/product/{{$productImages->path}}" alt="" style="width: 555px; height: 555px; object-fit: cover;">
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="product__details__text">
                            <h4>{{$product->name}}</h4>
                            <div class="rating">
                                @for($i=1 ;$i<=5;$i++)
                                    @if($i <= $product->avgRating)
                                        <i class="fa fa-star"></i>
                                    @else
                                        <i class="fa fa-star-o"></i>
                                    @endif
                                @endfor
                                <span> | {{count($product->productComment)}} Reviews</span>
                            </div>
                            @if($product->discount != null)
                                <h3>${{$product->price}} <span>${{$product->discount}}</span></h3>
                            @else
                                <h3>${{$product->price}}</h3>
                            @endif
                            <p>{{$product->content}}</p>

                            <form action="{{ url('/cart/add') }}" method="get">

                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">

                                @if (!$product->productDetails->isEmpty())
                                    <div class="product__details__option">
                                        <div class="product__details__option__size">
                                            <span>Size:</span>
                                            @foreach (array_unique(array_column($product->productDetails->toArray(), 'size')) as $index => $productSize)
                                                <input type="radio" name="size" id="{{$productSize}}" value="{{$productSize}}"
                                                       @if ($productSize === $defaultSize) checked @endif>
                                                <label for="{{$productSize}}">{{$productSize}}</label>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                <div class="product__details__cart__option">
                                    <div class="quantity">

                                        @if($product->qty > 0)
                                            <p>{{ $product->qty }} products are available</p>
                                        @else
                                            <p>Out of stock</p>
                                        @endif
                                    </div>
                                    <div class="product__details__btns__option">
                                        <a href="#"><i class="fa fa-heart"></i> add to wishlist</a>
                                    </div>
                                </div>

                                @if($product->qty > 0)

                                        <button type="submit" class="primary-btn btn-detail add-to-cart-btn" onclick="addCart({{ $product->id }})">Add to cart</button>
                                        <a href="javascript:addCart({{ $product->id }})"></a>

                                @endif



                            </form>
                            <div class="product__details__last__option">
                                <ul class="d-flex justify-content-center" style="column-gap: 20px">
                                    <li><span>SKU:</span> {{$product->sku}}</li>
                                    <li><span>Categories:</span> {{$product->productCategory->name}}</li>
                                    <li><span>Tag:</span> {{$product->tag}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product__details__content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product__details__tab">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tabs-5"
                                    role="tab">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs-6" role="tab">Customer
                                    Previews({{count($product->productComment)}})</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs-7" role="tab">Additional
                                    information</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tabs-5" role="tabpanel">
                                    <div class="product-content">
                                        {!! $product->description !!}
                                    </div>
                                </div>
                                <div class="tab-pane" id="tabs-6" role="tabpanel">
                                    <div class="customer-review-option">
                                        <h4>{{count($product->productComment)}} Comment</h4>
                                        <div class="comment-option">
                                            @foreach($product->productComment as $productComment)
                                            <div class="co-item">
                                                <div class="avatar-pic">
                                                    <img src="front/img/user/avta.jpg" alt="" />
                                                </div>
                                                <div class="avatar-text">
                                                    <div class="at-rating">
                                                       @for($i=1 ;$i<=5;$i++)
                                                           @if($i<$productComment->rating)
                                                        <i class="fa fa-star"></i>
                                                            @else
                                                        <i class="fa fa-star-o"></i>
                                                            @endif
                                                        @endfor
                                                        <h5>{{$productComment->name}} <span>{{date('M d, Y',strtotime($productComment->created_at))}}</span></h5>
                                                        <div class="at-reply">{{$productComment->messages}}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="personal-rating">

                                        </div>
                                        <div class="leave-comment">
                                            <h4>Leave A Comment</h4>
                                            <form action="" class="comment-form" method="post">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                                <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::user()->id ?? null}}">

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <input type="text" placeholder="Name" name="name">
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="email" placeholder="email" name="email">
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <textarea placeholder="Messages" name="messages"></textarea>
                                                        <div class="personal-rating">
                                                            <h6>Your Rating</h6>
                                                            <div class="rate">
                                                                <input type="radio" id="star5" name="rating" value="5" />
                                                                <label for="star5" title="text">5 stars</label>
                                                                <input type="radio" id="star4" name="rating" value="4" />
                                                                <label for="star4" title="text">4 stars</label>
                                                                <input type="radio" id="star3" name="rating" value="3" />
                                                                <label for="star3" title="text">3 stars</label>
                                                                <input type="radio" id="star2" name="rating" value="2" />
                                                                <label for="star2" title="text">2 stars</label>
                                                                <input type="radio" id="star1" name="rating" value="1" />
                                                                <label for="star1" title="text">1 star</label>
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="site-btn">Send message</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tabs-7" role="tabpanel">
                                    <div class="specification-table">
                                        <table>
                                            <tr>
                                                <td class="p-category">Customer Rating</td>
                                                <td>
                                                    <div class="pd-rating">
                                                        @for($i=1 ;$i<=5;$i++)
                                                            @if($i <= $product->avgRating)
                                                                <i class="fa fa-star"></i>
                                                            @else
                                                                <i class="fa fa-star-o"></i>
                                                            @endif
                                                        @endfor
                                                        <span> - {{count($product->productComment)}} Reviews</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-category">Price</td>
                                                <td>
                                                    <div class="p-price">
                                                        {{$product->price}}
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-category">Add To Cart</td>
                                                <td>
                                                    <div class="cart-add">+add to cart</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-category">Avaliability</td>
                                                <td>
                                                    <div class="p-stock">{{$product->qty}} in stock</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-category">Weight</td>
                                                <td>
                                                    <div class="p-weight">{{$product->weight}}kg</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-category">Size</td>
                                                <td>
                                                    <div class="p-size">
                                                        @foreach(array_unique(array_column($product->productDetails->toArray(),'size')) as $productSize)
                                                            {{$productSize}},
                                                        @endforeach
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-category">Sku</td>
                                                <td>
                                                    <div class="p-code">{{$product->sku}}</div>
                                                </td>
                                            </tr>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Details Section End -->

    <!-- Related Section Begin -->
    <section class="related spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="related-title">Related Product</h3>
                </div>
            </div>
            <div class="row">
               @foreach($pro as $product)
                <div class="col-lg-3 col-md-6 col-sm-6 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="front/img/product/{{ isset($product->productImages[0]) ? $product->productImages[0]->path : 'front/img/hhhh.jpg' }}">                            @if($product->discount !=0)
                            <span class="label">Sale</span>
                            @endif
                                <a href="{{ url("/shop/product/{$product->slug}") }}" class="shop-image__link"></a>
                                <ul class="product__hover">
                                    <li><a href="#"><img src="front/img/icon/heart.png" alt=""></a></li>
                                    <li><a href="javascript:addCart({{ $product->id }})"><img src="front/img/icon/cart.png" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>{{$product->name}}</h6>
                            <a href="shop/product/{{$product->slug}}" class="add-cart">{{$product->name}}</a>
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
    <!-- Related Section End -->
@endsection

