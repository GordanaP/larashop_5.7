<?php

namespace App\Http\Middleware;

use App\Facades\Cart;
use Closure;

class RedirectIfCartIsEmpty
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Cart::itemsCount() < 1) {
            return redirect()->back();
        }

        return $next($request);
    }
}
