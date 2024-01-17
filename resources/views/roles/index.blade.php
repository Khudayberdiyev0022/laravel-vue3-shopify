@extends('layouts.app')
@section('breadcrumb')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">{{ __('main.roles') }}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('index') }}">{{ __('main.home') }}</a></li>
            <li class="breadcrumb-item active">{{ __('main.roles') }}</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('content')
  <section>
    <div class="card">
      <div class="card-header">
        <div class="d-flex justify-content-between">
          <h4>{{ __('main.lists') }}</h4>
          <div>
            <a href="{{ route('roles.create') }}" class="btn btn-success">{{ __('main.create') }}</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <table class="table table-bordered">
          <tbody>
          <tr>
            <th>#</th>
            <th>{{ __('main.name') }}</th>
            <th>{{ __('main.permissions') }}</th>
            <th>{{ __('main.actions') }}</th>
          </tr>
          @foreach($roles as $role)
            <tr>
              <td>{{ $role->id }}</td>
              <td>{{ $role->name }}</td>
              <td>
                @foreach($role->permissions as $permission)
                  <span class="badge badge-info p-2">{{ $permission->name }}</span>
                @endforeach
              </td>
              <td>
                <div class="d-flex">
                  @if ($role->name!='Super Admin')
                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-info btn-sm mr-2"><i class="fas fa-pencil-alt"></i></a>
                    <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this role?');"><i class="fas fa-trash-alt"></i></button>
                    </form>
                  @endif
                </div>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
      @if($roles->hasPages())
        <div class="card-footer">
          {{ $roles->onEachSide(0)->links() }}
        </div>
      @endif
    </div>
  </section>
@endsection
