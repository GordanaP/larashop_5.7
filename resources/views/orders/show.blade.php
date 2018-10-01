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
                                <p class="mb-1 mt-3 pl-3 text-muted">
                                    <span class="font-semibold">Order number:</span> {{ $order->present_number }}
                                </p>
                                <p class="pl-3 text-muted">
                                    <span class="font-semibold">Date:</span> {{ $order->placed_at }};
                                </p>
                            </div>
                            <div>
                                <a href="{{ route('pdf.order', $order) }}" class="btn bg-indigo-dark btn-sm text-white">
                                    <i class="fa fa-print"></i> Print order
                                </a>
                            </div>
                        </div>

                        <table class="table mb-4 border-b border-grey-light">

                            <thead class="bg-card-header uppercase text-muted">
                                <th width="15%">Item</th>
                                <th width="33%"></th>
                                <th width="23%" class="text-center">Price</th>
                                <th width="15%" class="text-center">Qty</th>
                                <th width="14%" class="text-right">Subtotal</th>
                            </thead>

                            <!-- Buyable -->
                            <tbody>
                                @each ('orders.html._buyable', $order->buyables, 'buyable')
                            </tbody>

                            <!-- Order Price -->
                            @include('orders.html._price')

                        </table>

                        <!-- Shipping Customer -->
                        @include('orders.html._shipping')

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

