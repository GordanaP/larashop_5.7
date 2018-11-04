<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.top._head')
</head>

<body class="bg-white">
    <div id="app">

        @include('partials.top._nav')

        <main class="py-4">

            <div class="container">

                <nav class="flex justify-between items-center" aria-label="breadcrumb">

                    <ol class="breadcrumb bg-white pl-0 uppercase text-xs text-grey-darker">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Library</li>
                    </ol>

                    <div>
                        <a href="{{ route('favorites.index') }}" class="text-indigo-dark text-lg mr-4">
                            @auth
                                <i class="icon icon_heart_alt"></i>
                                <span>{{ Auth::user()->favoritesCount() }}</span>
                             @endauth
                        </a>

                        <a href="{{ route('carts.show') }}" class="text-indigo-dark text-lg">
                            <i class="icon icon_cart"></i>
                            <span>{{ Cart::itemsCount() }}</span>
                        </a>
                    </div>
                </nav>


                <div class="mt-3 flex justify-between items-center">
                    <h3 class="font-bold mb-1">

                        @yield('page_title')

                    </h3>

                    <div class="text-lg font-semibold text-grey-darker">

                        @yield('action_buttons')

                    </div>
                </div>

                <span class="text-grey-darker text-sm">

                    @yield('notification')

                </span>

            </div>

            @yield('content')
        </main>
    </div>

    @include('partials.bottom._scripts')
</body>
</html>