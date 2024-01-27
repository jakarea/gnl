@if ($paginator->hasPages())
    <div class="pagination-section">
        <nav class="mt-4" aria-label="...">
            <ul class="pagination">
                @if ($paginator->onFirstPage())
                <li class="page-item">
                    <a class="page-link page-link-left"><i class="fa-solid fa-angle-left"></i></a>
                </li>
                @else
                <li class="page-item">
                    <a class="page-link page-link-left" href="{{ $paginator->previousPageUrl() }}"><i class="fa-solid fa-angle-left"></i></a>
                </li>
                @endif
                @foreach ($elements as $element)
                    @if (is_string($element))
                        <li class="page-item disabled"><a class="page-link">{{ $element }}</a></li>
                    @endif

                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="page-item active"><a class="page-link">{{ $page }}</a></li>
                            @else
                                <li class="page-item"><a class="page-link"  href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                    <li class="page-item" aria-current="page">
                        <a class="page-link" href="#">1</a>
                    </li>
                @endforeach

                @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a href="{{ $paginator->nextPageUrl() }}" class="page-link page-link-right" href="#"><i class="fa-solid fa-angle-right"></i></a>
                </li>
                @else
                <li class="page-item">
                    <a class="page-link page-link-right"><i class="fa-solid fa-angle-right"></i></a>
                </li>
                @endif
            </ul>
        </nav>
        <div class="pagination-text">
            <p>Showing {{ $paginator->firstItem() }} to {{ $paginator->lastItem() }} of {{ $paginator->total() }} entries</p>
        </div>
    </div>

@endif
