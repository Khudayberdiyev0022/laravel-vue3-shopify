<div class="card">
  @if(@$errors->any())
    <div class="card-header">
      <ul class="mb-0">
        @foreach($errors->all() as $error)
          <li class="text-danger">{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  <div class="card-body">

    <form action="{{ $action }}" method="POST">
      @csrf
      @method($method)
      <div class="row">
        <div class="col-6">
          <div class="form-group">
            <label for="group" class="font-weight-normal">Group</label>
            <input type="text" name="group" value="{{ old('group', $translation->group) }}" class="form-control @error('group') is-invalid @enderror" id="group">
          </div>
        </div>
        <div class="col-6">
          <div class="form-group">
            <label for="key" class="font-weight-normal">Key</label>
            <input type="text" name="key" value="{{ old('key', $translation->key) }}" class="form-control @error('key') is-invalid @enderror" id="key">
          </div>
        </div>
      </div>
      @foreach(\App\Models\Language::query()->latest('id')->get() as $language)
        <div class="form-group">
          <label for="text" class="font-weight-normal">Text ({{ $language->name }})</label>
          <textarea name="text[{{ $language->id }}]" class="form-control" id="text" rows="5">{{ old("text.{$language->id}", $translation->text[$language->id] ?? '') }}</textarea>
        </div>
      @endforeach
      <button type="submit" class="btn btn-primary float-right">
        Create Language
      </button>
    </form>
  </div>
</div>
