<li  class="{{ Str::startsWith(url()->current(), $route ?? "#") ? "mm-active" : "" }}">
    <a href="{{ $route ?? "#" }}"
       class="waves-effect {{ $customClass ?? '' }} {{ Str::startsWith(url()->current(), $route ?? "#") ? "active" : "" }}">
        {{ $slot ?? '' }}
        @if (isset($badge))
        <span class="badge rounded-pill {{ $badgeClass ?? 'bg-success' }} float-end" key="t-new">{{ $badge }}</span>
        @endif
        <span>{{ $label ?? '' }}</span>
    </a>
</li>


