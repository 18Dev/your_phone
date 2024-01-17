<div class="row justify-content-between">
    <div class="col-sm-12 col-md-5">
        <div class="dataTables_info" id="sampleTable_info" role="status" aria-live="polite">
            {{ __('pagination.total_result', ['total' => $paginator->total()]) }}
        </div>
    </div>
    <div class="col-sm-12 col-md-7">
        <div class="dataTables_paginate paging_simple_numbers d-flex justify-content-end">
            @if ($paginator->hasPages())
                <ul class="pagination">
                    @if ($paginator->onFirstPage())
                        <li class="paginate_button page-item previous disabled">
                            <a href="#" aria-controls="sampleTable" data-dt-idx="0" tabindex="0" class="page-link"><span><i class="fa fa-angle-double-left"></i></span></a>
                        </li>
                    @else
                        <li class="paginate_button page-item previous">
                            <a href="{{ $paginator->previousPageUrl() }}" aria-controls="sampleTable"  data-dt-idx="0" tabindex="0" class="page-link"><span><i class="fa fa-angle-double-left"></i></span></a>
                        </li>
                    @endif
                    @foreach ($elements as $element)
                        @if (is_string($element))
                            <li class="paginate_button page-item disabled">
                                <a href="#" aria-controls="sampleTable" data-dt-idx="1" tabindex="0" class="page-link">{{ $element }}</a>
                            </li>
                        @endif
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="paginate_button page-item active">
                                        <a href="#" aria-controls="sampleTable" data-dt-idx="{{ $page }}" tabindex="0" class="page-link">{{ $page }}</a>
                                    </li>
                                @else
                                    <li class="paginate_button page-item">
                                        <a href="{{ $url }}" aria-controls="sampleTable" data-dt-idx="{{ $page }}" tabindex="0" class="page-link">{{ $page }}</a>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                    @if ($paginator->hasMorePages())
                        <li class="paginate_button page-item next" id="sampleTable_next">
                            <a href="{{ $paginator->nextPageUrl() }}" aria-controls="sampleTable" data-dt-idx="7" tabindex="0" class="page-link"><span><i class="fa fa-angle-double-right"></i></span></a>
                        </li>
                    @else
                        <li class="paginate_button page-item next disabled" id="sampleTable_next">
                            <a href="#" aria-controls="sampleTable" data-dt-idx="7" tabindex="0" class="page-link"><span><i class="fa fa-angle-double-right"></i></span></a>
                        </li>
                    @endif
                </ul>
            @endif
        </div>
    </div>
</div>
