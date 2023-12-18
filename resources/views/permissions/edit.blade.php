@extends('layouts.app')
@section('content')
  <div class="row">

    <div class="col-12 col-md-6 col-lg-6">
      <div class="card">
        <div class="card-header">
          <h4>{{ __('words.permission_update') }}</h4>
        </div>
        <form action="{{ route('permissions.update', $permission->id) }}" method="POST">
          @csrf
          @method('PUT')
          @include('permissions._form')
        </form>
      </div>
    </div>
  </div>
@endsection
