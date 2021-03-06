<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <title>Order</title>

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">

    <style>
        .page-break { page-break-after: always;}
        .w-full {width: 100%;}
        .bg-card-header { background: #f1f5f8 }
        .text-grey-pdf { color: #555 }
        .float-left {float: left}
        .float-right {float: right}
        .w-100 { width: 100px }
        .h-100 { height: 100px }
    </style>
</head>

<body class="text-grey-pdf">
    <div class="float-left text-xs">
        <p class="font-semibold mb-1">Larashop inc.</p>
        <p>Street 24</p>
        <p>11000 Belgrade, Serbia</p>
        <p>Phone: +381 11 123456</p>
        <p>E-mail: office@larashop.com</p>
    </div>

    <div class="float-right pt-4">
        <img src="images/logo.png" alt="logo" width="100px" height="100px">
    </div>

    <div class="clearfix"></div>

    <p class="mb-3 font-semibold text-grey-darkest">Order summary</p>
    <p class="mb-1 text-sm"><span class="text-grey-darkest font-semibold">Order number:</span> {{ $order->present_number }}</p>
    <p class="text-sm"><span class="text-grey-darkest font-semibold">Date:</span> {{ $order->placed_at }}</p>

    <table class="w-full text-sm border-b border-t border-grey-light mt-4 mb-0">
        <thead class="bg-card-header">
            <tr>
                <td width="40%" class="border-b border-grey-light p-2 uppercase">Item</td>
                <td width="20%" class="text-center border-b border-grey-light p-2 uppercase">Price</td>
                <td width="20%" class="text-center border-b border-grey-light p-2 uppercase">Qty</td>
                <td width="20%" class="text-right border-b border-grey-light p-2 uppercase">Subtotal</td>
            </tr>
        </thead>

        <tbody>
            @foreach ($order->inventories as $inventory)
            <tr>
                <td class="pl-2">{{ $inventory->name }}</td>

                <td class="text-center p-2">{{ $inventory->present_price }}</td>

                <td class="text-center p-3">{{ $inventory->attribute->qty }}</td>

                <td class="text-right p-2">{{ $inventory->presentSubtotal($inventory->attribute->qty) }}</td>
            </tr>
            @endforeach

            <tr>
                <td class="border-t border-grey-light p-2"></td>

                <td colspan="2" class="text-right border-t border-grey-light p-2">
                    <p class="mb-2">Subtotal:</p>
                    <p class="mb-2">Shipping & Handling:</p>
                    <p class="mb-2">Tax ({{ config('cart.tax') .'%' }}):</p>
                    <p class="font-semibold uppercase mb-0">
                        Order total:
                    </p>
                </td>

                <td class="text-right border-t border-grey-light p-2">
                    <p class="mb-2">{{ $order->present_subtotal }}</p>
                    <p class="mb-2">$0.00</p>
                    <p class="mb-2">{{ $order->present_tax }}</p>
                    <p class="mb-0 font-semibold">{{ $order->present_total }}</p>
                </td>

                <td class="text-right border-t border-grey-light p-2"></td>
            </tr>

        </tbody>
    </table>

    <div>
        <div class="float-left text-sm">
            @include('orders.html._billingaddress')
        </div>

        @if ($order->shipping)
            <div class="float-left text-sm">
                @include('orders.html._shippingaddress')
            </div>
        @endif
    </div>

    <div class="clearfix"></div>

    <p class="text-center mt-4">
        Thank you for purchase from <a href="#">larashop.com</a>
    </p>
</body>

</html>