<div class="row">

    <!-- First name -->
    <div class="col-md-6">
        <div class="form-group">
            <label for="first_name"><b>First name:<span class="text-red">*</span></b></label>
            <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name" value={{ old('first_name') }}>
        </div>
    </div>

    <!-- Last name -->
    <div class="col-md-6">
        <div class="form-group">
            <label for="last_name"><b>Last name:<span class="text-red">*</span></b></label>
            <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name" value={{ old('last_name') }}>
        </div>
    </div>

</div>

<!-- Address -->
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="address"><b>Street address:<span class="text-red">*</span></b></label>
            <textarea name="address" id="address" class="form-control" rows="2" placeholder="Street address">{{ old('address') }}</textarea>
        </div>
    </div>
</div>

<div class="row">

    <!-- Postcode -->
    <div class="col-md-6">
        <div class="form-group">
            <label for="postcode"><b>Postal code:<span class="text-red">*</span></b></label>
            <input type="text" name="postcode" id="postcode" class="form-control" placeholder="Postal code" value={{ old('postcode') }}>
        </div>
    </div>

    <!-- City -->
    <div class="col-md-6">
        <div class="form-group">
            <label for="city"><b>City:<span class="text-red">*</span></b></label>
            <input type="text" name="city" id="city" class="form-control" placeholder="City" value={{ old('city') }}>
        </div>
    </div>

</div>

<div class="row">

    <!-- Phone -->
    <div class="col-md-6">
        <div class="form-group">
            <label for="phone"><b>Phone number:<span class="text-red">*</span></b></label>
            <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone Number" value={{ old('phone') }}>
        </div>
    </div>

    <!-- Email -->
    <div class="col-md-6">
        <div class="form-group">
            <label for="email"><b>E-mail address:<span class="text-red">*</span></b></label>
            <input type="text" name="email" id="email" class="form-control" placeholder="example@domain.com" value={{ old('email') }}>
        </div>
    </div>

</div>