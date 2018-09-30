@extends('layouts.app')

@section('meta')
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
@endsection

@section('title', 'Order completed')

@section('content')
    <div class="container">

        <h3 class="font-semibold">Thank you for your purchase from <a href="#">larashop.com</a></h3>
        <p class="mb-5 mt-1">You will receive an email confirmation at g@gmail.com</p>

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">

                        <p class="text-lg font-semibold mb-2 pl-3">
                            <span class="mr-2">Order summary</span>
                        </p>

                        <div class="flex justify-between items-center">
                            <div>
                                <p class="mb-1 mt-3 pl-3 text-muted"><span class="font-semibold">Order number:</span> #{{ $order->id }}</p>
                                <p class="pl-3 text-muted">
                                    <span class="font-semibold">Date:</span> {{ $order->placed_at }};
                                </p>
                            </div>
                            <div>
                                <a href="{{ route('pdf.order', $order) }}" class="btn bg-indigo-dark btn-sm text-white">
                                    Print order
                                </a>
                            </div>
                        </div>

                        <table class="table mb-4" style="border-bottom: 1px solid #ddd">
                            <thead class="bg-card-header uppercase text-muted">
                                <th width="45%">Item</th>
                                <th width="20%" class="text-center">Price</th>
                                <th width="12%" class="text-center">Qty</th>
                                <th width="23%" class="text-right">Subtotal</th>
                            </thead>
                            <tbody>
                                @foreach ($order->buyables as $buyable)
                                    <tr>
                                        <td>{{ $buyable->name }}</td>
                                        <td class="text-center">{{ $buyable->present_price }}</td>
                                        <td class="text-center">{{ $buyable->attribute->qty }}</td>
                                        <td class="text-right">{{ $buyable->presentSubtotal($buyable->attribute->qty) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tr>
                                <td class="border-0"></td>

                                <td colspan="2" class="text-right">
                                    <p class="mb-2">Subtotal:</p>
                                    <p class="mb-2">Shipping & handling:</p>
                                    <p class="mb-2">Tax (20%):</p>
                                    <p class="font-semibold uppercase mb-0">
                                        Order total:
                                    </p>
                                </td>

                                <td class="text-right">
                                    <p class="mb-2">{{ $order->present_subtotal }}</p>
                                    <p class="mb-2">$0.00</p>
                                    <p class="mb-2">{{ presentPrice($order->present_tax) }}</p>
                                    <p class="mb-0 font-semibold">{{ presentPrice($order->present_total) }}</p>
                                </td>
                            </tr>

                        </table>


                        <p class="text-lg font-semibold mb-2">Shipping Information:</p>

                        <p class="mb-0">{{ $order->customer->first_name }}</p>
                        <p class="mb-0">{{ $order->customer->address }}</p>
                        <p>{{ $order->customer->postcode }} {{ $order->customer->city }}</p>

                    </div>
                </div>
            </div>

            <div class="col-md-4">
                    <div class="card">
                        <div class="card-body" id="createAccount">
                            <p>You may want to create account?</p>
                            <p></p>
                        </div>
                    </div>
            </div>
        </div>

    </div>
@endsection

