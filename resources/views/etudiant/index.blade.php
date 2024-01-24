@extends('layouts.layout')
@section('content')

<main class="container px-4 py-5 flex-fill">
    <h1 class="h3 mb-3 fw-normal">@lang('lang.btn_student_list')</h1>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">@lang('lang.table_student_name')</th>
                    <th scope="col">@lang('lang.table_student_address')</th>
                    <th scope="col">@lang('lang.table_student_email')</th>
                    <th scope="col">@lang('lang.table_student_phone')</th>
                    <th scope="col">@lang('lang.table_student_town')</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
        @forelse($etudiants as $etudiant)
        <tr>
            <th scope="row">{{ $etudiant->id }}</th>
            <td><a href="{{ route('etudiant.show', $etudiant->id) }}" class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover text-black">{{ $etudiant->etudiantHasUser?->name }}</a></td>
            <td>{{ $etudiant->adresse }}</td>
            <td>{{ $etudiant->phone }}</td>
            <td>{{ $etudiant->etudiantHasUser?->email }}</td>
            <td>{{ $etudiant->etudiantHasVille?->nom }}</td>
            <td>
                <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="bi bi-trash"></i>
                </button>
            </td>
        </tr>

        @empty
        <div class="text-danger">Aucun étudiant disponible</div>
        @endforelse
            </tbody>
        </table>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">
                            @lang('lang.btn_delete_student_text')
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @lang('lang.btn_delete_student_confirm')
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            @lang('lang.btn_delete_student_cancel')
                        </button>
                        <form action="{{ route('etudiant.destroy', $etudiant->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="@lang('lang.btn_delete_student')" class="btn btn-outline-danger">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            {{ $etudiants->links() }}
        </div>

</main>
@endsection
