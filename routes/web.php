<?php

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
// route page d'accueil
Route::get('/',
    function() {
    return view('home');
});
// route page liste des étudiants
Route::get(
    '/etudiant',
    [App\Http\Controllers\EtudiantController::class, 'index']
    )->name('etudiant.index');
// route page formulaire de création d'un étudiant
Route::get(
    '/etudiant-create',
    [App\Http\Controllers\EtudiantController::class, 'create']
    )->name('etudiant.create');
// route stockage des données du formulaire de création d'un étudiant
Route::post(
    '/etudiant-create',
    [App\Http\Controllers\EtudiantController::class, 'store']
    )->name('etudiant.store');
// route page show d'un étudiant
Route::get(
    '/etudiant/{etudiant}',
    [App\Http\Controllers\EtudiantController::class, 'show']
    )->name('etudiant.show');
// route page formulaire d'édition d'un étudiant
Route::get(
    '/etudiant-edit/{etudiant}',
    [App\Http\Controllers\EtudiantController::class, 'edit']
    )->name('etudiant.edit');
// route stockage des données du formulaire d'édition d'un étudiant
Route::put(
    '/etudiant-edit/{etudiant}',
    [App\Http\Controllers\EtudiantController::class, 'update']
    )->name('etudiant.edit');
// route suppression d'un étudiant
Route::delete(
    '/etudiant-delete/{etudiant}',
    [App\Http\Controllers\EtudiantController::class, 'destroy']
    )->name('etudiant.destroy');
// route page pour se connecter
Route::get(
    '/login',
    [App\Http\Controllers\CustomAuthController::class, 'index']
    )->name('login');
// route pour s'incrire
Route::get(
    '/registration',
    [App\Http\Controllers\CustomAuthController::class, 'create']
    )->name('registration');

// route pour enregistrer les données du formulaire d'inscription
Route::post(
    '/registration',
    [App\Http\Controllers\CustomAuthController::class, 'store']
    )->name('registration.store');
// route pour se connecter
Route::post(
    '/login',
    [App\Http\Controllers\CustomAuthController::class, 'authentication']
    )->name('authentication');
// route pour se deconnecter
Route::get(
    '/logout',
    [App\Http\Controllers\CustomAuthController::class, 'logout']
    )->name('logout');
// route pour afficher la page de profil
Route::get(
    '/dashboard',
    [App\Http\Controllers\CustomAuthController::class, 'dashboard']
    )->name('dashboard');
Route::get(
    '/forum',
    [App\Http\Controllers\ForumController::class, 'index']
    )->name('forum.index');

