@extends('layouts.app')

@section('content')
  <section>
    <div class="card">
      <div class="card-header">
        <div class="float-start">
          Create Faculty
        </div>
      </div>
      <div class="card-body">
        <form action="{{ route('faculties.store') }}" method="POST">
          @csrf
          <div class="form-group">
            <label for="name">Nomi</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}">
            @error('name')
            <span class="invalid-feedback">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="content">Kontent</label>
            <input type="text" name="content" class="form-control @error('content') is-invalid @enderror" id="content" value="{{ old('content') }}">
            @error('content')
            <span class="invalid-feedback">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="abbr">Abbr</label>
            <input type="text" name="abbr" class="form-control @error('abbr') is-invalid @enderror" id="abbr" value="{{ old('abbr') }}">
            @error('abbr')
            <span class="invalid-feedback">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="type">Talim turi</label>
            <select name="type" class="form-control" id="type">
              <option value="0">Kunduzgi</option>
              <option value="1">Kechki</option>
            </select>
            @error('password_confirmation')
            <span class="invalid-feedback">{{ $message }}</span>
            @enderror
          </div>
          <button type="submit" class="btn btn-primary float-right">Save</button>
        </form>
      </div>
    </div>
  </section>
@endsection
