@extends('admin.layout.master')
@section('title','Orders')
@section('body')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="h3 mb-3 page-title">Orders</h2>

                    <div class="row mb-4 items-align-center">
                        <div class="col-md">
                            <ul class="nav nav-pills justify-content-start">
                                <li class="nav-item">
                                    <a class="nav-link{{ $status == 'active' ? ' active bg-transparent pr-2 pl-0 text-primary' : 'text-muted px-2' }}" href="{{ request()->fullUrlWithQuery(['status' => 'active']) }}">
                                        All <span class="badge badge-pill{{ $status == 'active' ? ' bg-primary text-white' : ' bg-white border text-muted' }} ml-2">({{ $count[0] }})</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link{{ $status == 'trash' ? ' active bg-transparent pr-2 pl-0 text-primary' : ' text-muted px-2' }}" href="{{ request()->fullUrlWithQuery(['status' => 'trash']) }}">
                                        Pending <span class="badge badge-pill{{ $status == 'trash' ? ' bg-primary text-white' : ' bg-white border text-muted' }} ml-2">({{ $count[1] }})</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link{{ $status == 'completed' ? ' active bg-transparent pr-2 pl-0 text-primary' : ' text-muted px-2' }}" href="{{ request()->fullUrlWithQuery(['status' => 'completed']) }}">
                                        Completed <span class="badge badge-pill{{ $status == 'completed' ? ' bg-primary text-white' : ' bg-white border text-muted' }} ml-2">({{ $count[3] }})</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link{{ $status == 'cancel' ? ' active bg-transparent pr-2 pl-0 text-primary' : ' text-muted px-2' }}" href="{{ request()->fullUrlWithQuery(['status' => 'cancel']) }}">Cancel <span class="badge badge-pill{{ $status == 'cancel' ? ' bg-primary text-white' : ' bg-white border text-muted' }} ml-2">{{$count[2]}}</span></a>
                                </li>
                                <li class="nav-item">

                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Slide Modal -->
                    @if(session('status'))
                        <div class="alert alert-success">
                            {{session('status')}}
                        </div>
                    @endif
{{--                    <form class="form-inline mr-auto searchform text-muted">--}}
{{--                        <input type="date" name="date" value="{{request()->input('search')}}"  placeholder="Type something..." aria-label="Search">--}}
{{--                        <button type="submit">Filter</button>--}}
{{--                    </form>--}}
                    <form class="search-order__history">
                        <label for="status">Status:</label>
                        <select name="status" id="status">
                            <option value="active" {{ request()->input('status') === 'active' ? 'selected' : '' }}>Active</option>
                            <option value="trash" {{ request()->input('status') === 'trash' ? 'selected' : '' }}>Trash</option>
                            <option value="cancel" {{ request()->input('status') === 'cancel' ? 'selected' : '' }}>Cancel</option>
                        </select>

                        <label for="search">Search by Order Code:</label>
                        <input type="text" name="search" id="search" value="{{ request()->input('search') }}">

                        <label for="start_date">Start Date:</label>
                        <input type="date" name="start_date" id="start_date" value="{{ request()->input('start_date') }}">

                        <label for="end_date">End Date:</label>
                        <input type="date" name="end_date" id="end_date" value="{{ request()->input('end_date') }}">

                        <button type="submit" class="order-btn__search">Search</button>
                        <button type="button" onclick="resetForm()" class="order-btn__reset">Reset</button>
                    </form>
                    <table class="table border table-hover bg-white">
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
                    <nav aria-label="Table Paging" class="my-3">
                        <ul class="pagination justify-content-end mb-0">
                            {!! $order->appends(app("request")->input())->links("pagination::bootstrap-4") !!}
                        </ul>
                    </nav>
                </div>
            </div> <!-- .row -->
        </div> <!-- .container-fluid -->
        <div class="modal fade modal-notif modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
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
                                        <div class="my-0 text-muted small">Just create new layout Index, form, table</div>
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
                                        <div class="my-0 text-muted small">New layout has been attached to the menu</div>
                                        <small class="badge badge-pill badge-light text-muted">1h ago</small>
                                    </div>
                                </div>
                            </div> <!-- / .row -->
                        </div> <!-- / .list-group -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Clear All</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade modal-shortcut modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
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
    <script>
        function resetForm() {
            document.getElementById("status").selectedIndex = 0;
            document.getElementById("search").value = "";
            document.getElementById("start_date").value = "";
            document.getElementById("end_date").value = "";
            document.querySelector('form').submit();
            // You can also submit the form after resetting to trigger the search with default values
            // document.querySelector('form').submit();
        }
    </script>
@endsection
