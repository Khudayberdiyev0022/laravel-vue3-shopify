@extends('layouts.app')
@section('breadcrumb')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">{{ __('main.permission') }}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('index') }}">{{ __('main.home') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('permissions.index') }}">{{ __('main.permissions') }}</a></li>
            <li class="breadcrumb-item active">{{ __('main.permission') }}</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('content')
  <div class="card">
    <form action="{{ route('permissions.update', $permission->id) }}" method="POST">
      @csrf
      @method('PUT')
      @include('permissions._form')
    </form>
  </div>
@endsection
