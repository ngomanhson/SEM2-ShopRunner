@extends('admin.layout.master')
@section('title','Create')
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
                                <h2 class="h3 mb-0 page-title">User Create</h2>
                            </div>
                        </div>
                    </div>
                </div>
              <div class="my-4">
                <form method="POST" action="{{url('admin/user/store')}}">
                    @csrf
                    @include('admin.components.notification')
                  <hr class="my-4">

                    <div class="form-group ">
                      <label for="name">Name</label>
                      <input type="text" id="name" name="name" class="form-control" placeholder="Name">
                        @error('name')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                  <div class="form-row">
                      <div class="form-group col-md-6">
                          <label for="inputEmail4">Email</label>
                          <input type="email" name="email"  class="form-control" id="inputEmail4" placeholder="Email">
                          @error('email')
                          <small class="form-text text-danger">{{$message}}</small>
                          @enderror
                      </div>
                      <div class="form-group col-md-6">
                          <label for="password">Password</label>
                          <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                          @error('password')
                          <small class="form-text text-danger">{{$message}}</small>
                          @enderror
                      </div>
                      <div class="form-group col-md-6">
                          <label for="password_confirmation">Confirm Password</label>
                          <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm Password">
                          @error('password_confirmation')
                          <small class="form-text text-danger">{{$message}}</small>
                          @enderror
                      </div>
                  </div>
                    <div class="form-group ">
                        <label for="company_name">Company Name</label>
                        <input type="text" name="company_name" class="form-control" id="company_name" placeholder="Nec Urna Suscipit Ltd">
                        @error('company_name')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group ">
                        <label for="country">Country</label>
                        <input type="text"  name="country" class="form-control" id="country" placeholder="Country">
                        @error('country')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                  <div class="form-group">
                    <label for="street_address">Address</label>
                    <input type="text" name="street_address" class="form-control" id="street_address" placeholder="P.O. Box 464, 5975 Eget Avenue">
                      @error('street_address')
                      <small class="form-text text-danger">{{$message}}</small>
                      @enderror
                  </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" class="form-control" id="phone" placeholder="+84 999 999 999">
                        @error('phone')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>

                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="town_city">Town City</label>
                      <input type="text" name="town_city" class="form-control" id="town_city" placeholder="Nec Urna Suscipit Ltd">
                        @error('town_city')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>

{{--                      <div class="position-relative row form-group">--}}
{{--                          <label for="level"--}}
{{--                                 class="col-md-3 text-md-right col-form-label">Level</label>--}}

{{--                          <div class="col-md-9 col-xl-8">--}}
{{--                              @php--}}
{{--                                  $options = [];--}}

{{--                                  if ($roles) {--}}
{{--                                      $options = $roles->pluck('name', 'id')->toArray();--}}
{{--                                  }--}}
{{--                              @endphp--}}

{{--                              {{ Form::select('roles[]', $options, null,['id' => 'roles', 'class' => 'form-control', 'multiple' => true]) }}--}}
{{--                          </div>--}}
{{--                      </div>--}}
                    <div class="form-group col-md-2">
                      <label for="postcode_zip">Zip</label>
                      <input type="text" name="postcode_zip" class="form-control" id="postcode_zip" placeholder="12345678">
                        @error('postcode_zip')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                  </div>
                    <a type="submit" href="./admin/user" class="btn btn-danger">Cancel</a>
                  <button type="submit" value="Save Change" class="btn btn-add btn-primary">Save Change</button>

                </form>
              </div> <!-- /.card-body -->
            </div> <!-- /.col-12 -->
          </div> <!-- .row -->
        </div> <!-- .container-fluid -->

      </main> <!-- main -->
@endsection
