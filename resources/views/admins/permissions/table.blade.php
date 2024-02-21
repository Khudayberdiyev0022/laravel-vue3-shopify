<div class="card">
  <div class="card-header">
    <div class="d-flex justify-content-between">
      <h4 class="title">{{ __('main.permissions') }}</h4>
      <a href="{{ route('admins.permissions.create', $admin) }}" class="btn btn-success"><i class="fas fa-plus mr-1"></i> {{ __('main.create') }}</a>
    </div>
  </div>

  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered">
        <tbody>
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
              <form action="{{ route('admins.permissions.detach', $admin) }}" method="POST">
                @csrf

                <input type="hidden" name="permission_id" value="{{ $permission->id }}">

                <a href="#" onclick="event.preventDefault(); this.parentElement.submit();" class="text-danger small">
                  Удалить
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
      </table>
    </div>
  </div>
</div>
