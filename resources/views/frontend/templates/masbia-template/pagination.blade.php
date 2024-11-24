<ul class="custom-pagination__list">
    <!-- Prev Button -->
    @if ($pageNo > 1)
        <li class="custom-pagination__item">
            <a href="javascript:void(0)" data-page="{{ $pageNo - 1 }}" rel="prev" aria-label="Previous">
                <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7 1L1 7L7 13" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>
        </li>
    @else
        <li class="custom-pagination__item disabled">
            <a href="javascript:void(0)" data-page="{{ $pageNo }}" rel="prev" aria-label="Previous">
                <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7 1L1 7L7 13" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>
        </li>
    @endif

    <!-- First Few Pages -->
    @if ($totalPages > 1)
        <li class="custom-pagination__item">
            <a href="javascript:void(0)" data-page="1" aria-current="{{ $pageNo == 1 ? 'page' : '' }}" aria-label="Page 1">
                1
            </a>
        </li>
        @if ($pageNo > 4)
            <li class="custom-pagination__item disabled"><span>...</span></li>
        @endif
    @endif

    <!-- Pages Around the Current Page -->
    @for ($i = max(2, $pageNo - 2); $i <= min($totalPages - 1, $pageNo + 2); $i++)
        <li class="custom-pagination__item">
            <a href="javascript:void(0)" data-page="{{ $i }}" aria-current="{{ $pageNo == $i ? 'page' : '' }}" aria-label="Page {{ $i }}" @if ($pageNo == $i) aria-current="page" @endif>
                {{ $i }}
            </a>
        </li>
    @endfor

    <!-- Last Few Pages -->
    @if ($totalPages > 1)
        @if ($pageNo < $totalPages - 3)
            <li class="custom-pagination__item disabled">
				<a href="javascript:void(0)" aria-label="">.....</a>
			</li>
        @endif
        <li class="custom-pagination__item">
            <a href="javascript:void(0)" data-page="{{ $totalPages }}" aria-current="{{ $pageNo == $totalPages ? 'page' : '' }}" aria-label="Page {{ $totalPages }}">
                {{ $totalPages }}
            </a>
        </li>
    @endif

    <!-- Next Button -->
    @if ($pageNo < $totalPages)
        <li class="custom-pagination__item">
            <a href="javascript:void(0)" data-page="{{ $pageNo + 1 }}" rel="next" aria-label="Next">
                <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1L7 7L1 13" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>
        </li>
    @else
        <li class="custom-pagination__item disabled">
            <a href="javascript:void(0)" data-page="{{ $pageNo }}" rel="next" aria-label="Next">
                <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1L7 7L1 13" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>
        </li>
    @endif
</ul>
