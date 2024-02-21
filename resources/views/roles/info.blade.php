<div class="card">
  <div class="card-header">
    <div class="d-flex justify-content-between">
      <h4>{{ __('main.info') }}</h4>
      @can('destroy', \App\Models\Role::class)
      <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn btn-danger btn-sm">
          <i class="fas fa-trash mr-1"></i> {{ __('main.delete') }}
        </button>
      </form>
      @endcan
    </div>
  </div>

  <div class="card-body">
    <table class="table table-bordered">
      <tr>
        <th>{{ __('main.numeric') }}</th>
        <td> {{ $role->id }}</td>
      </tr>
      <tr>
        <th>{{ __('main.name') }}</th>
        <td>{{ $role->name }}</td>
      </tr>
    </table>
  </div>
</div>
