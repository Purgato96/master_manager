<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('team_fun', function (Blueprint $table) {
            $table->id();
            $table->comment('Tabela de equipes e colaboradores');
            $table->integer('id_colab', true)->comment('Identificador do colaborador');
            $table->string('team', 10)->index('idx_team_fun_team')->comment('Nome da equipe do colaborador');

            $table->primary('id_colab');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('team_fun');
    }
};
