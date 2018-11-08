<p class="text-sm font-gabriela mb-4">
    <span class="text-red">*</span> <span class="text-grey-darker text-xs">Required fields</span>
</p>

<form action="/reviews/{{ $product->slug }}" method="POST">

    @csrf

    @if (Auth::user()->getReview($product))
        @method('PUT')
    @endif

    <div>
        <!-- Rating -->
        <div class="flex">
            <label class="font-semibold mr-4">Rating: <span class="text-red">*</span></label>

            @foreach (Rating::all() as $rating => $description)
                <div class="form-check mr-3">
                    <input class="form-check-input" type="radio" name="stars" id="stars_{{ $rating }}" value="{{ $rating }}" {{ getChecked($rating, optional(Auth::user()->getReview($product))->stars ) }} style="border-radius: 0">

                    <label class="form-check-label" for="{{ $rating }}">
                        {{ $description }}
                    </label>
                </div>
            @endforeach
        </div>

        @if ($errors->has('stars'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('stars') }}</strong>
            </span>
        @endif
    </div>

    <!-- Title -->
    <div class="form-group mt-2">
        <label for="title" class="font-semibold">Title:</label>
        <input type="text" class="form-control" name="title" id="title" placeholder="Choose a title" value="{{ old('title') ?: optional(Auth::user()->getReview($product))->title }}"  style="border-radius: 0">

        @if ($errors->has('title'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
        @endif
    </div>

    <!-- Body -->
    <div class="form-group">
        <label for="body" class="font-semibold">Review:</label>
        <textarea name="body" id="body" class="form-control" rows="4" placeholder="Write a review"  style="border-radius: 0">{{ old('body') ?: optional(Auth::user()->getReview($product))->body}}</textarea>

        @if ($errors->has('body'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('body') }}</strong>
            </span>
        @endif
    </div>

    <!-- Button -->
    <div class="form-group">
        <button type="submit" class="btn bg-grey-darker hover:bg-grey-darkest uppercase text-white font-medium tracking-wide"  style="border-radius: 0">
            Place Order
        </button>
    </div>

</form>