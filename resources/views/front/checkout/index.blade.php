@extends('front.layout.master')
@section('title','Checkout')
@section('body')

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Check Out</h4>
                        <div class="breadcrumb__links">
                            <a href="{{url("/")}}">Home</a>
                            <a href="{{url("/shop")}}">Shop</a>
                            <span>Check Out</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    @if(Cart::count()>0)
        <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <form action="{{url("/checkout")}}" method="post">
                    @csrf

                    <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id ?? ''}}" >

                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <h6 class="coupon__code"><span class="icon_tag_alt"></span> Have a coupon? <a href="{{url("/cart")}}" style="color: #1da1f2">Click
                                    here</a> to enter your code</h6>
                            <h6 class="checkout__title">Billing Details</h6>
                            @if(session('error'))
                                <div class="alert alert-warning text-small">
                                    {{session('error')}}
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Fist Name<span>*</span></p>
                                        <input type="text" name="first_name" value="{{Auth::user()->name ?? ''}}">
                                        @error("first_name")
                                        <p class="text-danger"><i>{{$message}}</i></p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Last Name<span>*</span></p>
                                        <input type="text" name="last_name">
                                        @error("last_name")
                                        <p class="text-danger"><i>{{$message}}</i></p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Company Name</p>
                                <input type="text" name="company_name" value="{{Auth::user()->company_name ?? ''}}">
                            </div>
                            <div class="checkout__input">
                                <p>Country<span>*</span></p>
                                <input type="text" name="country" value="{{Auth::user()->country ?? ''}}">
                                @error("country")
                                <p class="text-danger"><i>{{$message}}</i></p>
                                @enderror
                            </div>
                            <div class="checkout__input">
                                <p>Street Address<span>*</span></p>
                                <input type="text" placeholder="Street Address" class="checkout__input__add" name="street_address" value="{{Auth::user()->street_address ?? ''}}">
                                @error("street_address")
                                <p class="text-danger"><i>{{$message}}</i></p>
                                @enderror
                            </div>
                            <div class="checkout__input">
                                <p>Town/City<span>*</span></p>
                                <input type="text" name="town_city" value="{{Auth::user()->town_city ?? ''}}">
                                @error("town_city")
                                <p class="text-danger"><i>{{$message}}</i></p>
                                @enderror
                            </div>
                            <div class="checkout__input">
                                <p>Postcode / ZIP<span>*</span></p>
                                <input type="text" name="postcode_zip" value="{{Auth::user()->postcode_zip ?? ''}}">
                                @error("postcode_zip")
                                <p class="text-danger"><i>{{$message}}</i></p>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text" name="phone" value="{{Auth::user()->phone ?? ''}}">
                                        @error("phone")
                                        <p class="text-danger"><i>{{$message}}</i></p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="email" name="email" value="{{Auth::user()->email ?? ''}}">
                                        @error("email")
                                        <p class="text-danger"><i>{{$message}}</i></p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <h6 class="shipping__title">Shipping Method</h6>
                            <p class="shipping shipping-note">NOTE: Delivery times may vary due to location and other factors. Thank you, we hope you understand.</p>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <div class="custom-input">
                                            <input type="radio" id="radio" name="shipping_method" value="Standard Shipping" checked />
                                            <label for="radio">
                                                <span class="check-mark"></span>
                                                <div class="content">
                                                    <div class="text-container">
                                                        <div class="title">Standard Shipping</div>
                                                        <div class="description">Estimated delivery in 3-5 business days</div>
                                                    </div>
                                                    <div class="shipping-price">$10</div>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <div class="custom-input">
                                            <input type="radio" id="option" value="Express Shipping" name="shipping_method" />
                                            <label for="option">
                                                <span class="check-mark"></span>
                                                <div class="content">
                                                    <div class="text-container">
                                                        <div class="title">Express Shipping</div>
                                                        <div class="description">Estimated delivery in 1-2 business days</div>
                                                    </div>
                                                    <div class="shipping-price">$30</div>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4 class="order__title">Your order</h4>
                                <div class="checkout__order__products">Product <span>Total</span></div>
                                <ul class="checkout__total__products">
                                    @foreach($carts as $item)
                                        <li>
                                            {{ $item->name }} x{{ $item->qty }}
                                            <span>${{number_format($item->price * $item->qty, 2, '.', '')}}</span>
                                        </li>
                                    @endforeach
                                </ul>

                                <ul class="checkout__total__all">
                                    <li>Subtotal <span id="subtotal">${{$subtotal}}</span></li>
                                    <li>VAT 10% <span id="vatAmount">${{number_format($vatAmount, 2, '.', '') }}</span></li>
                                    <li>Shipping <span id="shipping_fee">${{number_format($shippingFee, 2, '.', '') }}</span></li>
                                    <li>Total<span id="total">${{number_format($total, 2, '.', '') }}</span></li>
                                </ul>

                                <div class="checkout__input__checkbox">
                                    <label for="payment">
                                        COD
                                        <input name="payment_method" type="radio" id="payment" value="COD" checked>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="paypal">
                                        Paypal
                                        <input name="payment_method" type="radio" id="paypal" value="PayPal">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="MoMo">
                                        MoMo
                                        <input name="payment_method" type="radio" id="MoMo" value="MoMo">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <button type="submit" class="site-btn">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    @else
        <section class="shoping-cart spad">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <a href="{{url("/shop")}}" title="Shopping now!"><img src="front/img/empty-cart.png" width="200" alt=""></a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p>There are no products in the cart. Shopping now!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- Checkout Section End -->
@endsection
