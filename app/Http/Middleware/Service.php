<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

class Service
{
    public function handle($request, Closure $next)
    {
        header_remove('Access-Control-Allow-Credentials');
        header_remove('Access-Control-Allow-Origin');
        return $next($request);
    }
}