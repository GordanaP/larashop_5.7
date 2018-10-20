@extends('layouts.app')

@section('title', 'My Orders')

@section('page_title')
    Your orders
@endsection

@section('content')
    <div class="container">
        <hr class="mb-10 border-t border-grey">

        <div class="row">

            <div class="col-md-4">
                @include('partials.side._auth')
            </div>

            <div class="col-md-8">

            </div>
        </div>
    </div>
@endsection