<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetLocale
{


public function handle($request, Closure $next)
{
    $locale = $request->cookie('locale') ?? session('locale', 'ar');

    app()->setLocale($locale);
    return $next($request);
}



}