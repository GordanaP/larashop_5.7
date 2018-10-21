@extends('layouts.app')

@section('title', 'My order')

@section('page_title', 'Order Details')

@section('action_buttons')
    <a href="{{ route('products.index') }}" class="mr-1 text-indigo-dark hover:text-indigo-darker font-normal">
        Continue shopping
    </a>
@endsection

@section('content')
    <div class="container">
        <hr class="mb-10 mt-1 border-t border-grey-light">

        <form action="{{ route('orders.store') }}" method="POST">

            @csrf

            <div class="row">
                <div class="col-md-8">
                    @inc
                        @slot('title')
                            Delivery Address
                        @endslot

                        @slot('inc')
                            @if (optional(Auth::user())->customer)
                                @include('orders.html._customerdetails')
                            @else
                                @include('orders.forms._customerdetails')
                            @endif
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