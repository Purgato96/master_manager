<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ApiClient;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:api_clients,email',
        ]);

        $plainKey = Str::random(40);
        $apiKey = hash('sha256', $plainKey);

        $client = ApiClient::create([
            'name' => $request->name,
            'email' => $request->email,
            'plain_key' => $plainKey,
            'api_key' => $apiKey,
        ]);

        return response()->json([
            'message' => 'API Key criada com sucesso!',
            'api_key' => $plainKey, // SÓ MOSTRA UMA VEZ!
            'client_id' => $client->id,
        ]);
    }

    public function login(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $client = ApiClient::where('email', $request->email)
            ->where('is_active', true)
            ->firstOrFail();

        return response()->json([
            'api_key' => $client->plain_key,
            'client' => $client->only('id', 'name', 'email', 'requests_count')
        ]);
    }

    public function refreshKey(Request $request)
    {
        $request->validate(['current_key' => 'required']);

        $client = ApiClient::where('api_key', hash('sha256', $request->current_key))
            ->firstOrFail();

        $newPlainKey = Str::random(40);
        $client->update([
            'plain_key' => $newPlainKey,
            'api_key' => hash('sha256', $newPlainKey)
        ]);

        return response()->json(['new_api_key' => $newPlainKey]);
    }
}
