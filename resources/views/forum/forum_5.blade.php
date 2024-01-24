@extends('layouts.layout')
@section('content')

<main class="container col-xl-10 col-xxl-8 px-4 py-5 flex-fill">
    <a href="/forum" class="btn btn-link">@lang('lang.text_return')</a>
    <div class="row align-items-center g-lg-5 py-5">
        <div class="col-lg-7 text-center text-lg-start">
            <h1 class="display-4 fw-bold lh-1 mb-3">Forums</h1>
            <p class="col-lg-10 fs-4">{{ $category->name }}</p>
        </div>
    </div>
    <ul class="list-group">
        @forelse ($forums as $forum)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="/forum/{{$forum->id}}" class="btn btn-link"><strong>{{ $forum->titre }}</strong></a>
            <span class="badge text-bg-secondary">Author:&nbsp;{{ $forum->forumHasUser?->name }}</span
        </li>
        @empty
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <p>@lang('lang.forum_not_found')</p>
        </li>
        @endforelse
    </ul>
    <div class="d-flex justify-content-end mt-3">
        <a href="/forum-create" class="btn btn-primary">@lang('lang.btn_forum_new')</a>
    </div>
    <div class="d-flex justify-content-center">
        {{ $forums->links() }}
    </div>
</main>

@endsection
