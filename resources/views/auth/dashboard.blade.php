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
                <h2 class="col-lg-10 fs-4">Forums créer par utilisateur</h2>
                <div class="d-flex justify-content-end mt-3">
                    <ul>
                        @forelse($forums as $forum)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a href="/forum/{{ $forum->id }}" class="btn btn-link">{{ $forum->titre }}</a>
                            </li>
                        @empty
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <p>Aucun forum créer par cet utilisateur</p>
                            </li>
                        @endforelse
                    </ul>
                </div>
            </div>
    </main>
@endsection
