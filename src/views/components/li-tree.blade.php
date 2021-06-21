<li class="nav-item">
    <a href="#" class="nav-link">
        {{ $icon ?? '' }}
        <p>
            {{ $label ?? '' }}
            <i class="fas fa-angle-left right"></i>
            @if (isset($span))
                <span class="badge badge-info right">{{ $span }}</span>
            @endif
        </p>
    </a>
    <ul class="nav nav-treeview">
        {{ $slot }}
    </ul>
</li>
