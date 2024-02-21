@extends('layouts.app')
@section('content')
  @include('components.breadcrumb', ['active' => __('main.regions')])
  <div class="card">
    <div class="card-header">
      <div class="d-flex justify-content-between">
        <h4>{{ __('main.lists') }}</h4>
        @can('create', \App\Models\Region::class)
        <a href="{{ route('regions.create') }}" class="btn btn-success"><i class="fas fa-plus mr-1"></i> {{ __('main.create') }}</a>
        @endcan
      </div>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tbody>
        <tr>
          <th>#</th>
          <th>{{ __('main.name') }}</th>
          <th>{{ __('main.city_count') }}</th>
        </tr>
        @forelse($regions as $region)
          <tr>
            <td>{{ $region->id }}</td>
            <td>
              <a href="{{ route('regions.show', $region->id) }}">
                {{ $region->title }}
              </a>
            </td>
            <td>{{ $region->cities->count() }}</td>
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
