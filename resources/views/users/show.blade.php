@extends('layouts.app')

@section('title', 'My Account')

@section('page_title')
    My account
@endsection

@section('notification')
    <span class="text-grey-darker">Update your account details</span>
@endsection

@section('content')
    <div class="container">
        <hr class="mb-10 border-t border-grey">

        <div class="row">

            <div class="col-md-4">
                @include('partials.side._auth')
            </div>

            <div class="col-md-8">
                <div class="card">
                    <div class="card-body bg-custom-grey-lightest">
                        @include('users.forms._update')
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection