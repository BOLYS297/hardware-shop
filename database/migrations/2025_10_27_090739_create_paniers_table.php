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
        Schema::create('paniers', function (Blueprint $table) {
            $table->id();

            // Lien avec l'utilisateur (peut être null si le visiteur n'est pas connecté)
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');

            // Pour identifier un panier temporaire d'un visiteur non connecté
            $table->string('session_id')->nullable();

            // Montant total du panier
            $table->decimal('total', 10, 2)->default(0);

            // Statut du panier (ex: actif, validé, annulé)
            $table->enum('status', ['actif', 'validé', 'annulé'])->default('actif');

            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paniers');
    }
};
