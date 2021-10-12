<div class="col-md-{{ $col ?? '' }} mb-3 {{ $customClass ?? '' }}">
    <label for="{{ $id ?? '' }}[]" class="{{ $customLabelClass ?? '' }}">
        {{ $label ?? '' }}
        @if($required ?? false)
            <span style="color: red">*</span>
        @endif
    </label>
    <select class="select2 form-control"
            @if ($multiple ?? false)
            multiple="multiple"
            @endif
            name="{{ $id ?? '' }}" id="{{ $id ?? '' }}"
            @if(isset($onchange))
            onchange="{{$onchange}}"
            @endif

            @if($required ?? false)
            required
        @endif>
        <option value="">Selecione Opção</option>
        {{ $slot ?? '' }}
    </select>
</div>
