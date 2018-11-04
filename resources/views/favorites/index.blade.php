@extends('layouts.app')

@section('title', 'My Favorites')

@section('page_title', 'My Favorites')

@section('action_buttons')
    @shop
    @endshop

    @checkout
    @endcheckout
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