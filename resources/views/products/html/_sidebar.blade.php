<div>
    @foreach ($mappings as $filter => $map)

        @if ($filter == 'category')
            @continue
        @endif

        <h5>
            <b>{{ ucfirst($filter) }}</b>

            @if (Request::has($filter))
                <a href="{{ route('products.index', removeQueryString($filter)) }}" class="text-sm text-grey-dark">
                    &times; Remove filter
                </a>
            @endif
        </h5>

        <ul class="pl-2">
            @foreach ($map as $name => $slug)
                <li class="flex items-center">
                    @if ($filter == "color")
                        <i class="fa fa-square mr-2 text-{{ $name }}"></i>
                    @endif
                    <a href="{{ route('products.index', getQueryString([$filter => $slug])) }}" class="{{ getActiveClass(request($filter), $slug) }} text-grey-darker">
                        {{ ucfirst($name) }}
                    </a>
                </li>
            @endforeach
        </ul>
    @endforeach

    @if (collect(Request::query())->intersectByKeys($mappings)->all())
        <a href="{{ route('products.index') }}" class="text-sm text-grey-dark uppercase font-semibold">
            &times; Remove all filters
        </a>
    @endif
</div>