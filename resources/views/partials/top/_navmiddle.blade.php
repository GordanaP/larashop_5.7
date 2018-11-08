<nav class="navbar border-bottom navbar-light navbar-expand-sm" style="min-height: 80px;">
    <div class="container" style="width: 80%">

        <a class="font-bold text-2xl" href="{{ route('products.index') }}">
            <span class="text-orange-light">Lara</span><span class="text-orange-dark">Shop</span>
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bottomNavbar" aria-controls="bottomNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="bottomNavbar">
            <ul class="navbar-nav ml-auto">
                <form class="form-inline mr-4">
                    <div class="input-group" style="max-height: 30px; width: 300px;">
                        <input type="text" class="form-control" name="search" id="search" style="border-radius: 0 !important">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fa fa-search"></i>
                            </div>
                        </div>
                    </div>
                </form>

                <li class="nav-item mr-4 mt-1">
                    <a href="{{ route('carts.show') }}" class="text-xs">
                       <i class="icon icon_cart_alt text-orange mr-1"></i>
                        Cart <span class="px-2 rounded-full bg-orange text-white ml-1">{{ Cart::itemsCount() }}</span>
                    </a>
                </li>

                @auth
                    <li class="nav-item mt-1">
                        <a href="{{ route('favorites.index') }}" class="text-xs">
                            <i class="icon icon_heart_alt text-orange mr-1"></i>
                            Favorites <span class="px-2 rounded-full bg-orange text-white ml-1">{{ Auth::user()->favoritesCount() }}</span>
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
