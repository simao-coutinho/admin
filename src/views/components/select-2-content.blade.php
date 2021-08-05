<div class="col-md-{{ $col ?? '' }}">
    <div class="form-group">
        <label for="{{ $id ?? '' }}[]">{{ $label ?? '' }}</label>
        <select class="select2 form-control form-control-sm"
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
</div>
