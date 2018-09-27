<!-- Subtotal -->
@summary
    @slot('title')
        Subtotal
    @endslot

    @slot('class')
        class="font-semibold"
    @endslot

    @slot('value')
        {{ presentPrice(Cart::subtotal()) }}
    @endslot
@endsummary


<!-- Shipping -->
@summary
    @slot('title')
        Shipping
    @endslot

    @slot('value')
        $0.00
    @endslot
@endsummary


<!-- Tax -->
@summary
    @slot('title')
        Sales Tax
    @endslot

    @slot('value')
        {{ presentPrice(Cart::taxAmount()) }}
    @endslot
@endsummary

<hr>

<!-- Total -->
@summary
    @slot('title')
        Grand Total
    @endslot

    @slot('class')
        class="font-semibold"
    @endslot

    @slot('value')
        {{ presentPrice(Cart::total()) }}
    @endslot
@endsummary