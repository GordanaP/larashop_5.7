@extends('layouts.app')

@section('title', '| Product')

@section('content')
    <div class="container">
        <div class="card">
            <div class="row">

                <div class="col-md-4">

                    <!-- Image -->
                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="image min-h-full">
                </div>

                <div class="col-md-6 py-4 pl-5">

                    <!-- Stars -->
                    <span class="fa fa-star text-orange"></span>
                    <span class="fa fa-star text-orange"></span>
                    <span class="fa fa-star text-orange"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>

                    <!-- Name -->
                    <h3 class="mb-2 mt-3 font-semibold">{{ $product->name }}</h3>

                    <!-- Price -->
                    <div class="mb-4 text-muted text-lg">{{ $product->present_price }}</div>

                    <!-- Descrption -->
                    <p class="card-text mb-5">{{ $product->description }}</p>

                    <!-- Add to cart form -->
                    @include('products.forms._addtocart')
                </div>

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