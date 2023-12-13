@extends('layouts.layout')
@section('content')

<main class="form-signin w-100 m-auto">

        <form>
            <h1 class="h3 mb-3 fw-normal">Veuillez se connecter</h1>
          <div class="form-floating">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Adresse courriel</label>
          </div>
          <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Mot de passe</label>
          </div>
    
          <button class="btn btn-primary w-100 py-2" type="submit">Se connecter</button>
        </form>

    </main>

@endsection