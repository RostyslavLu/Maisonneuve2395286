@extends('layouts.layout')
@section('content')

<main class="container col-xl-10 col-xxl-8 px-4 py-5 flex-fill">
    <div class="row align-items-center g-lg-5 py-5">
        <div class="col-lg-7 text-center text-lg-start">
            <h1 class="display-4 fw-bold lh-1 mb-3">@lang('lang.download_text')</h1>
            <p class="col-lg-10 fs-4">@lang('lang.download_text_list')</p>
        </div>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>@lang('lang.download_table_name')</th>
                <th>@lang('lang.download_table_created_at')</th>
                <th>@lang('lang.download_table_modified_at')</th>
                <th>@lang('lang.download_table_author')</th>
                <th>@lang('lang.download_table_action')</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($files as $file)
            <tr>
                <td>{{ $file->name }}</td>
                <td>{{ $file->created_at }}</td>
                <td>{{ $file->updated_at }}</td>
                <td>{{ $file->downloadHasUser?->name }}</td>
                <td><a href="/download-file/{{ $file->id }}" class="btn btn-primary">@lang('lang.btn_download_file')</a>
                    @if ($file->downloadHasUser?->id == Auth::user()->id)
                <form action="/download-delete/{{ $file->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger mt-2">@lang('lang.btn_download_delete')</button>
                </form>
                @endif
                </td>
            </tr>
            @empty
            <div class="alert alert-danger">
                <p>@lang('lang.download_not_found')</p>
            </div>
            @endforelse
        </tbody>
    </table>
    {{ $files->links() }}
    <div class="d-flex justify-content-end mt-3">
        <a href="/download-create" class="btn btn-primary">@lang('lang.btn_add_file')</a>
    </div>
</main>

@endsection
