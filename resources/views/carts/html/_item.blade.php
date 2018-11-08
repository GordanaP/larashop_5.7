<tr>
    <!-- Imagw -->
    <td class="border-b border-grey-light">
        <img src="{{ $item->product->getImage($item->product->image, $item->product) }}" alt="{{ $item->product->name }}" class="mb-2" />
    </td>

    <!-- Sku, Name & Description -->
    <td class="border-b border-grey-light">
        <p class="mb-2 text-muted text-xs">
            SKU {{ $item->sku }}
        </p>

        <p class="mb-1 font-semibold">
            <a href="{{ route('products.show', $item->product) }}">
                {{ $item->name }}
            </a>
        </p>
        <p class="text-xs mb-0 text-muted">
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
            <i class="icon icon_trash_alt text-lg text-orange"></i>
        </a>
    </td>
</tr>