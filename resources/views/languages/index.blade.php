@extends('layouts.app')
@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <div class="d-flex justify-content-between">
              <h4>Languages List</h4>
              <div>
                <a href="{{ route('languages.create') }}" class="btn btn-success">Create</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <table class="table table-striped table-bordered">
              <thead>
              <tr>
                <th>Kod</th>
                <th>Nomi</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
              </thead>
              <tbody>
              @foreach($languages as $language)
                {{--                @dd($language->id)--}}
                <tr>
                  <td>{{ $language->id }}</td>
                  <td>{{ $language->name }}</td>
                  <td>{{ $language->getStateText() }}</td>
                  <td class="d-flex">
                    <a href="{{ route('languages.edit', $language->id) }}" class="btn btn-info btn-sm mr-2"><i class="fas fa-pencil-alt"></i></a>
                    <form action="{{ route('languages.destroy', $language->id) }}" method="POST">
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
      </div>
    </div>
    Default Language: {{ app()->getLocale() }} <br>
    Fallback Language: {{ app()->getFallbackLocale() }}
  </div>
@endsection
