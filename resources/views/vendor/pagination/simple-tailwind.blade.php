@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-center gap-2">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <button class="btn btn-outline" disabled>{!! __('pagination.previous') !!}</button>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev">
                <button class="btn btn-outline">{!! __('pagination.previous') !!}</button>
            </a>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="prev">
                <button class="btn btn-outline">{!! __('pagination.next') !!}</button>
            </a>
        @else
            <button class="btn btn-outline" disabled>{!! __('pagination.next') !!}</button>
        @endif
    </nav>
@endif
