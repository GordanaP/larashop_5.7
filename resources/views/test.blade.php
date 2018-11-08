@extends('layouts.app')

@section('content')

<nav class="nav-top navbar navbar-expand-md navbar-light border-t-1 border-b border-grey-light bg-grey-lightest" style="max-height: 35px !important">
    <div class="container-fluid">
        <div class="collapse navbar-collapse flex justify-between" id="navbarSupportedContent">

            <!-- Authentication Links -->
            <ul class="navbar-nav flex items-center ml-auto text-xs">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    |
                    <li class="nav-item">
                        @if (Route::has('register'))
                            <a class="nav-link" href="{{ route('register') }}">Join</a>
                        @endif
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <span class="text-grey-darker">Hello, {{ Auth::user()->name }}</span>
                        </a>

                        <!-- Dropdwon menu -->
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('accounts.show') }}">
                                <span class="icon icon_cog mr-2"></span> My account
                            </a>
                            <a class="dropdown-item" href="{{ route('customers.show') }}">
                                <span class="icon icon_profile mr-2"></span> My profile
                            </a>
                            <a class="dropdown-item" href="{{ route('orders.index') }}">
                                <span class="icon icon_toolbox_alt mr-2"></span> My orders
                            </a>
                            <a class="dropdown-item" href="{{ route('favorites.index') }}">
                                <span class="icon icon_heart_alt mr-2"></span> My favorites
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>

        </div>
    </div>
</nav>

<nav class="nav-bottom navbar navbar-expand-md border-bottom border-grey" style="height: 80px !important">
    <div class="container">

        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>

        <div class="flex justify-between">
            <ul class="navbar-nav mr-auto">
                <li class="nav-link">
                    <a href="{{ route('products.index') }}" class="text-white">Shop</a>
                </li>
            </ul>

            <ul class="navbar-nav flex items-center text-sm">
                <li class="nav-link mr-5">
                    <div class="input-group" style="max-height: 30px; width: 120%">
                        <input type="text" class="form-control" name="search" id="search">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fa fa-search"></i>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="nav-link">
                    <a href="{{ route('carts.show') }}">
                        <i class="icon icon_cart_alt font-bold mr-1"></i>
                        <span> Cart <span class="bg-orange px-2 rounded-full ml-1 text-grey-darkest">{{ Cart::itemsCount() }}</span></span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="{{ route('favorites.index') }}">
                        @auth
                            <i class="icon icon_heart_alt font-bold mr-1"></i>
                            <span>Favorites <span class="bg-orange px-2 rounded-full ml-1 text-grey-darkest">{{ Auth::user()->favoritesCount() }}</span></span>
                         @endauth
                    </a>
                </li>
            </ul>
        </div>

    </div>
</nav>


@endsection

@section('scripts')

@endsection