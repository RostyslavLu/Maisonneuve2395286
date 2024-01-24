@extends('layouts.layout')
@section('content')

<main class="container col-xl-10 col-xxl-8 px-4 py-5 flex-fill">
    <div class="row align-items-center g-lg-5 py-5">
        <div class="col-lg-7 text-center text-lg-start">
            <h1 class="display-4 fw-bold lh-1 mb-3">Téléchargement</h1>
            <p class="col-lg-10 fs-4">Liste des fichiers</p>
        </div>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Créé le</th>
                <th>Modifié le</th>
                <th>Author</th>
                <th>Télécharger</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($files as $file)
            <tr>
                <td>{{ $file->name }}</td>
                <td>{{ $file->created_at }}</td>
                <td>{{ $file->updated_at }}</td>
                <td>{{ $file->downloadHasUser?->name }}</td>
                <td><a href="/download-file/{{ $file->id }}" class="btn btn-primary">Télécharger</a></td>
            </tr>
            @empty
            <div class="alert alert-danger">
                <p>Aucun fichier</p>
            </div>
            @endforelse
        </tbody>
    </table>
    {{ $files->links() }}
    <div class="d-flex justify-content-end mt-3">
        <a href="/download-create" class="btn btn-primary">Ajouter un fichier</a>
    </div>
</main>

@endsection
