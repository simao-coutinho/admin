<div class="col-md-{{ $col ?? '' }} mb-3">
    <label for="{{ $id ?? '' }}">{{ $label ?? '' }}</label>
    <textarea  name="{{ $id ?? '' }}" id="{{ $id ?? '' }}" class="form-control" placeholder="{{ $label ?? '' }}"
               rows="{{ $rows ?? 3 }}"
               @if($disabled ?? false)
               disabled
               @endif
               @if($required ?? false)
               required
                   @endif
        >{{ $value ?? '' }}</textarea>
</div>
