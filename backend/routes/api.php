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
