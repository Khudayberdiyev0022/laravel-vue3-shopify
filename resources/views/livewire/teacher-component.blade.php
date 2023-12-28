<section>
  <div class="card">
    <div class="card-header">
      <div class="d-flex justify-content-between align-items-center">
        <h3 class="card-title">Professor o'qituvchilar</h3>
        <button wire:click="create" wire:keydown.escape="close" class="btn btn-success"><i class="fas fa-plus"></i> Qo'shish</button>
      </div>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <thead>
        <tr>
          <th style="width: 10px">#</th>
          <th>Rasm</th>
          <th>F.I.O</th>
          <th>Tug'ilgan sanasi</th>
          <th>Telefon raqami</th>
          <th style="width: 40px">Amallar</th>
        </tr>
        </thead>
        <tbody>
        @foreach($teachers as $teacher)
          <tr>
            <td>{{ ($teachers->currentPage()-1) * $teachers ->perpage() + $loop->index +1 }}.</td>
            <td><img src="{{ asset($teacher->image) }}" alt="" width="80" height="80"></td>
            <td>{{ $teacher->name }} {{ $teacher->surname }} {{ $teacher->middlename }}</td>
            <td>{{ $teacher->date_of_birth }}</td>
            <td>{{ $teacher->phone }}</td>
            <td>
              <div class="d-flex">
                <button wire:click="show({{ $teacher->id }})" wire:keydown.escape="close" class="btn btn-sm btn-secondary"><i class="fas fa-eye"></i></button>
                <button wire:click="edit({{ $teacher->id }})" wire:keydown.escape="close" class="btn btn-sm btn-primary mx-2"><i class="fas fa-pencil-alt"></i></button>
                <button wire:click="delete({{ $teacher->id }})" wire:keydown.escape="close" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
              </div>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
    <div class="card-footer">
      <div class="float-right pagination-sm">
        {{ $teachers->links() }}
      </div>
    </div>
  </div>

  <x-modal id="create">
    <x-slot name="title">Добавить</x-slot>
    <x-slot name="body">
      <form wire:submit="store">
        <div class="form-group">
          <label>Ismi</label>
          <input type="text" wire:model="name" class="form-control @error('name') is-invalid @enderror">
          @error('name')
          <span class="invalid-feedback">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group">
          <label>Familiyasi</label>
          <input type="text" wire:model="surname" class="form-control @error('surname') is-invalid @enderror">
          @error('surname')
          <span class="invalid-feedback">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group">
          <label>Otasini ismi</label>
          <input type="text" wire:model="middlename" class="form-control @error('middlename') is-invalid @enderror">
          @error('middlename')
          <span class="invalid-feedback">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group">
          <label>Telefon raqami</label>
          <input type="text" wire:model="phone" class="form-control @error('phone') is-invalid @enderror">
          @error('phone')
          <span class="invalid-feedback">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group">
          <label>Pasport seriyasi</label>
          <input type="text" wire:model="passport" class="form-control @error('passport') is-invalid @enderror">
          @error('passport')
          <span class="invalid-feedback">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group">
          <label>Tug'ilgan sanasi</label>
          <input type="text" wire:model="date_of_birth" class="form-control @error('date_of_birth') is-invalid @enderror">
          @error('date_of_birth')
          <span class="invalid-feedback">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group">
          <label>Rasm yuklash</label>
          <input type="file" wire:model="image" class="form-control @error('image') is-invalid @enderror">
          @error('image')
          <span class="invalid-feedback">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary" style="float: right"><i class="fas fa-save mr-1"></i> Add Student</button>
        </div>
      </form>
    </x-slot>
  </x-modal>

  <x-modal id="show">
    <x-slot name="title">Teacher Information</x-slot>
    <x-slot name="body">
      <table class="table table-bordered">
        <tbody>
        <tr>
          <th>Ismi:</th>
          <td>{{ $name }}</td>
        </tr>
        <tr>
          <th>Familiyasi:</th>
          <td>{{ $middlename }}</td>
        </tr>
        <tr>
          <th>Otasini ismi:</th>
          <td>{{ $surname }}</td>
        </tr>
        <tr>
          <th>Telefon raqami:</th>
          <td>{{ $phone }}</td>
        </tr>
        <tr>
          <th>Pasport seriyasi:</th>
          <td>{{ $passport }}</td>
        </tr>
        <tr>
          <th>Tug'ilgan sanasi:</th>
          <td>{{ $date_of_birth }}</td>
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
          <label>Ismi</label>
          <input type="text" wire:model="name" class="form-control @error('name') is-invalid @enderror">
          @error('name')
          <span class="invalid-feedback">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group">
          <label>Familiyasi</label>
          <input type="text" wire:model="middlename" class="form-control @error('middlename') is-invalid @enderror">
          @error('middlename')
          <span class="invalid-feedback">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group">
          <label>Otasini ismi</label>
          <input type="text" wire:model="surname" class="form-control @error('surname') is-invalid @enderror">
          @error('surname')
          <span class="invalid-feedback">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group">
          <label>Telefon raqami</label>
          <input type="text" wire:model="phone" class="form-control @error('phone') is-invalid @enderror">
          @error('phone')
          <span class="invalid-feedback">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group">
          <label>Pasport seriyasi</label>
          <input type="text" wire:model="passport" class="form-control @error('passport') is-invalid @enderror">
          @error('passport')
          <span class="invalid-feedback">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group">
          <label>Tug'ilgan sanasi</label>
          <input type="text" wire:model="date_of_birth" class="form-control @error('date_of_birth') is-invalid @enderror">
          @error('date_of_birth')
          <span class="invalid-feedback">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary" style="float: right"><i class="fas fa-save mr-1"></i> Edit Teacher</button>
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
</section>
