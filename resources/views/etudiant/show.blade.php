@extends('layouts.layout')
@section('content')

<main class="container px-4 py-5 flex-fill">
    <a href="{{ route('etudiant.index') }}" class="btn btn-outline-primary">Returner</a>
    <div class="row">
        <div class="col-12 pt-2">
            <h4 class="display-4 mt-2">
                {{ $etudiant->nom }}
            </h4>
            <hr>
            <p>
                <strong>Adresse: </strong>
                {{ $etudiant->adresse }}
            </p>
            <p>
                <strong>Phone: </strong>
                {{ $etudiant->phone }}
            </p>
            <p>
                <strong>Courriel: </strong>
                {{ $etudiant->email }}
            </p>
            <p>
                <strong>Date de naissance: </strong>
                {{ $etudiant->date_naissance }}
            </p>
            <p>
                <strong>Ville: </strong>
                {{ $etudiant->etudiantHasVille?->nom }}
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <a href="{{ route('etudiant.edit', $etudiant->id) }}" class="btn btn-outline-success">Modifier</a>
        </div>
        <div class="col-6 text-right">
            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Supprimer
            </button>
    
        </div>
    
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">
                            Confirmation de suppression
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Vous êtes sûr de vouloir supprimer cet étudiant?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Annuler
                        </button>
                        <form action="{{ route('etudiant.destroy', $etudiant->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Supprimer" class="btn btn-outline-danger">
    
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>

</main>


@endsection