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
        Schema::create('cad_user', function (Blueprint $table) {
            $table->id();
            $table->comment('Tabela de cadastro de usuários');
            $table->string('full_name', 50)->primary()->comment('Nome completo do usuário');
            $table->string('phone', 13)->unique('uk_cad_user_phone')->comment('Telefone do usuário');
            $table->string('mail', 40)->unique('uk_cad_user_mail')->comment('E-mail do usuário');
            $table->string('emp_user', 25)->index('idx_cad_user_emp_user')->comment('Empresa do usuário ou vínculo empresarial');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cad_user');
    }
};
