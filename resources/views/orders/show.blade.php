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

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">

                        <p class="text-xl font-bold mb-2 pl-3">
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
                        <p class="text-lg font-semibold">Create an Account</p>
                        <hr>
                        <p class="text-grey-dark">
                            Create an account with us to track your order and view your past orders. Your details are saved for faster checkout in future.
                        </p>

                        <div class="flex justify-around my-4">
                            <div class="text-center">
                                <img src="{{ asset('images/checkout.png') }}" alt="">
                                <p class="text-grey-darker font-semibold mt-2">Fast Checkout</p>
                            </div>
                            <div class="text-center">
                                <img src="{{ asset('images/track_order.png') }}" alt="">
                                <p class="text-grey-darker font-semibold mt-2">Track Order</p>
                            </div>
                            <div class="text-center">
                                <img src="{{ asset('images/past_orders.png') }}" alt="">
                                <p class="text-grey-darker font-semibold mt-2">Past Orders</p>
                            </div>
                        </div>

                        <form action="#" method="POST">
                            @csrf

                            <div class="form-group">
                                <input type="password" name="password" id="password" class="form-control" placeholder="Choose a password" style="background: #f9f9f9">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-block bg-grey-darker hover:bg-grey-darkest text-white uppercase">
                                    Create Account
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection