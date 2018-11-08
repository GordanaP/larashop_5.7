@extends('layouts.app')

@section('title', 'My Orders')

@section('content')
    <div class="container mt-4" style="width: 78%">
        <h5 class="mb-3 text-grey-darker font-bold">My orders</h5>
        @if (optional($userOrders)->count())
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
                    @foreach ($userOrders->load('customer') as $order)
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
        @else
            You have no orders at present.
        @endif
    </div>
@endsection