@extends('layouts.app')

@section('title', 'My Account')

@section('page_title', 'My Account')

@section('notification')
    Update your account details
@endsection

@section('action_buttons')
    @shop
    @endshop

    @checkout
    @endcheckout
@endsection

@section('content')
    <div class="container">
        <hr class="mb-10 mt-1 border-t border-grey">

        <div class="row">

            <div class="col-md-3">
                @include('partials.side._auth')
            </div>

            <div class="col-md-8 offset-md-1">
                <div class="card">
                    <div class="card-body bg-custom-grey-lightest">
                        @include('users.forms._update')
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection