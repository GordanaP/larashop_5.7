@extends('layouts.app')

@section('title', 'My Orders')

@section('page_title')
    My orders
@endsection

@section('notification')
    <span>Review and track your orders</span>
@endsection

@section('action_buttons')
    <a href="{{ route('products.index') }}" class="text-indigo-dark hover:text-indigo-darker font-normal">
        Continue shopping
    </a>

    @if (Cart::itemsCount() > 0)
        |
        <a href="{{ Auth::check() ? route('orders.create') : route('carts.checkout') }}" class="ml-1 text-indigo-dark hover:text-indigo-darker font-normal">
            Checkout
        </a>
    @endif
@endsection

@section('content')
    <div class="container">
        <hr class="mb-10 mt-1 border-t border-grey-light">

        <div class="row">

            <div class="col-md-3">
                @include('partials.side._auth')
            </div>

            <div class="col-md-9">
                <table class="table">
                    <thead>
                        <th class="text-center">#</th>
                        <th class="text-center">Date</th>
                        <th>Ship To</th>
                        <th class="text-center">Order Total</th>
                        <th class="text-center">Status</th>
                        <th class="text-center"><i class="fa fa-cog"></i></th>
                    </thead>
                    <tbody>
                        @foreach ($userOrders as $order)
                            <tr>
                                <td class="text-center">{{ $order->number }}</td>
                                <td class="text-center">{{ $order->placed_at }}</td>
                                <td>{{ optional($order->shipping)->full_name ?: $order->customer->full_name }}</td>
                                <td class="text-center">{{ $order->present_total }}</td>
                                <td class="text-center">{{ $order->paid }}</td>
                                <td class="text-center">
                                    <a href="{{ route('orders.pdf', $order) }}" class="text-indigo hover:text-indigo-darker">
                                        View order
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection