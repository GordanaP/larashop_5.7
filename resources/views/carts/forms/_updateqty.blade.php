<form action="{{ route('carts.update', $rowId) }}" method="POST">

    @csrf
    @method("PATCH")

    <div class="flex">
        <div class="form-group">
            <input type="text" name="qty" id="qty" class="form-control text-center" value="{{ $item->qty }}" />

            @if ($errors->has('qty'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('qty') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <button type="submit" class="btn">
                <i class="fa fa-refresh"></i>
            </button>
        </div>
    </div>

</form>