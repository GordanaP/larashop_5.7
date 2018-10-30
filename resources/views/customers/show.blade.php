
@extends('layouts.app')

@section('title', 'My Profile')

@section('page_title')
    My profile
@endsection

@section('action_buttons')
    <a href="{{ route('products.index') }}" class="text-indigo-dark hover:text-indigo-darker font-normal">
        Continue shopping
    </a>

    @if (Cart::itemsCount() > 0)
        |
        <a href="{{ Auth::check() ? route('orders.create') : route('carts.checkout') }}" class="ml-1 text-indigo-dark hover:text-indigo-darker font-normal">
            Checkout
        </a>
    @endif
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