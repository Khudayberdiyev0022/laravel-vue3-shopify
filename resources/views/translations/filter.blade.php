<div class="bg-light rounded mt-3 p-3">
  <form action="{{ route('translations.index') }}" method="GET">
    <div class="row">
      <div class="col-3">
        <div class="form-group mb-0">
          <select name="group" class="form-control custom-select">
            <option value="">{{ __('main.groups') }}</option>
            @foreach(\App\Models\Translation::query()->distinct()->pluck('group') as $group)
            <option value="{{ $group }}" {{ $group === request('group') ? 'selected' : '' }}>{{ $group }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="col-2">
        <div class="form-group mb-0">
          <input type="text" name="key" value="{{ request('key') }}" class="form-control" placeholder="{{ __('main.key') }}">
        </div>
      </div>
      <div class="col-3">
        <div class="form-group mb-0">
          <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="{{ __('main.text') }}">
        </div>
      </div>
      <div class="col-2">
        <a href="{{ route('translations.index') }}" class="btn btn-secondary w-100">{{ __('main.clear') }}</a>
      </div>
      <div class="col-2">
        <button type="submit" class="btn btn-primary w-100">{{ __('main.apply') }}</button>
      </div>
    </div>
  </form>
</div>
