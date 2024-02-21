@extends('layouts.app')
@section('content')
  @include('components.breadcrumb', ['active' => __('main.roles')])
  <div class="card">
    <div class="card-header">
      <div class="d-flex justify-content-between">
        <h4>{{ __('main.lists') }}</h4>
        @can('create', \App\Models\Role::class)
          <a href="{{ route('roles.create') }}" class="btn btn-success"><i class="fas fa-plus mr-1"></i> {{ __('main.create') }}</a>
        @endcan
      </div>
    </div>

    <div class="card-body">
      <table class="table table-bordered">
        <tbody>
        <th width="50">#</th>
        <th>{{ __('main.name') }}</th>
        @forelse($roles as $role)
          <tr>
            <td>
              {{ $role->id }}
            </td>
            <td>
              @can('view', \App\Models\Role::class)
              <a href="{{ route('roles.show', $role->id) }}">
                {{ $role->getName() }}
              </a>
              @endcan
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
