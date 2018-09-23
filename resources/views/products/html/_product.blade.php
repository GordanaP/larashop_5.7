<div class="col-md-4">
    <div class="card mb-4 shadow-sm" style="min-height: 95%">
        <img class="card-img-top" src="https://via.placeholder.com/225x160" alt="Card image cap">

        <div class="card-body">
            <p class="text-lg">
                <a href="{{ route('products.show', $product) }}">
                    {{ $product->name }}
                </a>
            </p>

            <p class="card-text text-xs">{{ $product->description }}</p>

            <div class="d-flex justify-content-between align-items-center">

                <div class="btn-group">
                    <span>{{ $product->present_price }}</span>
                </div>

                <form action="#" method="POST">

                    @csrf

                    <button>
                        <span><i class="fa fa-cart-plus"></i></span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>