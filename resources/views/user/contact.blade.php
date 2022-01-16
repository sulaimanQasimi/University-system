
@extends('layouts.advanced_nav')
@section('css')
    <link rel="stylesheet" href="{{asset('asset.v1/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('asset.v1/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('asset.v1/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection
@section('content')
    @livewire('contact')
@endsection

@section('js')
    <script src="{{asset('asset.v1/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('asset.v1/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('asset.v1/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('asset.v1/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('asset.v1/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('asset.v1/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('asset.v1/plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('asset.v1/plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('asset.v1/plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{asset('asset.v1/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('asset.v1/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('asset.v1/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": true, "autoWidth": true,
                "buttons": ["copy", "csv", "excel", "pdf", "print"/*, "colvis"*/]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

//               var T=$("#example2").DataTable();
//                T.$('tr:odd').css('backgroundColor', 'blue');
            $("#example2").DataTable({
                "bScrollbarLeft": true,
                "language": {

                    "lengthMenu": '{{__('main.show')}}<select>' +
                    '<option class="farsi-number" value="5">5</option>' +
                    '<option class="farsi-number" value="10">10</option>' +
                    '<option class="farsi-number" value="20">20</option>' +
                    '<option class="farsi-number" value="30">30</option>' +
                    '<option class="farsi-number" value="40">40</option>' +
                    '<option class="farsi-number" value="50">50</option>' +
                    '<option class="farsi-number" value="-1">{{__('main.all')}}</option>' +
                    '</select>',

                    "emptyTable": "{{ __('main.emptyTable') }}",
                    "zeroRecords": "{{ __('main.emptyTable') }}",
                    "search": "{{__('main.search')}} : ",
                    "paginate": {
                        "first": "{{ __('main.first') }}",
                        "last": "{{ __('main.last') }}",
                        "next": "{{ __('main.next') }}",
                        "previous": "{{ __('main.previous') }}",


                    },
                    "buttons": {
                        "copy": "{{ __('main.copy') }}",
                        "csv": "{{ __('main.csv') }}",
                        "excel": "{{ __('main.excel') }}",
                        "pdf": "{{ __('main.pdf') }}",
                        "print": "{{ __('main.print') }}",
                        "colvis": "{{ __('main.colvis') }}"
                    }
                },
                "responsive": true, "lengthChange": true, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print"/*, "colvis"*/]
            }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
        });
    </script>@endsection