@extends('layouts.app')

@section('title', 'The order has been comppleted')

@section('page_title')
    Thank you for your purchase from <a href="#" class="text-blue">larashop.com</a>
@endsection

@section('notification')
    <p class="text-grey-dark">You will receive an email confirmation at g@gmail.com</p>
@endsection

@section('action_buttons')
    <a href="{{ route('products.index') }}" class="mr-1 text-indigo-dark hover:text-indigo-darker">
        Continue shopping
    </a>
@endsection

@section('content')
    <div class="container">
        <hr class="mb-10 mt-1 border-t border-grey-light">

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">

                        <p class="text-xl font-bold mb-2 pl-2">
                            <span class="mr-2">Order summary</span>
                        </p>

                        <div class="flex justify-between items-center">
                            <div>
                                <p class="mb-1 mt-3 pl-2 text-muted">
                                    <span class="font-semibold">Order number:</span> {{ $order->present_number }}
                                </p>
                                <p class="pl-2 text-muted">
                                    <span class="font-semibold">Date:</span> {{ $order->placed_at }};
                                </p>
                            </div>
                            <div>
                                <a href="{{ route('pdf.order', $order) }}" class="btn btn-sm bg-grey-darkest text-white">
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
                                @each ('orders.html._inventory', $order->inventories, 'inventory')
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

                        <!-- Create account -->
                        @include('orders.html._createaccount')

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection