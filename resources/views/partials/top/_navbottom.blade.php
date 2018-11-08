<nav class="navbar navbar-expand bg-indigo-darker text-white font-bold tracking-wide" style="max-height:36px;">
    <div class="container" style="width: 80%">
        <ul class="navbar-nav mr-auto">
            @foreach ($mappings as $filter => $map)
                @foreach ($map as $name => $slug)
                    <li class="p-3 uppercase">
                        <a href="{{ route('products.index', getQueryString([$filter => $slug])) }}" class="{{ getActiveClass(request($filter), $slug) }} text-xs">
                            {{ ucfirst($name) }}
                        </a>
                    </li>
                @endforeach

                @if ($filter == 'category')
                    @break
                @endif
            @endforeach
        </ul>
    </div>
</nav>