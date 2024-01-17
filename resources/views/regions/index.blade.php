@extends('layouts.app')
@section('breadcrumb')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">{{ __('main.regions') }}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('index') }}">{{ __('main.home') }}</a></li>
            <li class="breadcrumb-item active">{{ __('main.regions') }}</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('content')
  <div class="card mb-3">
    <div class="card-header">
      <div class="d-flex justify-content-between">
        <h4 class="title">{{ __('main.regions') }}</h4>
        <a href="{{ route('regions.create') }}" class="btn btn-success">{{ __('main.create') }}</a>
      </div>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tbody>
        <tr>
          <th>#</th>
          <th>{{ __('main.name') }}</th>
          <th>{{ __('main.actions') }}</th>
        </tr>
        @forelse($regions as $region)
          <tr>
            <td>
              {{ $region->id }}
            </td>

            <td>
              <a href="{{ route('regions.show', $region->id) }}">
                {{ $region->title }}
              </a>
            </td>

            <td class="d-flex align-items-center">
              <a href="{{ route('regions.show', $region->id) }}" class="btn btn-secondary">
                <i class="fas fa-eye"></i>
              </a>
              <form action="{{ route('regions.destroy', $region->id) }}" method="POST" class="mx-2">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                  <i class="fas fa-trash"></i>
                </button>
              </form>
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
