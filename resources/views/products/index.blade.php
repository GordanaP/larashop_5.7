@extends('layouts.app')

@section('title', 'All Products')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">Filters</div>
            <div class="col-md-9">

                    @if ($products->count())
                        @foreach ($products->chunk(3) as $chunk)
                            <div class="row">
                                @each ('products.html._product', $chunk, 'product')
                            </div>
                        @endforeach
                    @else
                        No products at present.
                    @endif

                <div class="pagination pull-right">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection