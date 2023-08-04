<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Order confirmation</title>
<meta name="robots" content="noindex,nofollow" />
<meta name="viewport" content="width=device-width; initial-scale=1.0;" />
<style type="text/css">
    @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700);
    body {
        margin: 0;
        padding: 0;
        background: #e1e1e1;
    }
    div,
    p,
    a,
    li,
    td {
        -webkit-text-size-adjust: none;
    }
    .ReadMsgBody {
        width: 100%;
        background-color: #ffffff;
    }
    .ExternalClass {
        width: 100%;
        background-color: #ffffff;
    }
    body {
        width: 100%;
        height: 100%;
        background-color: #e1e1e1;
        margin: 0;
        padding: 0;
        -webkit-font-smoothing: antialiased;
    }
    html {
        width: 100%;
    }
    p {
        padding: 0 !important;
        margin-top: 0 !important;
        margin-right: 0 !important;
        margin-bottom: 0 !important;
        margin-left: 0 !important;
    }
    .visibleMobile {
        display: none;
    }
    .hiddenMobile {
        display: block;
    }

    @media only screen and (max-width: 600px) {
        body {
            width: auto !important;
        }
        table[class="fullTable"] {
            width: 96% !important;
            clear: both;
        }
        table[class="fullPadding"] {
            width: 85% !important;
            clear: both;
        }
        table[class="col"] {
            width: 45% !important;
        }
        .erase {
            display: none;
        }
    }

    @media only screen and (max-width: 420px) {
        table[class="fullTable"] {
            width: 100% !important;
            clear: both;
        }
        table[class="fullPadding"] {
            width: 85% !important;
            clear: both;
        }
        table[class="col"] {
            width: 100% !important;
            clear: both;
        }
        table[class="col"] td {
            text-align: left !important;
        }
        .erase {
            display: none;
            font-size: 0;
            max-height: 0;
            line-height: 0;
            padding: 0;
        }
        .visibleMobile {
            display: block !important;
        }
        .hiddenMobile {
            display: none !important;
        }
    }
</style>

<!-- Header -->
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#e1e1e1">
    <tr>
        <td height="20"></td>
    </tr>
    <tr>
        <td>
            <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#ffffff" style="border-radius: 10px 10px 0 0">
                <tr class="visibleMobile">
                    <td height="30"></td>
                </tr>

                <tr>
                    <td>
                        <table width="480" border="0" cellpadding="0" cellspacing="0" align="center" class="fullPadding">
                            <tbody>
                            <tr>
                                <td>
                                    <table width="220" border="0" cellpadding="0" cellspacing="0" align="left" class="col">
                                        <tbody>
                                        <tr class="hiddenMobile">
                                            <td height="20"></td>
                                        </tr>
                                        <tr>
                                            <td align="left"><img src="https://i.ibb.co/S0WVnsx/logo-email.png" width="150" alt="logo" border="0" /></td>
                                        </tr>
                                        <tr class="visibleMobile">
                                            <td height="20"></td>
                                        </tr>
                                        <tr>
                                            <td style="font-size: 12px; color: #5b5b5b; font-family: 'Open Sans', sans-serif; line-height: 18px; vertical-align: top; text-align: left">
                                                Shop Runner.<br />
                                                8 Tôn Thất Thuyết, Mỹ Đình, <br />
                                                Nam Từ Liêm, Hà Nội, Việt Nam.<br />
                                                Phone: 099 999 9999.
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <table width="220" border="0" cellpadding="0" cellspacing="0" align="right" class="col">
                                        <tbody>
                                        <tr class="visibleMobile">
                                            <td height="20"></td>
                                        </tr>
                                        <tr>
                                            <td height="5"></td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="
                                                            font-size: 21px;
                                                            color: #ff0000;
                                                            letter-spacing: -1px;
                                                            font-family: 'Open Sans', sans-serif;
                                                            line-height: 1;
                                                            vertical-align: top;
                                                            text-align: right;
                                                        "
                                            >
                                                Invoice
                                            </td>
                                        </tr>
                                        <tr></tr>
                                        <tr class="visibleMobile">
                                            <td height="20"></td>
                                        </tr>
                                        <tr>
                                            <td style="font-size: 12px; color: #ff0000; font-family: 'Open Sans', sans-serif; line-height: 18px; vertical-align: top; text-align: right">
                                                <small style="color: #5b5b5b">Order Code: </small><a href="http://127.0.0.1:8000/account/my-order/{{ $order->order_code }}" style="color: #f00">#{{ $order->order_code }}</a><br />
                                                <small style="color: #5b5b5b">Order date: {{ $order->created_at }}</small>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<!-- /Header -->
