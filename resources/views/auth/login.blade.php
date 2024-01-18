@extends('layouts.layout')
@section('content')

<main class="form-signin w-100 m-auto">

        <form action="{{ route('authentication') }}" method="post">
          @csrf
            <h1 class="h3 mb-3 fw-normal">Veuillez se connecter</h1>
          <div class="form-floating">
            <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com" value="{{ old('email') }}">
            <label for="floatingInput">Adresse courriel</label>
            @if($errors->has('email'))
            <span class="alert alert-danger">
                {{ $errors->first('email') }}
            </span>
            @endif
            
          </div>
          <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" value="{{ old('password') }}">
            <label for="floatingPassword">Mot de passe</label>
            @if($errors->has('password'))
            <span class="alert alert-danger">
                {{ $errors->first('password') }}
            </span>
            @endif
          </div>
    
          <button class="btn btn-primary w-100 py-2" type="submit">Se connecter</button>
        </form>

    </main>

@endsection