<tr>
    <td>
        <img src="{{ $inventory->product->getImage($inventory->product->image, $inventory->product) }}" alt="{{ $inventory->name }}" class="image" />
    </td>

    <td class="font-bold">
        {{ $inventory->name }}
    </td>

    <td class="text-center">
        {{ presentPrice(formatNumber($inventory->attribute->price/100)) }}
    </td>

    <td class="text-center">
        {{ $inventory->attribute->qty }}
    </td>

    <td class="text-right">
        {{ $inventory->presentSubtotal($inventory->attribute->qty) }}
    </td>
</tr>