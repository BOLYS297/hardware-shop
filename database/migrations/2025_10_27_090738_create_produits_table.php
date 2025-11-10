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
       Schema::create('produits', function (Blueprint $table) {
            $table->id();

            // 🔗 Lien avec la catégorie
            $table->foreignId('categorie_id')->constrained('categories')->onDelete('cascade');

            // 🛠️ Informations de base du produit
            $table->string('nom');
            $table->text('description')->nullable();
            $table->decimal('prix', 10, 2);
            $table->integer('stock')->default(0);
            $table->string('reference')->unique(); // Référence unique du produit
            $table->string('marque')->nullable();

            // 🖼️ Gestion des images
            $table->string('image_principale')->nullable(); // URL ou chemin vers l'image
            $table->json('images')->nullable(); // autres images (tableau JSON)

            // ⚙️ État du produit
            $table->boolean('est_actif')->default(true)->nullable(); // visible ou non sur le site

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};
