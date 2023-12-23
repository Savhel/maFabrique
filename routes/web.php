<?php

use App\Livewire\Actions\Logout;
use App\Livewire\FormulaireDynamique;
use App\Livewire\Manager\AjoutUtilisateur;
use App\Livewire\Manager\FabricationProduits;
use App\Livewire\Manager\ListeCommandes;
use App\Livewire\Manager\ListeGerants;
use App\Livewire\Manager\ListEmployes;
use App\Livewire\Manager\ListMagazin;
use App\Livewire\Manager\ListProduits;
use App\Livewire\Manager\ModifierUtilisateur;
use App\Livewire\Manager\NouvelleCommandes;
use App\Livewire\Manager\RetraitProduits;
use App\Livewire\PageErreurs;
use App\Livewire\RegisterPage;
use App\Livewire\WelcomePage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/logout', function () {
    Auth::logout();

    session()->invalidate();

    session()->regenerateToken();

    return redirect('/');
})->name('logout');

Route::get('/', WelcomePage::class);

Route::get('magazin', ListMagazin::class)->middleware(['auth'])->name('magazin');

Route::get('produits', ListProduits::class)->middleware(['auth'])->name('produits');

Route::get('employes', ListEmployes::class)->middleware(['auth'])->name('employes');

Route::get('enregistrer', RegisterPage::class)->middleware(['auth'])->name('enregistrer');

Route::get('login', WelcomePage::class)->name('login');

Route::get('erreurs', PageErreurs::class)->middleware(['auth'])->name('erreurs');

Route::get('formulaire', FormulaireDynamique::class)->middleware(['auth'])->name('formumlaireDynamique');

Route::get('ajout', AjoutUtilisateur::class)->middleware(['auth'])->name('ajout');

Route::get('editEmploye', ModifierUtilisateur::class)->middleware(['auth'])->name('editEmploye');

Route::get('fabricationProduit', FabricationProduits::class)->middleware(['auth'])->name('fabricationProduit');

Route::get('retrait', RetraitProduits::class)->middleware(['auth'])->name('retrait');

Route::get('listeGerant', ListeGerants::class)->middleware(['auth'])->name('listeGerant');

Route::get('nouvelleCommande', NouvelleCommandes::class)->middleware(['auth'])->name('nouvelleCommande');

Route::get('listeCommande', ListeCommandes::class)->middleware(['auth'])->name('listeCommande');

// Route::view('/', 'welcome');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

// Route::view('profile', 'profile')
//     ->middleware(['auth'])
//     ->name('profile');

// require __DIR__.'/auth.php';
