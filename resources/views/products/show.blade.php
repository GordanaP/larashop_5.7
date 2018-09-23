@extends('layouts.app')

@section('title', '| Product')

@section('content')
    <div class="container">
        <div class="row">
            <h3>{{ $product->name }}</h3>
        </div>
    </div>
@endsection

