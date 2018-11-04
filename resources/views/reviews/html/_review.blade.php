<div class="card mb-3 w-1/2">

    <div class="card-body">

        <p class="mb-1">
            @foreach (showStars($review->stars) as $star)
                {!! $star !!}
            @endforeach
        </p>

        <p class="text-grey-dark text-xs">
            <span class="">{{ $review->user->name }}</span> on {{ $review->created_at }}
        </p>

        <p class="font-bold text-grey-darker mb-1">{{ $review->title }}</p>

        <p class="text-xs mb-0">{{ $review->body }}</p>

    </div>

</div>