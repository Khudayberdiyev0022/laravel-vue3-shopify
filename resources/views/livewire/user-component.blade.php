<section>
  @include('components.breadcrumb', ['active' => __('main.users')])
  @include('components.alert')
  <div class="card">
    <div wire:loading class="loading">
      <p>{{ __('main.loading') }}</p>
    </div>
    <div class="card-header">
      <div class="d-flex justify-content-between">
        <h4>{{ __('main.lists') }}</h4>
        @can('create', \App\Livewire\UserComponent::class)
          <button wire:click="create" class="btn btn-success"><i class="fas fa-plus mr-1"></i> {{ __('main.create') }}</button>
        @endcan
      </div>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tbody>
        <tr>
          <th style="width: 10px">#</th>
          <th>{{ __('main.fullname') }}</th>
          <th>{{ __('main.email') }}</th>
          <th style="width: 40px">{{ __('main.actions') }}</th>
        </tr>
        @foreach($users as $user)
          <tr>
            <td>{{ ($users->currentPage()-1) * $users ->perpage() + $loop->index +1 }}.</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
              <div class="d-flex">
                @can('view', \App\Livewire\UserComponent::class)
                  <button wire:click="show({{ $user->id }})" class="btn btn-sm btn-light"><i class="fas fa-eye"></i></button>
                @endcan
                @can('update', \App\Livewire\UserComponent::class)
                  <button wire:click="edit({{ $user->id }})" class="btn btn-sm btn-light mx-2"><i class="fas fa-pencil-alt text-primary"></i></button>
                @endcan
                @can('destroy', \App\Livewire\UserComponent::class)
                  <button wire:click="delete({{ $user->id }})" class="btn btn-sm btn-light"><i class="fas fa-trash text-danger"></i></button>
                @endcan
              </div>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
      <div class="float-right pagination-sm mt-3">
        {{ $users->links() }}
      </div>
    </div>
  </div>

  <x-modal id="create">
    <x-slot name="title">{{ __('main.create') }}</x-slot>
    <x-slot name="body">
      <form wire:submit="store">
        <div class="form-group">
          <label class="required" for="name_uz">{{ __('main.fullname') }} ({{ __('main.uzbek') }})</label>
          <input type="text" wire:model="name_uz" class="form-control @error('name_uz') is-invalid @enderror" id="name_uz">
          @error('name_uz')
          <span class="invalid-feedback">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="name_ru">{{ __('main.fullname') }} ({{ __('main.russian') }})</label>
          <input type="text" wire:model="name_ru" class="form-control @error('name_ru') is-invalid @enderror" id="name_ru">
          @error('name_ru')
          <span class="invalid-feedback">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="email">{{ __('main.email') }}</label>
          <input type="email" wire:model="email" class="form-control @error('email') is-invalid @enderror" id="email">
          @error('email')
          <span class="invalid-feedback">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="password">{{ __('main.password') }}</label>
          <input type="password" wire:model="password" class="form-control @error('password') is-invalid @enderror" id="password">
          @error('password')
          <span class="invalid-feedback">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group">
          <div wire:ignore>
            <label for="roleSelect" class="form-label">Select Tasks</label>
            <select class="form-select" id="roleSelect" multiple>
              @foreach($roles as $role)
                <option id="{{ $role->id }}">{{ $role->getName() }}</option>
              @endforeach
            </select>
          </div>
          <div class="my-3">
            Selected Tasks :
            @forelse($selectedRoles as $role)
              {{$role }},
            @empty
              None
            @endforelse
          </div>
{{--          <label for="roles">{{ __('main.roles') }}</label>--}}
{{--          <select name="roles[]" class="form-control @error('roles') is-invalid @enderror" multiple aria-label="Roles" id="roles">--}}
{{--            @foreach($roles as $role)--}}
{{--              @if ($role!='Super Admin')--}}
{{--                <option value="{{ $role }}" {{ in_array($role, old('roles') ?? []) ? 'selected' : '' }}>--}}
{{--                  {{ $role->getName() }}--}}
{{--                </option>--}}
{{--              @else--}}
{{--                @if (Auth::user()->hasRole('Super Admin'))--}}
{{--                  <option value="{{ $role }}" {{ in_array($role, old('roles') ?? []) ? 'selected' : '' }}>--}}
{{--                    {{ $role->getName() }}--}}
{{--                  </option>--}}
{{--                @endif--}}
{{--              @endif--}}
{{--            @endforeach--}}
{{--          </select>--}}
{{--          @error('roles')--}}
{{--          <span class="text-danger">{{ $message }}</span>--}}
{{--          @enderror--}}
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary" style="float: right"><i class="fas fa-save mr-1"></i> {{ __('main.save') }}</button>
        </div>
      </form>
    </x-slot>
  </x-modal>

  <x-modal id="show">
    <x-slot name="title">{{ __('main.info') }}</x-slot>
    <x-slot name="body">
      <table class="table table-bordered">
        <tbody>
        <tr>
          <th colspan="2">{{ __('main.name') }}</th>
        </tr>
        <tr>
          <td>{{ __('main.uzbek') }} :</td>
          <td>{{ $name_uz }}</td>
        </tr>
        <tr>
          <td>{{ __('main.russian') }} :</td>
          <td>{{ $name_ru }}</td>
        </tr>
        <tr>
          <th>{{ __('main.email') }}</th>
          <td>{{ $email }}</td>
        </tr>
        </tbody>
      </table>
    </x-slot>
  </x-modal>

  <x-modal id="edit">
    <x-slot name="title">{{ __('main.edit') }}</x-slot>
    <x-slot name="body">
      <form wire:submit="update">
        <div class="form-group">
          <label class="required" for="name_uz-edit">{{ __('main.name') }} ({{ __('main.uzbek') }})</label>
          <input type="text" wire:model="name_uz" class="form-control @error('name_uz') is-invalid @enderror" id="name_uz-edit">
          @error('name_uz')
          <span class="invalid-feedback">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="name_ru-edit">{{ __('main.name') }} ({{ __('main.russian') }})</label>
          <input type="text" wire:model="name_ru" class="form-control @error('name_ru') is-invalid @enderror" id="name_ru-edit">
          @error('name_ru')
          <span class="invalid-feedback">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="email-edit">{{ __('main.email') }}</label>
          <input type="email" wire:model="email" class="form-control @error('email') is-invalid @enderror" id="email-edit">
          @error('email')
          <span class="invalid-feedback">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="password-edit">{{ __('main.password') }}</label>
          <input type="password" wire:model="password" class="form-control @error('password') is-invalid @enderror" id="password-edit">
          @error('password')
          <span class="invalid-feedback">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary" style="float: right"><i class="fas fa-save mr-1"></i> {{ __('main.edit') }}</button>
        </div>
      </form>
    </x-slot>
  </x-modal>

  <x-modal id="delete">
    <x-slot name="title">{{ __('main.delete_confirmation') }}</x-slot>
    <x-slot name="body">
      <h6>{{ __('main.delete_confirmation_desc') }}</h6>

    </x-slot>
    <x-slot name="footer">
      <button class="btn btn-sm btn-primary" wire:click="close" data-dismiss="modal" aria-label="Close">{{ __('main.cancel') }}</button>
      <button class="btn btn-sm btn-danger" wire:click="deleteConfirm()">{{ __('main.delete_yes') }}</button>
    </x-slot>
  </x-modal>

</section>

@push('script')
  <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
  <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>
  <script>
      $(document).ready(function() {
          $('#roleSelect').select2();

          $('#roleSelect').on('change', function (e) {
          @this.set('selectedRoles', $(this).val());
          });
      });
  </script>
@endpush



