<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Classes\PersonalizedJWT;
use App\Models\User;

class SessionValidateAdmin
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
            if(!isset($request->token)){
                return response()->json(['error' => 'Unauthorized action.'], 401);
            }

            $object_user = PersonalizedJWT::tokenValidate($request->token);

            if($object_user->role_id != env('ID_ROLE_ADMIN')) {
                return response()->json(['error' => 'Unauthorized action.'], 401);
            }
 
            return $next($request);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
