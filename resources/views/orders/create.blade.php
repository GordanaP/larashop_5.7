@extends('layouts.app')

@section('title', 'My order')

@section('page_title', 'Place Order')

@section('action_buttons')
    <a href="{{ route('products.index') }}" class="mr-1 text-indigo-dark hover:text-indigo-darker">
        Continue shopping
    </a>
    |
    <a href="{{ route('carts.show') }}" class="ml-1 text-indigo-dark hover:text-indigo-darker">
        <i class="fa fa-shopping-cart"></i> View Cart
    </a>
@endsection

@section('content')
    <div class="container">

        <form action="{{ route('orders.store') }}" method="POST">

            @csrf

            <div class="row">
                <div class="col-md-8">
                    @inc
                        @slot('title')
                            Shipping Detalis
                        @endslot

                        @slot('inc')
                            @include('orders.forms._shippingdetails')
                        @endslot
                    @endinc
                </div>

                <div class="col-md-4">
                    @inc
                        @slot('title')
                            Order Summary
                        @endslot

                        @slot('inc')
                            @include('orders.html._summary')
                        @endslot
                    @endinc

                    <div class="flex justify-between align-center mt-2">
                        <a href="{{ route('carts.empty') }}" class="btn btn-block bg-gold uppercase text-white tracking-wide bold mr-1">
                            Cancel
                        </a>

                        <button class="btn btn-block bg-indigo-darker hover:bg-indigo-darkest uppercase text-white font-medium tracking-wide bold ml-1 mt-0">
                            Place Order
                        </button>
                    </div>
                </div>
            </div>

        </form>
    </div>
@endsection

@section('scripts')
    <script>

        @include('orders.js._displayitems')

         removeErrorOnNewInput()

    </script>
@endsection