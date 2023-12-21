@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <div class="float-start">
              Create User
            </div>
          </div>
          <div class="card-body">
            <form action="{{ route('users.store') }}" method="POST">
              @csrf
              <div class="row">
                <div class="col-8">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}">
                    @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}">
                    @error('email')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" value="{{ old('password') }}">
                    @error('password')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" value="{{ old('password_confirmation') }}">
                    @error('password_confirmation')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-group">
                    <label for="roles">Roles</label>
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
                    <label for="status">Status</label>
                    <select name="status" class="form-control">
                      <option value="1">Active</option>
                      <option value="0">Is active</option>
                    </select>
                  </div>
                </div>

              </div>
              <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Save</button>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
