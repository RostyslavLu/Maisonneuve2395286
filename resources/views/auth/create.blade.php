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
        <div class="col-12">
          <input type="submit" value="Sauvegarder" class="btn btn-success">
        </div>
      </form>

</main>

@endsection