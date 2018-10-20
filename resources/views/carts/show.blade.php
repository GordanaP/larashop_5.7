@extends('layouts.app')

@section('title', 'My cart')

@section('page_title', 'My Cart')

@section('action_buttons')
    <a href="{{ route('products.index') }}" class="mr-1 text-indigo-dark hover:text-indigo-darker font-normal">
        Continue shopping
    </a>
    @if ($cartItems->count())
        |
        <a href="{{ route('carts.empty') }}" class="ml-1 text-indigo-dark hover:text-indigo-darker font-normal">
            Empty cart
        </a>
    @endif
@endsection

@section('content')
    <div class="container">

        <hr class="mb-10 mt-1 border-t border-grey-light">

        @if ($cartItems->count())

            <table class="table bg-white border-b border-grey-light" id="displayCartTable">
                <thead class="bg-grey-lighter uppercase">
                    <th width="10%">Item</th>
                    <th width="23%"></th>
                    <th width="20%" class="text-center">Price</th>
                    <th width="12%">Qty</th>
                    <th width="13%" class="text-right">Subtotal</th>
                    <th width="12%" class="text-center"><i class="fa fa-cog"></i></th>
                </thead>

                <tbody>

                    <!-- Cart items -->
                    @foreach ($cartItems as $rowId => $item)
                        @include('carts.html._item')
                    @endforeach

                    <!-- Cart price -->
                    @include('carts.html._price')

                </tbody>
            </table>

            <a href="{{ Auth::check() ? route('orders.create') : route('carts.checkout') }}" class="btn btn-lg bg-indigo-darker hover:bg-indigo-darkest text-white uppercase pull-right">
                Checkout
            </a>

        @else
            <span class="pull-left mr-3">Your cart is empty.</span>
        @endif
    </div>

@endsection