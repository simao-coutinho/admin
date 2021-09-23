<!-- Select2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js"
        integrity="sha512-RtZU3AyMVArmHLiW0suEZ9McadTdegwbgtiQl5Qqo9kunkVg1ofwueXD8/8wv3Af8jkME3DDe3yLfR8HSJfT2g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $(document).ready(function () {
        $('.select2').select2();
    });

    $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
        changeSelect()
    })

    // Select2
    function changeSelect() {
        $(".select2").select2({
            tags: true
        })
    }
</script>
