<div class="mb-3 col-md-{{ $col ?? '' }}">
    <label for="{{ $id ?? '' }}">
        {{ $label ?? '' }}
        @if($required ?? false)
            <span style="color: red">*</span>
        @endif
    </label>
    <select class="form-control" name="{{ $id ?? '' }}" id="{{ $id ?? '' }}"
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
