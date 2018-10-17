<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <title>Invoice - #123</title>

    <style>
        @page {
            margin: 0px;
        }

        body {
            margin: 0px;
        }
        * {
            font-family: Verdana, Arial, sans-serif;
        }
        a {
            color: #fff;
            text-decoration: none;
        }
        table {
            font-size: x-small;
        }
        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }
        .invoice table {
            margin: 15px;
        }
        .invoice h3 {
            margin-left: 15px;
        }
        .information {
            background-color: #7886D7;
            color: #FFF;
        }
        .information .logo {
            margin: 5px;
        }
        .information table {
            padding: 10px;
        }
    </style>

</head>
<body>

<div class="information">
    <table width="100%">
        <tr>
            <td align="left" style="width: 40%;">
                <h3>{{ $order->customer->full_name }}</h3>
                <pre>
{{ $order->customer->address }}
{{ $order->customer->full_city }}
{{ $order->customer->country }}
<br /><br />
Date: {{ $order->placed_at }}
No: {{ $order->present_number }}
Status: Paid
</pre>
            </td>
            <td align="center">
                <img src="images/logo.png" alt="Logo" width="64" class="logo"/>
            </td>
            <td align="right" style="width: 40%;">

                <h3>{{ config('app.name') }}</h3>
                <pre>
                    https://company.com

                    Street 24
                    11000 Belgrade
                    Serbia
                    Phone: +381 11 123456
                    E-mail: office@larashop.com
                </pre>
            </td>
        </tr>

    </table>
</div>


<br/>

<div class="invoice">
    <h3>Invoice specification #123</h3>
    <table width="100%">
        <thead>
            <tr>
                <th>Item</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->inventories as $inventory)
            <tr>
                <td>{{ $inventory->name }}</td>
                <td>{{ presentPrice(formatNumber($inventory->attribute->price/100)) }}</td>
                <td>{{ $inventory->attribute->qty) }}</td>
                <td align="left">{{ $inventory->presentSubtotal($inventory->attribute->qty) }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2"></td>
                <td align="left">Subtotal</td>
                <td align="left" class="gray">{{ $order->present_subtotal }}</td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td align="left">Shipping & Handling</td>
                <td align="left" class="gray">$0.00</td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td align="left">Tax ({{ config('cart.tax') .'%' }})</td>
                <td align="left" class="gray">{{ $order->present_tax }}</td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td align="left">Order total</td>
                <td align="left" class="gray">{{ $order->present_total }}</td>
            </tr>
        </tfoot>
    </table>
</div>

<div class="information" style="position: absolute; bottom: 0;">
    <table width="100%">
        <tr>
            <td align="left" style="width: 50%;">
                &copy; {{ date('Y') }} {{ config('app.name') }} - All rights reserved.
            </td>
            <td align="right" style="width: 50%;">
                Company Slogan
            </td>
        </tr>

    </table>
</div>
</body>
</html>