@extends('layouts.app')
@section('content')
  @push('parent')
    <li class="breadcrumb-item"><a href="{{ route('admins.index') }}">{{ __('main.admins') }}</a></li>
  @endpush
  @include('components.breadcrumb', ['active' => __('main.admin')])
  @include('admins.info')
  <div class="row">
    <div class="col-6">
      @include('admins.roles.table')
    </div>
    <div class="col-6">
      @include('admins.permissions.table')
    </div>
  </div>
@endsection
