<p class="text-sm font-gabriela mt-4">
    <span class="text-red">*</span> <span class="text-grey-darker text-xs">All fields are required.</span>
</p>

<!-- First name -->
<div class="form-group">
    <input type="text" name="first_name_s" id="first_name_s" class="form-control" placeholder="First Name" style="border-radius: 0">
</div>

<!-- Last name -->
<div class="form-group">
    <input type="text" name="last_name_s" id="last_name_s" class="form-control" placeholder="Last Name"  style="border-radius: 0">
</div>

<!-- Country -->
<div class="form-group">
    <select name="country_s" id="country_s" class="form-control"  style="border-radius: 0">
        <option value="">Select a country</option>
        @foreach (Country::all() as $name=>$code)
            <option value="{{ $code }}">
                {{ $name }}
            </option>
        @endforeach
    </select>
</div>

<!-- Address -->
<div class="form-group">
    <input type="text"  name="address_s" id="address_s" class="form-control" placeholder="Street address"  style="border-radius: 0">
</div>

<!-- Postal Code -->
<div class="form-group">
    <input type="text" name="postal_code_s" id="postal_code_s" class="form-control" placeholder="Postal code"  style="border-radius: 0">
</div>

<!-- City -->
<div class="form-group">
    <input type="text" name="city_s" id="city_s" class="form-control" placeholder="City"  style="border-radius: 0">
</div>

<!-- Phone -->
<div class="form-group">
    <input type="text" name="phone_s" id="phone_s" class="form-control" placeholder="Phone Number"  style="border-radius: 0">
</div>