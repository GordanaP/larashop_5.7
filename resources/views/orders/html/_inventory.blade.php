<tr>
    <td>
        <img src="{{ $inventory->product->image }}" alt="{{ $inventory->name }}" class="image">
    </td>
    <td class="font-bold">
        {{ $inventory->name }}
    </td>

    <td class="text-center">
        {{ $inventory->present_price }}
    </td>

    <td class="text-center">
        {{ $inventory->attribute->qty }}
    </td>

    <td class="text-right">
        {{ $inventory->presentSubtotal($inventory->attribute->qty) }}
    </td>
</tr>