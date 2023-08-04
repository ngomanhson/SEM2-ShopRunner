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
                                    <h2 class="h3 mb-0 page-title">Brand Create</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="my-4">
                        <form method="POST" action="{{url('admin/category/store')}}">
                            @csrf
                            @include('admin.components.notification')
                            <hr class="my-4">
                            <div class="form-group ">
                                <label for="name">Name</label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="">
                                @error('name')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <a type="submit" href="./admin/category" class="btn btn-danger">Cancel</a>
                            <button type="submit" value="Save Change" class="btn btn-add btn-primary">Save Change</button>

                        </form>
                    </div> <!-- /.card-body -->
                </div> <!-- /.col-12 -->
            </div> <!-- .row -->
        </div> <!-- .container-fluid -->

    </main> <!-- main -->
@endsection
