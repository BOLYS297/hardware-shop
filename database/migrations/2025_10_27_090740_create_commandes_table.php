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
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();

            // Lien avec l'utilisateur (client)
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            // Lien avec le panier validé
            $table->foreignId('panier_id')->nullable()->constrained('paniers')->onDelete('set null');

            //lien avec l'adresse
            $table->foreignId('adresse_id')->constrained('adresses')->onDelete('cascade');

            //lien avec le paiement
            $table->foreignId('paiement_id')->constrained('paiements')->onDelete('cascade');

            //lien avec la livraison
            $table->foreignId('livraison_id')->constrained('livraisons')->onDelete('cascade');

            // Numéro de commande unique (utile pour factures, tracking, etc.)
            $table->string('reference')->unique();

            // Montant total de la commande
            $table->decimal('montant_total', 10, 2);

            // Méthode de paiement (ex: carte, mobile money, etc.)
            $table->string('mode_paiement')->nullable();

            // Statut du paiement
            $table->enum('statut_paiement', ['en_attente', 'payé', 'échoué', 'remboursé'])->default('en_attente');

            // Statut de la commande (suivi)
            $table->enum('statut_commande', [
                'en_traitement',
                'expédiée',
                'livrée',
                'annulée'
            ])->default('en_traitement');

            // Adresse de livraison (sera liée plus tard à la table adresses)
            $table->text('adresse_livraison')->nullable();

            // Optionnel : informations supplémentaires (message client, etc.)
            $table->text('notes')->nullable();
            $table->dateTime('date_commande')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandes');
    }
};
