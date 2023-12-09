@extends('layouts.layout')
@section('content')

@forelse($etudiants as $etudiant)
<div>{{ $etudiant->nom }}</div>
@empty
<li class="text-danger">Aucun étudiant disponible</li>
@endforelse

@endsection