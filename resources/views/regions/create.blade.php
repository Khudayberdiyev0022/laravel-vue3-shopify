@extends('layouts.app')
@section('content')
  @push('parent')
    <li class="breadcrumb-item"><a href="{{ route('regions.index') }}">{{ __('main.regions') }}</a></li>
  @endpush
  @include('components.breadcrumb', ['active' => __('main.region')])
  <div class="card">
    <div class="card-body">
      @can('create', \App\Models\Region::class)
        <form action="{{ route('regions.store') }}" method="POST">
          @csrf
          <div class="row align-items-end">
            <div class="col-8">
              <label class="form-label">{{ __('main.name') }} *</label>
              <input type="text" name="title" class="form-control" autofocus>
            </div>
            <div class="col-2">
              <a href="{{ route('regions.index') }}" class="btn btn-light w-100">{{ __('main.cancel') }}</a>
            </div>
            <div class="col-2">
              <button type="submit" class="btn btn-primary w-100">{{ __('main.save') }}</button>
            </div>
          </div>
        </form>
      @endcan
    </div>
  </div>
@endsection
