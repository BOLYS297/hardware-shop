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
       Schema::create('adresses', function (Blueprint $table) {
    $table->id();

    // 🔗 Lien avec l'utilisateur (chaque adresse appartient à un utilisateur)
    $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

    // 🏠 Informations d'adresse
    $table->string('nom_complet'); // nom du destinataire
    $table->string('telephone');
    $table->string('pays');
    $table->string('ville');
    $table->string('quartier')->nullable(); // exemple : Bonapriso, Bépanda
    $table->string('rue')->nullable(); // optionnel
    $table->string('code_postal')->nullable();

    // 🏷️ Type d’adresse : livraison / facturation (au cas où tu veux en distinguer plus tard)
    $table->enum('type', ['livraison', 'facturation'])->default('livraison');

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adresses');
    }
};
