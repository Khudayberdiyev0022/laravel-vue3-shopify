@extends('layouts.app')
@section('breadcrumb')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">{{ __('main.translations') }}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('main.home') }}</a></li>
            <li class="breadcrumb-item active">{{ __('main.translations') }}</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('content')
  <div class="card">
    <div class="card-header">
      <div class="d-flex justify-content-between">
        <h4>{{ __('main.lists') }}</h4>
        <div>
          <a href="{{ route('translations.create') }}" class="btn btn-success">{{ __('main.create') }}</a>
        </div>
      </div>
      @include('translations.filter')
    </div>
    @include('translations.table')
  </div>
@endsection
