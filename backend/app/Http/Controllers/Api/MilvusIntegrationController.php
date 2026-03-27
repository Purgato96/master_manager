<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\MilvusService;
use Illuminate\Http\JsonResponse;

class MilvusIntegrationController extends Controller
{
    public function sync(MilvusService $milvusService): JsonResponse
    {
        try {
            // Se for muito pesado, você pode despachar para um Job aqui:
            // SyncMilvusClientsJob::dispatch();

            $milvusService->syncClients();

            return response()->json([
                'message' => 'Sincronização com Milvus concluída com sucesso.',
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Falha na sincronização.',
                'details' => $e->getMessage(),
            ], 500);
        }
    }
}
