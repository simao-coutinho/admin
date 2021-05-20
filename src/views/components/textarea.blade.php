<div class="col-md-{{ $col ?? '' }}">
    <div class="form-group">
        <label for="{{ $id ?? '' }}">{{ $label ?? '' }}</label>
        <textarea  name="{{ $id ?? '' }}" id="{{ $id ?? '' }}" class="form-control form-control-sm" placeholder="{{ $label ?? '' }}"
                   rows="{{ $rows ?? 3 }}"
                   @if($disabled ?? false)
                   disabled
                   @endif
                   @if($required ?? false)
                   required
                   @endif
        >{{ $value ?? '' }}</textarea>
    </div>
</div>
