@extends('layouts.app')
@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <div class="d-flex justify-content-between">
              <h4>Translation List</h4>
              <div>
                <a href="{{ route('translations.create') }}" class="btn btn-success">Create</a>
              </div>
            </div>
            @include('translations.filter')
          </div>
          @include('translations.table')
        </div>
      </div>
    </div>
  </div>
@endsection
