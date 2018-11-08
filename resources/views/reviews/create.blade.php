@extends('layouts.app')

@section('title', ' Review '.$product->name)

@section('page_title', $product->name)

@section('content')
    <div class="container mt-4" style="width: 78%">
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