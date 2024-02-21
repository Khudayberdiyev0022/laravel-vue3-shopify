@extends('layouts.app')
@section('breadcrumb')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">{{ __('main.language') }}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('main.home') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('languages.index') }}">{{ __('main.languages') }}</a></li>
            <li class="breadcrumb-item active">{{ __('main.language') }}</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('content')
  <div class="card">
    <div class="card-body">
      <form action="{{ route('languages.store') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="id" class="font-weight-normal">ID (Kod: uz, ru, ar...)</label>
          <input type="text" name="id" value="{{ old('id') }}" class="form-control @error('id') is-invalid @enderror" id="id">
          @error('id')
          <span class="invalid-feedback">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="name" class="font-weight-normal">{{ __('main.name') }}</label>
          <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" id="name">
          @error('name')
          <span class="invalid-feedback">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-check">
          <input type="checkbox" name="active" @checked(old('active' ?? $language->active)) class="form-check-input" value="1" id="active">
          <label class="form-check-label" for="active">
            {{ __('main.active') }}
          </label>
        </div>
        <div class="form-check">
          <input type="checkbox" name="default" @checked(old('default' ?? $language->default))  value="1" class="form-check-input" id="default">
          <label class="form-check-label" for="default">
            {{ __('main.default') }}
          </label>
        </div>
        <div class="form-check mb-3">
          <input type="checkbox" name="fallback" @checked(old('fallback' ?? $language->fallback)) class="form-check-input" value="1" id="fallback">
          <label class="form-check-label" for="fallback">
            {{ __('main.fallback') }}
          </label>
        </div>
        <button type="submit" class="btn btn-primary float-right">{{ __('main.create') }}</button>
      </form>
    </div>
  </div>
@endsection

