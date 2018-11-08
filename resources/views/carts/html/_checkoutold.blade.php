 <div class="row mb-4">
     <div class="col-sm-10 offset-sm-1">
        <h5 class="font-bold">Returning customer</h5>
    </div>
 </div>

<form method="POST" action="{{ route('login') }}">

    @csrf

    <div class="form-group mb-4 row">
        <div class="col-sm-10 offset-sm-1">
            <input type="text" id="email" class="form-control form-control-lg border-0" name="email" placeholder="user@domain.com" value="{{ old('email') }}"  style="border-radius: 0">

            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group mb-4 row">
        <div class="col-sm-10 offset-sm-1">
            <input id="password" type="password" class="form-control form-control-lg border-0" name="password" placeholder="********"  style="border-radius: 0">

            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group mb-4 row">
        <div class="col-md-10 offset-sm-1">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    Remember Me
                </label>
            </div>
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-10 offset-sm-1 flex justify-between">
            <button type="submit" class="btn btn-lg bg-grey-darker hover:bg-grey-darkest text-white"  style="border-radius: 0">
                Login
            </button>

            <a class="btn btn-link text-indigo-dark hover:text-indigo-darker" href="{{ route('password.request') }}">
                Forgot Your Password?
            </a>
        </div>
    </div>
</form>

