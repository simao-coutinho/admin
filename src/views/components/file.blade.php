<div id="formGroup{{$id ?? ""}}"
    class="mt-3 {{ !isset($col) ? 'col-md-' . 6 : $col == '-' ? 'col' : 'col-md-' . $col }} {{ $customClass ?? '' }}">
    <label for="{{ $id ?? "" }}" class="form-label">{{ $label ?? "" }}</label>
    <input class="form-control" type="file" id="{{ $id ?? "" }}" name="{{ $id ?? "" }}"
           @if ($disabled ?? false)
           disabled
           @endif
           @if ($onChange ?? false)
           onchange="{{ $onChange }}"
           @endif

           @if(isset($accepts))
           accept="{{ $accepts }}"
           @endif

           @if($required ?? false)
           required
           @endif

           @if($multiple ?? false)
           multiple
        @endif>
    @if (isset($small))
        <small>{{ $small }}</small>
    @endif
</div>
