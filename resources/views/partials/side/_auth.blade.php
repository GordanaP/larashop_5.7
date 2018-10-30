<ul class="m-0 p-0 bg-custom-grey-lightest border border-grey p-2">

    <li class="flex p-2">
        <a href="{{ route('accounts.show') }}" class=" text-grey-dark">
            <span class="icon icon_cog mr-2"></span> My account
        </a>
    </li>

    <li class="flex p-2">
        <a href="{{ route('customers.show') }}" class=" text-grey-dark">
            <span class="icon icon_profile mr-2"></span> My profile
        </a>
    </li>

    <li class="flex p-2">
        <a href="{{ route('orders.index') }}" class=" text-grey-dark">
            <span class="icon icon_toolbox_alt mr-2"></span> My orders
        </a>
    </li>

    <li class="flex p-2">
        <a href="{{ route('favorites.index') }}" class=" text-grey-dark">
            <span class="icon icon_heart_alt mr-2"></span> My favorites
        </a>
    </li>
</ul>