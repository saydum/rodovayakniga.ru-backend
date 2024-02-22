<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Human;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AccessRodovoeDrevo
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $humanId = $request->route('human');

        $human = Human::find($humanId);

        if (!$human) {
            abort(404);
        }


        if (!$human->first()->share->link) {
            abort(403);
        }


        return $next($request);
    }
}
