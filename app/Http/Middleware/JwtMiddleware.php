<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Exception;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class JwtMiddleware extends BaseMiddleware
{

    /**
     * Handle an incoming request.
     *
     */
    public function handle($request, Closure $next)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
            if (!$user) {
                /*Returning error if the token is a valid JWT but the encoded
                user doesn't exist with 404 status code*/
                return response()->json(['error' => 'user_not_found'], 404);
            }
        } catch (Exception $e) {
            return response()->json(['error' => 'Not authorized'], 400);
        }
        return $next($request);
    }
}
