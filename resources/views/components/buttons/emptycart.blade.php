@if (Cart::itemsCount() > 0)
    |
    <a href="{{ route('carts.empty') }}" class="ml-1 text-indigo-dark hover:text-indigo-darker font-normal">
        Empty cart
    </a>
@endif