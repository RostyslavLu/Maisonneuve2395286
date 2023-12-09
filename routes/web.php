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
    )->name('etudiant.update');