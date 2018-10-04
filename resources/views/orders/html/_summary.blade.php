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
        Shipping & Handling
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
        {{ presentPrice(Cart::tax()) }}
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

<div>
    <p class="mb-2">
      <a data-toggle="collapse" href="#orderedItems" aria-expanded="false" aria-controls="orderedItems" id="toggleOrderedItems" class="text-blue">
        Show more
      </a>
    </p>

    <div class="collapse" id="orderedItems">

        <!-- append ajax call response -->

    </div>
</div>
