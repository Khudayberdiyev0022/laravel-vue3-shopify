@extends('layouts.app')
@section('breadcrumb')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">{{ __('main.degree_levels') }}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('index') }}">{{ __('main.home') }}</a></li>
            <li class="breadcrumb-item active">{{ __('main.degree_levels') }}</li>
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
        <h4 class="title">{{ __('main.lists') }}</h4>
        <a href="{{ route('degreelevels.create') }}" class="btn btn-success">{{ __('main.create') }}</a>
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
        @forelse($degreelevels as $degreelevel)
          <tr>
            <td>
              {{ $degreelevel->id }}
            </td>

            <td>
              {{ $degreelevel->title }}
            </td>

            <td class="d-flex align-items-center">
              <a href="{{ route('degreelevels.show', $degreelevel->id) }}" class="btn btn-info btn-sm mr-2"><i class="fas fa-pencil-alt"></i></a>
              <form action="{{ route('degreelevels.destroy', $degreelevel->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?');"><i class="fas fa-trash-alt"></i></button>
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
