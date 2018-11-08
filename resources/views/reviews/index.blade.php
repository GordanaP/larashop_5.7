@extends('layouts.app')

@section('title', 'Customer Reviews')

@section('content')
    <div class="container mt-4" style="width: 78%">

        <div class="flex mb-4">
            <div class="mr-5" style="width: 10%">
                <img src="{{ $product->getImage($product->image, $product) }}" alt="{{ $product->name }}" />
            </div>

            <div class="product-rating">
                <p class="text-lg font-semibold text-blue mb-2">
                    <a href="{{ route('products.show', $product) }}">
                        {{ $product->name }}
                    </a>
                </p>

                <div class="text-xs">
                    <span class="product-rating flex text-blue">
                        @stars(['product' => $product])
                            @slot('total_reviews')
                                {{ $product->total_reviews }} customer {{ str_plural('review', $product->total_reviews) }}
                            @endslot
                        @endstars

                        @writereview(['product' => $product])
                        @endwritereview
                    </span>

                    <p class="text-orange-dark mt-1 mb-3">
                        @if ($product->rating > 0)
                            {{ $product->rating }} out of 5 stars
                        @else
                            No rate yet
                        @endif
                    </p>

                    <p>Price: {{ $product->present_price }}</p>
                </div>

            </div>
        </div>

        <div class="product-reviews text-sm">
            @foreach ($product->reviews->load('user') as $review)
                @include('reviews.html._review')
            @endforeach
        </div>
    </div>
@endsection