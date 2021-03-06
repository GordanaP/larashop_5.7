<p class="text-sm font-gabriela">
    <span class="text-red">*</span> <span class="text-grey-darker text-xs">Required fields</span>
</p>

<form action="{{ route('accounts.update') }}" method="POST">

    @csrf
    @method('PATCH')

    <div class="form-group">
        <label for="name" class="font-bold text-grey-darker">Username <span class="text-red">*</span></label>
        <input type="text" name="name" id="name" class="form-control" placeholder="Username" value="{{ old('name') ?: $user->name }}" style="border-radius: 0">

        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group">
        <label for="email" class="font-bold text-grey-darker">Email <span class="text-red">*</span></label>
        <input type="text" name="email" id="email" class="form-control" placeholder="user@example.com" value="{{ old('email') ?: $user->email }}" style="border-radius: 0">

        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif

    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="password" class="font-bold text-grey-darker">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Choose a password"  style="border-radius: 0">

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="password_confirm" class="font-bold text-grey-darker">Password</label>
                <input type="password" name="password_confirmation" id="password_confirm" class="form-control" placeholder="Retype password" style="border-radius: 0">
            </div>
        </div>
    </div>

    <div class="form-group">
        <button type="submit" class="btn text-white bg-grey-darker hover:bg-grey-darkest tracking-wide uppercase" style="font-weight: 800; border-radius: 0">
            Save Changes
        </button>
    </div>

</form>
