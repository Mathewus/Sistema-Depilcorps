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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->date('data_nasc')->nullable();
            $table->enum('sexo', ['masculino','feminino']);
            $table->string('email')->unique()->nullable();
            $table->char('telefone', 20);
            $table->char('telefone_contato', 20)->nullable();
            $table->string('cidade')->nullable();
            $table->string('estado')->nullable();
            $table->string('logradouro')->nullable();
            $table->string('bairro')->nullable();
            $table->char('cep', 10)->nullable();

            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')
            ->onUpdate('restrict')->onDelete('cascade');
    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
