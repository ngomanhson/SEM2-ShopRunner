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
                            <h2 class="h3 mb-0 page-title">Product Create</h2>
                        </div>

                    </div>

                    <!-- table -->
                    @if(session('status'))
                        <div class="alert alert-warning">
                            {{session('status')}}
                        </div>
                    @endif
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <form method="post" action="admin/product/{{$product->id}}/detail" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="product_id" value="{{$product->id}}">

                                <div class="position-relative row form-group">
                                    <label class="col-md-3 text-md-right col-form-label">Product Name</label>
                                    <div class="col-md-9 col-xl-8">
                                        <input disabled placeholder="Product Name" type="text"
                                               class="form-control" value="{{$product->name}}">
                                    </div>
                                </div>



                                <div class="position-relative row form-group">
                                    <label for="size" class="col-md-3 text-md-right col-form-label">Size</label>
                                    <div class="col-md-9 col-xl-8">
                                        <input required name="size" id="size" placeholder="Size" type="text"
                                               class="form-control" value="">
                                    </div>
                                </div>

                                <div class="position-relative row form-group">
                                    <label for="qty" class="col-md-3 text-md-right col-form-label">Qty</label>
                                    <div class="col-md-9 col-xl-8">
                                        <input required name="qty" id="qty" placeholder="Qty" type="text"
                                               class="form-control" value="">
                                    </div>
                                </div>

                                <div class="position-relative row form-group mb-1">
                                    <div class="col-md-9 col-xl-8 offset-md-2">
                                        <a href="admin/product/{{$product->id}}/detail" class="border-0 btn btn-outline-danger mr-1">
                                                    <span class="btn-icon-wrapper pr-1 opacity-8">
                                                        <i class="fa fa-times fa-w-20"></i>
                                                    </span>
                                            <span>Cancel</span>
                                        </a>

                                        <button type="submit"
                                                class="btn-shadow btn-hover-shine btn btn-primary">
                                                    <span class="btn-icon-wrapper pr-2 opacity-8">
                                                        <i class="fa fa-download fa-w-20"></i>
                                                    </span>
                                            <span>Save</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>


                </div> <!-- .col-12 -->
            </div> <!-- .row -->
        </div> <!-- .container-fluid -->


    </main>
    <!-- End Main -->
@endsection
