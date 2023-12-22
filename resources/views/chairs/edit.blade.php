@extends('layouts.app')
@section('content')
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <form action="{{ route('chairs.update', $chair->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <label for="name">Role Name</label>
                  <input type="text" name="name" value="{{ old('name',$chair->name ?? '') }}" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="User, Editor, Author ... ">
                  @error('name')
                  <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>

                <table class="table table-bordered permissionTable">
                 <th>
                   {{__('Section')}}
                 </th>
                 <th>
                   <label class="mb-0">
                     <input class="grand_selectall" type="checkbox">
                     {{__('Select All') }}
                   </label>
                 </th>

                 <th>
                   {{__("Available permissions")}}
                 </th>

                  <tbody>
                  </tbody>
                </table>
                <button type="submit" class="btn btn-primary ">
                  Update Role
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@push('script')
  <script>
      $(".permissionTable").on('click', '.selectall', function () {

          if ($(this).is(':checked')) {
              $(this).closest('tr').find('[type=checkbox]').prop('checked', true);

          } else {
              $(this).closest('tr').find('[type=checkbox]').prop('checked', false);

          }

          calcu_allchkbox();

      });

      $(".permissionTable").on('click', '.grand_selectall', function () {
          if ($(this).is(':checked')) {
              $('.selectall').prop('checked', true);
              $('.permissioncheckbox').prop('checked', true);
          } else {
              $('.selectall').prop('checked', false);
              $('.permissioncheckbox').prop('checked', false);
          }
      });

      $(function () {

          calcu_allchkbox();
          selectall();

      });

      function selectall(){

          $('.selectall').each(function (i) {

              var allchecked = new Array();

              $(this).closest('tr').find('.permissioncheckbox').each(function (index) {
                  if ($(this).is(":checked")) {
                      allchecked.push(1);
                  } else {
                      allchecked.push(0);
                  }
              });

              if ($.inArray(0, allchecked) != -1) {
                  $(this).prop('checked', false);
              } else {
                  $(this).prop('checked', true);
              }

          });
      }

      function calcu_allchkbox(){

          var allchecked = new Array();

          $('.selectall').each(function (i) {


              $(this).closest('tr').find('.permissioncheckbox').each(function (index) {
                  if ($(this).is(":checked")) {
                      allchecked.push(1);
                  } else {
                      allchecked.push(0);
                  }
              });


          });

          if ($.inArray(0, allchecked) != -1) {
              $('.grand_selectall').prop('checked', false);
          } else {
              $('.grand_selectall').prop('checked', true);
          }

      }



      $('.permissionTable').on('click', '.permissioncheckbox', function () {

          var allchecked = new Array;

          $(this).closest('tr').find('.permissioncheckbox').each(function (index) {
              if ($(this).is(":checked")) {
                  allchecked.push(1);
              } else {
                  allchecked.push(0);
              }
          });

          if ($.inArray(0, allchecked) != -1) {
              $(this).closest('tr').find('.selectall').prop('checked', false);
          } else {
              $(this).closest('tr').find('.selectall').prop('checked', true);

          }

          calcu_allchkbox();

      });
  </script>
@endpush
