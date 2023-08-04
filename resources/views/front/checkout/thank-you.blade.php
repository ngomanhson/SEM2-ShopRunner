@extends('front.layout.master')
@section('title','Thank You')
@section('body')

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Thank You</h4>
                        <div class="breadcrumb__links">
                            <a href="{{url("/")}}">Home</a>
                            <a href="{{url("/shop")}}">Shop</a>
                            <span>Thank You</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="row">
               <div class="col-lg-12">
                   <h4>{{$notification}}</h4>
                   <a href="{{url("/shop")}}" class="primary-btn mt-5">CONTINUE SHOPPING</a>
               </div>
            </div>
        </div>
    </section>
@endsection
