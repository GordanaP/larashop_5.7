<div>
    @foreach ($mappings as $filter => $map)
        <h4>
            <b>{{ ucfirst($filter) }}</b>

            @if (Request::has($filter))
                <a href="{{ route('products.index', removeQueryString($filter)) }}" class="text-sm text-grey-darker">
                    &times; Remove filter
                </a>
            @endif
        </h4>

        <ul class="pl-2">
            @foreach ($map as $name => $slug)
                <li class="flex">
                    <a href="{{ route('products.index', getQueryString([$filter => $slug])) }}" class="{{ getActiveClass(request($filter), $slug) }} text-grey-dark">
                        {{ ucfirst($name) }}
                    </a>
                </li>
            @endforeach
        </ul>
    @endforeach

    @if (collect(Request::query())->intersectByKeys($mappings)->all())
        <a href="{{ route('products.index') }}" class="text-sm text-grey-darker uppercase font-semibold">
            &times; Remove all filters
        </a>
    @endif
</div>