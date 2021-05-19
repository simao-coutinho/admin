<div class="{{ !isset($col) ? 'col-md-' . 6 : $col == '-' ? 'col' : 'col-md-' . $col }} {{ $customClass ?? '' }}" id="formGroup{{$id}}">
    <div class="form-group form-group-sm">
        <label for="{{ $id }}">{{ $label }}</label>
        <input class="form-control form-control-sm" type="{{ $type ?? 'text' }}" name="{{ $id }}"
               id="{{ $id }}" placeholder="{{ $label }}"
               value="{{ $value ?? '' }}"
               @if (isset($decimal))
               step="{{ $decimal }}"
               @endif

               @if ($disabled ?? false)
               disabled
               @endif
               @if(isset($required) && $required)
               required
            @endif>
        @if (isset($small))
            <small>{{ $small }}</small>
        @endif
    </div>
</div>
