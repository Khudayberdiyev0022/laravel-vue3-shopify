<section>
  {{--    <div wire:loading.delay.longest class="bg-red">...</div>  <!-- 1000ms -->--}}

  <div class="card">
    {{--          <div wire:loading class="vh-100 position-relative opacity-75">--}}
    {{--            <p style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%)">--}}
    {{--              Loading...--}}
    {{--            </p>--}}
    {{--          </div>--}}
    <div class="card-header">
      <div class="d-flex justify-content-between align-items-center">
        <h3 class="card-title">Admissions</h3>
        <button wire:click="create" wire:keydown.escape="close" class="btn btn-success"><i class="fas fa-plus"></i> Qo'shish</button>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table class="table table-bordered">
        <thead>
        <tr>
          <th style="width: 10px">#</th>
          <th>Yil</th>
          <th>Yaratilgan vaqti</th>
          <th>Tugash vaqti</th>
          <th style="width: 40px">Amallar</th>
        </tr>
        </thead>
        <tbody>
        @foreach($admissions as $admission)
          <tr>
            <td>{{ ($admissions->currentPage()-1) * $admissions ->perpage() + $loop->index +1 }}.</td>
            <td>{{ $admission->year }}</td>
            <td>{{ $admission->start_date }}</td>
            <td>{{ $admission->end_date }}</td>
            <td>
              <div class="d-flex">
                <button wire:click="show({{ $admission->id }})" wire:keydown.escape="close" class="btn btn-sm btn-secondary"><i class="fas fa-eye"></i></button>
                <button wire:click="edit({{ $admission->id }})" wire:keydown.escape="close" class="btn btn-sm btn-primary mx-2"><i class="fas fa-pencil-alt"></i></button>
                <button wire:click="delete({{ $admission->id }})" wire:keydown.escape="close" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
              </div>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
    @if($admissions->hasPages())
      <div class="card-footer">
        <div class="float-right pagination-sm">
          {{ $admissions->links() }}
        </div>
      </div>
    @endif
  </div>

  <x-modal id="create">
    <x-slot name="title">Добавить</x-slot>
    <x-slot name="body">
      <form wire:submit="store">
        <div class="form-group">
          <label>Year</label>
          <input type="number" wire:model="year" onKeyDown="if(this.value.length==4) return false;" class="form-control @error('year') is-invalid @enderror">
          @error('year')
          <span class="invalid-feedback">{{ $message }}</span>
          @enderror
        </div>

        <div class="form-group">
          <label>Start Date</label>
          <input type="datetime-local" wire:model="start_date" class="form-control @error('start_date') is-invalid @enderror">
          @error('start_date')
          <span class="invalid-feedback">{{ $message }}</span>
          @enderror
        </div>

        <div class="form-group">
          <label>End Date</label>
          <input type="datetime-local" wire:model="end_date" class="form-control @error('end_date') is-invalid @enderror">
          @error('end_date')
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
    <x-slot name="title">Admission Information</x-slot>
    <x-slot name="body">
      <table class="table table-bordered">
        <tbody>
        <tr>
          <th>Year:</th>
          <td>{{ $year }}</td>
        </tr>

        <tr>
          <th>Start Date:</th>
          <td>{{ $start_date }}</td>
        </tr>

        <tr>
          <th>End Date:</th>
          <td>{{ $end_date }}</td>
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
          <label>Year</label>
          <input type="number" wire:model="year" class="form-control @error('year') is-invalid @enderror">
          @error('year')
          <span class="invalid-feedback">{{ $message }}</span>
          @enderror
        </div>

        <div class="form-group">
          <label>Start Date</label>
          <input type="datetime-local" wire:model="start_date" class="form-control @error('start_date') is-invalid @enderror">
          @error('start_date')
          <span class="invalid-feedback">{{ $message }}</span>
          @enderror
        </div>

        <div class="form-group">
          <label>End Date</label>
          <input type="datetime-local" wire:model="end_date" class="form-control @error('end_date') is-invalid @enderror">
          @error('end_date')
          <span class="invalid-feedback">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary" style="float: right"><i class="fas fa-save mr-1"></i> Edit Student</button>
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

