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
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            // 🧍 Informations personnelles
            $table->string('nom');
            $table->string('prenom');
            $table->string('email')->unique();
            $table->string('password')->unique();

            // 📞 Coordonnées de base
            $table->string('telephone')->nullable();

            // 🔑 Rôle (client / admin)
            $table->enum('role', ['client', 'admin'])->default('client');

            // 🕒 Colonnes automatiques Laravel
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
