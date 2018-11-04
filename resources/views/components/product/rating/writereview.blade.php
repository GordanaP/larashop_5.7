@if (optional(Auth::user())->isEligibleToWriteAReview($product))
    <a href="{{ route('reviews.create', $product) }}">

        <span class="mr-1 ml-1">|</span>

        @if ($product->total_reviews > 0)
            @if (Auth::user()->getReview($product))
                Edit review
            @else
                Write a review
            @endif
        @else
            Be the first to write a review
        @endif

    </a>
@endif