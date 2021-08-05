<div class="{{ !isset($col) ? 'col-md-' . 6 : $col == '-' ? 'col' : 'col-md-' . $col }} {{ $customClass ?? '' }}"
     id="formGroup{{$id ?? ""}}">
    <div class="form-group">
        <label for="{{ $id ?? "" }}">{{ $label ?? "" }}</label>
        <div class="input-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="{{ $id ?? "" }}" name="{{ $id ?? "" }}"
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
                    @endif
                >
                <label class="custom-file-label" for="{{ $id ?? "" }}">Escolha Ficheiro</label>
            </div>
        </div>
        @if (isset($small))
            <small>{{ $small }}</small>
        @endif
    </div>
</div>
