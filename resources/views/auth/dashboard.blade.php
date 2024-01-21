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
                    <li class="list-group-item">{{ $user->email }}</li>
                    <li class="list-group-item">{{ $user->address }}</li>
                    <li class="list-group-item">{{ $user->phone }}</li>
                    <li class="list-group-item">{{ $user->date_naissance }}</li>
                    <li class="list-group-item">{{ $user->ville }}</li>
                </ul>
            </div>
            <div class="col">
            </div>
        </div>
    </main>
@endsection
