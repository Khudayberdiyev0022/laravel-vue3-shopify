@extends('layouts.app')
@section('content')
  @push('parent')
    <li class="breadcrumb-item"><a href="{{ route('cities.index') }}">{{ __('main.cities') }}</a></li>
  @endpush
  @include('components.breadcrumb', ['active' => __('main.city')])
  <div class="card">
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>{{ __('main.name') }}</th>
          <td> {{ $region->title }}</td>
        </tr>
      </table>
    </div>
  </div>
  <div class="card">
    <div class="card-header">
      <div class="d-flex justify-content-between align-items-center">
        <h4>{{ __('main.cities') }}</h4>
        @can('create', \App\Models\City::class)
          <a href="{{ route('cities.create') }}" class="btn btn-success">{{ __('main.create') }}</a>
        @endcan
      </div>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tbody>
        <tr>
          <th>#</th>
          <th>{{ __('main.name') }}</th>
        </tr>
        @forelse($cities as $key => $city)
          <tr>
            <td>{{ ++$key }} </td>
            <td>
              {{ $city->title }}
            </td>
          </tr>
        @empty
          <tr>
            <td>{{ __('main.no_data') }}</td>
          </tr>
        @endforelse
        </tbody>
      </table>
    </div>
  </div>
@endsection
