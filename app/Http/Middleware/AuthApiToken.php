<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthApiToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->header('access_token');
        if(!$token){
            return response()->json([
                'msg' => 'Access Token is Missing'
            ],401);
        }
        $user = User::where('access_token',$token)->first();
        if(!$user){
            return response()->json([
                'msg' => 'Invalid Access Token'
            ],401);
        }
        return $next($request);
    }
}
