@extends('admin.layout.master')
@section('title','Orders')
@section('body')
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-10 col-lg-8 col-xl-6">
                <div class="row align-items-center mb-4">
                    <div class="col">
                        <div class="d-flex justify-content-between">
                            <h2 class="h5 page-title">
                                <small class="text-muted text-uppercase">Invoice</small><br />#{{$order->order_code}}
                            </h2>
                            <div class="order-btn__action">
                                <div class="d-flex" style="gap: 10px">
                                    <button type="button" class="btn btn-hover-shine btn-outline-secondary border-0 btn-sm" onclick="window.print()">Print</button>
                                    @if ($order->status == 0)
                                        <button type="button" class="btn btn-hover-shine btn-outline-primary border-0 btn-sm" onclick="confirmPayment({{ $orderId }})">Confirm</button>
                                        <form action="admin/orders/{{ $orderId }}/cancel" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-hover-shine btn-outline-danger border-0 btn-sm">Cancel</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card shadow">
                    <div class="card-body p-5">
                        <div style="">
                            <div class="row mb-6">
                                <div class="col-md-5 mb-2">
                                    <img src="front/img/logo.png" class="navbar-brand-img mx-auto mb-4" alt="Shop Runner" width="150">
                                </div>
                                <div class="col-md-7 mb-2" style="text-align: right">
                                    <h2 class="mb-0" style="color: #f00; font-size: 21px">Invoice</h2>
                                    <p class="text-secondary mb-2" style="font-size: 12px">Order Code: <a href="" style="color: #f00">#{{$order->order_code}}</a></p>
                                    <p class="text-secondary mb-2" style="font-size: 12px">Order Date: <span>{{$order->created_at}}</span></p>
                                </div>
                            </div>
                            <div class="row mb-6">
                                <div class="col-md-6">
                                    <p class="small text-muted text-uppercase mb-2">Invoice from</p>
                                    <p class="mb-4">
                                        <strong> Shop Runner</strong><br />
                                        8 Tôn Thất Thuyết, Mỹ Đình, <br />
                                        Nam Từ Liêm, Hà Nội, Việt Nam.<br />
                                        Phone: 099 999 9999.
                                    </p>
                                </div>
                                <div class="col-md-6" style="text-align: right">
                                    <p class="small text-muted text-uppercase mb-2">Invoice to</p>
                                    <p class="mb-4">
                                        <strong>{{$order->first_name . ' ' . $order->last_name}}</strong> <br />
                                        Phone: {{ $order->phone }}.<br />
                                        Company name: {{ $order->company_name }}.<br />
                                        Street address: {{ $order->street_address }}.<br />
                                        Town/City: {{ $order->town_city }}.<br />
                                        Country: {{ $order->country }}.<br />
                                        Postcode / ZIP: {{ $order->postcode_zip }}.<br />
                                    </p>
                                </div>
                            </div>
                        </div>
                        <table class="table table-borderless table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Products</th>
                                <th scope="col" class="text-right">SubTotal</th>
                                <th scope="col" class="text-right">Qty</th>
                                <th scope="col" class="text-right">Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order->orderDetails as $orderDetail)
                            <tr>
                                <th scope="row">1</th>
                                <td> {{$orderDetail->product->name}}<br />

                                </td>
                                <td class="text-right">${{$orderDetail->amount}}</td>
                                <td class="text-right">{{$orderDetail->qty}}</td>
                                <td class="text-right">${{$orderDetail->total}}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                            <div class="col-md-5" style="margin-left: auto">
                                <div class="text-right mr-2">
                                    <p class="mb-2">Subtotal:
                                        <span style="font-size: 14px">${{number_format($subtotal, 2, '.', '') }}</span>
                                    </p>
                                    <p class="mb-2">VAT (10%):
                                        <span style="font-size: 14px">${{number_format($vatAmount, 2, '.', '') }}</span>
                                    </p>
                                    <p class="mb-2">Shipping:
                                        <span style="font-size: 14px">${{number_format($shippingFee, 2, '.', '') }}</span>
                                    </p>
                                    <p class="mb-2">Total:
                                        <span  style="font-size: 14px"> ${{number_format($total, 2, '.', '') }}</span>
                                    </p>
                                </div>
                            </div>

                        <div class="row mt-2">
                            <div class="col-12 text-center">
                                <img src="./dashboard/assets/images/qrcode.svg" class="navbar-brand-img brand-sm mx-auto my-4" alt="QR Code">
                            </div>
                            <div class="col-12 md-5">
                                <p style="color: red; font-size: 14px; font-weight: 600; text-align: center">
                                    <strong>NOTE: </strong>Delivery times may vary due to location and other factors. Thank you, we hope you understand.</p>
                            </div>
                        </div>

                    </div> <!-- /.card-body -->
                </div> <!-- /.card -->
            </div> <!-- /.col-12 -->
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
<script>
    function confirmPayment(orderId) {
        // Gửi yêu cầu AJAX đến server
        $.ajax({
            url: '{{ route("confirm.payment") }}', // Đường dẫn tới tuyến đường confirm.payment
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}', // CSRF token
                orderId: orderId // Truyền orderId
            },
            success: function(response) {
                // Xử lý phản hồi từ server (nếu cần)
                alert('Order payment confirmed successfully');
                window.location.href = '{{ url("admin/orders") }}'; // Chuyển về trang 'admin/orders'
            },
            error: function(error) {
                // Xử lý lỗi (nếu có)
                alert('Error confirming order payment');
            }
        });
    }
    document.getElementById('cancelButton').addEventListener('click', function() {
        // Gửi yêu cầu AJAX để cập nhật trạng thái sang 5
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '/update-status', true);
        xhr.setRequestHeader('Content-type', 'application/json');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Xử lý phản hồi từ máy chủ (nếu cần)
                console.log(xhr.responseText);
            }
        };
        xhr.send(JSON.stringify({ status: 5, orderId: '{{ $orderId }}' }));
    });
</script>

@endsection
