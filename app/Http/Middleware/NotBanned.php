<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NotBanned
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) {
            if (auth()->user()->isBanned()) {
                auth()->logout();
                toast()->danger('حساب کاربری شما مسدود شده است، لطفا بعدا تلاش کنید.', 'خطا!')->pushOnNextPage();
                return redirect('/');
            } else {
                return $next($request);
            }
        } else {
            return redirect()->route('login');
        }
    }
}
