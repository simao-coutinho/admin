<li class="{{ Str::startsWith(url()->current(), $route ?? "#") ? "mm-active" : "" }}">
    <a class="{{ Str::startsWith(url()->current(), $route ?? "#") ? "active" : "" }}"
       href="{{ $route ?? "#" }}">{{ $label ?? '' }}</a>
</li>


