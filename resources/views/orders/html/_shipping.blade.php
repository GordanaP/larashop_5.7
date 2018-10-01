<p class="text-lg font-semibold mb-2">
    Shipping Information:
</p>

<p class="mb-0">
    {{ $order->customer->full_name }}
</p>

<p class="mb-0">
    {{ $order->customer->address }}
</p>

<p>
    {{ $order->customer->full_city }}
</p>