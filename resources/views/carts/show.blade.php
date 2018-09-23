@extends('layouts.app')

@section('title', 'My cart')

@section('content')
    <div class="container">

        <h3 class="mb-4 pull-right">
            <a href="{{ route('products.index') }}" class="btn btn-success">Continue shopping</a>
            <a href="{{ route('carts.empty') }}" class="btn btn-danger">Empty cart</a>
        </h3>

        @if ('there is items in the cart')
        <table class="table mb-0">
            <thead>
                <th>Item</th>
                <th>Description</th>
                <th>Price</th>
                <th width="10%">Qty</th>
                <th width="20%" class="text-right">Subtotal</th>
                <th width="10%" class="text-center"><i class="fa fa-cog"></i></th>
            </thead>
            <tbody>

                <tr>
                    <td>
                        <a href="#">
                             Item name
                        </a>
                    </td>

                    <td>Item description</td>

                    <td>Item price</td>

                    <td>
                        <form action="#" method="POST">

                            @csrf
                            @method("PATCH")

                            <div class="flex">
                                <div class="form-group">
                                    <input type="text" name="qty" id="qty" class="form-control text-center" value="1" />
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn"><i class="fa fa-refresh"></i></button>
                                </div>
                            </div>
                        </form>
                    </td>

                    <td class="text-right">Item subtotal</td>

                    <td class="text-center">
                        <a href="#">
                            <i class="icon icon_trash_alt text-lg"></i>
                        </a>
                    </td>
                </tr>
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
            No items in the cart.
        @endif
    </div>
@endsection