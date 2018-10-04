<div class="col-md-4">
    <div class="card mb-4 shadow-sm card-product">

        <!-- Image -->
        <img class="card-img-top" src="{{ $product->image }}" alt="Card image cap">

        <div class="card-body flex flex-col justify-between">

            <div class="mb-3">

                <!-- Product Name -->
                <p class="text-lg">
                    <a href="{{ route('products.show', $product) }}" class="font-semibold">
                        {{ $product->name }}
                    </a>
                </p>

                <!-- Description -->
                <p class="card-text text-xs">{{ $product->description }}</p>
            </div>
            <div>
                <div class="mb-2">
                    @if ($product->hasColors())
                        <p class="card-text text-xs mb-2">
                            Colors:
                            @foreach ($product->getColors() as $color)
                                <i class="fa fa-circle" style="color: {{ $color->code }}"></i>
                            @endforeach
                        </p>
                    @endif
                </div>

                <div class="d-flex justify-content-between align-items-center">

                    <!-- Price -->
                    <span>{{ $product->present_price }}</span>

                    <a href="{{ route('products.show', $product) }}">
                        <i class="icon icon_cart_alt"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>