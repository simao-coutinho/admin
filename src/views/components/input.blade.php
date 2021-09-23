<div class="mb-3 {{ !isset($col) ? 'col-md-' . 6 : $col == '-' ? 'col' : 'col-md-' . $col }} {{ $customClass ?? '' }}"
     id="formGroup{{$id ?? ""}}">
        <label for="{{ $id ?? "" }}">
            {!! $label ?? "" !!}
            @if($required ?? false)
                <span style="color: red">*</span>
            @endif
        </label>
        <input class="form-control" type="{{ $type ?? 'text' }}" name="{{ $id ?? "" }}"
               id="{{ $id ?? "" }}"
{{--               placeholder="{{ $label ?? "" }}"--}}
               value="{{ $value ?? '' }}"
               @if (isset($decimal))
               step="{{ $decimal }}"
               @endif

               @if ($disabled ?? false)
               disabled
               @endif

               @if ($onChange ?? false)
               onchange="{{ $onChange }}"
               @endif

               @if ($readOnly ?? false)
               readonly
               @endif

               @if($required ?? false)
               required
            @endif>
        @if (isset($small))
            <small>{{ $small }}</small>
        @endif
</div>
