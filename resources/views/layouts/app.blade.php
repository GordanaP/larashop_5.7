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

                    <a href="{{ route('carts.show') }}" class="text-indigo-dark text-lg">
                        <i class="icon icon_cart"></i>
                        <span>{{ Cart::itemsCount() }}</span>
                    </a>
                </nav>


                <div class="flex justify-between items-center">
                    <h3 class="font-semibold">

                        @yield('page_title')

                    </h3>

                    <div class="text-lg font-semibold text-grey-darker">

                        @yield('action_buttons')

                    </div>
                </div>

                @yield('notification')

                <hr class="mb-10 border-t border-grey">

            </div>

            @yield('content')
        </main>
    </div>

    @include('partials.bottom._scripts')
</body>
</html>