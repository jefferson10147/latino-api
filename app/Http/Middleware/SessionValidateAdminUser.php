<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Classes\PersonalizedJWT;
use App\Models\User;
use Illuminate\Support\Facades\Http;

class SessionValidateAdminUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            if($request->header('Authorization') == null || trim($request->header('Authorization') == "")){
                return response()->json(['error' => 'Unauthorized action.'], 401);
            }

            $token_request = explode(" " ,$request->header('Authorization'))[1];

            $object_user = PersonalizedJWT::tokenValidate($token_request);

            if(!($object_user->role_id == env('ID_ROLE_ADMIN') || $object_user->role_id == env('ID_ROLE_USER'))) {
                return response()->json(['error' => 'Unauthorized actionn.'], 401);
            }
 
            return $next($request);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
