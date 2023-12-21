@extends('layouts.app')
@section('content')
  <section class="content">
    <div class="container-fluid">
      <div class="row">

        <div class="col-12">
          {{--      @include('admin.sections.alert')--}}
          <x-alert />
          <div class="card">
            <div class="card-header d-flex justify-content-between">
              <h4>{{ __('words.permissions_list') }}</h4>
              <a href="{{ route('permissions.create') }}">{{ __('words.permission_create') }}</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-md">
                  <tbody><tr>
                    <th>#</th>
                    <th>{{ __('words.permission_name') }}</th>
                    {{--                            <th>Guard name</th>--}}
                    <th>{{ __('words.created_at') }}</th>
                    <th>{{ __('words.action') }}</th>
                  </tr>
                  @foreach($permissions as $permission)
                    <tr>
                      <td>{{ ($permissions->currentpage()-1) * $permissions->perpage() + $loop->index + 1 }}</td>
                      <td>{{ $permission->name }}</td>
                      {{--                            <td>{{ $permission->guard_name }}</td>--}}
                      <td>{{ $permission->created_at }}</td>
                      <td  class="d-flex">
                        <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-primary mr-3"><i class="far fa-edit"></i></a>
                        <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer text-right">
              <nav class="d-inline-block">
                {{ $permissions->onEachSide(0)->links() }}
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
