@extends('layouts.auth')

@section('content')
  <div class="login-box">
    <div class="login-logo">
      <a href="javascript:void(false)">
        <img src="{{ asset('assets/images/logo.svg') }}" alt="Sudyalar Oliy maktabi" width="180px" class="mb-2">
      </a>
    </div>
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-body login-card-body">
{{--        <p class="login-box-msg">{{ __('main.sign_in_to_start_your_session') }}</p>--}}
        <form action="{{ route('login.store') }}" method="POST">
          @csrf
          <div class="input-group mb-3">
            <label for="email" class="d-flex w-100 font-weight-normal">{{ __('main.email') }}</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" id="email" tabindex="1" required autofocus autocomplete="email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
            @error('email')
            <div class="invalid-feedback">
              <strong>{{ $message }}</strong>
            </div>
            @enderror
          </div>
          <div class="input-group mb-3">
            <label for="password" class="d-flex w-100 font-weight-normal">{{ __('main.password') }}</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" tabindex="2" required autocomplete="current-password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            @error('password')
            <div class="invalid-feedback">
              <strong>{{ $message }}</strong>
            </div>
            @enderror
          </div>
          <button type="submit" class="btn btn-primary btn-block">{{ __('main.sign_in') }}</button>
        </form>
      </div>
    </div>
  </div>
@endsection
