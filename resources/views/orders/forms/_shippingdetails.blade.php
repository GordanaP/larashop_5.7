<p class="text-sm font-gabriela">
    <span class="text-red">*</span> <span class="text-grey-dark">Required fields</span>
</p>


<div class="row">

    <!-- First name -->
    <div class="col-md-6">
        <div class="form-group">
            <label for="first_name"><b>First name:<span class="text-red">*</span></b></label>
            <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name" value={{ old('first_name') }}>

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
            <label for="last_name"><b>Last name:<span class="text-red">*</span></b></label>
            <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name" value={{ old('last_name') }}>

            @if ($errors->has('last_name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('last_name') }}</strong>
                </span>
            @endif
        </div>
    </div>

</div>

<!-- Address -->
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="address"><b>Street address:<span class="text-red">*</span></b></label>
            <textarea name="address" id="address" class="form-control" rows="2" placeholder="Street address">{{ old('address') }}</textarea>

            @if ($errors->has('address'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('address') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>

<div class="row">

    <!-- Postcode -->
    <div class="col-md-6">
        <div class="form-group">
            <label for="postcode"><b>Postal code:<span class="text-red">*</span></b></label>
            <input type="text" name="postcode" id="postcode" class="form-control" placeholder="Postal code" value={{ old('postcode') }}>

            @if ($errors->has('postcode'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('postcode') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <!-- City -->
    <div class="col-md-6">
        <div class="form-group">
            <label for="city"><b>City:<span class="text-red">*</span></b></label>
            <input type="text" name="city" id="city" class="form-control" placeholder="City" value={{ old('city') }}>

            @if ($errors->has('city'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('city') }}</strong>
                </span>
            @endif
        </div>
    </div>

</div>

<div class="row">

    <!-- Phone -->
    <div class="col-md-6">
        <div class="form-group">
            <label for="phone"><b>Phone number:<span class="text-red">*</span></b></label>
            <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone Number" value={{ old('phone') }}>

            @if ($errors->has('phone'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('phone') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <!-- Email -->
    <div class="col-md-6">
        <div class="form-group">
            <label for="email"><b>E-mail address:<span class="text-red">*</span></b></label>
            <input type="text" name="email" id="email" class="form-control" placeholder="example@domain.com" value={{ old('email') }}>

            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>

</div>