<div class="bg-light rounded mt-3 p-3">
  <form action="{{ route('translations.index') }}" method="GET">
    <div class="row">
      <div class="col-3">
        <div class="form-group">
          <select name="group" class="form-control custom-select">
            <option value="">Все группы</option>
            @foreach(\App\Models\Translation::query()->distinct()->pluck('group') as $group)
            <option value="{{ $group }}" {{ $group === request('group') ? 'selected' : '' }}>{{ $group }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="col-3">
        <div class="form-group">
          <input type="text" name="key" value="{{ request('key') }}" class="form-control" placeholder="Ключ">
        </div>
      </div>
      <div class="col-3">
        <div class="form-group">
          <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Поиск по тексту">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col" style="text-align: end">
        <button type="submit" class="btn btn-primary">Применить</button>
        <a href="{{ route('translations.index') }}" class="btn btn-secondary">Очистить</a>
      </div>
    </div>
  </form>
</div>
