@extends('layouts.app')

@section('title', 'Checkout')

@section('page_title', 'Checkout')

@section('content')
    <div class="container mt-4 px-0"  style="width: 78%">

        <div class="row">
            <div class="col-md-6">
                <div class="card bg-custom-grey-lighter border-0"  style="border-radius: 0">
                    <div class="card-body">
                        @include('carts.html._checkoutold')
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card bg-custom-grey-lightest border-0 h-full"  style="border-radius: 0">
                    <div class="card-body">
                        @include('carts.html._checkoutnew')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

