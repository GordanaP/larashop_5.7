@extends('layouts.app')

@section('title', 'Checkout')

@section('page_title', 'Checkout')

@section('notification')
    Please choose your preferred way of checkout.
@endsection

@section('action_buttons')
    @shop
    @endshop
@endsection

@section('content')
    <div class="container px-0">
        <hr class="mb-10 mt-1 border-t border-grey-light">

        <div class="row">
            <div class="col-md-6">
                <div class="card bg-custom-grey-lighter border-0">
                    <div class="card-body">
                        @include('carts.html._checkoutold')
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card bg-custom-grey-lightest border-0 h-full">
                    <div class="card-body">
                        @include('carts.html._checkoutnew')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

