@extends('layouts.layout')
@section('content')

<div class="container-lg mt-5">
    <table class="table table-hover">
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
        <td><a href="{{ route('etudiant.show', $etudiant->id) }}" class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover text-black">{{ $etudiant->nom }}</a></td>
        <td>{{ $etudiant->adresse }}</td>
        <td>{{ $etudiant->phone }}</td>
        <td>{{ $etudiant->email }}</td>
        <td>{{ $etudiant->etudiantHasVille?->nom }}</td>
    </tr>
    
    @empty
    <div class="text-danger">Aucun étudiant disponible</div>
    @endforelse
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $etudiants->links() }}
    </div>


</div>
@endsection