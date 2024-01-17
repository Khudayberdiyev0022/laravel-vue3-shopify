@extends('layouts.app')
@section('breadcrumb')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">{{ __('main.permissions') }}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('index') }}">{{ __('main.home') }}</a></li>
            <li class="breadcrumb-item active">{{ __('main.permissions') }}</li>
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
            <a href="{{ route('permissions.create') }}" class="btn btn-success">{{ __('main.create') }}</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered">
            <tbody>
            <tr>
              <th>#</th>
              <th>{{ __('main.name') }}</th>
              <th>Guard {{ __('main.name') }}</th>
              <th>{{ __('main.actions') }}</th>
            </tr>
            @foreach($permissions as $permission)
              <tr>
                <td>{{ ($permissions->currentpage()-1) * $permissions->perpage() + $loop->index + 1 }}</td>
                <td>{{ \Illuminate\Support\Str::replace('.', ' ', ucfirst($permission->name)) }}</td>
                <td>{{ $permission->guard_name }}</td>
                <td class="d-flex">
                  <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-info btn-sm mr-2"><i class="fas fa-pencil-alt"></i></a>
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
