@extends('admin.layout.master')
@section('title','Dashboard')
@section('body')

    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-0">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-3 text-center">
                                          <span class="circle circle-sm bg-primary">
                                            <i class="fe fe-16 fe-shopping-cart text-white mb-0"></i>
                                          </span>
                                        </div>
                                        <div class="col pr-0">
                                            <p class="small text-muted mb-0">Total orders today</p>
                                            <span class="h3 mb-0">{{$orderDay}}</span>
{{--                                            <span class="small text-success">Total orders today</span>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-0">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-3 text-center">
                                          <span class="circle circle-sm bg-primary">
                                            <i class="fe fe-16 fe-filter text-white mb-0"></i>
                                          </span>
                                        </div>
                                        <div class="col">
                                            <p class="small text-muted mb-0">Total Revenue</p>
                                            <div class="row align-items-center no-gutters">
                                                <div class="col-auto">
                                                    <span class="h3 mr-2 mb-0">${{$totalRevenue}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-0">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-3 text-center">
                                          <span class="circle circle-sm bg-primary">
                                            <i class="fe fe-16 fe-activity text-white mb-0"></i>
                                          </span>
                                        </div>
                                        <div class="col">
                                            <p class="small text-muted mb-0">Total order completed today</p>
                                            <span class="h3 mb-0">{{$orderDayCompleted}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-0">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-3 text-center">
                                          <span class="circle circle-sm bg-primary-light">
                                            <i class="fe fe-16 fe-shopping-bag text-white mb-0"></i>
                                          </span>
                                        </div>
                                        <div class="col pr-0">
                                            <p class="small text-muted mb-0">Total sales today</p>
                                            <span class="h3 mb-0">${{$orderDayTotal}}</span>
                                            {{--                                            <span class="small text-muted">+5.5%</span>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end section -->
                    <div class="row align-items-center my-2">
                        <div class="col-auto ml-auto">
                            <form class="form-inline">
                                <div class="form-group">
                                    <label for="reportrange" class="sr-only">Date Ranges</label>
                                    <div id="reportrange" class="px-2 py-2 text-muted">
                                        <i class="fe fe-calendar fe-16 mx-2"></i>
                                        <span class="small"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="button" class="btn btn-sm"><span
                                            class="fe fe-refresh-ccw fe-12 text-muted"></span></button>
                                    <button type="button" class="btn btn-sm"><span
                                            class="fe fe-filter fe-12 text-muted"></span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- charts-->
                    <div class="row my-4">
                        <div class="col-md-12">
                            <div class="chart-box">
                                <div id="columnChart"></div>
                            </div>
                        </div> <!-- .col -->
                    </div>
                    <!-- end section -->


                    {{-- Charts 2 --}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <p class="pl-3" ><strong class="mb-0 text-uppercase card-title">Statistics of the last 7 days</strong></p>
                                    <h3 class="pt-3 pl-3">${{$total7Days}}</h3>
                                    <div class="chart-box pt-4">
                                        <div id="line" style="padding-bottom: 36px"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card shadow mb-4">
                                <div class="card-header">
                                    <strong class="card-title" style="margin-top: 1rem;">Top Selling</strong>
                                </div>
                                <div class="card-body">
                                    <div class="list-group list-group-flush p-1">
                                        @foreach ($topSelling as $productFeatured)
                                            <div class="list-group-item">
                                                <div class="row align-items-center">
                                                    <div class="col-3 col-md-2">
                                                        <img src="/front/img/product/{{ isset($productFeatured->product->productImages[0]) ? $productFeatured->product->productImages[0]->path : 'hhhh.jpg' }}" alt="{{ $productFeatured->product->name }}" class="img-thumbnail" style="width: 50px; height: 50px; object-fit: cover">
                                                    </div>
                                                    <div class="col">
                                                        <strong>{{ $productFeatured->product->name }}</strong>
                                                        <div class="my-0 text-muted small">{{ $productFeatured->product->brand->name }}</div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <a href="{{ url('/admin/product/show/' . $productFeatured->product_id) }}" class="btn btn-hover-shine btn-outline-primary border-0 btn-sm">Details</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div> <!-- / .list-group -->
                                </div> <!-- / .card-body -->
                            </div> <!-- .card -->
                        </div>
                    </div>

                    {{-- End Charts 2 --}}

                    <div class="row">
                        <!-- Recent orders -->
                        <div class="col-md-12">
                            <h6 class="mb-3">Last orders</h6>
                            <table class="table table-borderless table-striped">
                                <thead>
                                <tr role="row">
                                    <th>ID</th>
                                    <th>Order Code</th>
                                    <th>Purchase Date</th>
                                    <th>Customer / Products</th>
                                    <th>Phone</th>
                                    <th>Ship To</th>
                                    <th>Total</th>
                                    <th>Payment</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($order->total()>0)
                                    @foreach($order as $orders)
                                        <tr>
                                            <td class="align-center">{{$orders->id}}</td>
                                            <td>#{{$orders->order_code}}</td>
                                            <td>{{$orders->created_at->format('H:i:s d-m-Y')}}</td>
                                            <td> <div class="widget-heading">{{$orders->first_name . ' ' . $orders->last_name}}</div>
                                                <div class="widget-subheading opacity-7">
                                                    {{$orders->orderDetails[0]->product->name}}
                                                    @if(count($orders->orderDetails)>1)
                                                        (and {{count($orders->orderDetails)}} other products)
                                                    @endif
                                                </div></td>
                                            <td>{{$orders->phone}}</td>
                                            <td>{{$orders->street_address}}</td>
                                            <td>${{$orders->total}}</td>
                                            <td> {{$orders->payment_method}}</td>
                                            <td>
                                                @if ($orders->status == 0)
                                                    <span class="dot dot-lg bg-secondary mr-2"></span>
                                                @elseif ($orders->status == 1)
                                                    <span class="dot dot-lg bg-primary mr-2"></span>
                                                @elseif ($orders->status == 2)
                                                    <span class="dot dot-lg bg-primary mr-2"></span>
                                                @elseif ($orders->status == 3)
                                                    <span class="dot dot-lg bg-primary mr-2"></span>
                                                @elseif ($orders->status == 4)
                                                    <span class="dot dot-lg bg-success mr-2"></span>
                                                @else ($orders->status == 5)
                                                    <span class="dot dot-lg bg-danger mr-2"></span>
                                                @endif
                                                {{ \App\Utilities\Constant::$order_status[$orders->status] }}
                                            </td>
                                            <td>
                                                <a href="{{route('order.show',$orders->id)}}" class="btn btn-hover-shine btn-outline-primary border-0 btn-sm">Details</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="10"> <p class="alert alert-warning">Search results are empty</p></td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade modal-notif modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="defaultModalLabel">Notifications</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="list-group list-group-flush my-n3">
                            <div class="list-group-item bg-transparent">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="fe fe-box fe-24"></span>
                                    </div>
                                    <div class="col">
                                        <small><strong>Package has uploaded successfull</strong></small>
                                        <div class="my-0 text-muted small">Package is zipped and uploaded</div>
                                        <small class="badge badge-pill badge-light text-muted">1m ago</small>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item bg-transparent">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="fe fe-download fe-24"></span>
                                    </div>
                                    <div class="col">
                                        <small><strong>Widgets are updated successfull</strong></small>
                                        <div class="my-0 text-muted small">Just create new layout Index, form, table
                                        </div>
                                        <small class="badge badge-pill badge-light text-muted">2m ago</small>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item bg-transparent">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="fe fe-inbox fe-24"></span>
                                    </div>
                                    <div class="col">
                                        <small><strong>Notifications have been sent</strong></small>
                                        <div class="my-0 text-muted small">Fusce dapibus, tellus ac cursus commodo</div>
                                        <small class="badge badge-pill badge-light text-muted">30m ago</small>
                                    </div>
                                </div> <!-- / .row -->
                            </div>
                            <div class="list-group-item bg-transparent">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="fe fe-link fe-24"></span>
                                    </div>
                                    <div class="col">
                                        <small><strong>Link was attached to menu</strong></small>
                                        <div class="my-0 text-muted small">New layout has been attached to the menu
                                        </div>
                                        <small class="badge badge-pill badge-light text-muted">1h ago</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Clear All
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade modal-shortcut modal-slide" tabindex="-1" role="dialog"
             aria-labelledby="defaultModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="defaultModalLabel">Shortcuts</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body px-5">
                        <div class="row align-items-center">
                            <div class="col-6 text-center">
                                <div class="squircle bg-success justify-content-center">
                                    <i class="fe fe-cpu fe-32 align-self-center text-white"></i>
                                </div>
                                <p>Control area</p>
                            </div>
                            <div class="col-6 text-center">
                                <div class="squircle bg-primary justify-content-center">
                                    <i class="fe fe-activity fe-32 align-self-center text-white"></i>
                                </div>
                                <p>Activity</p>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-6 text-center">
                                <div class="squircle bg-primary justify-content-center">
                                    <i class="fe fe-droplet fe-32 align-self-center text-white"></i>
                                </div>
                                <p>Droplet</p>
                            </div>
                            <div class="col-6 text-center">
                                <div class="squircle bg-primary justify-content-center">
                                    <i class="fe fe-upload-cloud fe-32 align-self-center text-white"></i>
                                </div>
                                <p>Upload</p>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-6 text-center">
                                <div class="squircle bg-primary justify-content-center">
                                    <i class="fe fe-users fe-32 align-self-center text-white"></i>
                                </div>
                                <p>Users</p>
                            </div>
                            <div class="col-6 text-center">
                                <div class="squircle bg-primary justify-content-center">
                                    <i class="fe fe-settings fe-32 align-self-center text-white"></i>
                                </div>
                                <p>Settings</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
