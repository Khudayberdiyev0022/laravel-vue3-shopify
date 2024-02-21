<div class="card">
  <div class="card-header">
    <div class="d-flex justify-content-between">
      <h4>{{ __('main.info') }}</h4>
      <form action="{{ route('admins.destroy', $admin->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm">
          <i class="fas fa-trash mr-1"></i> {{ __('main.delete') }}
        </button>
      </form>
    </div>
  </div>

  <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>{{ __('main.numeric') }}</th>
          <td>{{ $admin->id }}</td>
        </tr>
        <tr>
          <th>{{ __('main.firstname') }} </th>
          <td>{{ $admin->name }} </td>
        </tr>
        <tr>
          <th>{{ __('main.email') }}</th>
          <td>{{ $admin->email }}</td>
        </tr>
        <tr>
          <th>{{ __('main.created_at') }}</th>
          <td>{{ $admin->created_at }}</td>
        </tr>
      </table>
  </div>
</div>
