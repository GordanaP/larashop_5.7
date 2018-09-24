<!-- Subtotal -->
<p class="flex justify-between">
    <span class="font-semibold">Subtotal:</span>
    <span class="font-semibold">{{ presentPrice(Cart::subtotal()) }}</span>
</p>

<!-- Shipping -->
<p class="flex justify-between">
    <span>Shipping:</span>
    <span>$00.00</span>
</p>

<!-- Tax -->
<p class="flex justify-between">
    <span>Sales Tax:</span>
    <span>{{ presentPrice(Cart::taxAmount()) }}</span>
</p>

<hr>

<!-- Total -->
<p class="flex justify-between">
    <span class="font-semibold">Total: <span class="font-normal">({{ Cart::countItems() }} items)</span></span>
    <span class="font-semibold">{{ presentPrice(Cart::total()) }}</span>
</p>