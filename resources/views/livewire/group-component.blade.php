<section>
  @include('components.breadcrumb', ['active' => __('main.groups')])
  @include('components.alert')
  <div class="card">
    <div class="card-header">
      <div class="d-flex justify-content-between">
        <h4>{{ __('main.lists') }}</h4>
        @can('create', \App\Livewire\GroupComponent::class)
          <button wire:click="create" class="btn btn-success"><i class="fas fa-plus mr-1"></i> {{ __('main.create') }}</button>
        @endcan
      </div>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tbody>
        <tr>
          <th style="width: 10px">#</th>
          <th>{{ __('main.name') }}</th>
          <th style="width: 40px">{{ __('main.actions') }}</th>
        </tr>
        @foreach($groups as $group)
          <tr>
            <td>{{ ($groups->currentPage()-1) * $groups ->perpage() + $loop->index +1 }}.</td>
            <td>{{ $group->title }}</td>
            <td>
              <div class="d-flex">
                @can('view', \App\Livewire\GroupComponent::class)
                  <button wire:click="show({{ $group->id }})" class="btn btn-sm btn-light"><i class="fas fa-eye"></i></button>
                @endcan
                @can('update', \App\Livewire\GroupComponent::class)
                  <button wire:click="edit({{ $group->id }})" class="btn btn-sm btn-light mx-2"><i class="fas fa-pencil-alt text-primary"></i></button>
                @endcan
                @can('destroy', \App\Livewire\GroupComponent::class)
                  <button wire:click="delete({{ $group->id }})" class="btn btn-sm btn-light"><i class="fas fa-trash text-danger"></i></button>
                @endcan
              </div>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
      <div class="float-right pagination-sm mt-3">
        {{ $groups->links() }}
      </div>
    </div>
  </div>

  <x-modal id="create">
    <x-slot name="title">{{ __('main.create') }}</x-slot>
    <x-slot name="body">
      <form wire:submit="store">
        <div class="form-group">
          <label class="required" for="title_uz">{{ __('main.name') }} ({{ __('main.uzbek') }})</label>
          <input type="text" wire:model="title_uz" class="form-control @error('title_uz') is-invalid @enderror" id="title_uz">
          @error('title_uz')
          <span class="invalid-feedback">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="title_ru">{{ __('main.name') }} ({{ __('main.russian') }})</label>
          <input type="text" wire:model="title_ru" class="form-control @error('title_ru') is-invalid @enderror" id="title_ru">
          @error('title_ru')
          <span class="invalid-feedback">{{ $message }}</span>
          @enderror
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
          <td>{{ $title_uz }}</td>
        </tr>
        <tr>
          <td>{{ __('main.russian') }} :</td>
          <td>{{ $title_ru }}</td>
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
          <label class="required" for="title_uz">{{ __('main.name') }} ({{ __('main.uzbek') }})</label>
          <input type="text" wire:model="title_uz" class="form-control @error('title_uz') is-invalid @enderror" id="title_uz">
          @error('title_uz')
          <span class="invalid-feedback">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="title_ru">{{ __('main.name') }} ({{ __('main.russian') }})</label>
          <input type="text" wire:model="title_ru" class="form-control @error('title_ru') is-invalid @enderror" id="title_ru">
          @error('title_ru')
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

