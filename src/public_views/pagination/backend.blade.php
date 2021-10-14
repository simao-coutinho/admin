@if ($paginator->hasPages())
    <div class="d-flex align-items-center justify-content-between">
        <p class="text-sm text-gray-700 leading-5 mb-0">
            {!! __('Showing') !!}
            <span class="font-medium">{{ $paginator->firstItem() }}</span>
            {!! __('to') !!}
            <span class="font-medium">{{ $paginator->lastItem() }}</span>
            {!! __('de') !!}
            <span class="font-medium">{{ $paginator->total() }}</span>
            {!! __('results') !!}
        </p>

        <ul class="pagination pagination-rounded justify-content-center mb-0">
            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <a class="page-link"><i class="mdi mdi-chevron-left"></i></a>
                </li>
            @else
                <li class="page-item">
                    <a onclick="changeTablePage({{ $paginator->currentPage() - 1 }})" class="page-link"><i class="mdi mdi-chevron-left"></i></a>
                </li>
            @endif

            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item">
                        <a class="page-link">{{ $element }}</a>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active">
                                <a class="page-link">{{ $page }}</a>
                            </li>
                        @else
                            <li class="page-item">
                                <a onclick="changeTablePage({{ $page }})" class="page-link">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a onclick="changeTablePage({{ $paginator->currentPage() + 1 }})" class="page-link"><i class="mdi mdi-chevron-right"></i></a>
                </li>
            @else
                <li class="page-item disabled">
                    <a class="page-link"><i class="mdi mdi-chevron-right"></i></a>
                </li>
            @endif
        </ul>
    </div>
@else
    <div class="d-flex align-items-center justify-content-between">
        <p class="text-sm text-gray-700 leading-5 mb-0">
            {!! __('Showing') !!}
            <span class="font-medium">{{ $paginator->firstItem() }}</span>
            {!! __('to') !!}
            <span class="font-medium">{{ $paginator->lastItem() }}</span>
            {!! __('de') !!}
            <span class="font-medium">{{ $paginator->total() }}</span>
            {!! __('results') !!}
        </p>
    </div>
@endif
