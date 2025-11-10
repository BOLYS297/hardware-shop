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
       Schema::create('wishlist_produit', function (Blueprint $table) {
            $table->id();

            // Lien avec la wishlist
            $table->foreignId('wishlist_id')->constrained('wishlists')->onDelete('cascade');

            // Lien avec le produit
            $table->foreignId('produit_id')->constrained('produits')->onDelete('cascade');

            // Date à laquelle le produit a été ajouté
            $table->timestamp('ajoute_le')->useCurrent();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wishlist_produit');
    }
};
