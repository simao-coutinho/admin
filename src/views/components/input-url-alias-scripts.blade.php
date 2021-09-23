<!-- Input Url Alias Validation -->
<script>
    $(document).ready(function() {
        $('#url_alias').on('input', function (e) {
            $.ajax({
                type: "POST",
                url: "{{ route('confirmSeoUrl') }}",
                data: {
                    _token: CSRF_TOKEN,
                    url_alias: $('#url_alias').val()
                }, beforeSend: function () {
                    $('#progress-spinner').css('visibility', 'visible')
                    $('#url_alias').removeClass("is-invalid")
                    $('#url_alias').removeClass("is-valid")
                    $("#error-span").remove()
                }, success: function (response) {
                    $('#progress-spinner').css('visibility', 'hidden')
                    if (response.status) {
                        $('#url_alias').addClass("is-valid")
                    } else {
                        $('#url_alias').addClass("is-invalid")
                        $('#url_alias').closest('.form-group').append("<span id='error-span' style='color: red'>" + response.msg + "</span>");
                    }
                }, error: function () {
                    $('#progress-spinner').css('visibility', 'hidden')
                    $('#url_alias').closest('.form-group').append("<span id='error-span' style='color: red'>Ocorreu um erro</span>");
                }
            })
        })
    });
</script>
