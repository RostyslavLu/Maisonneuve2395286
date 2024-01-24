@extends('layouts.layout')
@section('content')


  <main class="container col-xl-10 col-xxl-8 px-4 py-5 flex-fill">
      <div class="row align-items-center g-lg-5 py-5">
        <div class="col-lg-7 text-center text-lg-start">
          <h1 class="display-4 fw-bold lh-1 text-body-emphasis mb-3">@lang('lang.home_text')!</h1>
          <p class="col-lg-10 fs-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. At rerum eum mollitia esse nulla id exercitationem excepturi impedit! Veritatis soluta architecto doloremque tenetur obcaecati a dolorem qui nihil tempore eaque.</p>
        </div>

        <div class="col-md-10 mx-auto col-lg-5">
          <div  class="p-4 p-md-5 border rounded-3 bg-body-tertiary">
            <div class="form-floating mb-3">
                @guest
                <a href="/login" class="w-100 btn btn-lg btn-primary" type="submit">@lang('lang.home_login')</a>
                @else
                <a href="/dashboard" class="w-100 btn btn-lg btn-primary" type="submit">@lang('lang.btn_dashboard')</a>
                @endguest
            </div>
          </div>
        </div>
      </div>
    </main>


@endsection
