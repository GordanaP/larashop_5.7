<form action="{{ route('favorites.store', $product) }}" method="POST" >

    @csrf

    <button type="submit" class="text-white">
        <span class="hover:text-red icon {{ Auth::user()->hasFavorited($product) ? 'icon_heart' : 'icon_heart_alt' }}" ></span>
    </button>

</form>