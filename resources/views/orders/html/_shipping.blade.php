<p class="text-normal underline font-semibold mb-2">
    Billing Information
</p>

<p class="mb-0">
    {{ $order->customer->full_name }}
</p>

<p class="mb-0">
    {{ $order->customer->address }}
</p>

<p class="mb-0">
    {{ $order->customer->full_city }}
</p>

<p>
    {{ $order->customer->country }}
</p>