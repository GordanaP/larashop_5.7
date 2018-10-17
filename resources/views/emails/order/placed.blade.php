@component('mail::message')
# Introduction

Thank you for your order.

{{ $order->number }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
