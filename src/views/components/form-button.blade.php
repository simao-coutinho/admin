@if(isset($route))
    <a href="{{ $route }}"
       @if(isset($target))

       target="{{ $target }}"
       @endif
       @if($download ?? false)
       download
        @endif>
        @endif
        <button type="button" id="{{ $id ?? '' }}" name="{{ $id ?? '' }}" type="{{ $type ?? 'button' }}"
                @if(isset($onClick))
                onclick="{{ $onClick }}"
                @endif
                class="btn {{ $buttonClass ?? 'btn-success' }} btn-rounded waves-effect waves-light mb-2 me-2">
            {{ $slot ?? '' }} {{ $title ?? '' }}
        </button>
        @if(isset($route))
    </a>
@endif
