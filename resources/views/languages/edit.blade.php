@extends('layouts.app')
@section('breadcrumb')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">{{ __('main.language') }}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('main.home') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('languages.index') }}">{{ __('main.languages') }}</a></li>
            <li class="breadcrumb-item active">{{ __('main.language') }}</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('content')
  <div class="card">
    <div class="card-body">
      <form action="{{ route('languages.update', $language->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="id" class="font-weight-normal">ID (Kod: uz, ru, ar...)</label>
          <input type="text" name="id" value="{{ old('id', $language->id) }}" class="form-control @error('id') is-invalid @enderror" id="id">
          @error('id')
          <span class="invalid-feedback">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="name" class="font-weight-normal">Language Name</label>
          <input type="text" name="name" value="{{ old('name', $language->name) }}" class="form-control @error('name') is-invalid @enderror" id="name">
          @error('name')
          <span class="invalid-feedback">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-check">
          <input type="checkbox" name="active" @checked(old('active', $language->active)) class="form-check-input" value="1" id="active">
          <label class="form-check-label" for="active">
            Активный
          </label>
        </div>
        <div class="form-check">
          <input type="checkbox" name="default" @checked(old('default', $language->default))  value="1" class="form-check-input" id="default">
          <label class="form-check-label" for="default">
            По умолчания
          </label>
        </div>
        <div class="form-check mb-3">
          <input type="checkbox" name="fallback" @checked(old('fallback', $language->fallback)) class="form-check-input" value="1" id="fallback">
          <label class="form-check-label" for="fallback">
            Резервный
          </label>
        </div>
        <button type="submit" class="btn btn-primary ">
          Update Role
        </button>
      </form>
    </div>
  </div>
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

      function selectall() {

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

      function calcu_allchkbox() {

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
