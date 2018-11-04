
@extends('layouts.app')

@section('title', 'My Profile')

@section('page_title', 'My Profile')

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
                        @include('customers.forms._save')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>

        removeErrorOnNewInput()

    </script>
@endsection