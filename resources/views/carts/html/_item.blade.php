<tr>
    <!-- Name -->
    <td>
        <a href="{{ route('products.show', $item->slug) }}">
             {{ $item->name }}
        </a>
    </td>

    <!-- Description -->
    <td class="text-xs">{{ $item->description }}</td>

    <!-- Price -->
    <td class="text-center">{{ presentPrice($item->price) }}</td>

    <!-- Qty -->
    <td>
        @include('carts.forms._updateqty')
    </td>

    <!-- Item subtotal -->
    <td class="text-right">{{ presentPrice($item->subtotal) }}</td>

    <!-- Trash -->
    <td class="text-center">
        <a href="{{ route('carts.remove', $key) }}">
            <i class="icon icon_trash_alt text-lg"></i>
        </a>
    </td>
</tr>
