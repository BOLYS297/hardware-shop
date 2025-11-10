<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\{
    AdresseController,
    ClientController,
    CompteController,
    ProduitController,
    CommandeController,
    PanierController,
    WishlistController,
    PaiementController,
    UserController
};
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RechercheController;

Route::middleware(['auth', 'role:client'])->group(function () {
    // Dashboard et profil utilisateur
    Route::get('/dashboard', [UserController::class, 'index'])->name('client.dashboard');
    Route::get('/profile', [UserController::class, 'showProfile'])->name('client.profile');
    Route::get('/mes-commandes', [UserController::class, 'commandes'])->name('client.commandes');

    // Gestion du compte
    Route::get('/client/compte', [CompteController::class, 'profil'])->name('client.compte');
    Route::put('/client/compte', [CompteController::class, 'update'])->name('client.compte.update');
    Route::put('/client/compte', [ProfileController::class, 'edit'])->name('client.compte.edit');

    // Produits
    Route::get('/client/produits', [ProduitController::class, 'index'])->name('client.produits');
    Route::get('/client/produits/{id}', [ProduitController::class, 'show'])->name('client.produits.show');

    // Panier
    Route::get('/client/panier', [PanierController::class, 'index'])->name('client.panier');
    Route::post('/panier/ajouter/{id}', [App\Http\Controllers\Client\PanierController::class, 'ajouterAjax'])->name('panier.ajouter.ajax');
    Route::post('/client/panier/ajouter/{produit}', [PanierController::class, 'ajouterAjax'])->name('client.panier.ajouter');
    Route::delete('/client/panier/supprimer/{produit}', [PanierController::class, 'supprimer'])->name('client.panier.supprimer');
    Route::post('/client/panier/update/{produit}', [PanierController::class, 'update'])->name('client.panier.update');
    // Wishlist
    Route::get('/client/wishlist', [WishlistController::class, 'index'])->name('client.wishlist');
    Route::post('/client/wishlist/add/{id}', [WishlistController::class, 'add'])->name('client.wishlist.add');
    Route::delete('/client/wishlist/remove/{id}', [WishlistController::class, 'remove'])->name('client.wishlist.remove');

    // Paiement
    Route::resource('/client/paiements', PaiementController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
    //     ->name('logout');
});

Route::middleware(['auth', 'role:client'])
    ->prefix('client')
    ->name('client.')
    ->group(function () {

        // Commandes
        Route::get('/commandes', [CommandeController::class, 'index'])->name('commandes');
        Route::get('/commandes/choisir-adresse', [CommandeController::class, 'choisirAdresse'])->name('commandes.choisir_adresse');
        Route::get('/commandes/{id}', [CommandeController::class, 'show'])->name('commandes.show');
        Route::post('/commandes', [CommandeController::class, 'store'])->name('commandes.store');
        Route::get('/commandes/confirmation/{id}', [CommandeController::class, 'confirmation'])->name('commandes.confirmation');
        
        // Adresses
        Route::get('/adresses', [AdresseController::class, 'index'])->name('adresses.index');
        Route::get('/adresses/create', [AdresseController::class, 'create'])->name('adresses.create');
        Route::post('/adresses', [AdresseController::class, 'store'])->name('adresses.store');
});

  Route::get('/contact',[ContactController::class,'show'])->name('client.contact');
  Route::get('/blog',[RechercheController::class,'show'])->name('client.blog');
  Route::get('/about',[RechercheController::class,'show'])->name('client.about');
  Route::get('/panier/modal', [PanierController::class, 'getPanierModal'])->name('panier.modal');

