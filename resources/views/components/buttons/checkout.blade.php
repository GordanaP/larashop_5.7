@if (Cart::itemsCount() > 0)

    {{ ! Request::is('products') ? '|' : '' }}

    <a href="{{ Auth::check() ? route('orders.create') : route('carts.checkout') }}" class="ml-1 text-indigo-dark hover:text-indigo-darker font-normal">
        Checkout
    </a>

@endif