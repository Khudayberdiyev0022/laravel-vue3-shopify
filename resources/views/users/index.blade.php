@extends('layouts.app')
@section('breadcrumb')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">{{ __('main.users') }}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('index') }}">{{ __('main.home') }}</a></li>
            <li class="breadcrumb-item active">{{ __('main.users') }}</li>
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
          @can('user.create')
            <a href="{{ route('users.create') }}" class="btn btn-success"><i class="bi bi-plus-circle"></i>{{ __('main.create') }}</a>
          @endcan
        </div>
      </div>
      <div class="card-body">
        <table class="table table-bordered">
          <tbody>
          <tr>
            <th scope="col">#</th>
            <th scope="col">{{ __('main.firstname') }}</th>
            <th scope="col">{{ __('main.email') }}</th>
            <th scope="col">{{ __('main.roles') }}</th>
            <th scope="col">{{ __('main.status') }}</th>
            <th scope="col">{{ __('main.actions') }}</th>
          </tr>
          @foreach($users as $user)
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $user->name }}</td>
              <td>{{ \Illuminate\Support\Str::mask($user->email, '*', -15 , 3) }}</td>
              <td>
                @foreach($user->getRoleNames() as $role)
                  <span class="badge bg-primary">{{ $role }}</span>
                @endforeach
              </td>
              <td>
                <input
                    type="checkbox"
                    data-id="{{$user->id}}"
                    class="toggle-class"
                    data-onstyle="success"
                    data-offstyle="danger"
                    data-toggle="toggle"
                    data-on="{{ __('main.active') }}"
                    data-off="{{ __('main.inactive') }}"
                    {{ $user->status ? 'checked' : '' }}
                >
              </td>
              <td>
                <div class="d-flex">
                  @if (!in_array('Super Admin', $user->getRoleNames()->toArray() ?? []) )
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info btn-sm mr-2"><i class="fas fa-pencil-alt"></i></a>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
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
      @if($users->hasPages())
        <div class="card-footer">
          {{ $users->onEachSide(0)->links() }}
        </div>
      @endif
    </div>
  </section>
@endsection

@push('script')
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
  <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
  <script>
      $(function () {
          $('.toggle-class').change(function () {
              let status = $(this).prop('checked') === true ? 1 : 0;
              let user_id = $(this).data('id');

              $.ajax({
                  type: "GET",
                  dataType: "json",
                  url: '/users/changeStatus',
                  data: {'status': status, 'user_id': user_id},
                  success: function (data) {
                      console.log(data.success)
                  }
              });
          })
      })
  </script>
@endpush
