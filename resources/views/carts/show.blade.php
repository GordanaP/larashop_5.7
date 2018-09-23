@extends('layouts.app')

@section('title', 'My cart')

@section('content')
    <div class="container">

        <a href="{{ route('products.index') }}" class="btn btn-success">Continue shopping</a>

        @if ($cartItems->count())

        <h3 class="mb-4 pull-right">
            <a href="{{ route('carts.empty') }}" class="btn btn-danger">Empty cart</a>
        </h3>

        <table class="table mb-0 bg-white">
            <thead class="bg-grey-lighter uppercase">
                <th width="25%">Item</th>
                <th width="20%">Description</th>
                <th width="20%" class="text-center">Price</th>
                <th width="12%">Qty</th>
                <th width="13%" class="text-right">Subtotal</th>
                <th width="10%" class="text-center"><i class="fa fa-cog"></i></th>
            </thead>
            <tbody>

                @foreach ($cartItems as $item)
                    @include('carts.html._item')
                @endforeach

                <!-- Cart price -->
                @include('carts.html._price')

            </tbody>
        </table>

        @else
            <span class="pull-left mr-3">No items in the cart.</span>
        @endif
    </div>
@endsection