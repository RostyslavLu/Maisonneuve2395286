@extends('layouts.layout')
@section('content')


  <main class="container col-xl-10 col-xxl-8 px-4 py-5 flex-fill">
      <div class="row align-items-center g-lg-5 py-5">
        <div class="col-lg-7 text-center text-lg-start">
          <h1 class="display-4 fw-bold lh-1 text-body-emphasis mb-3">Binevenue!</h1>
          <p class="col-lg-10 fs-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. At rerum eum mollitia esse nulla id exercitationem excepturi impedit! Veritatis soluta architecto doloremque tenetur obcaecati a dolorem qui nihil tempore eaque.</p>
        </div>
        <div class="col-md-10 mx-auto col-lg-5">
          <form class="p-4 p-md-5 border rounded-3 bg-body-tertiary">
            <div class="form-floating mb-3">
              <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
              <label for="floatingInput">Adresse courriel</label>
            </div>
            <div class="form-floating mb-3">
              <input type="password" class="form-control" id="floatingPassword" placeholder="Mot de passe">
              <label for="floatingPassword">Mot de passe</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Se connecter</button>
          </form>
        </div>
      </div>
    </main>


@endsection