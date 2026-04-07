<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CadEmp;
use App\Services\MilvusService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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

    public function searchEmp(Request $request): JsonResponse
    {
        $request->validate([
            'Empresa' => ['required', 'string'],
        ]);

        $empresaBusca = mb_strtoupper(trim($request->input('Empresa')), 'UTF-8');

        $empresa = CadEmp::select('nome_fantasia', 'cnpj', 'id_milvus', 'team')
            ->where('nome_fantasia', 'like', '%'.$empresaBusca.'%')
            ->first();

        if (! $empresa) {
            return response()->json([
                'message' => 'Empresa não encontrada.',
            ], 404);
        }

        return response()->json([
            'NOME EMPRESA' => $empresa->nome_fantasia,
            'CNPJ' => $empresa->cnpj,
            'ID MILVUS' => $empresa->id_milvus,
            'TEAM' => $empresa->team,
        ], 200);
    }
}
