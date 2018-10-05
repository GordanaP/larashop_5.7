<tr>
    <td class="border-0"></td>

    <td colspan="3" class="text-right">
        <p class="mb-2 font-bold">Subtotal:</p>
        <p class="mb-2">Shipping & Handling:</p>
        <p class="mb-2">Tax ({{ config('cart.tax') .'%' }}):</p>
        <p class="font-bold uppercase mb-0">
            Order total:
        </p>
    </td>

    <td class="text-right">
        <p class="mb-2 font-bold">
            {{ $order->present_subtotal }}
        </p>
        <p class="mb-2">
            $0.00
        </p>
        <p class="mb-2">
            {{ $order->present_tax }}
        </p>
        <p class="mb-0 font-bold">
            {{ $order->present_total }}
        </p>
    </td>
</tr>