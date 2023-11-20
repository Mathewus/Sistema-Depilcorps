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
        Schema::create('agendamento_servico', function (Blueprint $table) {

            $table->unsignedBigInteger('id_servico');
            $table->foreign('id_servico')->references('id')->on('servicos')
            ->onUpdate('restrict')->onDelete('cascade');

            $table->unsignedBigInteger('id_agendamento');
            $table->foreign('id_agendamento')->references('id')->on('agendamentos')
            ->onUpdate('restrict')->onDelete('cascade');

            $table->primary(['id_servico', 'id_agendamento']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicos_agendamentos');
    }
};
