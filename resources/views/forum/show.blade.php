@extends('layouts.layout')
@section('content')

<main class="container col-xl-10 col-xxl-8 px-4 py-5 flex-fill">
    <a href="/forum" class="btn btn-link">@lang('lang.text_return')</a>
    <div class="row align-items-center g-lg-5 py-5">
        <div class="text-lg-start">
            <h1 class="display-4 fw-bold lh-1 mb-5">{{ $forum->titre }}</h1>
            <div class="col-lg-10 fs-4">
                <p><strong>@lang('lang.forum_message_author'):</strong>&nbsp;{{ $forum->forumHasUser?->name }}</p>
                <p><strong>@lang('lang.forum_message_date'):</strong>&nbsp;{{ $forum->created_at }}</p>
                <p><strong>@lang('lang.forum_message_edit'):</strong>&nbsp;{{ $forum->updated_at }}</p>
            </div>
            <div class="mt-3">
                <p class="col-lg-10 fs-4">{{ $forum->message }}</p>
            </div>
        </div>
    </div>
    @if(Auth::check() && Auth::user()->id == $forum->user_id)
    <div class="d-flex justify-content-end mt-3">
        <a href="/forum-edit/{{$forum->id}}" class="btn btn-primary">@lang('lang.forum_btn_edit')</a>
    </div>

    <div class="d-flex justify-content-end mt-3">
        <form action="/forum-delete/{{$forum->id}}" method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">@lang('lang.forum_btn_delete')</button>
        </form>
    </div>
    @endif
</main>

@endsection
