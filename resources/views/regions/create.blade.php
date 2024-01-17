@extends('layouts.app')
@section('content')
  <div class="card">
    <div class="card-header">
      <h4 class="title">{{ __('main.region') }}</h4>
    </div>

    <div class="card-body">
      <form action="{{ route('regions.store') }}" method="POST">
        @csrf
        <div class="row">
          <div class="col-12 col-md-6">
            <div class="mb-3">
              <label class="form-label">{{ __('main.title') }} *</label>
              <input type="text" name="title" class="form-control" autofocus>
            </div>
          </div>
        </div>

        <div class="row justify-content-end">
          <div class="col-12 col-md-2">
            <a href="{{ route('regions.index') }}" class="btn btn-light w-100">{{ __('main.cancel') }}</a>
          </div>
          <div class="col-12 col-md-2">
            <button type="submit" class="btn btn-primary w-100">{{ __('main.save') }}</button>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection
