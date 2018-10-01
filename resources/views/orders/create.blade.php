@extends('layouts.app')

@section('title', 'My order')

@section('content')
    <div class="container">

        <div class="flex justify-between mb-4">
            <a href="{{ route('products.index') }}" class="btn bg-indigo-light text-white hover:bg-indigo">
                Continue shopping
            </a>
            <a href="{{ route('carts.show') }}" class="btn bg-orange text-white hover:bg-orange-dark">
                Back to cart
            </a>
        </div>

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
                        <a href="{{ route('carts.empty') }}" class="btn btn-block bg-grey-dark hover:bg-grey-darker uppercase text-white tracking-wide bold mr-1">
                            Cancel
                        </a>

                        <button class="btn btn-block bg-grey-darkest hover:bg-black uppercase text-white font-medium tracking-wide bold ml-1 mt-0">
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