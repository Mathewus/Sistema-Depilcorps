<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('tipo', ['admin','simples']);
            $table->enum('status', ['ativo','inativo']);
            $table->string('foto')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        // Inserir um registro de usuário

        User::create([
            'nome' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'tipo' => 'admin',
            'status' => 'ativo',
            'foto' => null,
            'created_at' => null,
            'updated_at' => null,
        ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
