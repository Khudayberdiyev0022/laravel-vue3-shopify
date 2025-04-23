@extends('layouts.app')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Groups</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Groups</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div class="card-tools">
                  <a href="{{ route('admin.groups.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus mr-2"></i>
                    Create
                  </a>
                </div>
              </div>
              <div class="card-body">
                <table class="table table-bordered">
                  <tbody>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Name</th>
                    <th style="width: 40px">Actions</th>
                  </tr>
                  @foreach ($groups as $group)
                    <tr>
                      <td>{{ $group->id }}</td>
                      <td>{{ $group->name }}</td>
                      <td>
                       <div class="d-flex align-items-center">
                         <a href="{{ route('admin.groups.edit', $group->id) }}" class="btn btn-light btn-sm mr-2">
                           <i class="fas fa-edit text-primary"></i>
                         </a>
                         <form action="{{ route('admin.groups.destroy', $group->id) }}" method="POST" class="d-inline-block">
                           @csrf
                           @method('DELETE')
                           <button type="submit" class="btn btn-light btn-sm"><i class="fas fa-trash-alt text-danger"></i></button>
                         </form>
                       </div>
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
