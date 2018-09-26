@component('mail::message')
# Introduction

Thank you for your order.

Order number: #{{ $order->id }}


Thanks,<br>
{{ config('app.name') }}
@endcomponent
