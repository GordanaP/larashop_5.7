<tr>
    <td colspan="3" class="border-b-0"></td>
    <td class="font-semibold border-b-0">Subtotal:</td>
    <td class="font-semibold border-b-0  text-right">{{ presentPrice(Cart::subtotal()) }}</td>
    <td class="border-b-0"></td>
</tr>

<tr>
    <td colspan="3" class="border-0"></td>
    <td class="font-semibold border-0">Tax ({{ config('cart.tax').'%' }}):</td>
    <td class="font-semibold border-0 text-right">{{ presentPrice(Cart::taxAmount()) }}</td>
    <td  class="border-0"></td>
</tr>

<tr>
    <td colspan="3" class="border-0"></td>
    <td class="font-semibold border-0 uppercase">Grand Total:</td>
    <td class="font-semibold border-0 text-right">{{ presentPrice(Cart::total()) }}</td>
    <td  class="border-0"></td>
</tr>