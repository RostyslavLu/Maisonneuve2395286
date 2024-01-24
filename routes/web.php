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
    )->name('etudiant.index')->middleware('can:edit-users');
// route page formulaire de création d'un étudiant
Route::get(
    '/etudiant-create',
    [App\Http\Controllers\EtudiantController::class, 'create']
    )->name('etudiant.create')->middleware('can:create-users');
// route stockage des données du formulaire de création d'un étudiant
Route::post(
    '/etudiant-create',
    [App\Http\Controllers\EtudiantController::class, 'store']
    )->name('etudiant.store')->middleware('can:create-users');
// route page show d'un étudiant
Route::get(
    '/etudiant/{etudiant}',
    [App\Http\Controllers\EtudiantController::class, 'show']
    )->name('etudiant.show')->middleware('can:edit-users');
// route page formulaire d'édition d'un étudiant
Route::get(
    '/etudiant-edit/{etudiant}',
    [App\Http\Controllers\EtudiantController::class, 'edit']
    )->name('etudiant.edit')->middleware('can:edit-users');
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
    )->name('dashboard')->middleware('auth');
// route pour afficher la page de forum
Route::get(
    '/forum',
    [App\Http\Controllers\ForumController::class, 'index']
    )->name('forum.index')->middleware('auth');
// route pour afficher la page de création de forum
Route::get('/forum-create',
    [App\Http\Controllers\ForumController::class, 'create']
    )->name('forum.create')->middleware('auth');
// route pour stocker les données du formulaire de création de forum
Route::post('/forum-create',
    [App\Http\Controllers\ForumController::class, 'store']
    )->name('forum.store')->middleware('auth');
// route pour afficher la page d'édition de forum
Route::get('/forum-edit/{forum}',
    [App\Http\Controllers\ForumController::class, 'edit']
    )->name('forum.edit');
// route pour stocker les données du formulaire d'édition de forum
Route::put('/forum-edit/{forum}',
    [App\Http\Controllers\ForumController::class, 'update']
    )->name('forum.edit');
// route pour supprimer un forum
Route::delete('/forum-delete/{forum}',
    [App\Http\Controllers\ForumController::class, 'destroy']
    )->name('forum.destroy');
// route pour afficher la page show d'un forum
Route::get('/forum/{forum}',
    [App\Http\Controllers\ForumController::class, 'show']
    )->name('forum.show')->middleware('auth');
// routes pour afficher les pages par catégorie
Route::get('/forum_1',
    [App\Http\Controllers\ForumController::class, 'forum_1']
    )->name('forum_1');

Route::get('/forum_2',
    [App\Http\Controllers\ForumController::class, 'forum_2']
    )->name('forum_2');

Route::get('/forum_3',
    [App\Http\Controllers\ForumController::class, 'forum_3']
    )->name('forum_3');

Route::get('/forum_4',
    [App\Http\Controllers\ForumController::class, 'forum_4']
    )->name('forum_4');

Route::get('/forum_5',
    [App\Http\Controllers\ForumController::class, 'forum_5']
    )->name('forum_5');
Route::get('/download',
    [App\Http\Controllers\DownloadController::class, 'index']
    )->name('download.index')->middleware('auth');
