<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Models\CadEmp;
use Illuminate\Support\Facades\Log;

class MilvusService {
    protected string $baseUrl = 'https://apiintegracao.milvus.com.br/api';
    protected string $token;

    public function __construct() {
        $this->token = config('services.milvus.token');
    }

    public function syncClients() {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => $this->token,
        ])->get("{$this->baseUrl}/cliente/busca");

        if ($response->failed()) {
            Log::error('Erro ao buscar clientes na Milvus', ['status' => $response->status()]);
            return false;
        }

        $clientes = $response->json('lista');

        foreach ($clientes as $cliente) {

            $equipePrincipal = !empty($cliente['equipes']) ? substr($cliente['equipes'][0], 0, 10) : 'N/A';
            $cnpjBase = !empty($cliente['cnpj_cpf']) ? $cliente['cnpj_cpf'] : 'NI-' . $cliente['token'];
            $nomeFantasiaBase = !empty($cliente['nome_fantasia']) ? substr($cliente['nome_fantasia'], 0, 150) : 'SEM NOME - ' . $cliente['token'];

            // 1. O FILTRO DE REJEIÇÃO (Gatekeeper)
            // Busca se já existe ALGUÉM com esse mesmo CNPJ ou Nome Fantasia, mas que seja de OUTRO token
            $conflito = CadEmp::where(function($query) use ($cnpjBase, $nomeFantasiaBase) {
                $query->where('cnpj', $cnpjBase)
                    ->orWhere('nome_fantasia', $nomeFantasiaBase);
            })->where('id_milvus', '!=', $cliente['token'])->first();

            if ($conflito) {
                // Se achou conflito, a gente não quebra o sistema. Apenas loga o problema e pula para o próximo cliente.
                Log::warning("Sincronização Milvus: Cliente ignorado por violar restrição UNIQUE (CNPJ ou Nome Fantasia duplicados na API).", [
                    'token_rejeitado' => $cliente['token'],
                    'cnpj_problematico' => $cnpjBase,
                    'nome_problematico' => $nomeFantasiaBase,
                    'token_oficial_no_banco' => $conflito->id_milvus
                ]);

                continue; // Pula a execução atual do foreach e vai pro próximo cliente
            }

            // 2. SALVA OU ATUALIZA
            // Se chegou aqui, os dados estão limpos e prontos para o banco!
            CadEmp::updateOrCreate(
                ['id_milvus' => $cliente['token']],
                [
                    'nome_fantasia' => $nomeFantasiaBase,
                    'cnpj' => $cnpjBase,
                    'team' => $equipePrincipal,
                ]
            );
        }

        return true;
    }
}
