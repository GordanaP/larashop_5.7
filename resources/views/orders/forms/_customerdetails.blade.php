<p class="text-sm font-gabriela">
    <span class="text-red">*</span> <span class="text-grey-darker text-xs">All fields are required</span>
</p>

<!-- Email -->
<div class="form-group">
    <input type="text" name="email" id="email" class="form-control" placeholder="user@example.com" value="{{ old('email') }}" style="border-radius: 0">

    @if ($errors->has('email'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif
</div>

<!-- First name -->
<div class="form-group">
    <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name" value="{{ old('first_name') }}" style="border-radius: 0">

    @if ($errors->has('first_name'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('first_name') }}</strong>
        </span>
    @endif
</div>

<!-- Last name -->
<div class="form-group">
    <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name" value="{{ old('last_name') }}"  style="border-radius: 0">

    @if ($errors->has('last_name'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('last_name') }}</strong>
        </span>
    @endif
</div>

<!-- Country -->
<div class="form-group">

    <select name="country" id="country" class="form-control" value="{{ old('country') }}"  style="border-radius: 0">
        <option value="">Select a country</option>
        @foreach (Country::all() as $name=>$code)
            <option value="{{ $code }}"
                {{ getSelected($code , old('country')) }}
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
    <input type="text"  name="address" id="address" class="form-control" placeholder="Street address" value="{{ old('address') }}" style="border-radius: 0">

    @if ($errors->has('address'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('address') }}</strong>
        </span>
    @endif
</div>


<!-- Postcode -->
<div class="form-group">
    <input type="text" name="postal_code" id="postal_code" class="form-control" placeholder="Postal code" value="{{ old('postal_code') }}" style="border-radius: 0">

    @if ($errors->has('postal_code'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('postal_code') }}</strong>
        </span>
    @endif
</div>

<!-- City -->
<div class="form-group">
    <input type="text" name="city" id="city" class="form-control" placeholder="City" value="{{ old('city') }}" style="border-radius: 0">

    @if ($errors->has('city'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('city') }}</strong>
        </span>
    @endif
</div>

<!-- Phone -->
<div class="form-group">
    <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone Number" value="{{ old('phone') }}" style="border-radius: 0">

    @if ($errors->has('phone'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('phone') }}</strong>
        </span>
    @endif
</div>