@extends('layouts.app')
@section('content')
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <form action="{{ route('languages.store') }}" method="POST">
                @csrf
                <div class="form-group">
                  <label for="id" class="font-weight-normal">ID (Kod: uz, ru, ar...)</label>
                  <input type="text" name="id" value="{{ old('id') }}" class="form-control @error('id') is-invalid @enderror" id="id">
                  @error('id')
                  <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="name" class="font-weight-normal">Language Name</label>
                  <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" id="name">
                  @error('name')
                  <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-check">
                  <input type="checkbox" name="active" @checked(old('active' ?? $language->active)) class="form-check-input"   value="1" id="active">
                  <label class="form-check-label" for="active">
                    Активный
                  </label>
                </div>
                <div class="form-check">
                  <input type="checkbox" name="default"  @checked(old('default' ?? $language->default))  value="1" class="form-check-input" id="default">
                  <label class="form-check-label" for="default">
                    По умолчания
                  </label>
                </div>
                <div class="form-check mb-3">
                  <input type="checkbox" name="fallback" @checked(old('fallback' ?? $language->fallback)) class="form-check-input"  value="1" id="fallback">
                  <label class="form-check-label" for="fallback">
                    Резервный
                  </label>
                </div>
                <button type="submit" class="btn btn-primary ">
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

