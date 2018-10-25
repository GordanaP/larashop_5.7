<p class="text-sm font-gabriela">
    <span class="text-red">*</span> <span class="text-grey-darker text-xs">Required fields</span>
</p>

<form action="/my-profile" method="POST">

    @csrf

    @if ($user->customer)
        @method('PATCH')
    @endif

    <div class="row">
        <!-- First name -->
        <div class="col-md-6">
            <div class="form-group">
                <label for="first_name" class="font-bold text-grey-darker">First Name</label>
                <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name" value={{ old('first_name') ?: optional($user->customer)->first_name}}>

                @if ($errors->has('first_name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('first_name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <!-- Last name -->
        <div class="col-md-6">
            <div class="form-group">
                <label for="last_name" class="font-bold text-grey-darker">Last Name</label>
                <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name" value={{ old('last_name') ?: optional($user->customer)->last_name }}>

                @if ($errors->has('last_name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('last_name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>

    <!-- Country -->
    <div class="form-group">
        <label for="country" class="font-bold text-grey-darker">Country</label>
        <select name="country" id="country" class="form-control" value="{{ old('country') }}">
            <option value="">Select a country</option>
            @foreach (Country::all() as $name=>$code)
                <option value="{{ $code }}"
                    {{ getSelected($code, old('country') ?: optional($user->customer)->country_code) }}
                >
                    {{ $name }}
                </option>
            @endforeach
        </select>

        @if ($errors->has('country'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('country') }}</strong>
            </span>
        @endif
    </div>

    <!-- Address -->
    <div class="form-group">
        <label for="address" class="font-bold text-grey-darker">Address</label>
        <input type="text"  name="address" id="address" class="form-control" placeholder="Street address" value="{{ old('address') ?: optional($user->customer)->address }}">

        @if ($errors->has('address'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('address') }}</strong>
            </span>
        @endif
    </div>

    <div class="row">
        <!-- Postcode -->
        <div class="col-md-6">
            <div class="form-group">
                <label for="postal_code" class="font-bold text-grey-darker">Postal Code</label>
                <input type="text" name="postal_code" id="postal_code" class="form-control" placeholder="Postal code" value={{ old('postal_code') ?: optional($user->customer)->postal_code }}>

                @if ($errors->has('postal_code'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('postal_code') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <!-- City -->
        <div class="col-md-6">
            <div class="form-group">
                <label for="city" class="font-bold text-grey-darker">City</label>
                <input type="text" name="city" id="city" class="form-control" placeholder="City" value={{ old('city') ?: optional($user->customer)->city }}>

                @if ($errors->has('city'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('city') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>

    <!-- Phone -->
    <div class="form-group">
        <label for="phone" class="font-bold text-grey-darker">Phone Number</label>
        <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone Number" value="{{ old('phone')  ?: optional($user->customer)->phone }}">

        @if ($errors->has('phone'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('phone') }}</strong>
            </span>
        @endif
    </div>

    <!-- Button -->
    <div class="form-group">
        <button type="submit" class="btn bg-indigo-darker hover:bg-indigo-darkest uppercase text-white font-medium tracking-wide bold">
            save profile
        </button>
    </div>

</form>