@extends('layouts.app')
@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
           <div class="d-flex justify-content-between">
             <h4>Chair List</h4>
             <div>
               <a href="{{ route('chairs.create') }}" class="btn btn-success">Create</a>
             </div>
           </div>
          </div>
          <div class="card-body">
            <table class="table table-striped table-bordered">
              <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Actions</th>
              </tr>
              </thead>
              <tbody>
{{--              <button class="btn btn-light">--}}
{{--                admission--}}
{{--                <i class="fas fa-plus text-success mr-1"></i>--}}
{{--                <i class="fas fa-eye text-primary mr-1"></i>--}}
{{--                <i class="fas fa-pencil-alt text-info mr-1"></i>--}}
{{--                <i class="fas fa-trash text-danger mr-1"></i>--}}
{{--              </button>--}}

              @foreach($chairs as $chair)
                <tr>
                  <td>{{ $chair->id }}</td>
                  <td>{{ $chair->name }}</td>
                  <td class="d-flex">
                    @if ($chair->name!='Super Admin')

{{--                      @can('role.edit')--}}
                        <a href="{{ route('chairs.edit', $chair->id) }}" class="btn btn-info btn-sm mr-2"><i class="fas fa-pencil-alt"></i></a>
{{--                      @endcan--}}

{{--                      @can('role.destroy')--}}
{{--                        @if ($chair->name!=Auth::user()->hasRole($chair->name))--}}
                      <form action="{{ route('chairs.destroy', $chair->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this role?');"><i class="fas fa-trash-alt"></i></button>
                      </form>
{{--                        @endif--}}
{{--                      @endcan--}}
                    @endif
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
          <div class="card-footer">
            {{ $chairs->onEachSide(0)->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
