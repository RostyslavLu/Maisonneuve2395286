@extends('layouts.layout')
@section('content')

<div class="container-lg mt-5">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nom</th>
                <th scope="col">Adresse</th>
                <th scope="col">Phone</th>
                <th scope="col">Courriel</th>
                <th scope="col">Ville</th>
            </tr>
        </thead>
        <tbody>
    @forelse($etudiants as $etudiant)
    <tr>
        <th scope="row">{{ $etudiant->id }}</th>
        <td>{{ $etudiant->nom }}</td>
        <td>{{ $etudiant->adresse }}</td>
        <td>{{ $etudiant->phone }}</td>
        <td>{{ $etudiant->email }}</td>
        <td>{{ $etudiant->ville_id }}</td>
    </tr>
    
    @empty
    <div class="text-danger">Aucun étudiant disponible</div>
    @endforelse
        </tbody>
    </table>

{{ $etudiants->links() }}

</div>
@endsection