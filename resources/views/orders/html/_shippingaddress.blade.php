<div class="ml-5">
    <p class="text-normal underline font-semibold mb-2">
        Shipping Information
    </p>

    <p class="mb-0">
        {{ optional($order->shipping)->full_name ?: $order->customer->full_name }}
    </p>

    <p class="mb-0">
        {{ optional($order->shipping)->address ?: $order->customer->address }}
    </p>

    <p class="mb-0">
        {{ optional($order->shipping)->full_city ?: $order->customer->full_city }}
    </p>

    <p>
        {{ optional($order->shipping)->country ?: $order->customer->country }}
    </p>
</div>