@extends('layouts.app')

@section('title', 'My Favorites')

@section('content')
    <div class="container mt-4" style="width: 78%">
    <h5 class="mb-3 text-grey-darker font-bold">My favorites</h5>
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
@endsection