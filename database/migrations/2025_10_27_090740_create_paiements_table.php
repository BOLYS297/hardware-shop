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
        Schema::create('paiements', function (Blueprint $table) {
    $table->id();

    // 🔗 Lien avec la commande
    $table->foreignId('commande_id')->constrained('commandes')->onDelete('cascade');

    // 💳 Informations de paiement
    $table->string('methode'); // exemple : "Stripe", "PayPal", "MTN Mobile Money", "Orange Money", etc.
    $table->decimal('montant', 10, 2); // montant total payé
    $table->string('reference')->unique(); // référence unique du paiement (ex: STRP_12345)
    $table->enum('statut', ['en_attente', 'reussi', 'echoue', 'annule'])->default('en_attente');

    // 🔐 Données optionnelles selon la passerelle
    $table->text('details')->nullable(); // JSON ou texte (ex: reçu, transaction_id...)
    $table->dateTime('date_paiement')->nullable(); // date et heure du paiement
    $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paiements');
    }
};
