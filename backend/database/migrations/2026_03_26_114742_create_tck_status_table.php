<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('tck_status', function (Blueprint $table) {
            $table->id();
            $table->comment('Tabela de status dos tickets');
            $table->integer('tck_num')->primary()->comment('Número do ticket/chamado');
            $table->string('name_tck', 50)->comment('Nome do ticket');
            $table->text('descricao')->comment('Descrição ou status detalhado do ticket');
            $table->string('mail', 40)->index('idx_tck_status_mail')->comment('E-mail do usuário relacionado ao ticket');
            $table->string('phone', 13)->index('idx_tck_status_phone')->comment('Telefone do usuário relacionado ao ticket');
            $table->string('team', 10)->index('idx_tck_status_team')->comment('Equipe responsável pelo ticket');
            $table->string('id_milvus', 10)->index('idx_tck_status_id_milvus')->comment('Identificador Milvus relacionado ao ticket');

            // Foreign Keys
            $table->foreign('tck_num')->references('tck_num')->on('cha_ab')
                ->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('mail')->references('mail')->on('cad_user')
                ->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('phone')->references('phone')->on('cad_user')
                ->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('id_milvus')->references('id_milvus')->on('cha_ab')
                ->onUpdate('cascade')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('tck_status');
    }
};
