{{-- <nav class="navbar-1" style="min-height:60px;">

    <a href="" class="text-white" style="position:relative; font-weight: bold; font-size: 24px; left:35%; top:10px">Today's Deal 20% off on selected items</a>
</nav>
 --}}
<nav class="navbar navbar-expand border-b border-grey-lighter text-xs" style="max-height:32px; background: #f4f5f6; border-bottom: #e8e8e8; color: #333; font-weight: bold">
    <ul class="navbar-nav ml-auto">
        @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}"><i class="fa fa-user-o mr-2 font-bold"></i> Login</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">|</a>
            </li>

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
</nav>

