@extends('layouts.layout')
@section('content')

<main class="container mt-5 flex-fill">
    <h1 class="text-center m-4">Modifier des données d'un étudiant </h1>
    <form method="post">
        @method('PUT')
        @csrf
        <div class="row mb-3">
            <label for="nom" class="col-sm-2 col-form-label">Nom</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="nom" id="nom" value="{{ $etudiant->nom }}">
            </div>
        </div>
        <div class="row mb-3">
            <label for="adresse" class="col-sm-2 col-form-label">Adresse</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="adresse" id="adresse" value="{{ $etudiant->adresse }}">
            </div>
        </div>
        <div class="row mb-3">
            <label for="phone" class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="phone" id="phone" value="{{ $etudiant->phone }}">
            </div>
        </div>
        <div class="row mb-3">
            <label for="email" class="col-sm-2 col-form-label">Courriel</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" name="email" id="email" value="{{ $etudiant->email }}">
            </div>
        </div>
        <div class="row mb-3">
            <label for="date_naissance" class="col-sm-2 col-form-label">Date de naissance</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" name="date_naissance" id="date_naissance" value="{{ $etudiant->date_naissance }}">
            </div>
        </div>
        <div class="row mb-3">
            <label for="ville_id" class="col-sm-2 col-form-label">Ville</label>
            <div class="col-sm-10">
                <select class="form-select" name="ville_id" aria-label="Default select example">
                    <option selected>Choisir une ville...</option>
                    @foreach($villes as $ville)
                    <option value="{{ $ville->id }}" @if($ville->id == $etudiant->ville_id) selected @endif>{{ $ville->nom }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col mb-3">
            <input type="submit" value="Modifier" class="btn btn-success">
        </div>
    </form>
</main>

@endsection