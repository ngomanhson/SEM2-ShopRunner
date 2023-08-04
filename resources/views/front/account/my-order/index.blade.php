@extends('front.layout.master')
@section('title','My Order')
@section('body')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>My Order</h4>
                        <div class="breadcrumb__links">
                            <a href="{{url("/")}}">Home</a>
                            <span>My Order</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <section class="shop">
        <div class="container">
            <div class="order-table" style="margin: 50px 0">
                @if(count($orders) > 0)
                    <table class="table table-borderless">
                        <thead class="table-bordered">
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Order Code</th>
                                <th scope="col">Product</th>
                                <th scope="col">Total</th>
                                <th scope="col">Payment Method</th>
                                <th scope="col">Status</th>
                                <th scope="col">Details</th>
                            </tr>
                        </thead>
                        <tbody class="table-bordered">
                            @foreach($orders as $order)
                                <tr>
                                <td style="width: 18%">
                                    @if(isset($order->orderDetails) && count($order->orderDetails) > 0)
                                        @foreach($order->orderDetails as $orderDetail)
                                            @if(isset($orderDetail->product) && $orderDetail->product->productImages()->count() > 0)
                                                <a href="{{url("/shop/product/{$orderDetail->product->slug}")}}">
                                                    <img src="{{ asset('front/img/product/'. $orderDetail->product->productImages()->first()->path) }}" alt="{{$orderDetail->product->name}}" class="img-thumbnail" style="width: 100px; height: 100px; object-fit: cover">
                                                </a>
                                                @break
                                            @endif
                                        @endforeach
                                    @endif
                                </td>
                                <td>#{{$order->order_code}}</td>
                                <td style="font-weight: 600">
                                    @if(isset($order->orderDetails) && count($order->orderDetails) > 0)
                                        {{$order->orderDetails[0]->product->name}}

                                        @php
                                            $totalQuantity = $order->orderDetails->sum('qty');
                                            $otherProductsCount = $totalQuantity - 1;
                                        @endphp

                                        @if($otherProductsCount > 0)
                                            (and {{$otherProductsCount}} other product{{($otherProductsCount > 1) ? 's' : ''}})
                                        @endif
                                    @endif
                                </td>
                                <th style="color: #E6B81D;">${{ number_format($order->total, 2, '.', '') }}</th>
                                    <td>{{$order->payment_method}}</td>
                                    <td>
                                        @switch($order->status)
                                            @case(0)<span class="text text-secondary">Pending</span>@break
                                            @case(1)<span class="text text-primary">Confirmed</span>@break
                                            @case(2)<span class="text text-primary">Shipping</span>@break
                                            @case(3)<span class="text text-warning">Shipped</span>@break
                                            @case(4)<span class="text text-success">Completed</span>@break
                                            @case(5)<span class="text text-danger">Cancel</span>@break
                                        @endswitch
                                    </td>
                                <td><a href="/account/my-order/{{$order->order_code}}" class="btn btn-primary"><i class="fa fa-info-circle"></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <a href="{{url("/shop")}}" title="Shopping now!"><img src="front/img/my-order.png" width="200" alt="You don't have any orders yet. Order now!"></a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <p>You don't have any orders yet. Order now!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    <section>
@endsection
