@extends('layouts.app')

@section('title', 'The order has been comppleted')

@section('page_title')
    Thank you for your purchase from <a href="#" class="text-blue">larashop.com</a>
@endsection

@section('notification')
    You will receive an email confirmation at g@gmail.com
@endsection

@section('content')
    <div class="container mt-4" style="width: 78%">

        <div class="row">
            <div class="{{ Auth::check() ? 'col-md-12' : 'col-md-8' }}">
                <div class="card" style="border-radius: 0">
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
                                    <span class="font-semibold">Date:</span> {{ $order->placed_at }}
                                </p>
                            </div>
                            <div>
                                <a href="{{ route('orders.pdf', $order) }}" class="btn btn-sm bg-grey-darkest text-white" style="border-radius: 0">
                                    <i class="fa fa-print"></i> Print order
                                </a>
                            </div>
                        </div>

                        <table class="table mb-4 border-b border-grey-light">

                            <thead class="bg-grey-dark uppercase text-white">
                                <th width="15%">Item</th>
                                <th width="33%"></th>
                                <th width="23%" class="text-center">Price</th>
                                <th width="15%" class="text-center">Qty</th>
                                <th width="14%" class="text-right">Subtotal</th>
                            </thead>

                            <!-- Inventory -->
                            <tbody style="background: #f9f9f9">
                                @each ('orders.html._inventory', $order->inventories, 'inventory')
                            </tbody>

                            <!-- Order Price -->
                            @include('orders.html._price')

                        </table>

                        <div class="flex">
                            <!-- Billing -->
                            @include('orders.html._billingaddress')

                            <!-- Shipping -->
                            @if ($order->shipping)
                                @include('orders.html._shippingaddress')
                            @endif
                        </div>

                    </div>
                </div>
            </div>

            @guest
                <div class="col-md-4">
                    <div class="card"  style="border-radius: 0;">
                        <div class="card-body" id="createAccount">

                            <!-- Create account -->
                            @include('orders.html._createaccount')

                        </div>
                    </div>
                </div>
            @endguest
        </div>

    </div>
@endsection