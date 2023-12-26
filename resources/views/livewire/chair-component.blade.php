<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        @include('components.alert')
        <div class="card">
          <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
              <h3 class="card-title">Kafedra</h3>
              <button wire:click="create" wire:keydown.escape="close" class="btn btn-success"><i class="fas fa-plus"></i> Qo'shish</button>
            </div>
          </div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
              <tr>
                <th style="width: 10px">#</th>
                <th>Nomi</th>
                <th>Yaratilgan vaqti</th>
                <th style="width: 40px">Amallar</th>
              </tr>
              </thead>
              <tbody>
              @foreach($chairs as $chair)
                <tr>
                  <td>{{ ($chairs->currentPage()-1) * $chairs ->perpage() + $loop->index +1 }}.</td>
                  <td>{{ $chair->name }}</td>
                  <td>{{ $chair->created_at }}</td>
                  <td>
                    <div class="d-flex">
                      <button wire:click="show({{ $chair->id }})" wire:keydown.escape="close" class="btn btn-sm btn-secondary"><i class="fas fa-eye"></i></button>
                      <button wire:click="edit({{ $chair->id }})" wire:keydown.escape="close" class="btn btn-sm btn-primary mx-2"><i class="fas fa-pencil-alt"></i></button>
                      <button wire:click="delete({{ $chair->id }})" wire:keydown.escape="close" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                    </div>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
          <div class="card-footer">
            <div class="float-right pagination-sm">
              {{ $chairs->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <x-modal id="create" >
    <x-slot name="title">Добавить</x-slot>
    <x-slot name="body">
      <form wire:submit="store">
        <div class="form-group">
          <label>Nomi</label>
          <input type="text" wire:model="name" class="form-control @error('name') is-invalid @enderror">
          @error('name')
          <span class="invalid-feedback">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary" style="float: right"><i class="fas fa-save mr-1"></i> Add Student</button>
        </div>
      </form>
    </x-slot>
  </x-modal>

  <x-modal id="show" >
    <x-slot name="title">Chair Information</x-slot>
    <x-slot name="body" >
      <table class="table table-bordered">
        <tbody>
        <tr>
          <th>Nomi:</th>
          <td>{{ $name }}</td>
        </tr>
        </tbody>
      </table>
    </x-slot>
  </x-modal>

  <x-modal id="edit">
    <x-slot name="title">Редактировать</x-slot>
    <x-slot name="body">
      <form wire:submit="update">
        <div class="form-group">
          <label>Nomi</label>
          <input type="text" wire:model="name" class="form-control @error('name') is-invalid @enderror">
          @error('name')
          <span class="invalid-feedback">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary" style="float: right"><i class="fas fa-save mr-1"></i> Edit Chair</button>
        </div>
      </form>
    </x-slot>
  </x-modal>

  <x-modal id="delete">
    <x-slot name="title">Delete Confirmation</x-slot>
    <x-slot name="body">
      <h6>Are you sure? You want to delete this student data!</h6>

    </x-slot>
    <x-slot name="footer">
      <button class="btn btn-sm btn-primary" wire:click="close" data-dismiss="modal" aria-label="Close">Cancel</button>
      <button class="btn btn-sm btn-danger" wire:click="deleteConfirm()">Yes! Delete</button>
    </x-slot>
  </x-modal>

</div>
