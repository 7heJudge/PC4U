<ul class="store-pagination">
    @if ($paginator->onFirstPage())
        <li class="disabled"><i class="fa fa-angle-left"></i></li>
    @else
        <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="fa fa-angle-left"></i></a></li>
    @endif
    @foreach($elements as $element)
        @if (is_string($element))
            <li class="disabled"><span>{{ $element }}</span></li>
        @endif
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li class="active my-active"><span>{{ $page }}</span></li>
                @else
                    <li><a href="{{ $url }}">{{ $page }}</a></li>
                @endif
            @endforeach
        @endif
    @endforeach
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="fa fa-angle-right"></i></a></li>
        @else
            <li class="disabled"><i class="fa fa-angle-right"></i></li>
        @endif
{{--    <li class="active">1</li>--}}
{{--    <li><a href="#">2</a></li>--}}
{{--    <li><a href="#">3</a></li>--}}
{{--    <li><a href="#">4</a></li>--}}
{{--    <li><a href="#"><i class="fa fa-angle-right"></i></a></li>--}}
</ul>
