<tr>
    <!-- Name -->
    <td>
        <a href="{{ route('products.show', $products->find($item->id)->slug) }}">
             {{ $item->name }}
        </a>
    </td>

    <!-- Description -->
    <td class="text-xs">{{ $products->find($item->id)->description }}</td>

    <!-- Price -->
    <td class="text-center">{{ presentPrice($item->price) }}</td>

    <!-- Qty -->
    <td>
        <form action="#" method="POST">

            @csrf
            @method("PATCH")

            <div class="flex">
                <div class="form-group">
                    <input type="text" name="qty" id="qty" class="form-control text-center" value="{{ $item->qty ?: 1 }}" />
                </div>
                <div class="form-group">
                    <button type="submit" class="btn"><i class="fa fa-refresh"></i></button>
                </div>
            </div>
        </form>
    </td>

    <!-- Item subtotal -->
    <td class="text-right">{{ presentPrice($item->subtotal) }}</td>

    <!-- Trash bin -->
    <td class="text-center">
        <a href="{{ route('carts.remove', $item->rowId) }}">
            <i class="icon icon_trash_alt text-lg"></i>
        </a>
    </td>
</tr>