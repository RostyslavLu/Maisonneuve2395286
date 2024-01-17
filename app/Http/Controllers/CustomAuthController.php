<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Etudiant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\DB;

//use Illuminate\Validation\Rules\Password;

class CustomAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('/auth/login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $villes = DB::table('villes')->select()->get();
        return view('auth.create', compact('villes'));
    }

    public function authentication(Request $request)
    {
        $request->validate([
            'email' => 'email|required',
        ]);
        
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'min:2 | max:45',
            'email' => 'email|required|unique:users',
            'password' => ['required', 'max:20'],
            'adresse' => 'min:2 | max:100 | required',
            'phone' => 'min:10 | max:20 | required',
            'date_naissance' => 'required',
            'ville_id' => 'required',
        ]);
        $newUser = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make ( $request->password ),
        ]);
        $newEtudiant = Etudiant::create([
            'adresse' => $request->adresse,
            'phone' => $request->phone,
            'date_naissance' => $request->date_naissance,
            'ville_id' => $request->ville_id,
            'user_id' => $newUser->id
        ]);
        
        return redirect()->route('etudiant.show', $newEtudiant->id)->withSuccess('Etudiant créé avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
