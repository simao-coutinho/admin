<div class="table-responsive">
    <table id="myTable"
           class="myTable table dataTable table-bordered table-striped {{ ($cursor ?? false) ? 'cursor' : '' }}">
        <thead>
        <tr>
            {{ $thead ?? '' }}
        </tr>
        </thead>
        <tbody>
        {{ $slot }}
        </tbody>
    </table>
</div>
