@extends('layouts.app')
@section('content')
  @push('parent')
    <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">{{ __('main.roles') }}</a></li>
  @endpush
  @include('components.breadcrumb', ['active' => __('main.role')])
  <div class="card">
    <div class="card-body">
      <form action="{{ route('admins.roles.attach', $admin->id) }}" method="POST">
        @csrf
        <div class="row align-items-end">
          <div class="col-8">
            <div class="form-group mb-0">
              <label class="form-label">{{ __('main.role') }} </label>
              <select name="role_id" class="form-control custom-select">
                <option>-- {{ __('main.choose_role') }} --</option>
                @foreach ($roles as $role)
                  <option value="{{ $role->id }}">
                    {{ $role->name }}
                  </option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-4">
            <div class="row">
              <div class="col-6">
                <a href="{{ route('admins.show', $admin->id) }}" class="btn btn-light w-100">{{ __('main.cancel') }}</a>
              </div>
              <div class="col-6">
                <button type="submit" class="btn btn-primary w-100">{{ __('main.save') }}</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection
