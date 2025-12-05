@if ($paginator->hasPages())
    <nav class="flex justify-center mt-4">
        <ul class="inline-flex items-center space-x-1">
            @if ($paginator->onFirstPage())
                <li class="px-3 py-1 bg-gray-300 text-white rounded">Prev</li>
            @else
                <li>
                    <a class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700"
                        href="{{ $paginator->previousPageUrl() }}">Prev</a>
                </li>
            @endif
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="px-3 py-1 text-gray-500">...</li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="px-3 py-1 bg-blue-700 text-white rounded">{{ $page }}</li>
                        @else
                            <li>
                                <a href="{{ $url }}"
                                   class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">
                                    {{ $page }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach
            @if ($paginator->hasMorePages())
                <li>
                    <a class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700"
                        href="{{ $paginator->nextPageUrl() }}">Next</a>
                </li>
            @else
                <li class="px-3 py-1 bg-gray-300 text-white rounded">Next</li>
            @endif
        </ul>
    </nav>
@endif
