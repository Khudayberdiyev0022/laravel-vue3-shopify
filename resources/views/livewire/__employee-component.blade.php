<section>
  @include('components.breadcrumb', ['active' => __('main.employees')])
  @include('components.alert')
  <div class="card">
    <div class="card-header">
      <div class="d-flex justify-content-between">
        <h4>{{ __('main.lists') }}</h4>
        @can('create', \App\Livewire\ChairComponent::class)
          <button wire:click="create" class="btn btn-success"><i class="fas fa-plus mr-1"></i> {{ __('main.create') }}</button>
        @endcan
      </div>
    </div>
    <div class="card-body">
      <table class="datatable table table-bordered">
        <thead>
        <tr>
          <th>#</th>
          <th width="40">{{ __('main.image') }}</th>
          <th>{{ __('main.fullname') }}</th>
          <th>{{ __('main.department') }}</th>
          <th>{{ __('main.position') }}</th>
          <th>{{ __('main.phone') }}</th>
          <th>{{ __('main.status') }}</th>
          <th>{{ __('main.actions') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($employees as $employee)
          <tr>
            <td>{{ $employee->id }}.</td>
            <td>
              <div class="d-flex justify-content-center align-items-center">
                <a href="{{ asset($employee->image ?? 'assets/images/logo.svg') }}" data-fancybox="gallery" data-caption="{{ $employee->getFullName() }}">
                  <img src="{{ asset($employee->image ?? 'assets/images/logo.svg') }}" alt=""
                       width="40" height="40" @if($employee->image) style="object-fit: cover" @else style="object-fit: contain" @endif>
                </a>
              </div>
            </td>
            <td>
              <button wire:click="show({{ $employee->id }})" class="btn btn-sm btn-light">{{ \Illuminate\Support\Str::title($employee->getFullName()) }}</button>
            </td>
            <td>{{ $employee->employeePosition->department->title ?? __('main.no_department') }}</td>

            <td>{{ $employee->employeePosition->position->title ?? __('main.no_position') }}</td>

            <td>
              @if($employee->phone)
                <a href="tel:+998{{ $employee->phone }}"> +998 {{ $employee->phone }}</a>
              @else
                <span>{{ __('main.no_phone') }}</span>
              @endif
            </td>
            <td>{!! $employee->getStatus() !!}</td>
            <td>
              <div class="d-flex">
                @can('view', \App\Livewire\EmployeeComponent::class)
                  <button wire:click="show({{ $employee->id }})" class="btn btn-sm btn-light"><i class="fas fa-eye"></i></button>
                @endcan
                @can('update', \App\Livewire\EmployeeComponent::class)
                  <button wire:click="edit({{ $employee->id }})" class="btn btn-sm btn-light mx-2"><i class="fas fa-pencil-alt text-primary"></i></button>
                @endcan
                @can('destroy', \App\Livewire\EmployeeComponent::class)
                  <button wire:click="delete({{ $employee->id }})" class="btn btn-sm btn-light"><i class="fas fa-trash text-danger"></i></button>
                @endcan
              </div>
            </td>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
      <div class="float-right pagination-sm mt-3">
        {{--        {{ $employees->links() }}--}}
      </div>
    </div>
  </div>

  <x-modal id="create" size="modal-xl modal-fullscreen" >
    <x-slot name="title">{{ __('main.create') }}</x-slot>
    <x-slot name="body">
      <form wire:submit="store">
        <div class="row">
          <div class="col-6">
            <div class="form-group">
              <label class="required" for="firstname">{{ __('main.firstname') }}</label>
              <input type="text" name="firstname" value="{{ old("firstname", $employee->firstname) }}" class="form-control @error("firstname") is-invalid @enderror" id="firstname" autofocus>
              @error("firstname")
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="middlename">{{ __('main.middlename') }}</label>
              <input type="text" name="middlename" value="{{ old('middlename', $employee->middlename) }}" class="form-control" id="middlename">
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label class="required" for="lastname">{{ __('main.lastname') }}</label>
              <input type="text" name="lastname" value="{{ old('lastname', $employee->lastname) }}" class="form-control @error('lastname') is-invalid @enderror" id="lastname">
              @error('lastname')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="address">{{ __('main.residential_address') }}</label>
              <textarea name="address" class="form-control" id="address" rows="1">{{ old('address', $employee->employeeInfo->address ?? '') }}</textarea>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-6">
            @livewire('department-position-select')
            <div class="row">
              <div class="col-4">
                <div class="form-group">
                  <label for="phone">{{ __('main.phone') }}</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    </div>
                    <input type="text" name="phone" value="{{ old('phone', $employee->phone) }}" class="form-control" id="phone">
                  </div>
                </div>
                <div class="form-group">
                  <label for="email">{{ __('main.email') }}</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    </div>
                    <input type="email" name="email" value="{{ old('email', $employee->email) }}" class="form-control" id="email">
                  </div>
                </div>

              </div>
              <div class="col-4">
                <div class="form-group">
                  <label for="jshshir" class="form-label">{{ __('main.jshshir') }}</label>
                  <input type="text" name="jshshir" value="{{ old('jshshir', $employee->employeeInfo->jshshir ?? '') }}" id="jshshir" class="form-control">
                </div>
                <div class="form-group">
                  <label for="date_of_birth">{{ __('main.date_of_birth') }} </label>
                  <input type="date" name="date_of_birth" value="{{ old('date_of_birth', $employee->employeeInfo->date_of_birth ?? '') }}" class="form-control">
                </div>

              </div>
              <div class="col-4">
                <div class="form-group">
                  <label for="inn" class="form-label">{{ __('main.inn') }}</label>
                  <input type="text" name="inn" value="{{ old('inn', $employee->employeeInfo->inn ?? '') }}" id="inn" class="form-control">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-4">
                <div class="form-group">
                  <label for="passport">{{ __('main.passport') }} </label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-passport"></i></span>
                    </div>
                    <input type="text" name="passport" value="{{ old('passport', $employee->employeeInfo->passport ?? '') }}" class="form-control">
                  </div>

                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label for="passport_issue_date" class="form-label">{{ __('main.passport_issue_date') }}</label>
                  <input type="date" name="passport_issue_date" value="{{ old('passport_issue_date', $employee->employeeInfo->passport_issue_date ?? '') }}" class="form-control">
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label for="passport_expire_date" class="form-label">{{ __('main.passport_expire_date') }}</label>
                  <input type="date" name="passport_expire_date" value="{{ old('passport_expire_date', $employee->employeeInfo->passport_expire_date ?? '') }}" class="form-control">
                </div>
              </div>
            </div>

          </div>
          <div class="col-6">
            @livewire('region-city-select')
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label class="required" for="nationality_id">{{ __('main.nationality') }} </label>
                  <select name="nationality_id" id="nationality_id" class="form-control custom-select @error('nationality_id') is-invalid @enderror">
                    <option value="">-- {{ __('main.choose_nationality') }} --</option>
                    @foreach($nationalities as $nationality)
                      @if(empty($employee->employeeInfo->nationality_id))
                        <option value="{{ $nationality->id }}">{{ $nationality->title }}</option>
                      @else
                        <option value="{{ $nationality->id }}" {{ $nationality->id == $employee->employeeInfo->nationality_id ? 'selected' : '' }}>{{ $nationality->title }}</option>
                      @endif
                    @endforeach
                  </select>
                  @error("nationality_id")
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label class="required" for="partisan_id">{{ __('main.partisans') }} </label>
                  <select name="partisan_id" id="partisan_id" class="form-control custom-select @error('partisan_id') is-invalid @enderror">
                    <option value="">-- {{ __('main.choose_partisan') }} --</option>
                    @foreach($partisans as $partisan)
                      @if(empty($employee->employeePosition->partisan_id))
                        <option value="{{ $partisan->id }}">{{ $partisan->title }}</option>
                      @else
                        <option value="{{ $partisan->id }}" {{ $partisan->id == $employee->employeePosition->partisan_id ? 'selected' : '' }}>{{ $partisan->title }}</option>
                      @endif
                    @endforeach
                  </select>
                  @error("partisan_id")
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="col-4">
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  {{--            <label for="image">{{ __('main.image') }} (336х448 maxsize 200Kb recommendation size 10-30Kb)</label>--}}
                  <label class="required" for="image">{{ __('main.image') }} </label>
                  <input type="file" name="image" value="{{ old('image', $employee->image) }}" class="form-control @error('image') is-invalid @enderror" id="image">
                  @error('image')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <img src="{{ asset($employee->image ?? 'assets/images/upload-image.jpg') }}" id="preview-image" alt="">
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="status">{{ __('main.status') }} </label>
                  <select name="status" id="status" class="form-control custom-select">
                    <option value="1" {{ $employee->status == 1 ? 'selected' : '' }}>{{ __('main.active') }}</option>
                    <option value="2" {{ $employee->status == 2 ? 'selected' : '' }}>{{ __('main.inactive') }}</option>
                    <option value="3" {{ $employee->status == 3 ? 'selected' : '' }}>{{ __('main.blocked') }}</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>{{ __('main.gender') }} </label>
                  <div class="d-flex">
                    <div class="icheck-primary mr-3">
                      <input type="radio" name="gender" value="0" @checked(old('gender', $employee->gender) == 0) id="male">
                      <label for="male"> <i class="fas fa-male"></i> Erkak </label>
                    </div>
                    <div class="icheck-primary">
                      <input type="radio" name="gender" value="1" id="female" @checked(old('gender', $employee->gender) == 1)>
                      <label for="female"><i class="fas fa-female"></i> Ayol</label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>{{ __('main.location_but') }}</label>
                  <div class="d-flex">
                    <div class="icheck-primary mr-3">
                      <input type="radio" name="location_but" value="1" checked @checked(old('location_but', $employee->location_but) == 1) id="university">
                      <label for="university">{{ __('main.university') }}</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="row justify-content-end">
            <div class="col-3">
              <a href="{{ route('employees.index') }}" class="btn btn-light w-100">{{ __('main.cancel') }}</a>
            </div>
            <div class="col-3">
              <button type="submit" class="btn btn-primary w-100"><i class="fas fa-save mr-1"></i> {{ __('main.save') }}</button>
            </div>
          </div>
        </div>
      </form>
    </x-slot>
  </x-modal>

  <x-modal id="show" size="modal-xl">
    <x-slot name="title">{{ __('main.info') }}</x-slot>
    <x-slot name="body">
      <div class="row">
        <div class="col-4">
          <h3>{{ __('main.main_info') }}</h3>
          <table class="table table-bordered">
            <tbody>
            <tr>
              <th>{{ __('main.image') }}</th>
              <td>
                <a href="{{ asset($image ?? 'assets/images/logo.svg') }}" data-fancybox="gallery" data-caption="{{ $fullname }}">
                  <img src="{{ asset($image ?? 'assets/images/logo.svg') }}" alt=""
                       width="70" height="70" @if($image) style="object-fit: cover" @else style="object-fit: contain" @endif>
                </a>
              </td>
            </tr>
            <tr>
              <th>{{ __('main.fullname') }}</th>
              <td>{{ $fullname }}</td>
            </tr>
            <tr>
              <th>{{ __('main.phone') }}</th>
              <td>{{ $phone }}</td>
            </tr>
            <tr>
              <th>{{ __('main.status') }}</th>
              <td>{!! $status !!}</td>
            </tr>
            <tr>
              <th>{{ __('main.gender') }}</th>
              <td>{{ $gender }}</td>
            </tr>
            <tr>
              <th>{{ __('main.location_but') }}</th>
              <td>{{ $location_but }}</td>
            </tr>
            </tbody>
          </table>
          <h3>{{ __('main.position_info') }}</h3>
          <table class="table table-bordered">
            <tbody>
            <tr>
              <th>{{ __('main.department') }}</th>
              <td>{{ $department_id ?? '' }}</td>
            </tr>
            <tr>
              <th>{{ __('main.position') }}</th>
              <td>{{ $position_id ?? '' }}</td>
            </tr>
            <tr>
              <th>{{ __('main.partisan_access') }}</th>
              <td>{{ $partisan_id ?? '' }}</td>
            </tr>
            </tbody>
          </table>
        </div>
        <div class="col-8">
          <div class="d-flex justify-content-between align-items-center">
            <h3>{{ __('main.sub_info') }}</h3>
{{--            <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-info btn-sm"><i class="fas fa-pen"></i> {{ __('main.edit') }}</a>--}}
          </div>
          <table class="table table-bordered">
            <tbody>
            <tr>
              <th>ID</th>
              <td>{{ $employee_id }}</td>
            </tr>
            <tr>
              <th>{{ __('main.region') }}</th>
              <td>{{ $region_id ?? '' }}</td>
            </tr>
            <tr>
              <th>{{ __('main.city') }}</th>
              <td>{{ $city_id ?? '' }}</td>
            </tr>
            <tr>
              <th>{{ __('main.address') }}</th>
              <td>{{ $address ?? '' }}</td>
            </tr>

            <tr>
              <th>{{ __('main.nationality') }}</th>
              <td>{{ $nationality->title ?? '' }}</td>
            </tr>
            <tr>
              <th>{{ __('main.date_of_birth') }}</th>
              <td>{{ $date_of_birth ?? '' }}</td>
            </tr>
            <tr>
              <th>{{ __('main.jshshir') }}</th>
              <td>{{ $jshshir ?? '' }}</td>
            </tr>
            <tr>
              <th>{{ __('main.passport') }}</th>
              <td>{{ $passport ?? '' }}</td>
            </tr>
            <tr>
              <th>{{ __('main.passport_issue_date') }}</th>
              <td>{{ $passport_issue_date ?? '' }}</td>
            </tr>
            <tr>
              <th>{{ __('main.passport_expire_date') }}</th>
              <td>{{ $passport_expire_date ?? '' }}</td>
            </tr>
            </tbody>
          </table>
        </div>
      </div>
    </x-slot>
  </x-modal>

  <x-modal id="edit">
    <x-slot name="title">{{ __('main.edit') }}</x-slot>
    <x-slot name="body">
      <form wire:submit="update">
        <div class="row">
          <div class="col-6">
            <div class="form-group">
              <label class="required" for="firstname">{{ __('main.firstname') }}</label>
              <input type="text" name="firstname" value="{{ old("firstname", $employee->firstname) }}" class="form-control @error("firstname") is-invalid @enderror" id="firstname" autofocus>
              @error("firstname")
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="middlename">{{ __('main.middlename') }}</label>
              <input type="text" name="middlename" value="{{ old('middlename', $employee->middlename) }}" class="form-control" id="middlename">
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label class="required" for="lastname">{{ __('main.lastname') }}</label>
              <input type="text" name="lastname" value="{{ old('lastname', $employee->lastname) }}" class="form-control @error('lastname') is-invalid @enderror" id="lastname">
              @error('lastname')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="address">{{ __('main.residential_address') }}</label>
              <textarea name="address" class="form-control" id="address" rows="1">{{ old('address', $employee->employeeInfo->address ?? '') }}</textarea>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-6">
            @livewire('department-position-select')
            <div class="row">
              <div class="col-4">
                <div class="form-group">
                  <label for="phone">{{ __('main.phone') }}</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    </div>
                    <input type="text" name="phone" value="{{ old('phone', $employee->phone) }}" class="form-control" id="phone">
                  </div>
                </div>
                <div class="form-group">
                  <label for="email">{{ __('main.email') }}</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    </div>
                    <input type="email" name="email" value="{{ old('email', $employee->email) }}" class="form-control" id="email">
                  </div>
                </div>

              </div>
              <div class="col-4">
                <div class="form-group">
                  <label for="jshshir" class="form-label">{{ __('main.jshshir') }}</label>
                  <input type="text" name="jshshir" value="{{ old('jshshir', $employee->employeeInfo->jshshir ?? '') }}" id="jshshir" class="form-control">
                </div>
                <div class="form-group">
                  <label for="date_of_birth">{{ __('main.date_of_birth') }} </label>
                  <input type="date" name="date_of_birth" value="{{ old('date_of_birth', $employee->employeeInfo->date_of_birth ?? '') }}" class="form-control">
                </div>

              </div>
              <div class="col-4">
                <div class="form-group">
                  <label for="inn" class="form-label">{{ __('main.inn') }}</label>
                  <input type="text" name="inn" value="{{ old('inn', $employee->employeeInfo->inn ?? '') }}" id="inn" class="form-control">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-4">
                <div class="form-group">
                  <label for="passport">{{ __('main.passport') }} </label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-passport"></i></span>
                    </div>
                    <input type="text" name="passport" value="{{ old('passport', $employee->employeeInfo->passport ?? '') }}" class="form-control">
                  </div>

                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label for="passport_issue_date" class="form-label">{{ __('main.passport_issue_date') }}</label>
                  <input type="date" name="passport_issue_date" value="{{ old('passport_issue_date', $employee->employeeInfo->passport_issue_date ?? '') }}" class="form-control">
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label for="passport_expire_date" class="form-label">{{ __('main.passport_expire_date') }}</label>
                  <input type="date" name="passport_expire_date" value="{{ old('passport_expire_date', $employee->employeeInfo->passport_expire_date ?? '') }}" class="form-control">
                </div>
              </div>
            </div>

          </div>
          <div class="col-6">
            @livewire('region-city-select')
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label class="required" for="nationality_id">{{ __('main.nationality') }} </label>
                  <select name="nationality_id" id="nationality_id" class="form-control custom-select @error('nationality_id') is-invalid @enderror">
                    <option value="">-- {{ __('main.choose_nationality') }} --</option>
                    @foreach($nationalities as $nationality)
                      @if(empty($employee->employeeInfo->nationality_id))
                        <option value="{{ $nationality->id }}">{{ $nationality->title }}</option>
                      @else
                        <option value="{{ $nationality->id }}" {{ $nationality->id == $employee->employeeInfo->nationality_id ? 'selected' : '' }}>{{ $nationality->title }}</option>
                      @endif
                    @endforeach
                  </select>
                  @error("nationality_id")
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label class="required" for="partisan_id">{{ __('main.partisans') }} </label>
                  <select name="partisan_id" id="partisan_id" class="form-control custom-select @error('partisan_id') is-invalid @enderror">
                    <option value="">-- {{ __('main.choose_partisan') }} --</option>
                    @foreach($partisans as $partisan)
                      @if(empty($employee->employeePosition->partisan_id))
                        <option value="{{ $partisan->id }}">{{ $partisan->title }}</option>
                      @else
                        <option value="{{ $partisan->id }}" {{ $partisan->id == $employee->employeePosition->partisan_id ? 'selected' : '' }}>{{ $partisan->title }}</option>
                      @endif
                    @endforeach
                  </select>
                  @error("partisan_id")
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="col-4">
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  {{--            <label for="image">{{ __('main.image') }} (336х448 maxsize 200Kb recommendation size 10-30Kb)</label>--}}
                  <label class="required" for="image">{{ __('main.image') }} </label>
                  <input type="file" name="image" value="{{ old('image', $employee->image) }}" class="form-control @error('image') is-invalid @enderror" id="image">
                  @error('image')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <img src="{{ asset($employee->image ?? 'assets/images/upload-image.jpg') }}" id="preview-image" alt="">
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="status">{{ __('main.status') }} </label>
                  <select name="status" id="status" class="form-control custom-select">
                    <option value="1" {{ $employee->status == 1 ? 'selected' : '' }}>{{ __('main.active') }}</option>
                    <option value="2" {{ $employee->status == 2 ? 'selected' : '' }}>{{ __('main.inactive') }}</option>
                    <option value="3" {{ $employee->status == 3 ? 'selected' : '' }}>{{ __('main.blocked') }}</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>{{ __('main.gender') }} </label>
                  <div class="d-flex">
                    <div class="icheck-primary mr-3">
                      <input type="radio" name="gender" value="0" @checked(old('gender', $employee->gender) == 0) id="male">
                      <label for="male"> <i class="fas fa-male"></i> Erkak </label>
                    </div>
                    <div class="icheck-primary">
                      <input type="radio" name="gender" value="1" id="female" @checked(old('gender', $employee->gender) == 1)>
                      <label for="female"><i class="fas fa-female"></i> Ayol</label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>{{ __('main.location_but') }}</label>
                  <div class="d-flex">
                    <div class="icheck-primary mr-3">
                      <input type="radio" name="location_but" value="1" checked @checked(old('location_but', $employee->location_but) == 1) id="university">
                      <label for="university">{{ __('main.university') }}</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row justify-content-end mt-3">
          <div class="col-1">
            <a href="{{ route('employees.index') }}" class="btn btn-light w-100">{{ __('main.cancel') }}</a>
          </div>
          <div class="col-1">
            <button type="submit" class="btn btn-primary w-100"><i class="fas fa-save mr-1"></i> {{ __('main.save') }}</button>
          </div>
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

  @include('components.datatables')
</section>
