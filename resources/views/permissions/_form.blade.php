<div class="card-body">
  <div class="form-group">
    <label>{{ __('words.permission_name') }}</label>
    <input type="text" name="name" value="{{ $permission->name ?? '' }}" class="form-control">
    @error('name')
    <div class="text-danger">{{ $message }}</div>
    @enderror
  </div>
  <input type="hidden" name="guard_name" value="web">
</div>
<div class="card-footer text-right">
  <button class="btn btn-primary mr-1" type="submit">{{ __('words.submit') }}</button>
</div>
