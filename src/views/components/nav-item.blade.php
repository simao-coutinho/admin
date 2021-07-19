<li class="nav-item {{ $customClass ?? '' }}">
    <a href="{{ $route ?? "#" }}"
       @if (Str::startsWith(url()->current(), $route ?? "#"))
       class="nav-link active"
       @else
       class="nav-link"
        @endif>
        {{ $slot ?? '' }}
        <p class="textWhite">
            {{ $label ?? '' }}
        </p>
    </a>
</li>

