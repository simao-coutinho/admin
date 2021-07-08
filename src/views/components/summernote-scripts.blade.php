<!-- Summernote -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.js"
        integrity="sha512-98e5nQTE7pmtZ3xoD5GCVKafmziXDT5WINC91MugFzF57zzBnmvGQl1N70cvdyBSWxjCOC55gq9Zn76MUgtEMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $(function () {
        // Summernote
        $('.summernote').summernote({
            height: 200,
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['style']],
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['fontname', ['fontname']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        })
    })

    @if($disabled ?? false)
    $('.summernote').summernote('disable');
    @endif
</script>

