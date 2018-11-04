@extends('layouts.app')

@section('title', 'My order')

@section('page_title', 'Order Details')

@section('notification')
    Please fill in the fields below and click Place Order to complete purchase.
@endsection

@section('action_buttons')
    @shop
    @endshop

    @back
    @endback
@endsection

@section('content')
    <div class="container">
        <hr class="mb-10 mt-1 border-t border-grey-light">

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