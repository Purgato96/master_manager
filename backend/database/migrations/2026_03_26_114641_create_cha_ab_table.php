<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('cha_ab', function (Blueprint $table) {
            $table->id();
            $table->comment('Tabela de chamados abertos');
            $table->string('id_milvus', 10)->primary()->comment('Identificador Milvus relacionado ao chamado');
            $table->integer('tck_num', true)->unique('uk_cha_ab_tck_num')->comment('Número do ticket/chamado');
            $table->text('descricao')->comment('Descrição do chamado');
            $table->string('nome_fantasia', 50)->index('idx_cha_ab_nome_fantasia')->comment('Nome fantasia da empresa relacionada ao chamado');

            // Foreign Keys
            $table->foreign('nome_fantasia')->references('nome_fantasia')->on('cad_emp')
                ->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('id_milvus')->references('id_milvus')->on('cad_emp')
                ->onUpdate('cascade')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('cha_ab');
    }
};
