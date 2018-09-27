@extends('layouts.app')

@section('title', 'Order completed')

@section('content')
    <div class="container">
        <h1>Thank you for your order</h1>

        @foreach (\App\Order::find(65)->products as $item)
            <p>{{ $item->attribute->qty }} {{ presentPrice(($item->attribute->price/100)) }}</p>
            <p>Subtotal: {{ (\App\Order::find(65)->subtotal/100) }}</p>
        @endforeach
    </div>
@endsection

