<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;

class CheckHasPermission
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $routeName = Route::currentRouteName();

        try {
            if (auth()->user()->hasPermissionTo($routeName)) {
                return $next($request);
            }
        } catch (PermissionDoesNotExist $exception) {
            abort(403);
        }

        abort(403);
    }
}
