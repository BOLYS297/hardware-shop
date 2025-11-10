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
        Schema::create('livraisons', function (Blueprint $table) {
    $table->id();

    // 🔗 Lien avec la commande
    $table->foreignId('commande_id')->constrained('commandes')->onDelete('cascade');

    // 📦 Informations sur la livraison
    $table->string('transporteur')->nullable(); // exemple : DHL, FedEx, CamPost
    $table->string('numero_suivi')->nullable(); // tracking number
    $table->date('date_expedition')->nullable();
    $table->date('date_livraison_prevue')->nullable();
    $table->date('date_livraison_effective')->nullable();

    // ⚙️ Statut de livraison
    $table->enum('statut', ['en_attente', 'en_cours', 'expédiée', 'livrée', 'annulée'])
          ->default('en_attente');

    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livraisons');
    }
};
