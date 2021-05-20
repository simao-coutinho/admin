<div class="col-md-{{ $col ?? 6 }}">
    <div class="form-group form-group-sm">
        <label for="{{ $id ?? '' }}">{{ $label ?? '' }}
            <small style="color: red; visibility: hidden;" id="summernote-error-{{ $id ?? '' }}">{{ $label ?? '' }} is missing</small>
        </label>
        <textarea class="form-control form-control-sm summernote" rows="{{ $rows ?? 7 }}" name="{{ $id ?? '' }}"
                  id="{{ $id ?? '' }}" placeholder="{{ $label ?? '' }}">{{ $value ?? '' }}</textarea>
        @if (isset($small))
            <small>{{ $small }}</small>
        @endif
    </div>
</div>
