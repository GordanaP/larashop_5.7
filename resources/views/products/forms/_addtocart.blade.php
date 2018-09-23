<form action="{{ route('carts.store', $product) }}" method="POST">

    @csrf

    <button><i class="fa fa-cart-plus"></i></button>

</form>