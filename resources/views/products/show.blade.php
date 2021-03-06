@extends('layouts.app')

@section('title', $product->name)

@section('content')
    <div class="container mt-4" style="width: 78%">

        <div class="row">

            <!-- Image -->
            <div class="col-md-6">
                <img src="{{ $product->getImage($product->image, $product) }}" alt="{{ $product->name }}" class="mb-2" />
            </div>

            <div class="col-md-6 pl-5">

                <!-- Name -->
                <div class="text-xl font-bold mb-2">{{ $product->name }}</div>

                <!-- Price -->
                <div class="mb-2">{{ $product->present_price }}</div>

                <!-- Rating -->
                <div class="product-rating flex text-sm text-blue">
                    @stars(['product' => $product])
                        @slot('total_reviews')
                            {{ $product->total_reviews }} customer {{ str_plural('review', $product->total_reviews) }}
                        @endslot
                    @endstars

                    @writereview(['product' => $product])
                    @endwritereview
                </div>

                <!-- Description -->
                <p class="card-text mt-4 mb-5 text-muted">{{ $product->description }}</p>

                <!-- Add to cart form -->
                @include('products.forms._addtocart')

                <!-- Categories -->
                <p class="mb-0 mt-5">
                    <span class="uppercase">Category:</span>

                    @foreach ($product->categories as $category)
                        {{ $category->name }}
                    @endforeach
                </p>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    <script>

        @include('products.js._sizecolors')

        removeErrorOnNewInput()

    </script>
@endsection