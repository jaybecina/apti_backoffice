@if ($paginator->hasPages())
    <ul class="pager">
       
        @if ($paginator->onFirstPage())
            <li class="disabled"><span><i class="fa fa-angle-left" aria-hidden="true"></i></span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>
        @endif


      
        @foreach ($elements as $element)
           
            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif


           
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li><span class="active my-active" style="margin-left: 1px; margin-right: 1px;">{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach


        
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
        @else
            <li class="disabled"><span><i class="fa fa-angle-right" aria-hidden="true"></i></span></li>
        @endif
    </ul>
@endif 