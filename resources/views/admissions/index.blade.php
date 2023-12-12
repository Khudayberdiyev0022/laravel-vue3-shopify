@extends('layouts.app')
@section('content')

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header justify-content-between" style="border-bottom: 1px solid">
          <h4>Ro'yhat</h4>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i data-feather="plus"></i> Qo'shish</button>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-md">
              <thead>
              <tr>
                <th>T/R</th>
                <th>Yil</th>
                <th>Boshlanish vaqti</th>
                <th>Tugash vaqti</th>
                <th>Amallar</th>
              </tr>
              </thead>
              <tbody>
              @foreach($admissions as $admission)
              <tr>
                <td>{{ ($admissions ->currentpage()-1) * $admissions ->perpage() + $loop->index + 1 }}</td>
                <td>{{ $admission->year }}</td>
                <td>{{ $admission->start_date }}</td>
                <td>{{ $admission->end_date }}</td>
                <td>
                  <a href="#" class="btn btn-outline-primary"><i class="fas fa-chart-bar"></i></a>
                  <a href="#" class="btn btn-warning"><i class="fas fas fa-file text-white"></i></a>
                  <a href="#" class="btn btn-primary"><i class="fas fa-pencil-alt text-white"></i></a>
                  <a href="#" class="btn btn-danger"><i class="fas fa-trash-alt text-white"></i></a>
                </td>
              </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer text-right">
          {{ $admissions->links() }}
        </div>
      </div>
    </div>
  </div>
@endsection


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="formModal" style="display: none;" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModal">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('admissions.store') }}" method="POST">
          @csrf
          <div class="form-group">
            <label for="year">Yil</label>
            <input type="text" name="year" id="year" class="form-control">
          </div>
          <div class="form-group">
            <label for="start_date">Boshlanish vaqti</label>
            <input type="datetime-local" name="start_date" class="form-control"  id="start_date">
          </div>
          <div class="form-group">
            <label for="end_date">Tugash vaqti</label>
            <input type="datetime-local" name="end_date" class="form-control"  id="end_date">
          </div>
          <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary waves-effect" style="border-radius: 0"><i data-feather="save"></i> Saqlash</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
