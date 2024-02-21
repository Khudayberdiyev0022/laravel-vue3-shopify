<div>
  <div class="row">
    <div class="col-6">
      <div class="form-group">
        <label for="department_id">{{ __('main.department') }}</label>
        <select wire:model.live="selectedDepartment" class="form-control custom-select @error("department_id") is-invalid @enderror" name="department_id" id="department_id">
          <option value="" selected>-- {{ __('main.choose_department') }} --</option>
          @foreach($departments as $department)
            <option value="{{ $department->id }}">{{ $department->title }}</option>
          @endforeach
        </select>
        @error("department_id")
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
    </div>
    <div class="col-6">
      @if (!is_null($selectedDepartment))
        <div class="form-group">
          <label for="position_id" >{{ __('main.position') }}</label>
          <select class="form-control custom-select  @error("position_id") is-invalid @enderror" name="position_id" id="position_id">
            <option value="" selected>-- {{ __('main.choose_position') }} --</option>
            @foreach($positions as $position)
              <option value="{{ $position->id }}">{{ $position->title }}</option>
            @endforeach
          </select>
          @error("position_id")
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
      @endif
    </div>
  </div>
</div>
