@price
    @slot('title')
        Subtitle
    @endslot

    @slot('value')
        {{ presentPrice(Cart::subtotal()) }}
    @endslot
@endprice

@price
    @slot('title')
        Tax ({{ config('cart.tax').'%' }})
    @endslot

    @slot('value')
        {{ presentPrice(Cart::taxAmount()) }}
    @endslot
@endprice

@price
    @slot('class')
        uppercase
    @endslot

    @slot('title')
        Grand total
    @endslot

    @slot('value')
        {{ presentPrice(Cart::total()) }}
    @endslot
@endprice