<p class="font-bold mb-1">{{ Auth::user()->customer->full_name }}</p>
<p class="mb-1">{{ Auth::user()->customer->address }}</p>
<p class="mb-1">{{ Auth::user()->customer->full_city }}</p>
<p class="mb-1">{{ Auth::user()->customer->country }}</p>
<p class="mb-1">{{ Auth::user()->customer->phone }}</p>

<a href="#" class="btn btn-sm text-white bg-gold-dark hover:bg-yellow-darker">
    Edit
</a>
