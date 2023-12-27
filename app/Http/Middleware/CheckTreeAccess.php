<?php

namespace App\Http\Middleware;

use App\Services\HumanService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckTreeAccess
{
    protected HumanService $humanService;
    public function __construct(HumanService $humanService)
    {
        $this->humanService = $humanService;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $humanId = $request->route('human');

        $human = $this->humanService->getById($humanId);

        if (!$human) abort(404);

        if (!$human->shareTreeLink) abort(403);

        return $next($request);
    }
}
