<li>
    <a href="javascript: void(0);" class="has-arrow waves-effect {{ isset($route) ? Str::startsWith(url()->current(),$route) ? 'mm-active' : '' : '' }} {{ $customClass ?? '' }}">
        {{ $icon ?? '' }}
        @if (isset($badge))
        <span class="badge rounded-pill {{ $badgeClass ?? 'bg-info' }} float-end">{{ $badge }}</span>
        @endif
        <span key="t-dashboards">{{ $label ?? '' }}</span>
    </a>
    <ul class="sub-menu {{ isset($route) ? Str::startsWith(url()->current(),$route) ? 'mm-show' : '' : '' }}" aria-expanded="false">
        {{ $slot }}
    </ul>
</li>
