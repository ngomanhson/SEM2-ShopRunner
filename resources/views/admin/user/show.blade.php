@extends('admin.layout.master')
@section('title','User')
@section('body')
      <main role="main" class="main-content">
          <div class="col">
              <h2 class="h3 mb-0 page-title">User Show</h2>
          </div>
          <div class="app-main__inner">
              <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
                  <li class="nav-item">
                      <a href="{{route('user.edit',$user->id)}}" class="nav-link">
                        <span class="btn-icon-wrapper pr-2 opacity-8">
                            <i class="fa fa-edit fa-w-20"></i>
                        </span>
                          <span>Edit</span>
                      </a>
                  </li>

                  <li class="nav-item delete">
                      <a href="./admin/user" class="nav-link" style="color: #f81414">
                        <span class="btn-icon-wrapper pr-2 opacity-8">
                             <i class="fa fa-trash fa-w-20"></i>
                        </span>
                          <span>Cancel</span>
                      </a>
                  </li>
              </ul>

              <div class="row">
                  <div class="col-md-12">
                      <div class="main-card mb-3 card">
                          <div class="card-body display_data">

                              <div class="position-relative row form-group">
                                  <label for="name" class="col-md-3 text-md-right col-form-label">
                                      Name
                                  </label>
                                  <div class="col-md-9 col-xl-8">
                                      <p>{{$user->name}}</p>
                                  </div>
                              </div>

                              <div class="position-relative row form-group">
                                  <label for="email" class="col-md-3 text-md-right col-form-label">Email</label>
                                  <div class="col-md-9 col-xl-8">
                                      <p>{{$user->email}}</p>
                                  </div>
                              </div>

                              <div class="position-relative row form-group">
                                  <label for="company_name" class="col-md-3 text-md-right col-form-label">
                                      Company Name
                                  </label>
                                  <div class="col-md-9 col-xl-8">
                                      <p>{{$user->company_name}}</p>
                                  </div>
                              </div>

                              <div class="position-relative row form-group">
                                  <label for="country"
                                         class="col-md-3 text-md-right col-form-label">Country</label>
                                  <div class="col-md-9 col-xl-8">
                                      <p>{{$user->country}}</p>
                                  </div>
                              </div>

                              <div class="position-relative row form-group">
                                  <label for="street_address" class="col-md-3 text-md-right col-form-label">
                                      Street Address</label>
                                  <div class="col-md-9 col-xl-8">
                                      <p>{{$user->street_address}}</p>
                                  </div>
                              </div>

                              <div class="position-relative row form-group">
                                  <label for="postcode_zip" class="col-md-3 text-md-right col-form-label">
                                      Postcode Zip</label>
                                  <div class="col-md-9 col-xl-8">
                                      <p>{{$user->postcode_zip}}</p>
                                  </div>
                              </div>

                              <div class="position-relative row form-group">
                                  <label for="town_city" class="col-md-3 text-md-right col-form-label">
                                      Town City</label>
                                  <div class="col-md-9 col-xl-8">
                                      <p>{{$user->town_city}}</p>
                                  </div>
                              </div>

                              <div class="position-relative row form-group">
                                  <label for="phone" class="col-md-3 text-md-right col-form-label">Phone</label>
                                  <div class="col-md-9 col-xl-8">
                                      <p>{{$user->phone}}</p>
                                  </div>
                              </div>

{{--                              <div class="position-relative row form-group">--}}
{{--                                  <label for="level" class="col-md-3 text-md-right col-form-label">Level</label>--}}
{{--                                  <div class="col-md-9 col-xl-8">--}}
{{--                                      <p>{{\App\Utilities\Constant::$user_level[$user->level]}}</p>--}}
{{--                                  </div>--}}
{{--                              </div>--}}

                              <div class="position-relative row form-group">
                                  <label for="description"
                                         class="col-md-3 text-md-right col-form-label">Description</label>
                                  <div class="col-md-9 col-xl-8">
                                      <p>description</p>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </main> <!-- main -->
@endsection
