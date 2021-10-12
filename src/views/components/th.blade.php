<th
    @if (isset($_GET['sort']))
        @if ($_GET['sort'] == $id)
            class="{{ $_GET['direction'] == 'DESC' ? 'sort-down' : 'sort-up'}}"
        @endif
    @elseif($startOrder ?? false)
        class="sort-down"
    @endif
    onclick="setSort('{{ $id ?? '' }}')"
    data-sort="{{ ($_GET['direction'] ?? ($startOrder ?? false) ? 'DESC' : '') == 'DESC' ? 'ASC' : 'DESC' }}"
    id="table-head-{{ $id ?? '' }}">
    {{ $label ?? '' }}
</th>
