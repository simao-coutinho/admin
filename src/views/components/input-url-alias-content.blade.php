<div class="mb-3 {{ !isset($col) ? 'col-md-' . 6 : $col == '-' ? 'col' : 'col-md-' . $col }} {{ $customClass ?? '' }}" id="formGroupurl_alias">
        <label for="url_alias">URL amigável <small>Não utilize espaços, substitua por '-'. Este campo tem de ser único</small></label>
        <input class="form-control" type="text" name="url_alias"
               id="url_alias" placeholder="URL amigável"
               value="{{ $value ?? '' }}"

               @if ($disabled ?? false)
               disabled
               @endif
               @if($required ?? false)
               required
            @endif>
    <i class="fas fa-spin fa-spinner" id="progress-spinner" style="position: absolute;right: 16px;bottom: 25px;color: goldenrod; visibility: hidden;"></i>
</div>


