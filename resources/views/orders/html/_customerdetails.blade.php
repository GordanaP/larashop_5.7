<p class="font-bold mb-1">{{ Auth::user()->customer->full_name }}</p>
<p class="mb-1">{{ Auth::user()->customer->address }}</p>
<p class="mb-1">{{ Auth::user()->customer->full_city }}</p>
<p class="mb-1">{{ Auth::user()->customer->country }}</p>
<p class="mb-1">{{ Auth::user()->customer->phone }}</p>

<a href="{{ route('accounts.update') }}" class="btn btn-sm mt-2 hover:bg-yellow-darker uppercase tracking-wide" style="border: 2px solid #DE751F; font-weight: 600; border-radius: 0">
    Edit
</a>
