<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Etudiant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if(!Auth::validate($credentials)){
            return back()->withErrors([
                'email' => 'Les informations d\'identification fournies ne correspondent pas à nos enregistrements.'
            ]);
        }
        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::login($user);
        if ($user->role == 1) {
            $user->assignRole('Admin');
        } elseif ($user->role == 2) {
            $user->assignRole('Editor');
        }
        return redirect()->route('dashboard');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'confirmed', Password::min(8)->letters()->mixedCase()->numbers()->symbols()]
        ]);
        $newUser = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('login')->with('success', 'Votre compte a été créé avec succès');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function dashboard(Etudiant $etudiant)
    {
        $id = Auth::user()->id;
        $etudiant = Etudiant::select()->where('user_id', $id)->first();

        $forums = DB::table('forums')->select()->where('user_id', $id)->paginate(5);
        $files = DB::table('downloads')->select()->where('user_id', $id)->paginate(5);

        if(!$etudiant){
            $user = User::select()->where('id', $id)->first();
            $user->address = 'Non renseigné';
            $user->phone = 'Non renseigné';
            $user->date_naissance = 'Non renseigné';
        } else {
            $user = User::select()->where('id', $id)->first();
            $user->address = $etudiant->adresse;
            $user->phone = $etudiant->phone;
            $user->date_naissance = $etudiant->date_naissance;
            $ville = DB::table('villes')->select()->where('id', $etudiant->ville_id)->first();
            $user->ville = $ville->nom;
        }


        return view('auth.dashboard', compact('user', 'forums', 'files'));
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
