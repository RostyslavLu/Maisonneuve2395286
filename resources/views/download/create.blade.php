@extends('layouts.layout')
@section('content')

<main class="container col-xl-10 col-xxl-8 px-4 py-5 flex-fill">
    <div class="row align-items-center g-lg-5 py-5">
        <div class="col-lg-7 text-center text-lg-start">
            <h1 class="display-4 fw-bold lh-1 mb-3">Téléchargement</h1>
            <p class="col-lg-10 fs-4">Ajouter un fichier</p>
        </div>
    </div>
    <div class="row">
        @if($errors->has('name'))
        <span class="alert alert-danger">
            {{ $errors->first('name') }}
        </span>
        @endif
        @if($errors->has('file'))
        <span class="alert alert-danger">
            {{ $errors->first('file') }}
        </span>
        @endif
    </div>
    <form method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nom</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Nom du fichier">
        </div>
        <div class="mb-3">
            <label for="file" class="form-label">Fichier</label>
            <input type="file" class="form-control" name="file" id="file">
        </div>
        <div class="mb-3">
            <input type="submit" value="Ajouter" class="btn btn-success">
        </div>
    </form>

</main>

@endsection
