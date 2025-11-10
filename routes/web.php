<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class, 'index'])->name('home');

Route::get('/dashboard', [AuthenticatedSessionController::class, 'redirectToDashboard'])->name('dashboard');

Route::get('/admin/login-direct', function () {
    // $admin = User::where('role', 'admin')->first();

    // if ($admin) {
    //     Auth::login($admin);
    //     return redirect()->route('admin.dashboard');
    // }

    return view('auth.login');
    // redirect('/')->with('error', 'Compte admin introuvable.');
})->name('admin.login.direct');


require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
require __DIR__.'/client.php';
?>
