<!-- DataTables Scripts -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.colVis.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>

<script>
    if ($('#myTable').length) {
        var table = $('#myTable').DataTable({
            dom: 't<"d-flex justify-content-between"ip>',
            // buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
            "order": [[0, 'desc']],
            pageLength: 15,
            lengthMenu: [ [10, 15, 50, -1], [10, 25, 50, "All"] ],
            "lengthChange": true,
            language: {
                url: 'https://raw.githubusercontent.com/DataTables/Plugins/master/i18n/pt_pt.json'
            },
            "autoWidth": false
        });
    }

    function filterTable() {
        table.search($('#table-search-input').val()).draw();
    }

</script>

<script>
    var params = new URLSearchParams(window.location.search)
    var page = "{{ $_GET['page'] ?? 1 }}"
    var timeOut = 0

    function changeTablePage(page) {
        this.page = page
        setQueryParam('page', page)

        fetchTableResults()
    }

    function setSort(key) {
        $('th').each(function () {
            $(this).removeClass('sort-down')
            $(this).removeClass('sort-up')
        })

        var th = $('#table-head-' + key)
        var direction = th.data('sort')

        if (direction == 'DESC') {
            th.addClass('sort-down')
            th.data('sort', 'ASC')
        } else {
            th.addClass('sort-up')
            th.data('sort', 'DESC')

        }

        setQueryParam("sort", key)
        setQueryParam('direction', direction)

        pushState()

        fetchTableResults()
    }

    function setQueryParam(key, value) {
        params = new URLSearchParams(window.location.search)
        params.set(key, value)

        pushState()
    }

    function deleteQueryParam(key) {
        params.delete(key)

        pushState()
    }

    function pushState() {
        if (history.pushState) {
            var newurl = window.location.protocol
            newurl += "//";
            newurl += window.location.host + window.location.pathname;
            newurl += "?";
            newurl += params.toString()
            window.history.pushState({path:newurl},'',newurl);
        }
    }

    function filterTablemyServerTable() {
        if (timeOut) {
            clearTimeout(timeOut)
        }

        timeOut = setTimeout(function () {
            setQueryParam('page', 1)
            var search = $('#table-search-input').val();
            if (search.length > 0) {
                setQueryParam('search', search)
            } else {
                deleteQueryParam('search')
            }
            fetchTableResults()
        }, 500)
    }

    function fetchTableResults() {
        $.ajax({
            type: "GET",
            url: "{{ $url ?? '' }}?" + params.toString(),
            data: {
                type: '{{ $type ?? '' }}',
                user_id: '{{ Auth::id() }}'
            },
            beforeSend: function () {
                $('#myServerTable').addClass('loading')
            },
            success: function (response) {
                $('#myServerTable').removeClass('loading')
                $('#tbody').html(response.html)
                $('#pagination').html(response.pagination)
            }
        })
    }
</script>

