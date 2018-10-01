<tr>
    <td colspan="4" class="text-right">
        <p class="font-semibold mb-2">Subtotal:</p>
        <p class="mb-2">Shipping & Handling:</p>
        <p class="mb-2">Tax ({{ config('cart.tax').'%' }})</p>
        <p class="mb-0 uppercase font-semibold">Grand Total</p>
    </td>

    <td class="text-right">
        <p class="font-semibold mb-2">
            {{ presentPrice(Cart::subtotal()) }}
        </p>
        <p class="mb-2">
            $0.00
        </p>
        <p class="mb-2">
            {{ presentPrice(Cart::tax()) }}
        </p>
        <p class="font-semibold mb-1">
            {{ presentPrice(Cart::total()) }}
        </p>
    </td>
</tr>