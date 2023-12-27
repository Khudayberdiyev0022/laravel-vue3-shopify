@extends('layouts.app')
@section('content')
  <section>
    <div class="card">
      <div class="card-header">
        <div class="d-flex justify-content-between">
          <h4>Permission List</h4>
          <div>
            <a href="{{ route('permissions.create') }}" class="btn btn-success">Create</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-md">
            <tbody>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Guard name</th>
              <th>Actions</th>
            </tr>
            @foreach($permissions as $permission)
              <tr>
                <td>{{ ($permissions->currentpage()-1) * $permissions->perpage() + $loop->index + 1 }}</td>
                <td>{{ \Illuminate\Support\Str::replace('.', ' ', ucfirst($permission->name)) }}</td>
                <td>{{ $permission->guard_name }}</td>
                <td class="d-flex">
                  <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-info btn-sm mr-2"><i class="far fa-edit"></i></a>
                  <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this role?');"><i class="fas fa-trash-alt"></i></button>
                  </form>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
      @if($permissions->hasPages())
        <div class="card-footer">
          {{ $permissions->onEachSide(0)->links() }}
        </div>
      @endif
    </div>
  </section>
@endsection
