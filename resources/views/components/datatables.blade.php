@once
  @push('css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <style>
      div.dt-buttons {
        position: absolute;
      }
      .dt-button-collection {
        background-color: #114980 !important;
      }
      .dt-button-collection .dropdown-item.active,
      .dt-button-collection .dropdown-item:active {
        background-color: transparent !important;
      }
      .dt-buttons .btn-secondary {
        background-color: #114980 !important;
        border-color: #114980 !important;
      }
      .custom-loader {
        display: inline-block;
        width: 500px;
        height: 500px;
        z-index: 999;
        position: fixed;
        background-color: #0a001f;
      }
    </style>
  @endpush
  @push('script')
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script>
        $(".datatable").DataTable({
            responsive: true,
            lengthChange: false,
            autoWidth: false,
            processing: true,
            dom: 'Blfrtip',
          {{--serverside: true,--}}
              {{--ajax: $.fn.dataTable.pipeline({--}}
              {{--   url: "{{ route('students.index') }}",--}}
              {{--   pages: 20, // number of pages to cache--}}
              {{--}),--}}
          columnDefs: [
              {
                  orderable: false,
                  targets: [1, 7],
              },
          ],
            buttons: [
                {
                    extend: "excel",
                    filename: "{{ __('main.worktimes') }}",
                    title: function () {
                        return "{{ __('main.worktimes') }}";
                    },
                },
                {
                    extend: "pdf",
                    filename: "{{ __('main.worktimes') }}",
                    title: function () {
                        return "{{ __('main.worktimes') }}";
                    },
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6]
                    }
                },
                {
                    extend: "print",
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6]
                    }
                },

                "colvis",
            ],

            language: {
                processing: "<div class='loading'><p> {{ __('main.loading') }}</p></div>", // Custom processing indicator HTML
                search: '{{ __('main.search') }}:',
                paginate: {
                    next: '&#8594;',    // or '→'
                    previous: '&#8592;' // or '←'
                },
                buttons: {
                    colvis: '{{ __('main.colvis') }}',
                },
            },
        });
        // .buttons().container().appendTo('#datatable_wrapper .col-md-6:eq(0)')
    </script>
  @endpush
@endonce
