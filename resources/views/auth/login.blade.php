@extends('layouts.auth')

@section('content')
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#!" class="h1"><b>Login</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="input-group mb-3">
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
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me" {{ old('remember') ? 'checked' : '' }}>
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      {{--      <div class="social-auth-links text-center mt-2 mb-3">--}}
      {{--        <a href="#" class="btn btn-block btn-primary">--}}
      {{--          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook--}}
      {{--        </a>--}}
      {{--        <a href="#" class="btn btn-block btn-danger">--}}
      {{--          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+--}}
      {{--        </a>--}}
      {{--      </div>--}}
      <!-- /.social-auth-links -->

      <p class="mb-1">
        @if (Route::has('password.request'))
          <a href="{{ route('password.request') }}" class="text-small">
            I forgot my password
          </a>
        @endif
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
@endsection
