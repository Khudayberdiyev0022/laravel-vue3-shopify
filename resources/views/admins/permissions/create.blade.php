@extends('layouts.app')
@section('content')
  @push('parent')
    <li class="breadcrumb-item"><a href="{{ route('permissions.index') }}">{{ __('main.permissions') }}</a></li>
  @endpush
  @include('components.breadcrumb', ['active' => __('main.permission')])
  <div class="card">
    <div class="card-header">
      <h4 class="title">{{ __('main.permission') }}</h4>
    </div>

    <div class="card-body">
      <form action="{{ route('admins.permissions.attach', $admin) }}" method="POST">
        @csrf
        <div class="row align-items-end">
          <div class="col-8">
            <div class="form-group mb-0">
              <select name="permission_id" class="form-control custom-select">
                <option>{{ __('main.choose_permission') }}</option>

                @foreach ($permissions as $permission)
                  <option value="{{ $permission->id }}">
                    {{ $permission->getName() }}
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
