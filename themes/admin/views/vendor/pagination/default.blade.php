@if ($paginator->hasPages())
<div class="d-flex px-3 justify-content-end">
    <div class="pagination__one-page mr-3">
        <b>
            {{ ($paginator->currentPage() - 1) * $paginator->perPage() + 1}}
            - 
            {{ ($paginator->currentPage() - 1) * $paginator->perPage() + $paginator->count() }}
            /{{$paginator->total()}} 
            @lang('pagination.one-page')
        </b>

        <select class="pagination_select-limit ml-3" id="pagination_select-limit" name="limit" data-url-set-limit="{{route('admin.set-limit-page')}}">
            @foreach(config('custom.page-limit') as $item)
            <option  value={{$item}} @if($paginator->perPage() == $item) selected @endif>{{$item}}</option>
            @endforeach
        </select>
        <b>
            @lang('pagination.item')
        </b>
    </div>

    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        <li class="paginate_button page-item previous disabled" aria-label="@lang('pagination.previous')"
            id="datatable-basic_previous">
            <a href="#" aria-controls="datatable-basic" data-dt-idx="0" tabindex="0" class="page-link"><i
                    class="fas fa-angle-left"></i>
            </a>
        </li>
        @else
        <li class="paginate_button page-item previous" aria-label="@lang('pagination.previous')"
            id="datatable-basic_previous">
            <a href="{{ $paginator->previousPageUrl() }}" aria-controls="datatable-basic" data-dt-idx="0" tabindex="0"
                class="page-link"><i class="fas fa-angle-left"></i>
            </a>
        </li>
        @endif
        @php
        $elements = \App\Helpers\Common::paginateCustomize($paginator);
        @endphp
        {{-- Pagination Elements --}}

        @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}

        @if (is_string($element))
        <li class="disabled" aria-disabled="true">{{ $element }}</li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
        @if ($element['page'] == $paginator->currentPage())
        <li class="paginate_button page-item active" aria-current="page">
            <a href="#" aria-controls="datatable-basic" data-dt-idx="1" tabindex="0"
                class="page-link">{{$element['page']}}</a>
        </li>
        @else
        <li class="paginate_button page-item "><a href="{{ $element['path'] }}" aria-controls="datatable-basic"
                data-dt-idx="1" tabindex="0" class="page-link">{{ $element['page'] }}</a></li>
        @endif
        @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <li class="paginate_button page-item next" aria-label="@lang('pagination.next')" id="datatable-basic_next">
            <a href="{{ $paginator->nextPageUrl() }}" aria-controls="datatable-basic" data-dt-idx="2" tabindex="0"
                class="page-link">
                <i class="fas fa-angle-right"></i>
            </a>
        </li>
        @else
        <li class="paginate_button page-item next disabled" aria-label="@lang('pagination.next')"
            id="datatable-basic_next">
            <a href="#" aria-controls="datatable-basic" data-dt-idx="2" tabindex="0" class="page-link">
                <i class="fas fa-angle-right"></i>
            </a>
        </li>
        @endif
    </ul>
</div>
@endif