<!-- Information -->
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#e1e1e1">
    <tbody>
    <tr>
        <td>
            <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#ffffff">
                <tbody>
                <tr></tr>
                <tr class="visibleMobile">
                    <td height="20"></td>
                </tr>

                <tr>
                    <td>
                        <table width="480" border="0" cellpadding="0" cellspacing="0" align="center" class="fullPadding">
                            <tbody>
                            <tr>
                                <td height="1" colspan="4" style="border-bottom: 1px solid #e4e4e4"></td>
                            </tr>
                            <tr>
                                <td style="padding-top: 30px">
                                    <table width="220" border="0" cellpadding="0" cellspacing="0" align="left" class="col">
                                        <tbody>
                                        <tr>
                                            <td style="font-size: 11px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; line-height: 1; vertical-align: top">
                                                <strong>BILLING INFORMATION</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="100%" height="10"></td>
                                        </tr>
                                        <tr>
                                            <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; line-height: 20px; vertical-align: top">
                                                Name: {{ $order->first_name }} {{ $order->last_name }}.<br />
                                                Phone: {{ $order->phone }}.<br />
                                                Company name: {{ $order->company_name }}.<br />
                                                Street address: {{ $order->street_address }}.<br />
                                                Town/City: {{ $order->town_city }}.<br />
                                                Country: {{ $order->country }}.<br />
                                                Postcode / ZIP: {{ $order->postcode_zip }}.<br />
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>

                                    <table width="220" border="0" cellpadding="0" cellspacing="0" align="right" class="col">
                                        <tbody>
                                        <tr>
                                            <td style="font-size: 11px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; line-height: 1; vertical-align: top; text-align: right">
                                                <strong>PAYMENT</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="100%" height="10"></td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; line-height: 20px; vertical-align: top; text-align: right"
                                            >
                                                Payment Method: {{$order->payment_method}}<br />
                                                Order Status:
                                                    @switch($order->status)
                                                        @case(0)<span class="text text-secondary">Pending</span>@break
                                                        @case(1)<span class="text text-success">Confirmed</span>@break
                                                        @case(2)<span class="text text-primary">Shipping</span>@break
                                                        @case(3)<span class="text text-primary">Shipped</span>@break
                                                        @case(4)<span class="text text-success">Completed</span>@break
                                                        @case(5)<span class="text text-danger">Cancel</span>@break
                                                   @endswitch
                                                <br />
                                                Payment Status: @switch($order->is_paid)
                                                    @case(0)<span class="text text-secondary">Unpaid</span>@break
                                                    @case(1)<span class="text text-success">Paid</span>@break
                                                @endswitch
                                                <br />
                                                Shipping Method: {{$order->shipping_method}}
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr class="visibleMobile">
                    <td height="20"></td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>
<!-- /Information -->

