@extends('layouts.app')
@section('breadcrumb')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">{{ __('main.chairs') }}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('main.home') }}</a></li>
            <li class="breadcrumb-item active">{{ __('main.chairs') }}</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('content')
  <section>
    <div class="card">
      <div class="card-header">
        <div class="d-flex justify-content-between">
          <h4>{{ __('main.lists') }}</h4>
            <a href="{{ route('chairs.create') }}" class="btn btn-success"><i class="bi bi-plus-circle"></i>{{ __('main.create') }}</a>
        </div>
      </div>
      <div class="card-body">
        <table class="table table-bordered">
          <tbody>
          <tr>
            <th>#</th>
            <th>{{ __('main.name') }}</th>
            <th>{{ __('main.type') }}</th>
            <th>{{ __('main.abbr') }}</th>
            <th>{{ __('main.actions') }}</th>
          </tr>
          @foreach($chairs as $chair)
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $chair->name }}</td>
              <td>{{ $chair->getStatusText() }}</td>
              <td>{{ $chair->abbr }}</td>

              <td class="d-flex">
                <a href="{{ route('chairs.edit', $chair->id) }}" class="btn btn-info btn-sm mr-2"><i class="far fa-edit"></i></a>
                <form action="{{ route('chairs.destroy', $chair->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this role?');"><i class="fas fa-trash-alt"></i></button>
                </form>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </section>
@endsection

