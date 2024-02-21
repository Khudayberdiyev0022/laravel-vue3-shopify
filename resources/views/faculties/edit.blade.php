@extends('layouts.app')

@section('content')
  <section>
    <div class="card">
      <div class="card-header">
        <div class="float-start">
          Edit Chair
        </div>
        <div class="float-end">
          <a href="{{ route('chairs.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
        </div>
      </div>
      <div class="card-body">
        <form action="{{ route('chairs.update', $chair->id) }}" method="post">
          @csrf
          @method("PUT")

          <div class="mb-3 row">
            <label for="name" class="col-md-4 col-form-label text-md-end text-start">Name</label>
            <div class="col-md-6">
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $chair->name }}">
              @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
              @endif
            </div>
          </div>

          <div class="mb-3 row">
            <label for="content" class="col-md-4 col-form-label text-md-end text-start">Content</label>
            <div class="col-md-6">
              <input type="text" class="form-control @error('content') is-invalid @enderror" id="content" name="content" value="{{ $chair->content }}">
              @if ($errors->has('content'))
                <span class="text-danger">{{ $errors->first('content') }}</span>
              @endif
            </div>
          </div>

          <div class="mb-3 row">
            <label for="abbr" class="col-md-4 col-form-label text-md-end text-start">Abbr</label>
            <div class="col-md-6">
              <input type="text" class="form-control @error('abbr') is-invalid @enderror" id="abbr" name="abbr" value="{{ $chair->abbr }}">
              @if ($errors->has('abbr'))
                <span class="text-danger">{{ $errors->first('abbr') }}</span>
              @endif
            </div>
          </div>

          <div class="form-group">
            <label for="type">Select type</label>
            <select name="type" class="form-control" id="type">
              <option value="0">Kunduzgi</option>
              <option value="1">Kechki</option>
            </select>
            @error('type')
            <span class="invalid-feedback">{{ $message }}</span>
            @enderror
          </div>

          <div class="mb-3 row">
            <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Update Chair">
          </div>

        </form>
      </div>
    </div>
  </section>
@endsection
