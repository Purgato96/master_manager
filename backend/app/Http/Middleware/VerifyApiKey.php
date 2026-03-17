<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyApiKey
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $apiKey = $request->header('X-API-KEY') ?? $request->bearerToken();

        if (!$apiKey || !($client = ApiClient::where('api_key', hash('sha256', $apiKey))->first())) {
            return response()->json(['error' => 'API Key inválida'], 401);
        }

        if (!$client->is_active) {
            return response()->json(['error' => 'API Key desativada'], 403);
        }

        $client->incrementRequests();
        $request->merge(['api_client' => $client]);

        return $next($request);
    }

}
