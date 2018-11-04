<div class="col-md-4">
    <div class="product flex flex-col justify-between h-full">

        <div class="product-details">

            <!-- Image -->
            <div class="product-image-container relative">
                <a href="{{ route('products.show', $product) }}" class="font-semibold text-base">
                    <img src="{{ $product->getImage($product->image, $product) }}" alt="{{ $product->name }}" class="mb-2" />
                </a>

                <div class="top-right absolute pin-t pin-r mr-2 mt-2">
                    @include('products.forms._addtofavorites')
                </div>
            </div>

            <!-- Product Name -->
            <p class="mt-0 mb-0">
                <a href="{{ route('products.show', $product) }}" class="font-semibold text-base">
                    {{ $product->name }}
                </a>
            </p>

            <!-- Price -->
            <p class="text-grey-darker text-xs mb-2">{{ $product->present_price }}</p>
        </div>

        <!-- Rating -->
        @if ( $product->total_reviews > 0)
            <div class="product-rating text-sm">
                @stars(['product' => $product])
                    @slot('total_reviews')
                        {{ '('. $product->total_reviews .')' }}
                    @endslot
                @endstars
            </div>
        @endif
    </div>
</div>