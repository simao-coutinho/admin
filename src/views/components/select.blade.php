<div class="col-md-{{ $col ?? '' }}">
    <div class="form-group">
        <label for="{{ $id ?? '' }}">{{ $label ?? '' }}</label>
        <select class="form-control form-control-sm" name="{{ $id ?? '' }}" id="{{ $id ?? '' }}"
                @if(isset($onchange))
                onchange="{{$onchange}}"
                @endif

                @if(isset($required) && $required)
                required
            @endif>
            <option value="">Selecione Opção</option>
            {{ $slot ?? '' }}
        </select>
    </div>
</div>
