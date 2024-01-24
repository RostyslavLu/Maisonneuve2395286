@extends('layouts.layout')
@section('content')

<main class="container px-4 py-5 flex-fill">
    <a href="{{ route('etudiant.index') }}" class="btn btn-outline-primary">@lang('lang.text_return')</a>
    <div class="row">
        <div class="col-12 pt-2">
            <h4 class="display-4 mt-2">
                {{ $etudiant->etudiantHasUser?->name}}
            </h4>
            <hr>
            <p>
                <strong>@lang('lang.student_show_address'): </strong>
                {{ $etudiant->adresse }}
            </p>
            <p>
                <strong>@lang('lang.student_show_phone'): </strong>
                {{ $etudiant->phone }}
            </p>
            <p>
                <strong>@lang('lang.student_show_email'): </strong>
                {{ $etudiant->etudiantHasUser?->email }}
            </p>
            <p>
                <strong>@lang('lang.student_show_birthdate'): </strong>
                {{ $etudiant->date_naissance }}
            </p>
            <p>
                <strong>@lang('lang.student_show_town'): </strong>
                {{ $etudiant->etudiantHasVille?->nom }}
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <a href="{{ route('etudiant.edit', $etudiant->id) }}" class="btn btn-outline-success">@lang('lang.student_show_btn_edit')</a>
        </div>
        <div class="col-6 text-right">
            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                @lang('lang.btn_delete_student')
            </button>

        </div>

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
</div>

</main>


@endsection
