@extends('layouts.layout')
@section('content')

<main class="container px-4 py-5 flex-fill">
    <h1 class="h3 mb-3 fw-normal">Formulaire d'inscription</h1>
    <form class="row g-3" method="post">
      @csrf
      <div class="col-md-12">
        <label for="name" class="form-label">Nom</label>
        <input type="text" name="name" class="form-control" id="name">
          @if($errors->has('name'))
          <span class="alert alert-danger">
              {{ $errors->first('name') }}
          </span>
          @endif
      </div>
        <div class="col-md-6">
          <label for="email" class="form-label">Courriel</label>
          <input type="email" name="email" class="form-control" id="email">
            @if($errors->has('email'))
            <span class="alert alert-danger">
                {{ $errors->first('email') }}
            </span>
            @endif
        </div>
        <div class="col-md-6">
          <label for="password" class="form-label">Mot de passe</label>
          <input type="password" class="form-control" name="password">
            @if($errors->has('password'))
            <span class="alert alert-danger">
                {{ $errors->first('password') }}
            </span>
            @endif
        </div>
        <div class="col-md-12">
          <label for="adresse" class="form-label">Adresse</label>
          <input type="text" class="form-control" name="adresse">
            @if($errors->has('address'))
            <span class="alert alert-danger">
                {{ $errors->first('address') }}
            </span>
            @endif
        </div>
        <div class="col-md-6">
          <label for="phone" class="form-label">Téléphone</label>
          <input type="text" class="form-control" name="phone">
            @if($errors->has('phone'))
            <span class="alert alert-danger">
                {{ $errors->first('phone') }}
            </span>
            @endif
        </div>
        <div class="col-md-6">
          <label for="date_naissance" class="form-label">Date de naissance</label>
          <input type="date" class="form-control" name="date_naissance">
            @if($errors->has('date_naissance'))
            <span class="alert alert-danger">
                {{ $errors->first('date_naissance') }}
            </span>
            @endif
        </div>
        <div class="col-md-6">
          <label for="ville_id" class="form-label">Ville</label>
          <select class="form-select" name="ville_id" aria-label="Default select example">
            <option selected>Choisir une ville...</option>
            @foreach($villes as $ville)
            <option value="{{ $ville->id }}">{{ $ville->nom }}</option>
            @endforeach
          </select>
            @if($errors->has('ville_id'))
            <span class="alert alert-danger">
                {{ $errors->first('ville_id') }}
            </span>
            @endif
        </div>
        <div class="col-12">
          <input type="submit" value="Sauvegarder" class="btn btn-success">
        </div>
      </form>

</main>

@endsection