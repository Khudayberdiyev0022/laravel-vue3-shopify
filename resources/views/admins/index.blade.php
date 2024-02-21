@extends('layouts.app')
@section('content')
  @include('components.breadcrumb', ['active' => __('main.admins')])
  <div class="card">
    <div class="card-header">
      <div class="d-flex justify-content-between">
        <h4>{{ __('main.lists') }} </h4>
        <a href="{{ route('admins.create') }}" class="btn btn-success"><i class="fas fa-plus mr-1"></i> {{ __('main.create') }}</a>
      </div>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tbody>
        <tr>
          <th>{{ __('main.numeric') }}</th>
          <th>{{ __('main.firstname') }}</th>
          <th>{{ __('main.email') }}</th>
        </tr>
        @foreach($admins as $admin)
          <tr>
            <td>{{ $admin->id }} </td>
            <td>
              <a href="{{ route('admins.show', $admin->id) }}">{{ $admin->name }}</a>
            </td>
            <td>{{ $admin->email }}</td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>

@endsection
