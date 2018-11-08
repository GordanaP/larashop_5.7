<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.top._head')
</head>

<body  class="bg-white">
    <div id="app">

        @include('partials.top._navtop')

        @include('partials.top._navmiddle')

        {{-- <hr class="mt-0 mb-0"> --}}

        @yield('navbar')

        <main>
            <div class="container">

            </div>

            @yield('content')
        </main>
    </div>

    @include('partials.bottom._scripts')
</body>
</html>