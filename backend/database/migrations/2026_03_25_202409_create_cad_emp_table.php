<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('cad_emp', function (Blueprint $table) {
            $table->id();
            $table->comment('Tabela de cadastro de empresas');
            $table->integer('id_emp', true)->comment('Identificador interno da empresa');
            $table->string('nome_fantasia', 50)->unique('uk_cad_emp_nome_fantasia')->comment('Nome fantasia da empresa');
            $table->string('cnpj', 18)->unique('uk_cad_emp_cnpj')->comment('CNPJ da empresa');
            $table->string('id_milvus', 10)->unique('uk_cad_emp_id_milvus')->comment('Identificador Milvus da empresa');
            $table->string('team', 10)->index('idx_cad_emp_team')->comment('Equipe vinculada à empresa');

            $table->primary('id_emp');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
    Schema::dropIfExists('cad_emp');
}
};
