<!-- Sortable -->
<script>
    function startSortable() {
        $(".sortable").sortable({
            connectWith: '.sortable',
            over: function (event, ui) {
                ui.item.css("background-color", "white");
            },
            out: function (event, ui) {
                ui.item.css("background-color", "rgba(255,255,255,0)");
            },
            stop: function( event, ui ) {
                var menuId = ui.item.closest('ul').attr('id')
                var productId = ui.item.attr("id")

                $(ui.item).removeClass()
                $(ui.item).addClass(menuId)

                var all = document.getElementsByClassName(menuId)

                var ids = Array();
                for (var i=0, max=all.length; i < max; i++) {
                    ids.push(all.item(i).id);
                }

                $.ajax({
                    url: '{{ route('store.sort_product') }}',
                    type: 'post',
                    data: {_token: CSRF_TOKEN, ids: ids, product_id: productId, menu_id: menuId},
                    success: function (response) {}
                });
            }
        }).disableSelection();
    }

    startSortable()

    $(".sortable-menu").sortable({
        stop: function( event, ui ) {
            var all = document.getElementsByClassName("restaurant-menu")

            var ids = Array();
            for (var i=0, max=all.length; i < max; i++) {
                ids.push(all.item(i).id);
            }

            $.ajax({
                url: '{{ route('store.sort_menu') }}',
                type: 'post',
                data: {_token: CSRF_TOKEN, ids: ids},
                success: function (response) {}
            });
        }
    }).disableSelection();
</script>
