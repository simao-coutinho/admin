<div class="search-box me-2 mb-2 d-inline-block table-search-box">
    <div class="position-relative">
        <input type="search" class="form-control"
               id="table-search-input"
               value="{{ $_GET['search'] ?? '' }}"
               onkeydown="{{ ($id ?? 'myTable') == 'myTable' ? 'filterTable()' : 'filterTable' . $id . '()' }}"
               onsearch="{{ ($id ?? 'myTable') == 'myTable' ? 'filterTable()' : 'filterTable' . $id . '()' }}"
               placeholder="Procurar...">
        <i class="bx bx-search-alt search-icon"></i>
    </div>
</div>
<div class="table-responsive">
    <table class="table align-middle table-nowrap table-check {{ ($cursor ?? false) ? 'table-hover' : '' }}"
           id="{{ $id ?? 'myTable' }}">
        <thead class="table-light">
        <tr>
            {{ $thead ?? '' }}
        </tr>
        </thead>
        <tbody id="tbody">
        {{ $slot }}
        <div class="table-loader display-none">
            <i class="fas fa-spinner fa-spin"></i>
        </div>
        </tbody>
        <tfoot>
        <tr>
            <td colspan="99" id="pagination">
                {{ $tfoot ?? '' }}
            </td>
        </tr>
        </tfoot>
    </table>
</div>
