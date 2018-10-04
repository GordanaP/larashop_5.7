<form action="{{ route('carts.store', $product) }}" method="POST">

    @csrf

    <!-- Size -->
    <div class="form-group row mb-4">
        <div class="col-sm-8 {{ $product->hasSizes() ? '' : 'pt-7' }}">
            @if ( $product->hasSizes())
                <select name="size_id" id="size_id" class="form-control">
                    <option value="">Select a size</option>

                    @foreach ($product->getSizes() as $size)
                        <option value="{{ $size->id }}"
                           {{ getSelected($size->id , old('size_id')) }}
                        >
                            {{ $size->name }}
                        </option>
                    @endforeach
                </select>

                @if ($errors->has('size_id'))
                    <span class="invalid-feedback m-r-22" role="alert">
                        <strong>{{ $errors->first('size_id') }}</strong>
                    </span>
                @endif
            @else
                One size
            @endif
        </div>
    </div>

    <!-- Color -->
    <div class="form-group row mb-3">
        <div class="col-sm-8 {{ $product->hasColors() ? '' : 'pt-7' }}">
            @if ($product->hasColors())
                <select name="color_id" id="color_id" class="form-control">
                    <option value="">Select a color</option>

                    @if ($product->hasSizes())

                        <!-- Append size-related colors -->

                    @else
                        @foreach ($product->getColors() as $color)
                            <option value="{{ $color->id }}"
                                {{ getIfStat($color->id, old('color_id'), 'selected') }}
                            >
                                {{ $color->name }}
                            </option>
                        @endforeach
                    @endif
                </select>
            @else
                <span>One color</span>
            @endif

            @if ($errors->has('color_id'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('color_id') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <!-- Qty -->
    <div class="form-group row">
        <div class="col-sm-8 flex">
            <input type="text" name="qty" id="qty" class="form-control text-center mr-2 w-40" value="{{ old('qty') ?: 1 }}">

            <button class="btn bg-indigo-light hover:bg-indigo text-white uppercase ml-2 w-60">
                Add to Cart
            </button>
        </div>

        <div class="col-sm-8 offset-sm-2">
            @if ($errors->has('qty'))
                <span class="invalid-feedback qty" role="alert">
                    <strong>{{ $errors->first('qty') }}</strong>
                </span>
            @endif
        </div>
    </div>

</form>