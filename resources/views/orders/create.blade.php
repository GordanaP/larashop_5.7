@extends('layouts.app')

@section('title', 'My order')

@section('page_title', 'Order Details')

@section('action_buttons')
    <a href="{{ route('products.index') }}" class="mr-1 text-indigo-dark hover:text-indigo-darker font-normal">
        Continue shopping
    </a>
@endsection

@section('notification')
    <span class="text-grey-darker">Please fill in the fields below and click Place Order to complete purchase.</span>
@endsection

@section('content')
    <div class="container">
        <hr class="mb-10 mt-1 border-t border-grey-light">
        <form action="{{ route('orders.store') }}" method="POST">

            @csrf

            <div class="row">
                <div class="col-md-4">
                    @incl
                        @slot('title')
                            Billing Address
                        @endslot

                        @slot('inc')
                            @if (optional(Auth::user())->customer)
                                @include('orders.html._customerdetails')
                            @else
                                @include('orders.forms._customerdetails')
                            @endif
                        @endslot
                    @endincl
                </div>

                <div class="col-md-4">
                    @incl
                        @slot('title')
                            Shipping Address
                        @endslot

                        @slot('inc')
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="shipping" id="shipping" checked>
                                <label class="form-check-label" for="shipping">Same ad the billing address</label>
                            </div>
                        @endslot
                    @endincl
                </div>


                <div class="col-md-4">
                    @incl
                        @slot('title')
                            Order Summary
                        @endslot

                        @slot('inc')
                            @include('orders.html._summary')
                        @endslot
                    @endincl

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