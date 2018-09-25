@extends('layouts.app')

@section('title', 'My order')

@section('content')
    <div class="container">

        <form action="{{ route('orders.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header font-semibold text-lg tracking-wide" style="background: #f1f5f8 !important;">
                            Shipping Details
                        </div>

                        <div class="card-body">
                            <p class="text-sm"><span class="text-red">*</span> Required fields</p>

                            <!-- Customer details form -->
                            @include('orders.forms._shippingdetails')
                        </div>

                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header font-semibold text-lg tracking-wide" style="background: #f1f5f8 !important;">
                            Order Summary
                        </div>
                        <div class="card-body">

                            <!-- Order summary -->
                            @include('orders.html._summary')

                        </div>
                    </div>

                    <div class="flex justify-between align-center mt-2">
                        <a href="{{ route('carts.empty') }}" class="btn btn-block bg-grey-dark uppercase text-white font-bold mr-1 tracking-wide" style="border: none !important; font-weight: bold;">
                            Cancel
                        </a>

                        <button type="submit" class="btn btn-block bg-orange mt-0 uppercase text-white tracking-wide border-0 ml-1" style="border-radius: 0 !important">
                            <b>Place Order</b>
                        </button>
                    </div>
                </div>
            </div>

        </form>
    </div>
@endsection