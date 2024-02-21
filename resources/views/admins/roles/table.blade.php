<div class="card">
  <div class="card-header">
    <div class="d-flex justify-content-between">
      <h4 class="title">{{ __('main.roles') }}</h4>
      <a href="{{ route('admins.roles.create', $admin) }}" class="btn btn-success"><i class="fas fa-plus mr-1"></i> {{ __('main.create') }}</a>
    </div>
  </div>

  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered">
        <tbody>
        @forelse($roles as $role)
          <tr>
            <th>#</th>
            <th>{{ __('main.name') }}</th>
            <th>{{ __('main.actions') }}</th>
          </tr>
          <tr>
            <td>{{ $role->id }}</td>
            <td>
              <a href="{{ route('roles.show', $role->id) }}">
                {{ $role->name }}
              </a>
            </td>
            <td>
              <form action="{{ route('admins.roles.detach', $admin) }}" method="POST">
                @csrf
                <input type="hidden" name="role_id" value="{{ $role->id }}">
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                  <i class="fas fa-trash"></i>
                </button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td>{{ __('main.no_data') }}</td>
          </tr>
        @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
