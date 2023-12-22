@extends('layouts.app')
@section('content')
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <form action="{{ route('chairs.store') }}" method="POST">
                @csrf
                <div class="form-group">
                  <label for="name" class="font-weight-normal">Chair Name</label>
                  <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" id="name">
                  @error('name')
                  <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
                <button type="submit" class="btn btn-primary ">
                  Create Role
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

