<?php

namespace App\Http\Middleware;

use Closure;
use Session;
class isCartEmpty
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
        $cart=Session::has('cart');
        if ($cart) {
            return $next($request);
        }else{
            return redirect('/home')->withErrors(['msg' => 'Your cart has no items']);
        }

    }
}
