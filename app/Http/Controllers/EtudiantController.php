<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $etudiants = Etudiant::select()->paginate(15);

        $urlid = "etudiant-desc";
        $urlnom = "etudiant-nom-asc";
        $urlville = "etudiant-ville-asc";
        $icon_id = "bi bi-arrow-up-short";
        $icon_nom = "";
        $icon_ville = "";
        return view('etudiant.index', compact('etudiants', 'urlid', 'urlnom', 'urlville', 'icon_id', 'icon_nom', 'icon_ville'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $villes = DB::table('villes')->select()->get();
        return view('etudiant.create', compact('villes'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newUser = User::create([
            'name' => $request->nom,
            'email' => $request->email,
            'password' => bcrypt('12345678'),
        ]);
        $newEtudiant = Etudiant::create([
            'nom' => $request->nom,
            'adresse' => $request->adresse,
            'phone' => $request->phone,
            'email' => $request->email,
            'date_naissance' => $request->date_naissance,
            'ville_id' => $request->ville_id,
            'user_id' => $newUser->id
        ]);
        return redirect()->route('etudiant.show', $newEtudiant->id)->withSuccess('Etudiant créé avec succès');
            }

    /**
     * Display the specified resource.
     */
    public function show(Etudiant $etudiant)
    {
        //
        $etudiant = Etudiant::select()->where('id', $etudiant->id)->first();
        return view('etudiant.show', compact('etudiant'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Etudiant $etudiant)
    {
        //
        $villes = DB::table('villes')->select()->get();
        return view('etudiant.edit', compact('etudiant', 'villes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Etudiant $etudiant)
    {
        //
        $etudiant->update([
            'nom' => $request->nom,
            'adresse' => $request->adresse,
            'phone' => $request->phone,
            'email' => $request->email,
            'date_naissance' => $request->date_naissance,
            'ville_id' => $request->ville_id
        ]);
        return redirect()->route('etudiant.show', $etudiant->id)->withSuccess('Etudiant modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Etudiant $etudiant)
    {
        //
        $etudiant->delete();
        return redirect()->route('etudiant.index')->withSuccess('Etudiant supprimé avec succès');
    }
}
