<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Rota de teste para verificar se a API está funcionando
Route::prefix('v1')->name('api.')->group(function () {
    Route::get('/test', function () {
        return response()->json([
            'message' => 'Hello World! Você obteve um status 200 OK!',
        ]);
    }
    );
});

Route::get('/v1/status', function () {
    return response()->json([
        'status' => 'online',
        'version' => '1.0.0',
        'timestamp' => now()->toISOString(),
        'endpoints' => [
            'auth' => '/api/v1/auth/*',
            'rooms' => '/api/v1/rooms',
            'messages' => '/api/v1/rooms/{room}/messages',
        ],
    ]);
});

Route::fallback(function () {
    return response()->json([
        'error' => 'Endpoint não encontrado',
        'message' => 'A rota solicitada não existe. Consulte a documentação da API.',
        'documentation' => '/api/v1/status',
    ], 404);
});
