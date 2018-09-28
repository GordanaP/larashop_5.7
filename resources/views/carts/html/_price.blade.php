@price
    @slot('title')
        Subtotal
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
        {{ presentPrice(Cart::tax()) }}
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