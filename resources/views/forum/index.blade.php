@extends('layouts.layout')
@section('content')

<main class="container col-xl-10 col-xxl-8 px-4 py-5 flex-fill">
    <ul class="list-group">
    @foreach ($categories as $category)
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <a href="#" class="btn btn-link">{{ $category->name }}</a>
        <span class="badge bg-primary rounded-pill">{{ $category->forums_count }}</span>
    </li>
    @endforeach
    </ul>
    <div class="d-flex justify-content-end mt-3">
        <a href="/forum/create" class="btn btn-primary">Créer un forum</a>
    </div>
</main>

@endsection
