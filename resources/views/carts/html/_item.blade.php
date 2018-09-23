<tr>
    <td>
        <a href="{{ route('products.show', $products->find($item->id)->slug) }}">
             {{ $item->name }}
        </a>
    </td>

    <td class="text-xs">{{ $products->find($item->id)->description }}</td>

    <td class="text-center">{{ presentPrice($item->price) }}</td>

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

    <td class="text-right">{{ presentPrice($item->subtotal) }}</td>

    <td class="text-center">
        <a href="#">
            <i class="icon icon_trash_alt text-lg"></i>
        </a>
    </td>
</tr>