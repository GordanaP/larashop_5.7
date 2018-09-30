<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
    <p class="mb-1 text-sm"><span class="text-grey-darkest">Order number:</span> #{{ $order->id }}</p>
    <p class="text-sm"><span class="text-grey-darkest">Date:</span> {{ $order->placed_at }}</p>

    <table class="w-full text-sm border-b border-t border-grey-light mt-4">
        <thead class="bg-card-header">
            <tr>
                <td width="35%" class="border-b border-grey-light p-2 uppercase">Item</td>
                <td width="20%" class="text-center border-b border-grey-light p-2 uppercase">Price</td>
                <td width="22%" class="text-center border-b border-grey-light p-2 uppercase">Qty</td>
                <td width="23%" class="text-right border-b border-grey-light p-2 uppercase">Subtotal</td>
            </tr>
        </thead>

        <tbody>
            @foreach ($order->buyables as $buyable)
            <tr>
                <td class="p-2">{{ $buyable->name }}</td>
                <td  class="text-center p-2">{{ $buyable->present_price }}</td>
                <td  class="text-center p-3">{{ $buyable->attribute->qty }}</td>
                <td class="text-right p-2">{{ $buyable->presentSubtotal($buyable->attribute->qty) }}</td>
            </tr>
            @endforeach

            <tr>
                <td class="border-t border-grey-light p-2"></td>

                <td colspan="2" class="text-right border-t border-grey-light p-2">
                    <p class="mb-2">Subtotal:</p>
                    <p class="mb-2">Shipping & handling:</p>
                    <p class="mb-2">Tax (20%):</p>
                    <p class="font-semibold uppercase mb-0">
                        Order total:
                    </p>
                </td>

                <td class="text-right border-t border-grey-light p-2">
                    <p class="mb-2">$60.00</p>
                    <p class="mb-2">$0.00</p>
                    <p class="mb-2">$14.00</p>
                    <p class="mb-0 font-semibold">$84.00</p>
                </td>
            </tr>

        </tbody>
    </table>

    <p class="font-semibold text-grey-darkest mb-2">Shipping Information:</p>

    <p class="mb-0 text-sm">{{ $order->customer->full_name }}</p>
    <p class="mb-0 text-sm">{{ $order->customer->address }}</p>
    <p class="text-sm">{{ $order->customer->full_city }}</p>

    <div>
        <p class="text-center mt-4">Thank you for purchase from <a href="#">larashop.com</a></p>
    </div>
</body>

</html>