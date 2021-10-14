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
                $('#myTable').addClass('loading')
            },
            success: function (response) {
                $('#myTable').removeClass('loading')
                $('#tbody').html(response.html)
                $('#pagination').html(response.pagination)
            }
        })
    }
</script>
