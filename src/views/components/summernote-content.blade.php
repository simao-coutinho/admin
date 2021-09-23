<div class="mb-3 col-md-{{ $col ?? 6 }}">
    <label for="{{ $id ?? '' }}">{{ $label ?? '' }}
        <small style="color: red; visibility: hidden;" id="summernote-error-{{ $id ?? '' }}">{{ $label ?? '' }} is
            missing</small>
    </label>
    <textarea class="form-control summernote" rows="{{ $rows ?? 7 }}" name="{{ $id ?? '' }}"
              id="{{ $id ?? '' }}" placeholder="{{ $label ?? '' }}"
              @if($required ?? false)
              required
                  @endif
        >{{ $value ?? '' }}</textarea>
    @if (isset($small))
        <small>{{ $small }}</small>
    @endif
</div>
