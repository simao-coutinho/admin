<div id="formGroupImg" class="col-md-6">
    <div class="form-group form-group-sm">
        <label>{{ $label ?? "Imagem" }}</label>

        <input type="file" id="image" name="image"
               accept=".png, .jpg, .jpeg, .gif" onchange="putImage()" style="display:none;">

        <x-admin::hidden id="image_url" :value="$image ?? ''"/>

        <div class="row">
            <div class="col-12">
                Adicionar Imagem
                <button class="btn btn-sm btn-primary ml-2" type="button" onclick="$('#image').click()">
                    <i class="far fa-edit"></i>
                </button>
                <button class="btn btn-sm btn-danger" type="button" onclick="removeImage()">
                    <i class="far fa-trash-alt"></i>
                </button>
            </div>
            <div class="col-2 mt-2">
                <img id="eventImg" style="border: solid 1px gray; margin-bottom: 10px;"
                     src="{{ isset($image) ? asset($image) : env('APP_LOGO_INACTIVE') }}"
                     width="100" height="100"/>
            </div>
            @if(isset($small))
                <div class="col-12">
                    <small>{{ $small }}</small>
                </div>
            @endif
        </div>
    </div>
</div>
