<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ValidateApiKey
{
    public function handle(Request $request, Closure $next)
    {
        // Ambil API key dari header
        $apiKey = $request->header('X-API-KEY');

        // Validasi API key
        if (!$apiKey || $apiKey !== config('app.api_key')) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}
