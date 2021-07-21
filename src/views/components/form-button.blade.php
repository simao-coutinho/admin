@if(isset($route))
    <a href="{{ $route }}">
        @endif
        <button id="{{ $id ?? '' }}" name="{{ $id ?? '' }}"
            class="btn btn-sm {{ $buttonClass ?? 'btn-success' }} backend-button ml-md-2"
            @if(isset($onClick))
            onclick="{{ $onClick }}"
            @endif>
            {{ $slot ?? '' }} {{ $title ?? '' }}
        </button>
        @if(isset($route))
    </a>
@endif
