@extends('admin.layout.master')
@section('title','Brand')
@section('body')
    <main role="main" class="main-content">
        <div class="container-fluid">

            <div class="row justify-content-center">
                <div class="col-12 col-lg-10 col-xl-8">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-ticket icon-gradient bg-mean-fruit"></i>
                                </div>
                                <div class="col">
                                    <h2 class="h3 mb-0 page-title">Product Create</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="my-4">

                                        <div class="main-card mb-3 card">
                                            <div class="card-body">
                                                <form method="POST" action="{{url('admin/product/store')}}">
                                                    @csrf
                                                    @include('admin.components.notification')
                                                <div class="position-relative row form-group">
                                                    <label for="brand_id"
                                                           class="col-md-3 text-md-right col-form-label">Brand</label>
                                                    <div class="col-md-9 col-xl-8">
                                                        <select required name="brand_id" id="brand_id" class="form-control">
                                                            <option value="">-- Brand --</option>
                                                            @foreach($brands as $brand)
                                                            <option value={{$brand->id}}>
                                                               {{$brand->name}}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="position-relative row form-group">
                                                    <label for="product_category_id"
                                                           class="col-md-3 text-md-right col-form-label">Category</label>
                                                    <div class="col-md-9 col-xl-8">
                                                        <select required name="product_category_id" id="product_category_id" class="form-control">
                                                            <option value="">-- Category --</option>
                                                            @foreach($productCategories as $productCategory)
                                                            <option value={{$productCategory->id}}>
                                                                {{$productCategory->name}}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="position-relative row form-group">
                                                    <label for="name" class="col-md-3 text-md-right col-form-label">Name</label>
                                                    <div class="col-md-9 col-xl-8">
                                                        <input required name="name" id="name" placeholder="Name" type="text"
                                                               class="form-control" value="">
                                                    </div>
                                                </div>

                                                <div class="position-relative row form-group">
                                                    <label for="content"
                                                           class="col-md-3 text-md-right col-form-label">Content</label>
                                                    <div class="col-md-9 col-xl-8">
                                                        <input required name="content" id="content"
                                                               placeholder="Content" type="text" class="form-control" value="">
                                                    </div>
                                                </div>

                                                <div class="position-relative row form-group">
                                                    <label for="price"
                                                           class="col-md-3 text-md-right col-form-label">Price</label>
                                                    <div class="col-md-9 col-xl-8">
                                                        <input required name="price" id="price"
                                                               placeholder="Price" type="text" class="form-control" value="">
                                                    </div>
                                                </div>

                                                <div class="position-relative row form-group">
                                                    <label for="discount"
                                                           class="col-md-3 text-md-right col-form-label">Discount</label>
                                                    <div class="col-md-9 col-xl-8">
                                                        <input required name="discount" id="discount"
                                                               placeholder="Discount" type="text" class="form-control" value="">
                                                    </div>
                                                </div>

                                                <div class="position-relative row form-group">
                                                    <label for="weight"
                                                           class="col-md-3 text-md-right col-form-label">Weight</label>
                                                    <div class="col-md-9 col-xl-8">
                                                        <input name="weight" id="weight"
                                                               placeholder="Weight" type="text" class="form-control" value="">
                                                    </div>
                                                </div>

                                                <div class="position-relative row form-group">
                                                    <label for="sku"
                                                           class="col-md-3 text-md-right col-form-label">SKU</label>
                                                    <div class="col-md-9 col-xl-8">
                                                        <input required name="sku" id="sku"
                                                               placeholder="SKU" type="text" class="form-control" value="">
                                                    </div>
                                                </div>

                                                <div class="position-relative row form-group">
                                                    <label for="tag"
                                                           class="col-md-3 text-md-right col-form-label">Tag</label>
                                                    <div class="col-md-9 col-xl-8">
                                                        <input required name="tag" id="tag"
                                                               placeholder="Tag" type="text" class="form-control" value="">
                                                    </div>
                                                </div>

                                                    <div class="position-relative row form-group">
                                                        <label for="featured" class="col-md-3 text-md-right col-form-label">Featured</label>
                                                        <div class="col-md-9 col-xl-8">
                                                            <div class="position-relative form-check pt-sm-1" style="padding-left: 0;">

{{--                                                                <input name="featured" id="featured" type="checkbox" value="1" class="form-check-input" checked="checked">--}}
{{--                                                                <label for="featured" class="form-check-label">Featured</label>--}}

                                                                <label class="input-check" style="padding-left: 28px; line-height: 1.9">
                                                                    Featured <input type="checkbox" name="featured" value="1" checked="checked" />
                                                                    <span class="checkmark"></span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                <div class="position-relative row form-group">
                                                    <label for="description"
                                                           class="col-md-3 text-md-right col-form-label">Description</label>
                                                    <div class="col-md-9 col-xl-8">
                                                        <textarea class="form-control" name="description" id="description" placeholder="Description"></textarea>
                                                    </div>
                                                </div>

                                                <div class="position-relative row form-group mb-1">
                                                    <div class="col-md-9 col-xl-8 offset-md-2">
                                                        <a href="admin/product" class="border-0 btn btn-outline-danger mr-1">
                                                            <span class="btn-icon-wrapper pr-1 opacity-8">
                                                                <i class="fa fa-times fa-w-20"></i>
                                                            </span>
                                                            <span>Cancel</span>
                                                        </a>

                                                        <button type="submit" value="Save Change" class="btn btn-add btn-primary">Save Change</button>

                                                    </div>
                                                </div>
                                                </form>

                                            </div>

                                            </div>






                    </div> <!-- /.card-body -->
                </div> <!-- /.col-12 -->
            </div> <!-- .row -->
        </div> <!-- .container-fluid -->

    </main> <!-- main -->
    <script src="https://cdn.ckeditor.com//4.14.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description');
    </script>
@endsection
