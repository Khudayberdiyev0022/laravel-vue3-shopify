<section class="content">
  <div class="container-fluid">

    {{--    <div wire:loading.delay.longest class="bg-red">...</div>  <!-- 1000ms -->--}}
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-12">
        @include('components.alert')
        <div class="card">
          <div wire:loading class="vh-100 position-relative opacity-25">
            <p style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%)">
              Loading...
            </p>
          </div>
          <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
              <h3 class="card-title">Departments</h3>
              <button wire:click="create" class="btn btn-success"><i class="fas fa-plus"></i> Qo'shish</button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
              <tr>
                <th style="width: 10px">#</th>
                <th>Title</th>
                <th>Phone</th>
                <th>Email</th>
                <th style="width: 40px">Amallar</th>
              </tr>
              </thead>
              <tbody>
              @foreach($departments as $department)
                <tr>
                  <td>{{ ($departments->currentPage()-1) * $departments ->perpage() + $loop->index +1 }}.</td>
                  <td>{{ $department->getTitle() }}</td>
                  <td>{{ $department->phone }}</td>
                  <td>{{ $department->email }}</td>
                  <td>
                    <div class="d-flex">
                      <button wire:click="show({{ $department->id }})" class="btn btn-sm btn-secondary"><i class="fas fa-eye"></i></button>
                      <button wire:click="edit({{ $department->id }})" class="btn btn-sm btn-primary mx-2"><i class="fas fa-pencil-alt"></i></button>
                      <button wire:click="delete({{ $department->id }})" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                    </div>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <div class="float-right pagination-sm">
              {{ $departments->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.row -->
  </div>

  <x-modal id="create">
    <x-slot name="title">Добавить</x-slot>
    <x-slot name="body">
      <form wire:submit="store">
        <ul class="nav nav-tabs mb-3" id="custom-tabs-four-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="uz-tab" data-toggle="pill" href="#uz" role="tab" aria-controls="uz" aria-selected="true">UZ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="ru-tab" data-toggle="pill" href="#ru" role="tab" aria-controls="ru" aria-selected="false">RU</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="en-tab" data-toggle="pill" href="#en" role="tab" aria-controls="en" aria-selected="false">EN</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="ar-tab" data-toggle="pill" href="#ar" role="tab" aria-controls="ar" aria-selected="false">AR</a>
          </li>
        </ul>
        <div class="tab-content" id="custom-tabs-four-tabContent">
          <div class="tab-pane fade active show" id="uz" role="tabpanel" aria-labelledby="uz-tab">
            <div class="form-group">
              <label>Title UZ</label>
              <input type="text" wire:model="title_uz" class="form-control @error('title_uz') is-invalid @enderror">
              @error('title_uz')
              <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="tab-pane fade" id="ru" role="tabpanel" aria-labelledby="ru-tab">
            <div class="form-group">
              <label>Title RU</label>
              <input type="text" wire:model="title_ru" class="form-control @error('title_ru') is-invalid @enderror">
              @error('title_ru')
              <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="tab-pane fade" id="en" role="tabpanel" aria-labelledby="en-tab">
            <div class="form-group">
              <label>Title EN</label>
              <input type="text" wire:model="title_en" class="form-control @error('title_en') is-invalid @enderror">
              @error('title_en')
              <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="tab-pane fade" id="ar" role="tabpanel" aria-labelledby="ar-tab">
            <div class="form-group">
              <label>Title AR</label>
              <input type="text" wire:model="title_ar" class="form-control @error('title_ar') is-invalid @enderror">
              @error('title_ar')
              <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>
          </div>
        </div>
        <div class="form-group">
          <label>Phone</label>
          <input type="tel" wire:model="phone" class="form-control @error('phone') is-invalid @enderror">
          @error('phone')
          <span class="invalid-feedback">{{ $message }}</span>
          @enderror
        </div>

        <div class="form-group">
          <label>Email</label>
          <input type="email" wire:model="email" class="form-control @error('email') is-invalid @enderror">
          @error('email')
          <span class="invalid-feedback">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary" style="float: right"><i class="fas fa-save mr-1"></i> Add Department</button>
        </div>
      </form>
    </x-slot>
  </x-modal>

  <x-modal id="show">
    <x-slot name="title">Department Information</x-slot>
    <x-slot name="body">
      <table class="table table-bordered">
        <tbody>
        <tr>
          <th>Title:</th>
          <td>{{ $title_uz }}</td>
        </tr>

        <tr>
          <th>Phone:</th>
          <td>{{ $phone }}</td>
        </tr>

        <tr>
          <th>Email:</th>
          <td>{{ $email }}</td>
        </tr>
        </tbody>
      </table>
    </x-slot>
  </x-modal>

  <x-modal id="edit">
    <x-slot name="title">Редактировать</x-slot>
    <x-slot name="body">
      <form wire:submit="update">
        <ul class="nav nav-tabs mb-3" id="custom-tabs-four-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="edit-uz-tab" data-toggle="pill" href="#edit-uz" role="tab" aria-controls="edit-uz" aria-selected="true">UZ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="edit-ru-tab" data-toggle="pill" href="#edit-ru" role="tab" aria-controls="edit-ru" aria-selected="false">RU</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="edit-en-tab" data-toggle="pill" href="#edit-en" role="tab" aria-controls="edit-en" aria-selected="false">EN</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="edit-ar-tab" data-toggle="pill" href="#edit-ar" role="tab" aria-controls="edit-ar" aria-selected="false">AR</a>
          </li>
        </ul>
        <div class="tab-content" id="custom-tabs-four-tabContent">
          <div class="tab-pane fade active show" id="edit-uz" role="tabpanel" aria-labelledby="edit-uz-tab">
            <div class="form-group">
              <label>Title UZ</label>
              <input type="text" wire:model="title_uz" class="form-control @error('title_uz') is-invalid @enderror">
              @error('title_uz')
              <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="tab-pane fade" id="edit-ru" role="tabpanel" aria-labelledby="edit-ru-tab">
            <div class="form-group">
              <label>Title RU</label>
              <input type="text" wire:model="title_ru" class="form-control @error('title_ru') is-invalid @enderror">
              @error('title_ru')
              <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="tab-pane fade" id="edit-en" role="tabpanel" aria-labelledby="edit-en-tab">
            <div class="form-group">
              <label>Title EN</label>
              <input type="text" wire:model="title_en" class="form-control @error('title_en') is-invalid @enderror">
              @error('title_en')
              <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="tab-pane fade" id="edit-ar" role="tabpanel" aria-labelledby="edit-ar-tab">
            <div class="form-group">
              <label>Title AR</label>
              <input type="text" wire:model="title_ar" class="form-control @error('title_ar') is-invalid @enderror">
              @error('title_ar')
              <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>
          </div>
        </div>

        <div class="form-group">
          <label>Phone</label>
          <input type="tel" wire:model="phone" class="form-control @error('phone') is-invalid @enderror">
          @error('phone')
          <span class="invalid-feedback">{{ $message }}</span>
          @enderror
        </div>

        <div class="form-group">
          <label>Email</label>
          <input type="email" wire:model="email" class="form-control @error('email') is-invalid @enderror">
          @error('email')
          <span class="invalid-feedback">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary" style="float: right"><i class="fas fa-save mr-1"></i> Edit Department</button>
        </div>
      </form>
    </x-slot>
  </x-modal>

  <x-modal id="delete">
    <x-slot name="title">Delete Confirmation</x-slot>
    <x-slot name="body">
      <h6>Are you sure? You want to delete this department data!</h6>

    </x-slot>
    <x-slot name="footer">
      <button class="btn btn-sm btn-primary" wire:click="close" data-dismiss="modal" aria-label="Close">Cancel</button>
      <button class="btn btn-sm btn-danger" wire:click="deleteConfirm()">Yes! Delete</button>
    </x-slot>
  </x-modal>


</section>

