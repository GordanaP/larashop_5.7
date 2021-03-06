@extends('layouts.app')

@section('title', 'My cart')

@section('page_title', 'My Cart')


@section('content')
    <div class="container mt-4" style="width: 78%">

        @if ($cartItems->count())

            <table class="table bg-white border-b border-grey-light" id="displayCartTable">
                <thead class="bg-grey-darker uppercase text-white">
                    <th width="10%">Item</th>
                    <th width="23%"></th>
                    <th width="20%" class="text-center">Price</th>
                    <th width="12%">Qty</th>
                    <th width="13%" class="text-right">Subtotal</th>
                    <th width="12%" class="text-center"><i class="fa fa-cog"></i></th>
                </thead>

                <tbody style="background: #f9f9f9">

                    <!-- Cart items -->
                    @foreach ($cartItems as $rowId => $item)
                        @include('carts.html._item')
                    @endforeach

                    <!-- Cart price -->
                    @include('carts.html._price')

                </tbody>
            </table>

            <a href="{{ Auth::check() ? route('orders.create') : route('carts.checkout') }}" class="btn btn-lg bg-orange-dark hover:bg-orange-darker text-white pull-right" style="border-radius: 0">
                Proceed to Checkout
            </a>

        @else
            <span class="pull-left mr-3">Your cart is empty.</span>
        @endif
    </div>

@endsection
