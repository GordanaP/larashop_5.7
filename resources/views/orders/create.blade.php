@extends('layouts.app')

@section('title', 'My order')

@section('page_title', 'Order Details')

@section('content')
    <div class="container mt-4" style="width:78%">
        @include('orders.forms._placeorder')
    </div>
@endsection

@section('scripts')
    <script>

        @include('orders.js._displayitems')

        @include('orders.js._displayshipping')

        removeErrorOnNewInput()

    </script>
@endsection