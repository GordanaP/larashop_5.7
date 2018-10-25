@extends('layouts.app')

@section('title', 'My Profile')

@section('page_title')
    My profile
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