@extends('layouts.app')

@section('title', 'All Products')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-3">
                @include('products.html._sidebar')
            </div>

            <div class="col-md-9">

                <!-- Products -->
                @if ($products->count())
                    @foreach ($products->chunk(3) as $chunk)
                        <div class="row">
                            @each ('products.html._product', $chunk, 'product')
                        </div>
                    @endforeach
                @else
                    No products at present.
                @endif

                <!-- Pagination -->
                <div class="pagination pull-right">
                    {{ $products->appends(request()->query())->links() }}
                </div>

            </div>

        </div>
    </div>
@endsection