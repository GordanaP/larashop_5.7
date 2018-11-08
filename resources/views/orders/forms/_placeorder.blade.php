<form action="{{ route('orders.store') }}" method="POST">

    @csrf

    <div class="row">
        <div class="col-md-4">
            @incl
                @slot('title')
                    Billing Address
                @endslot

                @slot('inc')
                    @if (optional(Auth::user())->customer)
                        @include('orders.html._customerdetails')
                    @else
                        @include('orders.forms._customerdetails')
                    @endif
                @endslot
            @endincl
        </div>

        <div class="col-md-4">
            @incl
                @slot('title')
                    Shipping Address
                @endslot

                @slot('inc')
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="shipping" id="shipping" checked>
                        <label class="form-check-label" for="shipping">Same as the billing address</label>
                    </div>

                    <div id="shippingDetails">
                        <!-- Append html using ajax call -->
                    </div>
                @endslot
            @endincl

            <div class="mt-2">
                @include('errors.list')
            </div>
        </div>


        <div class="col-md-4">
            @incl
                @slot('title')
                    Order Summary
                @endslot

                @slot('inc')
                    @include('orders.html._summary')
                @endslot
            @endincl

            <div class="flex justify-between align-center mt-2">
                <a href="{{ route('carts.empty') }}" class="btn btn-block bg-orange-dark uppercase text-white tracking-wide bold mr-1" style="border-radius: 0">
                    Cancel
                </a>

                <button class="btn btn-block bg-grey-darker hover:bg-grey-darkest uppercase text-white font-medium tracking-wide bold ml-1 mt-0"  style="border-radius: 0">
                    Place Order
                </button>
            </div>
        </div>
    </div>

</form>