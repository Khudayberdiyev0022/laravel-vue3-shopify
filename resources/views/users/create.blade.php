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
            <li class="breadcrumb-item"><a href="{{ route('index') }}">{{ __('main.home') }}</a></li>
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
      <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="row">
          <div class="col-8">
            <div class="form-group">
              <label for="name">{{ __('main.firstname') }}</label>
              <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}">
              @error('name')
              <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>
            <div class="form-group">
              <label for="email">{{ __('main.email') }}</label>
              <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}">
              @error('email')
              <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>
            <div class="form-group">
              <label for="password">{{ __('main.password') }}</label>
              <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" value="{{ old('password') }}">
              @error('password')
              <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>
            <div class="form-group">
              <label for="password_confirmation">{{ __('main.password_confirmation') }}</label>
              <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" value="{{ old('password_confirmation') }}">
              @error('password_confirmation')
              <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="col-4">
            <div class="form-group">
              <label for="roles">{{ __('main.roles') }}</label>
              <select class="form-control @error('roles') is-invalid @enderror" multiple aria-label="Roles" id="roles" name="roles[]">
                @forelse ($roles as $role)
                  @if ($role!='Super Admin')
                    <option value="{{ $role }}" {{ in_array($role, old('roles') ?? []) ? 'selected' : '' }}>
                      {{ $role }}
                    </option>
                  @else
                    @if (Auth::user()->hasRole('Super Admin'))
                      <option value="{{ $role }}" {{ in_array($role, old('roles') ?? []) ? 'selected' : '' }}>
                        {{ $role }}
                      </option>
                    @endif
                  @endif
                @empty
                @endforelse
              </select>
              @error('roles')
              <span class="text-danger">{{ $message }}</span>
              @enderror
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
