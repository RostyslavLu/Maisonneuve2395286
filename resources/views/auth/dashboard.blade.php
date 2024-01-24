@extends('layouts.layout')
@section('content')
    <main class="container col-xl-10 col-xxl-8 px-4 py-5 flex-fill">
        <div >
            <h1 class="col-lg-10 fs-4">@lang('lang.dashboard_welcome')&nbsp;{{ $user->name }}</h1>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                <h2 class="col-lg-10 fs-4">@lang('lang.dashboard_user_info')</h2>
                <ul class="list-group">
                    <li class="list-group-item"><strong>@lang('lang.dashboard_user_name'):</strong>&nbsp;{{ $user->name }}</li>
                    <li class="list-group-item"><strong>@lang('lang.dashboard_user_email'):</strong>&nbsp;{{ $user->email }}</li>
                    <li class="list-group-item"><strong>@lang('lang.dashboard_user_address'):</strong>&nbsp;{{ $user->address }}</li>
                    <li class="list-group-item"><strong>@lang('lang.dashboard_user_phone'):</strong>&nbsp;{{ $user->phone }}</li>
                    <li class="list-group-item"><strong>@lang('lang.dashboard_user_birthdate'):</strong>&nbsp;{{ $user->date_naissance }}</li>
                    <li class="list-group-item"><strong>@lang('lang.dashboard_user_town'):</strong>&nbsp;{{ $user->ville }}</li>
                </ul>
            </div>
            <div class="col">
                <h2 class="col-lg-10 fs-4">@lang('lang.dashboard_user_forums')</h2>

                    <ul class="list-group">
                        @forelse($forums as $forum)
                            <li class="list-group-item d-flex align-items-center gap-1">
                                <a href="/forum/{{ $forum->id }}" class="btn btn-link text-start flex-grow-1">{{ $forum->titre }}</a>
                                <div class="d-flex justify-content-end">
                                    <a href="/forum-edit/{{$forum->id}}" class="btn btn-primary">@lang('lang.forum_btn_edit')</a>
                                </div>
                                <form action="/forum-delete/{{$forum->id}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">@lang('lang.forum_btn_delete')</button>
                                </form>
                            </li>
                        @empty
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <p>@lang('lang.dashboard_user_forums_not_found')</p>
                            </li>
                        @endforelse
                    </ul>
                    <div class="d-flex justify-content-center">
                        {{ $forums->links() }}
                    </div>

            </div>
        </div>
        <div class="d-flex justify-content-end mt-3">
            <h2 class="col-lg-10 fs-4">@lang('lang.dashboard_user_files')</h2>
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>@lang('lang.files_table_name')</th>
                <th>@lang('lang.files_table_created_at')</th>
            </tr>
            </thead>

            <tbody>
            @forelse ($files as $file)
                <tr>
                    <td>{{ $file->name }}</td>
                    <td>{{ $file->created_at }}</td>
                </tr>
            @empty
                <div class="alert alert-danger">
                    <p>@lang('lang.files_not_found')</p>
                </div>
            @endforelse
            </tbody>
        </table>
        <div class="d-flex justify-content-end mt-3">
            <a href="/download-create" class="btn btn-primary">@lang('lang.btn_add_file')</a>
        </div>
    </main>
@endsection
