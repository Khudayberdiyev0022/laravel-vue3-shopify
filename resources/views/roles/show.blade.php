@extends('layouts.app')
@section('content')
  @push('parent')
    <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">{{ __('main.roles') }}</a></li>
  @endpush
  @include('components.breadcrumb', ['active' => __('main.info')])
  <div class="row">
    <div class="col-6">
      @include('roles.info')
    </div>
    <div class="col-6">
      @include('roles.permissions.table')
    </div>
  </div>
@endsection
