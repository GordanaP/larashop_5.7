@extends('layouts.app')

@section('title', 'My Favorites')

@section('page_title')
    My favorites
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
                @if ($favorites->count())
                    @foreach ($favorites->chunk(3) as $chunk)
                        <div class="row mb-20">
                            @each ('products.html._product', $chunk, 'product')
                        </div>
                    @endforeach
                @else
                    No products at present.
                @endif

            </div>
        </div>
    </div>
@endsection