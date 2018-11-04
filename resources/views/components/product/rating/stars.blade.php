    <div class="product-rating flex items-center">

        @if ($product->hasReview())
            <span class="mr-1">
                @foreach (showStars($product->rating) as $star)
                    {!!  $star !!}
                @endforeach
            </span>
        @endif

        <a href="{{ route('reviews.index', $product) }}">
            {{ $total_reviews ?? '' }}
        </a>
    </div>