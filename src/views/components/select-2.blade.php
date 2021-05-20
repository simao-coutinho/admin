<div class="col-md-{{ $col ?? '' }}">
    <div class="form-group">
        <label for="{{ $id ?? '' }}[]">{{ $label ?? '' }}</label>
        <select class="select2 form-control form-control-sm" multiple="multiple" name="{{ $id ?? '' }}" id="{{ $id ?? '' }}"
                data-placeholder="{{ $label ?? '' }}"
                @if(isset($onchange))
                onchange="{{$onchange}}"
                @endif

                @if($required ?? false)
                required
            @endif>
            {{ $slot ?? '' }}
        </select>
    </div>
</div>
