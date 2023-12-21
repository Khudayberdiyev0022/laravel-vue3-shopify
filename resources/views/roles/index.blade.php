@extends('layouts.app')
@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Role List</h4>
          </div>
          <div class="card-body">
            <table class="table table-striped table-bordered">
              <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Permissions</th>
                <th>Actions</th>
              </tr>
              </thead>
              <tbody>
                @foreach($roles as $role)
                  <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td>
                      @foreach($role->permissions as $permission)
                      <span>{{ $permission->name }}</span>
                      @endforeach
                    </td>
                    <td>
                      @if ($role->name!='Super Admin')
                        @can('edit-role')
                          <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                        @endcan

                        @can('delete-role')
                          @if ($role->name!=Auth::user()->hasRole($role->name))
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this role?');"><i class="bi bi-trash"></i> Delete</button>
                          @endif
                        @endcan
                      @endif
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
