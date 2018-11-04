@extends('layouts.app')

@section('title', ' Review '.$product->name)

@section('page_title', $product->name)

@section('notification')
    Please tell us how you are satisfied with the product.
@endsection

@section('action_buttons')
    @shop
    @endshop

    @checkout
    @endcheckout
@endsection

@section('content')
    <div class="container">
        <hr class="mb-10 mt-1 border-t border-grey-light">

        <div>
            <div class="row">

                <!-- Image -->
                <div class="col-md-6">
                    <img src="{{ $product->getImage($product->image, $product) }}" alt="{{ $product->name }}" class="mb-2" />
                </div>

                <div class="col-md-6 pl-5">
                    <h4 class="font-light mb-4">
                        {{ Auth::user()->getReview($product) ? 'Edit review' : 'Write a review' }}
                    </h4>

                    @include('reviews.forms._addreview')
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