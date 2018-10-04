<div class="col-md-4">

    <div class="flex flex-col justify-between">
        <div>
            <!-- Image -->
            <a href="{{ route('products.show', $product) }}" class="font-semibold text-base">
                <img src="{{ $product->image }}" alt="{{ $product->name }}" class="mb-2">
            </a>

            <!-- Colors -->
                @if ($product->hasColors())
                    <p class="card-text text-xs mb-2">
                        @foreach ($product->getColors() as $color)
                            <i class="fa fa-stop text-lg" style="color: {{ $color->code }}"></i>
                        @endforeach
                    </p>
                @endif

            <!-- Product Name -->
            <p class="mt-0 mb-0">
                <a href="{{ route('products.show', $product) }}" class="font-semibold text-base">
                    {{ $product->name }}
                </a>
            </p>

            <!-- Price -->
            <p class=" text-grey-dark">{{ $product->present_price }}</p>

        </div>

        <!-- Cart Icon -->
        <div>
            <a href="{{ route('products.show', $product) }}" class=" text-grey-darker">
                <i class="icon icon_cart_alt"></i> <span class="uppercase text-xs font-semibold">Add to cart</span>
            </a>
        </div>
    </div>
</div>