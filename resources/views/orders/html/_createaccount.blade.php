<p class="text-lg font-semibold">
    Quick Sign Up
</p>

<hr>

<p class="text-grey-dark">
    Create an account with us to track your order and view your past orders. Your details are saved for faster checkout in future.
</p>

<div class="flex justify-around my-4">
    <div class="text-center">
        <img src="{{ asset('images/checkout.png') }}" alt="">
        <p class="text-grey-darker font-semibold mt-2">Fast Checkout</p>
    </div>
    <div class="text-center">
        <img src="{{ asset('images/track_order.png') }}" alt="">
        <p class="text-grey-darker font-semibold mt-2">Track Order</p>
    </div>
    <div class="text-center">
        <img src="{{ asset('images/past_orders.png') }}" alt="">
        <p class="text-grey-darker font-semibold mt-2">Past Orders</p>
    </div>
</div>

<form action="{{ route('accounts.store') }}" method="POST">

    @csrf

    <div class="form-group">
        <input type="password" name="password" id="password" class="form-control bg-custom-grey-lightest" placeholder="Choose password">

        @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-block bg-grey-darker hover:bg-grey-darkest text-white uppercase">
            Create Account
        </button>
    </div>

</form>