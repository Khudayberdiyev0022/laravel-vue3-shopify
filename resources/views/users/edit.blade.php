@extends('layouts.app')
@section('breadcrumb')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">{{ __('main.user') }}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('main.home') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('users.index') }}">{{ __('main.users') }}</a></li>
            <li class="breadcrumb-item active">{{ __('main.user') }}</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('content')
  <div class="card">
    <div class="card-body">
      <form action="{{ route('users.update', $user->id) }}" method="post">
        @csrf
        @method("PUT")
        <div class="row">
          <div class="col-8">
            <div class="form-group">
              <label for="name">{{ __('main.name') }}</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $user->name }}">
              @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
              @endif
            </div>
            <div class="form-group">
              <label for="email">{{ __('main.email') }}</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $user->email }}">
              @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
              @endif
            </div>
            <div class="form-group">
              <label for="password">{{ __('main.password') }}</label>
              <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
              @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
              @endif
            </div>
            <div class="form-group">
              <label for="password_confirmation">{{ __('main.password_confirmation') }}</label>
              <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            </div>
          </div>
          <div class="col-4">
            <div class="form-group">
              <label for="roles">{{ __('main.roles') }}</label>
                <select class="form-control @error('roles') is-invalid @enderror" multiple aria-label="Roles" id="roles" name="roles[]">
                  @forelse ($roles as $role)
                    @if ($role!='Super Admin')
                      <option value="{{ $role }}" {{ in_array($role, $userRoles ?? []) ? 'selected' : '' }}>
                        {{ $role }}
                      </option>
                    @else
                      @if (Auth::user()->hasRole('Super Admin'))
                        <option value="{{ $role }}" {{ in_array($role, $userRoles ?? []) ? 'selected' : '' }}>
                          {{ $role }}
                        </option>
                      @endif
                    @endif
                  @empty
                  @endforelse
                </select>
                @if ($errors->has('roles'))
                  <span class="text-danger">{{ $errors->first('roles') }}</span>
                @endif
            </div>
            <div class="form-group">
              <label for="status">{{ __('main.status') }}</label>
              <select name="status" class="form-control">
                <option value="1">{{ __('main.active') }}</option>
                <option value="0">{{ __('main.inactive') }}</option>
              </select>
            </div>
          </div>
        </div>


        <button type="submit" class="btn btn-primary float-right">{{ __('main.save') }}</button>

      </form>
    </div>
  </div>
@endsection
