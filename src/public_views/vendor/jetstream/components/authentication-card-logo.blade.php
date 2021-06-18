@if (env('APP_LOGO_SQUARE') !== null)
    <a href="{{ route('home') }}" target="_blank">
        <img src="{{ env('APP_LOGO_SQUARE') }}" alt="{{ env('APP_NAME') }} Logo"
             style="width: 150px;">
    </a>
@endif
