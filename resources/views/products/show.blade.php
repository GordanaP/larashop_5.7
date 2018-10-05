@extends('layouts.app')

@section('title', '| Product')

@section('page_title', $product->name)

@section('action_buttons')
    <a href="{{ route('products.index') }}" class="text-indigo-dark hover:text-indigo-darker font-normal">
        Continue shopping
    </a>
@endsection

@section('content')
    <div class="container">
        <div>
            <div class="row">

                <!-- Image -->
                <div class="col-md-6">
                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="image min-h-full">
                </div>

                <div class="col-md-6 pl-5">

                    <!-- Price -->
                    <div class="text-xl font-bold mb-2">{{ $product->present_price }}</div>

                    <!-- Stars -->
                    <span class="fa fa-star text-gold"></span>
                    <span class="fa fa-star text-gold"></span>
                    <span class="fa fa-star text-gold"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>

                    <!-- Descrption -->
                    <p class="card-text mt-3 mb-5 text-muted">{{ $product->description }}</p>

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
    </div>
@endsection

@section('scripts')
    <script>

        @include('products.js._sizecolors')

        removeErrorOnNewInput()
    </script>
@endsection