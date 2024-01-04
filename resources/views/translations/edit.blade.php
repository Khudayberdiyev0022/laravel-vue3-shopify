@extends('layouts.app')
@section('content')
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          @include('translations.form', ['action' => route('translations.update', $translation->id), 'method' => 'PUT'])
        </div>
      </div>
    </div>
  </section>
@endsection
