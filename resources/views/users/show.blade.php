@extends('layouts.app')

@section('title', 'My Account')

@section('content')
    <div class="container mt-4" style="width: 78%">

        <div class="row">

            <div class="col-md-8 offset-md-2">
                <div class="card"  style="border-radius: 0; border: none">
                    <div class="card-body" style="background: #f9f9f9">
                        @include('users.forms._update')
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection