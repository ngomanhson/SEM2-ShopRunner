
@extends('admin.layout.master')
@section('title','Brand')
@section('body')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="row align-items-center my-4">
                        <div class="col">
                            <h2 class="h3 mb-0 page-title">Brand</h2>
                        </div>
                        <div class="col-auto">

                            <a href="./admin/brand/create" class="btn btn-primary"><span class="fe fe-filter fe-12 mr-2"></span>Create</a>
                        </div>
                    </div>

                    <!-- table -->
                    @if(session('status'))
                        <div class="alert alert-success">
                            {{session('status')}}
                        </div>
                    @endif

                    @if(session('warning'))
                        <div class="alert alert-warning">
                            {{session('warning')}}
                        </div>
                    @endif

                    <div class="card shadow">
                        <div class="card-body">
                            <div class="analytic">
                                <a href="{{request()->fullUrlWithQuery(['status'=>'active'])}}" class="text-primary" >Activated<span class="text-muted">({{$count[0]}})</span></a>|
                                <a href="{{request()->fullUrlWithQuery(['status'=>'trash'])}}" class="text-primary">Disable<span class="text-muted">({{$count[1]}})</span></a>

                            </div>
                            <form  method="POST" action="{{url('admin/brand/action')}}">
                                @csrf
                                @method('POST')
                                <div class="form-action form-inline py-3">
                                    <select class="form-control mr-3" name="act">
                                        <option>Select</option>
                                        @foreach($list_act as $k => $act)
                                            <option value="{{$k}}">{{$act}}</option>
                                        @endforeach
                                    </select>
                                    <input type="submit" name="btn-search" value="Apply" class="btn btn-primary">
                                </div>
                                <table class="table table-borderless table-hover table-checkall" style="
                                text-align: center">
                                    <thead>
                                    <tr>
                                        <th>
{{--                                            <input type="checkbox" name="checkall">--}}
                                            <label class="input-check">
                                                <input type="checkbox" name="checkall"  />
                                                <span class="checkmark"></span>
                                            </label>
                                        </th>
                                        <th style="width: 1.6rem">#</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($brand->total()>0)
                                        @foreach($brand as $brands)
                                            <tr>
                                                <td>
{{--                                                    <input type="checkbox" name="list_check[]" value="{{$brands->id}}">--}}
                                                    <label class="input-check">
                                                        <input type="checkbox" name="list_check[]" value="{{$brands->id}}"  />
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="avatar avatar-sm">
                                                        <p class="mb-0 text-muted">{{$brands->id}}</p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="mb-0 text-muted"><strong></strong></p>
                                                    <small class="mb-0 text-muted"><strong>{{$brands->name}}</strong></small>
                                                </td>
                                                <td>
                                                    <span class="text-muted sr-only">Action</span>
                                                    <a href="{{route('brand.edit',$brands->id)}}" data-toggle="tooltip" title="Edit"
                                                       data-placement="bottom" class="btn btn-outline-warning border-0 btn-sm">
                                                        <span class="btn-icon-wrapper opacity-8">
                                                            <i class="fa fa-edit fa-w-20"></i>
                                                        </span>
                                                    </a>
                                                    @if($status !== 'trash')
                                                        <a href="{{route('delete_brand',$brands->id)}}" class="btn btn-danger btn-sm rounded-0 text-white"  onclick="return confirm('Are you sure you want to delete ?')" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="7"> <p class="alert alert-warning">Search results are empty</p></td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </form>

                        </div>
                    </div>

                    <nav aria-label="Table Paging" class="my-3">
                        <ul class="pagination justify-content-end mb-0">
                            {!! $brand->appends(app("request")->input())->links("pagination::bootstrap-4") !!}
                        </ul>
                    </nav>
                </div> <!-- .col-12 -->
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
    </main> <!-- main -->
@endsection
