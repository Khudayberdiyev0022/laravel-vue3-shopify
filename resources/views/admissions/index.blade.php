@extends('layouts.app')

@section('content')

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header justify-content-between" style="border-bottom: 1px solid">
          <h4>Ro'yhat</h4>
{{--          <a href="#" class="btn btn-success" style="border-radius: 0"><i data-feather="plus"></i> Qo'shish</a>--}}
{{--          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i data-feather="plus"></i> Qo'shish</button>--}}
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#basicModal">Basic
            Modal</button>
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
              <tr>
                <td>1</td>
                <td>Irwansyah Saputra</td>
                <td>2017-01-09</td>
                <td>
                  <div class="badge badge-success">Active</div>
                </td>
                <td><a href="#" class="btn btn-primary">Detail</a></td>
              </tr>
              <tr>
                <td>2</td>
                <td>Hasan Basri</td>
                <td>2017-01-09</td>
                <td>
                  <div class="badge badge-success">Active</div>
                </td>
                <td><a href="#" class="btn btn-primary">Detail</a></td>
              </tr>
              <tr>
                <td>3</td>
                <td>Kusnadi</td>
                <td>2017-01-11</td>
                <td>
                  <div class="badge badge-danger">Not Active</div>
                </td>
                <td><a href="#" class="btn btn-primary">Detail</a></td>
              </tr>
              <tr>
                <td>4</td>
                <td>Rizal Fakhri</td>
                <td>2017-01-11</td>
                <td>
                  <div class="badge badge-success">Active</div>
                </td>
                <td><a href="#" class="btn btn-primary">Detail</a></td>
              </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer text-right">
          <nav class="d-inline-block">
            <ul class="pagination mb-0">
              <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
              </li>
              <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
              <li class="page-item">
                <a class="page-link" href="#">2</a>
              </li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>




@endsection
<div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        Content goes here..
      </div>
      <div class="modal-footer bg-whitesmoke br">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

