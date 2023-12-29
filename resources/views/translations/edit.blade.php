@extends('layouts.app')
@section('content')
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <form action="{{ route('translations.update', $translation->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label for="group" class="font-weight-normal">Group</label>
                      <input type="text" name="group" value="{{ old('group', $translation->group) }}" class="form-control @error('group') is-invalid @enderror" id="group">
                      @error('group')
                      <span class="invalid-feedback">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="key" class="font-weight-normal">Key</label>
                      <input type="text" name="key" value="{{ old('key', $translation->key) }}" class="form-control @error('key') is-invalid @enderror" id="key">
                      @error('key')
                      <span class="invalid-feedback">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                </div>
                @foreach(\App\Models\Language::query()->latest('id')->get() as $key => $language)
                  <div class="form-group">
                    <label for="text" class="font-weight-normal">Text ({{ $language->name }})</label>
                    <textarea name="text[{{ $language->id }}]" class="form-control @error('text') is-invalid @enderror" id="text" rows="5">{!! old('text', $translation->text[$language->id] ?? '') !!}</textarea>
                    @error('text')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                  </div>
                @endforeach
                <button type="submit" class="btn btn-primary float-right">
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
