@extends('layouts.app')
@section('content')
  <div class="card">
    <div class="card-header">
      <h4 class="title">{{ __('main.create') }}</h4>
    </div>

    <div class="card-body">
      <form action="{{ route('roles.permissions.attach', $role->id) }}" method="POST">
        @csrf
        <div class="row">
          <div class="col-12 col-md-12">
            <div class="mb-3">
              <label class="form-label">{{ __('main.permissions') }} *</label>
              <select name="permission_id" class="form-control custom-select">
                <option value="">Выбрать</option>
                @foreach ($permissions as $permission)
                  <option value="{{ $permission->id }}">
                    {{ $permission->getName() }}
                  </option>
                @endforeach
              </select>
            </div>
          </div>
        </div>

        <div class="row justify-content-end">
          <div class="col-12 col-md-2">
            <a href="{{ route('roles.show', $role->id) }}" class="btn btn-light w-100">{{ __('main.cancel') }}</a>
          </div>
          <div class="col-12 col-md-2">
            <button type="submit" class="btn btn-primary w-100">{{ __('main.save') }}</button>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection
