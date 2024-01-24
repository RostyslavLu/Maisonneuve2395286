@extends('layouts.layout')
@section('content')

<main class="container px-4 py-5 flex-fill">
    <h1 class="h3 mb-3 fw-normal">@lang('lang.add_student_text')</h1>
    <form method="post" >
        @csrf
        <div class="row mb-3">
            <label for="nom" class="col-sm-2 col-form-label">@lang('lang.add_student_name')</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="nom" id="nom" placeholder="Nom">
            </div>
        </div>
        <div class="row mb-3">
            <label for="adresse" class="col-sm-2 col-form-label">@lang('lang.add_student_address')</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="adresse" id="adresse" placeholder="123 Nom de rue">
            </div>
        </div>
        <div class="row mb-3">
            <label for="phone" class="col-sm-2 col-form-label">@lang('lang.add_student_email')</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="phone" id="phone" placeholder="438-123-4567">
            </div>
        </div>
        <div class="row mb-3">
            <label for="email" class="col-sm-2 col-form-label">@lang('lang.add_student_email_birthdate')</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
            </div>
        </div>
        <div class="row mb-3">
            <label for="date_naissance" class="col-sm-2 col-form-label">@lang('lang.add_student_phone')</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" name="date_naissance" id="date_naissance">
            </div>
        </div>
        <div class="row mb-3">
            <label for="ville_id" class="col-sm-2 col-form-label">@lang('lang.add_student_town')</label>
            <div class="col-sm-10">
                <select class="form-select" name="ville_id" aria-label="Default select example">
                    <option selected>@lang('lang.add_student_town_select')</option>
                    @foreach($villes as $ville)
                    <option value="{{ $ville->id }}">{{ $ville->nom }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-12 mb-3">
            <input type="submit" value="@lang('lang.add_student_submit')" class="btn btn-success">
        </div>
    </form>
</main>

@endsection
