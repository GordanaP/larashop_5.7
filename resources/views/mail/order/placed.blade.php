@component('mail::message')
# Introduction

Thank you for your order.

Order number: {{ $order->present_number }}

<i class="fa fa-print"></i> [Print order]({{ route('pdf.order', $order) }})

Thanks,<br>
{{ config('app.name') }}
@endcomponent
