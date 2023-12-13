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
// route pour afficher les etudiants dans ordre decroissant par rapport à leur id
Route::get(
    '/etudiant-desc',
    [App\Http\Controllers\EtudiantController::class, 'etudiantdesc']
    )->name('etudiant.etudiantdesc');
// route pour afficher les etudiants dans ordre decroissant par rapport à leur nom
Route::get(
    '/etudiant-nom-desc',
    [App\Http\Controllers\EtudiantController::class, 'etudiantnomdesc']
    )->name('etudiant.etudiantnomdesc');
// route pour afficher les etudiants dans ordre croissant par rapport à leur nom
Route::get(
    '/etudiant-nom-asc',
    [App\Http\Controllers\EtudiantController::class, 'etudiantnomasc']
    )->name('etudiant.etudiantnomasc');
// route pour afficher les etudiants dans ordre croissant par rapport à leur ville
Route::get(
    '/etudiant-ville-asc',
    [App\Http\Controllers\EtudiantController::class, 'etudiantvilleasc']
    )->name('etudiant.etudiantvilleasc');
// route pour afficher les etudiants dans ordre decroissant par rapport à leur ville
Route::get(
    '/etudiant-ville-desc',
    [App\Http\Controllers\EtudiantController::class, 'etudiantvilledesc']
    )->name('etudiant.etudiantvilledesc');