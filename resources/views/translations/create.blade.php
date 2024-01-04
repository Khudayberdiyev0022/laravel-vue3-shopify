@extends('layouts.app')
@section('content')
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          @include('translations.form', ['action' => route('translations.store'), 'method' => 'POST'])
        </div>
      </div>
    </div>
  </section>
@endsection

