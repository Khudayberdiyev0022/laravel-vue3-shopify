<div class="card">
  <div class="card-header">
    <div class="d-flex justify-content-between">
      <h4>{{ __('main.permissions') }}</h4>
      @can('create', \App\Models\Permission::class)
      <a href="{{ route('roles.permissions.create', $role->id) }}" class="btn btn-success"><i class="fas fa-plus mr-1"></i> {{ __('main.create') }}</a>
      @endcan
    </div>
  </div>

  <div class="card-body">
    <table class="table table-bordered">
      @forelse($permissions as $permission)
        <tr>
          <td>
            {{ $permission->id }}
          </td>

          <td>
            <a href="{{ route('permissions.show', $permission) }}">
              {{ $permission->getName() }}
            </a>
          </td>
          <td>
            <form action="{{ route('roles.permissions.detach', $role->id) }}" method="POST">
              @csrf

              <input type="hidden" name="permission_id" value="{{ $permission->id }}">

              <a href="#" onclick="event.preventDefault(); this.parentElement.submit();" class="btn btn-sm btn-light">
                <i class="fas fa-trash text-danger"></i>
              </a>
            </form>
          </td>
        </tr>
      @empty
        <tr>
          <td>{{ __('main.no_data') }}</td>
        </tr>
      @endforelse
    </table>
  </div>
</div>
