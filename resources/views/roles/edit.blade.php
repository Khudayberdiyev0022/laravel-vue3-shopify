@extends('layouts.app')
@section('breadcrumb')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">{{ __('main.role') }}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('main.home') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">{{ __('main.roles') }}</a></li>
            <li class="breadcrumb-item active">{{ __('main.role') }}</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('content')
  <div class="card">
    <div class="card-body">
      <form action="{{ route('roles.update', $role->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="name" >{{ __('main.name') }}</label>
          <input type="text" name="name" value="{{ old('name',$role->name ?? '') }}" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="User, Editor, Author ... ">
          @error('name')
          <span class="invalid-feedback">{{ $message }}</span>
          @enderror
        </div>

        <table class="table table-bordered permissionTable">
          <th>
            {{__('main.groups')}}
          </th>
          <th>
            <label class="mb-0">
              <input class="grand_selectall" type="checkbox">
              {{__('main.select_all') }}
            </label>
          </th>

          <th>
            {{__("main.available_permissions")}}
          </th>

          <tbody>
          @foreach($permissions as $key => $group)
            <tr class="py-8">
              <td class="p-6">
                <b>{{ ucfirst($key) }}</b>
              </td>
              <td class="p-6" width="50%">
                <label>
                  <input class="selectall" type="checkbox">
                  {{__('Select All') }}
                </label>
              </td>
              <td class="p-6">
                @foreach($group as $permission)
                  <label style="width: 30%" class="">
                    <input type="checkbox" {{ $role->permissions->contains('id',$permission->id) ? "checked" : "" }} name="permissions[]" class="permissioncheckbox" value="{{ $permission->name }}">
                    {{$permission->name}}
                  </label>
                @endforeach
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
        <button type="submit" class="btn btn-primary float-right">
          {{ __('main.save') }}
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
