@extends('layouts.layout')
@section('content')
    <main class="container col-xl-10 col-xxl-8 px-4 py-5 flex-fill">
        <div class="">
            <h1 class="col-lg-10 fs-4">Bonjour&nbsp;{{ $user->name }}</h1>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                <h2 class="col-lg-10 fs-4">Informations personnelles</h2>
                <ul class="list-group">
                    <li class="list-group-item"><strong>Courriel:</strong>&nbsp;{{ $user->email }}</li>
                    <li class="list-group-item"><strong>Adresse:</strong>&nbsp;{{ $user->address }}</li>
                    <li class="list-group-item"><strong>Téléphone:</strong>&nbsp;{{ $user->phone }}</li>
                    <li class="list-group-item"><strong>Date de naissance:</strong>&nbsp;{{ $user->date_naissance }}</li>
                    <li class="list-group-item"><strong>Ville:</strong>&nbsp;{{ $user->ville }}</li>
                </ul>
            </div>
            <div class="col">
            </div>
        </div>
    </main>
@endsection
