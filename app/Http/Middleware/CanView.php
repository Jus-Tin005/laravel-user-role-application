<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Helpers\CheckPermissionHelpers;

class CanView
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $feature
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $feature)
    {
        $permissionHelper = new CheckPermissionHelpers();

        if ($permissionHelper->customShow($feature)) {
            return $next($request);
        } else {
            $response = [
                'error' => '403 Forbidden',
                'message' => 'You do not have permission to perform this action.',
            ];

            return response()->json($response, Response::HTTP_FORBIDDEN);
        }
    }
}

