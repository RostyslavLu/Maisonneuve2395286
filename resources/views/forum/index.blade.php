@extends('layouts.layout')
@section('content')

<main class="container col-xl-10 col-xxl-8 px-4 py-5 flex-fill">
    <div class="row align-items-center g-lg-5 py-5">
        <div class="col-lg-7 text-center text-lg-start">
            <h1 class="display-4 fw-bold lh-1 mb-3">@lang('lang.btn_forums')</h1>
            <p class="col-lg-10 fs-4">@lang('lang.btn_forum_list')</p>
        </div>
    </div>
    <ul class="list-group">
    @foreach ($categories as $category)
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <a href="/forum_{{$category->id}}" class="btn btn-link text-lg">{{ $category->name }}</a>
        <span class="badge bg-primary rounded-pill">{{ $category->forums_count }}&nbsp;@lang('lang.messages_in_category')</span>
    </li>
    @endforeach
    </ul>
    <div class="d-flex justify-content-end mt-3">
        <a href="/forum-create" class="btn btn-primary">@lang('lang.btn_forum_new')</a>
    </div>
</main>

@endsection
