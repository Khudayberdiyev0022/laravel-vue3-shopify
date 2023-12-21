@extends('layouts.app')

@section('content')

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="d-flex justify-content-between">
                <h4>Users</h4>
                @can('user.create')
                  <a href="{{ route('users.create') }}" class="btn btn-success"><i class="bi bi-plus-circle"></i> Create</a>
                @endcan
              </div>
            </div>
            <div class="card-body">

              <table class="table table-striped table-bordered">
                <thead>
                <tr>
                  <th scope="col">S#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Roles</th>
                  <th scope="col">Status</th>
                  <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
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
                          data-on="Active"
                          data-off="InActive"
                          {{ $user->status ? 'checked' : '' }}
                      >
                    </td>
                    <td class="d-flex">
                      @if (!in_array('Super Admin', $user->getRoleNames()->toArray() ?? []) )
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info btn-sm mr-2"><i class="far fa-edit"></i></a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this role?');"><i class="fas fa-trash-alt"></i></button>
                        </form>
                      @endif
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <div class="card-footer">
              {{ $users->onEachSide(0)->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection

@push('script')
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
  <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
  <script>
      $(function() {
          $('.toggle-class').change(function() {
              let status = $(this).prop('checked') === true ? 1 : 0;
              let user_id = $(this).data('id');

              $.ajax({
                  type: "GET",
                  dataType: "json",
                  url: '/users/changeStatus',
                  data: {'status': status, 'user_id': user_id},
                  success: function(data){
                      console.log(data.success)
                  }
              });
          })
      })
  </script>
@endpush
