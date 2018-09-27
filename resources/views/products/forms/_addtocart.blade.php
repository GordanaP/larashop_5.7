<form action="{{ route('carts.store', $product) }}" method="POST">

    @csrf

    <button><i class="icon icon_cart_alt"></i></button>

</form>