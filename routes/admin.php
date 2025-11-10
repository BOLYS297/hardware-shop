<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProduitController;
use App\Http\Controllers\Admin\CategorieController;
use App\Http\Controllers\Admin\CommandeAdminController;
use App\Http\Controllers\Admin\PaiementAdminController;
use App\Http\Controllers\Admin\LivraisonController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\ParametreController;
use App\Http\Controllers\Admin\StatistiqueController;
use App\Http\Controllers\Admin\CompteController as AdminCompteController;

Route::prefix('admin')->middleware(['auth','is_admin'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::resource('produits', ProduitController::class)->names([
        'index'=>'admin.produits.index',
        'create'=>'admin.produits.create',
        'store'=>'admin.produits.store',
        'show'=>'admin.produits.show',
        'edit'=>'admin.produits.edit',
        'update'=>'admin.produits.update',
        'destroy'=>'admin.produits.destroy',
    ]);
    Route::resource('categories', CategorieController::class)->names([
        'index'=>'admin.categories.index',
        'create'=>'admin.categories.create',
        'store'=>'admin.categories.store',
        'show'=>'admin.categories.show',
        'edit'=>'admin.categories.edit',
        'update'=>'admin.categories.update',
        'destroy'=>'admin.categories.destroy',
    ]);
    Route::resource('commandes', CommandeAdminController::class)->names([
        'index'=>'admin.commandes.index',
        'store'=>'admin.commandes.store',
        'show'=>'admin.commandes.show',
        'edit'=>'admin.commandes.edit',
        'destroy'=>'admin.commandes.destroy',
    ]);
    Route::resource('paiements', PaiementAdminController::class)->names([
        'index'=>'admin.paiements.index',
        'create'=>'admin.paiements.create',
        'store'=>'admin.paiements.store',
        'show'=>'admin.paiements.show',
        'edit'=>'admin.paiements.edit',
        'update'=>'admin.paiements.update',
        'destroy'=>'admin.paiements.destroy',
    ]);
    Route::resource('livraisons', LivraisonController::class)->names([
        'index'=>'admin.livraisons.index',
        'create'=>'admin.livraisons.create',
        'store'=>'admin.livraisons.store',
        'show'=>'admin.livraisons.show',
        'edit'=>'admin.livraisons.edit',
    ]);
    Route::resource('users', AdminUserController::class)->names([
        'index'=>'admin.users.index',
        'show'=>'admin.users.show',
        'edit'=>'admin.users.edit',
        'destroy'=>'admin.users.destroy',
    ]);
    Route::get('statistiques', [StatistiqueController::class, 'index'])->name('admin.statistiques');

    // paramètres & compte admin
    Route::get('parametres', [ParametreController::class, 'index'])->name('admin.parametres');
    Route::post('parametres', [ParametreController::class, 'update'])->name('admin.parametres.update');

    Route::get('compte', [AdminCompteController::class, 'profil'])->name('admin.compte');
    Route::post('compte/update', [AdminCompteController::class, 'update'])->name('admin.compte.update');
});
