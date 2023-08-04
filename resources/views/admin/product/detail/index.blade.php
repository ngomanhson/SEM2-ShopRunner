@extends('admin.layout.master')
@section('title','Product')
@section('body')
    <!-- Main -->
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="row align-items-center my-4">
                        <div class="col">
                            <h2 class="h3 mb-0 page-title">Product Details</h2>
                        </div>
                        <div class="col-auto">

                            <a href="./admin/product/{{$product->id}}/detail/create" class="btn btn-primary"><span class="fe fe-filter fe-12 mr-2"></span>Create</a>
                        </div>
                    </div>

                    <!-- table -->
                    @if(session('status'))
                        <div class="alert alert-warning">
                            {{session('status')}}
                        </div>
                    @endif

                    <div class="card shadow">

                            <div class="card-body">


                                <div class="analytic">
                                    <a href="" class="text-primary">Activated<span class="text-muted">()</span></a>|
                                    <a href="" class="text-primary">Disable<span class="text-muted">()</span></a>
                                </div>

                                <form  method="POST" action="{{url('admin/product/action')}}">
                                    @csrf
                                    @method('POST')
                                    <div class="form-action form-inline py-3">
                                        <select class="form-control mr-1" name="act">
                                            <option>Select</option>
{{--                                            @foreach($list_act as $k => $act)--}}
{{--                                                <option value="{{$k}}">{{$act}}</option>--}}
{{--                                            @endforeach--}}
                                        </select>
                                        <input type="submit" name="btn-search" value="Apply" class="btn btn-primary">
                                    </div>


                                    <table class="align-middle mb-0 table table-borderless table-striped table-hover table-checkall">
                                        <thead>
                                        <tr>
                                            <th class="pl-4">Product Name</th>
                                            <th>Size</th>
                                            <th>Qty</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                        </thead>

                                        <tbody>
{{--                                        @if($product->total()>0)--}}
                                            @foreach($productDetails as $productDetail)
                                                <tr>
                                                    <td class="pl-4 text-muted">{{$product->name}}</td>


                                                    <td class="">{{$productDetail->size}}</td>
                                                    <td class="">{{$productDetail->qty}}</td>

                                                    <td class="text-center">
                                                        <a href="./admin/product/{{$product->id}}/detail/{{$productDetail->id}}/edit" data-toggle="tooltip" title="Edit"
                                                           data-placement="bottom" class="btn btn-outline-warning border-0 btn-sm">
                                                        <span class="btn-icon-wrapper opacity-8">
                                                            <i class="fa fa-edit fa-w-20"></i>
                                                        </span>
                                                        </a>
                                                        <form class="d-inline" action="admin/product/{{$product->id}}/detail/{{$productDetail->id}}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-hover-shine btn-outline-danger border-0 btn-sm"
                                                                    type="submit" data-toggle="tooltip" title="Delete"
                                                                    data-placement="bottom"
                                                                    onclick="return confirm('Do you really want to delete this item?')">
                                                            <span class="btn-icon-wrapper opacity-8">
                                                                <i class="fa fa-trash fa-w-20"></i>
                                                            </span>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
{{--                                    @else--}}
{{--                                        <tr>--}}
{{--                                            <td colspan="7"> <p class="alert alert-warning">Search results are empty</p></td>--}}
{{--                                        </tr>--}}
{{--                                    @endif--}}

                                </form>

                            </div>

                    </div>

                    <nav aria-label="Table Paging" class="my-3">
                        <ul class="pagination justify-content-end mb-0">
{{--                            {!! $product->appends(app("request")->input())->links("pagination::bootstrap-4") !!}--}}
                        </ul>
                    </nav>
                </div> <!-- .col-12 -->
            </div> <!-- .row -->
        </div> <!-- .container-fluid -->


    </main>
    <!-- End Main -->
@endsection
