<li class="nav-item {{ isset($route) ? Str::startsWith(url()->current(),$route) ? 'menu-open' : '' : '' }}">
    <a href="#" class="nav-link">
        {{ $icon ?? '' }}
        <p>
            {{ $label ?? '' }}
            <i class="fas fa-angle-right right"></i>
            @if (isset($span))
                <span class="badge badge-info right">{{ $span }}</span>
            @endif
        </p>
    </a>
    <ul class="nav nav-treeview">
        {{ $slot }}
    </ul>
</li>