<!-- Order Details -->
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#e1e1e1">
    <tbody>
    <tr>
        <td>
            <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#ffffff">
                <tbody>
                <tr></tr>
                <tr class="visibleMobile">
                    <td height="20"></td>
                </tr>
                <tr>
                    <td>
                        <table width="480" border="0" cellpadding="0" cellspacing="0" align="center" class="fullPadding">
                            <tbody>
                            <tr>
                                <th
                                    style="
                                                    font-size: 12px;
                                                    font-family: 'Open Sans', sans-serif;
                                                    color: #5b5b5b;
                                                    font-weight: normal;
                                                    line-height: 1;
                                                    vertical-align: top;
                                                    padding: 0 10px 7px 0;
                                                "
                                    width="52%"
                                    align="left"
                                >
                                    Products
                                </th>
                                <th
                                    style="
                                                    font-size: 12px;
                                                    font-family: 'Open Sans', sans-serif;
                                                    color: #5b5b5b;
                                                    font-weight: normal;
                                                    line-height: 1;
                                                    vertical-align: top;
                                                    padding: 0 0 7px;
                                                "
                                    align="left"
                                >
                                    <small>SKU</small>
                                </th>
                                <th
                                    style="
                                                    font-size: 12px;
                                                    font-family: 'Open Sans', sans-serif;
                                                    color: #5b5b5b;
                                                    font-weight: normal;
                                                    line-height: 1;
                                                    vertical-align: top;
                                                    padding: 0 0 7px;
                                                "
                                    align="center"
                                >
                                    Quantity
                                </th>
                                <th
                                    style="
                                                    font-size: 12px;
                                                    font-family: 'Open Sans', sans-serif;
                                                    color: #1e2b33;
                                                    font-weight: normal;
                                                    line-height: 1;
                                                    vertical-align: top;
                                                    padding: 0 0 7px;
                                                "
                                    align="right"
                                >
                                    Subtotal
                                </th>
                            </tr>
                            <tr>
                                <td height="1" style="background: #bebebe" colspan="4"></td>
                            </tr>
                            @foreach($order->orderDetails as $orderDetail)
                                <tr>
                                    <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #ff0000; line-height: 18px; vertical-align: top; padding: 10px 0" class="article">
                                        {{ $orderDetail->product->name }}
                                    </td>
                                    <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 18px; vertical-align: top; padding: 10px 0">
                                        <small>{{$orderDetail->product->sku}}</small>
                                    </td>
                                    <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 18px; vertical-align: top; padding: 10px 0" align="center">
                                        {{ $orderDetail->qty}}
                                    </td>
                                    <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #1e2b33; line-height: 18px; vertical-align: top; padding: 10px 0" align="right">
                                        ${{ $orderDetail->total }}
                                    </td>
                                </tr>
                                <tr>
                                    <td height="1" colspan="4" style="border-bottom: 1px solid #e4e4e4"></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td height="20"></td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>
<!-- /Order Details -->
<!-- Total -->
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#e1e1e1">
    <tbody>
    <tr>
        <td>
            <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#ffffff">
                <tbody>
                <tr>
                    <td>
                        <!-- Table Total -->
                        <table width="480" border="0" cellpadding="0" cellspacing="0" align="center" class="fullPadding">
                            <tbody>
                            <tr>
                                <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align: right">Subtotal</td>
                                <td style="
                                                    font-size: 12px;
                                                    font-family: 'Open Sans', sans-serif;
                                                    color: #646a6e;
                                                    line-height: 22px;
                                                    vertical-align: top;
                                                    text-align: right;
                                                    white-space: nowrap;
                                                " width="80">${{number_format($subtotal, 2, '.', '') }}
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align: right">VAT 10%</td>
                                <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align: right">${{number_format($vatAmount, 2, '.', '') }}</td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align: right">Shipping</td>
                                <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align: right">${{number_format($shippingFee, 2, '.', '') }}</td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align: right">Total</td>
                                <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align: right">${{number_format($total, 2, '.', '') }}</td>
                            </tr>
                            </tbody>
                        </table>
                        <!-- /Table Total -->
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>
<!-- /Total -->

<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#e1e1e1">
    <tr>
        <td>
            <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#ffffff" style="border-radius: 0 0 10px 10px">
                <tr>
                    <td>
                        <table width="480" border="0" cellpadding="0" cellspacing="0" align="center" class="fullPadding">
                            <tbody>
                            <tr>
                                <td style="font-size: 12px; color: #5b5b5b; font-family: 'Open Sans', sans-serif; line-height: 18px; vertical-align: top; text-align: left">
                                    Hello <strong>{{ $order->first_name }} {{ $order->last_name }},</strong> <br />Thank you for shopping from our store and for your order. it is really awesome to have you as one of our paid users.
                                    We hope that you will be satisfied with our products and services, if you ever have any questions, suggestions or concerns please do not hesitate to contact us. <br /><br />

                                    <br />Best Regards, <br />Code One Min Team. <br />
                                    <br />
                                    Email: <a href="mailto:codeonemin@gmail.com"></a> codeonemin@gmail.com. <br />
                                    Website: <a href="http://127.0.0.1:8000/">shoprunner.com</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr class="spacer">
                    <td height="50"></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td height="20"></td>
    </tr>
</table>

