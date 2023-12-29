@extends('layouts.app')
@section('content')
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <form action="{{ route('translations.store') }}" method="POST">
                @csrf
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label for="group" class="font-weight-normal">Group</label>
                      <input type="text" name="group" value="{{ old('group') }}" class="form-control @error('group') is-invalid @enderror" id="group">
                      @error('group')
                      <span class="invalid-feedback">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="key" class="font-weight-normal">Key</label>
                      <input type="text" name="key" value="{{ old('key') }}" class="form-control @error('key') is-invalid @enderror" id="key">
                      @error('key')
                      <span class="invalid-feedback">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                </div>
                @foreach(\App\Models\Language::query()->latest('id')->get() as $language)
                <div class="form-group">
                  <label for="text" class="font-weight-normal">Text ({{ $language->name }})</label>
                  <textarea name="text[{{ $language->id }}]" class="form-control @error('text') is-invalid @enderror" id="text" rows="5">{{ old("text.{$language->id}", $translation->text[$language->id] ?? '') }}</textarea>
                  @error('text')
                  <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
                @endforeach
                <button type="submit" class="btn btn-primary float-right">
                  Create Language
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

