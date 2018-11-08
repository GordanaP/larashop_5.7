@extends('layouts.app')

@section('title', 'All Products')

@section('navbar')
    @include('partials.top._navbottom')
@endsection

@section('content')
    <div class="container mt-4" style="width: 78%">

        <!-- Products -->
        @if ($products->count())

            <div class="row">
                @if (request()->query())
                    <div class="col-md-4">
                        @include('products.html._sidebar')
                    </div>
                @endif

                <div class="{{ request()->query() ? 'col-md-8' : 'col-md-12' }}">
                    @foreach ($products->chunk(request()->query() ? 3 : 4) as $chunk)
                        <div class="row mb-10">
                            @each ('products.html._product', $chunk, 'product')
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            No products at present.
        @endif

        <!-- Pagination -->
        <div class="pagination pull-right">
            {{ $products->appends(request()->query())->links() }}
        </div>
    </div>
@endsection