@extends('layouts.layout')
@section('content')

<main class="form-signin w-100 m-auto">

        <form action="{{ route('authentication') }}" method="post" style="min-width: 25rem">
          @csrf
            <h1 class="h3 mb-3 fw-normal text-center">@lang('lang.login_text')</h1>
          <div class="form-floating ">
            <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com" value="{{ old('email') }}">
            <label for="floatingInput">@lang('lang.login_email')</label>
            @if($errors->has('email'))
            <span class="text-danger">
                {{ $errors->first('email') }}
            </span>
            @endif

          </div>
          <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" value="{{ old('password') }}">
            <label for="floatingPassword">@lang('lang.login_password')</label>
            @if($errors->has('password'))
            <span class="text-danger">
                {{ $errors->first('password') }}
            </span>
            @endif
          </div>

          <button class="btn btn-primary w-100 py-2" type="submit">@lang('lang.btn_login')</button>
        </form>

    </main>

@endsection
