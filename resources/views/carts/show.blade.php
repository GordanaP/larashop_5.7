@extends('layouts.app')

@section('title', 'My cart')

@section('content')
    <div class="container">

        <a href="{{ route('products.index') }}" class="btn btn-success">Continue shopping</a>

        @if ($cartItems->count())

        <h3 class="mb-4 pull-right">
            <a href="{{ route('carts.empty') }}" class="btn btn-danger">Empty cart</a>
        </h3>

        <table class="table mb-0">
            <thead>
                <th width="25%">Item</th>
                <th width="20%">Description</th>
                <th width="20%" class="text-center">Price</th>
                <th width="10%">Qty</th>
                <th width="15%" class="text-right">Subtotal</th>
                <th width="10%" class="text-center"><i class="fa fa-cog"></i></th>
            </thead>
            <tbody>

                @foreach ($cartItems as $item)
                    @include('carts.html._item')
                @endforeach

                <!-- Cart price -->
                <tr>
                    <td colspan="3"></td>
                    <td class="font-semibold">Subtotal:</td>
                    <td class="text-right">#32.00</td>
                    <td></td>
                </tr>

                <tr>
                    <td colspan="3"></td>
                    <td class="font-semibold">Tax(taxRate%):</td>
                    <td class="text-right">#200.00</td>
                    <td></td>
                </tr>

                <tr>
                    <td colspan="3"></td>
                    <td class="font-semibold">Total:</td>
                    <td class="text-right">#40.00</td>
                    <td></td>
                </tr>
            </tbody>
        </table>

        @else
            <span class="pull-left mr-3">No items in the cart.</span>
        @endif
    </div>
@endsection