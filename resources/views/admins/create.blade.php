@extends('layouts.app')
@section('content')
  @push('parent')
    <li class="breadcrumb-item"><a href="{{ route('admins.index') }}">{{ __('main.admins') }}</a></li>
  @endpush
  @include('components.breadcrumb', ['active' => __('main.admins')])
  <div class="card">
    <div class="card-body">
      <form action="{{ route('admins.store') }}" method="POST">
        @csrf
        <div class="row align-items-end">
          <div class="col-8">
            <div class="form-group">
              <label class="form-label">{{ __('main.user') }} *</label>
              <select name="user_id" class="form-control custom-select">
                <option>Выбрать</option>
                @foreach ($users as $user)
                  <option value="{{ $user->id }}">
                    {{ $user->name }}
                  </option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-2">
            <div class="form-group">
              <a href="{{ route('admins.index') }}" class="btn btn-light w-100">{{ __('main.cancel') }}</a>
            </div>
          </div>
          <div class="col-2">
            <div class="form-group">
              <button type="submit" class="btn btn-primary w-100">{{ __('main.save') }}</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection
