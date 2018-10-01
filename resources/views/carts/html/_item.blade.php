<tr>
    <!-- Name -->
    <td class="border-b border-grey-light">
        <img src="{{ $item->product->image }}" alt="{{ $item->name }}">
    </td>

    <!-- Description -->
    <td class="border-b border-grey-light">
        <p class="mb-1">
            <a href="{{ route('products.show', $item->product) }}">
                {{ $item->name }}
            </a>
        </p>
        <p class="text-xs mb-0">
            {{ $item->product->description }}
        </p>
    </td>

    <!-- Price -->
    <td class="border-b border-grey-light text-center">{{ presentPrice($item->price) }}</td>

    <!-- Qty -->
    <td class="border-b border-grey-light">
        @include('carts.forms._updateqty')
    </td>

    <!-- Item subtotal -->
    <td class="border-b border-grey-light text-right">{{ presentPrice($item->subtotal) }}</td>

    <!-- Trash -->
    <td class="border-b border-grey-light text-center">
        <a href="{{ route('carts.remove', $rowId) }}">
            <i class="icon icon_trash_alt text-lg"></i>
        </a>
    </td>
</tr>