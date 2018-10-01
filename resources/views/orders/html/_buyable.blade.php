<tr>
    <td>
        <img src="{{ $buyable->product->image }}" alt="{{ $buyable->name }}" class="image">
    </td>
    <td>
        {{ $buyable->name }}
    </td>

    <td class="text-center">
        {{ $buyable->present_price }}
    </td>

    <td class="text-center">
        {{ $buyable->attribute->qty }}
    </td>

    <td class="text-right">
        {{ $buyable->presentSubtotal($buyable->attribute->qty) }}
    </td>
</tr>