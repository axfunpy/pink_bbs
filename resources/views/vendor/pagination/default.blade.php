@if ($paginator->hasPages())
    <div>
     
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span>上一页&nbsp;</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev">上一页&nbsp;</a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
               <span>{{ $element }}</span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span>[{{ $page }}]&nbsp;</span>
                    @else
                        <a href="{{ $url }}">[{{ $page }}]&nbsp;</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next">下一页&nbsp;</a>
        @else
            <span>下一页&nbsp;</span>
        @endif
       
        
    </div>
@endif
