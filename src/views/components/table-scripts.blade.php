<!-- DataTables Scripts -->
<script src="{{ asset('vendor/simao-coutinho/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/simao-coutinho/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('vendor/simao-coutinho/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('vendor/simao-coutinho/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('vendor/simao-coutinho/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('vendor/simao-coutinho/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('vendor/simao-coutinho/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('vendor/simao-coutinho/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('vendor/simao-coutinho/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('vendor/simao-coutinho/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

<script>
    if ($('#myTable').length) {
        var table = $('#myTable').DataTable({
            "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
            "order": [[0, 'desc']],
            initComplete: function () {
                setTimeout(function () {
                    table.buttons().container().appendTo('#myTable_wrapper .col-md-8:eq(0)');
                    // $('.buttons-pdf').html('<span class="glyphicon glyphicon-file" data-toggle="tooltip" title="Export To Excel"/>')
                }, 10);
            }
        });
    }
</script>

