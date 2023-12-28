@extends('layouts.app')
@section('content')
  <section>
    <div class="card">
      <div class="card-header">
        <div class="d-flex justify-content-between">
          <h4>Fakultetlar</h4>
          @can('user.create')
            <a href="{{ route('faculties.create') }}" class="btn btn-success"><i class="bi bi-plus-circle"></i> Create</a>
          @endcan
        </div>
      </div>
      <div class="card-body">

        <table class="table table-striped table-bordered">
          <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nomi</th>
            <th scope="col">Turi</th>
            <th scope="col">Abbr</th>
            <th scope="col">Action</th>
          </tr>
          </thead>
          <tbody>
          @foreach($faculties as $faculty)
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $faculty->name }}</td>
              <td>{{ $faculty->getStatusText() }}</td>
              <td>{{ $faculty->abbr }}</td>

              <td class="d-flex">
                <a href="{{ route('faculties.edit', $faculty->id) }}" class="btn btn-info btn-sm mr-2"><i class="far fa-edit"></i></a>
                <form action="{{ route('faculties.destroy', $faculty->id) }}" method="POST">
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

