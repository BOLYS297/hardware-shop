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
        Schema::create('panier_produit', function (Blueprint $table) {
            $table->id();

            // Lien vers le panier concerné
            $table->foreignId('panier_id')->constrained('paniers')->onDelete('cascade');

            // Lien vers le produit ajouté
            $table->foreignId('produit_id')->constrained('produits')->onDelete('cascade');

            // Quantité de ce produit dans le panier
            $table->integer('quantite')->default(1);

            // Prix unitaire au moment de l’ajout (utile si le prix du produit change plus tard)
            $table->decimal('prix_unitaire', 10, 2);

            // Total partiel (quantité × prix_unitaire)
            $table->decimal('sous_total', 10, 2)->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('panier_produit');
    }
};
