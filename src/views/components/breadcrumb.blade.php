<li class="breadcrumb-item @if(!isset($route)) active @endif">
    @if(isset($route))
        <a href="{{ $route }}">{{ $title ?? '' }}</a>
    @else
        {{ $title ?? '' }}
    @endif
</li>
