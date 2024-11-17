<div id="AllTipsItemModal" class="backdrop_popup">
    <div id="allTipsPopup">
        <span class="TipsPopupClose">🗙</span>
        <div class="all_tip_popup_header">
            <h2>Direct Support for Yungerleit</h2>
        </div>
        <div class="tip_wrapper">
            <div class="tip_container">
                @if ($campaign->tips)
                    @foreach ($campaign->tips as $tip)
                        <button class="tip_item" data-id="{{ $tip->id }}">
                            <div class="tip_item-icon">
                                <div class="tip_item_checkbox">
                                    <input class="inp-cbx" id="tipCheckbox{{ $tip->id }}"
                                        type="checkbox" />
                                    <label class="cbx" for="tipCheckbox{{ $tip->id }}">
                                        <span>
                                            <svg width="12px" height="10px">
                                                <use xlink:href="#check-4"></use>
                                            </svg>
                                        </span>
                                    </label>
                                    <svg class="inline-svg">
                                        <symbol id="check-4" viewbox="0 0 12 10">
                                            <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                        </symbol>
                                    </svg>
                                </div>
                                <svg width="28px" class="tip_icon" height="auto"
                                    style="margin-right:10px;" viewBox="0 0 26 27" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0 13.1705L1.52835 23.8441C1.52835 23.8441 9.37164 23.0545 12.1398 26.7975V16.9426C12.1398 16.9426 9.08314 11.8839 0 13.1705Z"
                                        fill="var(--accent-color)" />
                                    <path
                                        d="M25.9992 13.1708L24.4709 23.8444C24.4709 23.8444 16.6276 23.0549 13.8594 26.7979V16.9429C13.8594 16.9429 16.9161 11.8839 25.9992 13.1704V13.1708Z"
                                        fill="var(--accent-color)" />
                                    <path d="M13.6056 17.2344H12.3945V27.0015H13.6056V17.2344Z"
                                        fill="var(--accent-color)" />
                                    <path
                                        d="M15.259 10.2764C17.0659 9.41476 18.3168 7.55244 18.3168 5.39342C18.3168 2.4146 15.9358 0 12.9989 0C10.0619 0 7.68059 2.4146 7.68059 5.39342C7.68059 7.55393 8.93334 9.41738 10.7421 10.2783C4.4824 10.1415 2.78125 11.5304 2.78125 11.5304C10.5236 11.3548 12.9985 16.1799 12.9985 16.1799C12.9985 16.1799 15.4734 11.3548 23.2157 11.5304C23.2157 11.5304 21.6826 10.112 15.2586 10.2764H15.259Z"
                                        fill="var(--accent-color)" />
                                </svg>
                            </div>
                            <div class="tip_item-title">{{ $tip->title }}</div>
                            <div class="tip_amount">$0</div>
                        </button>
                    @endforeach
            </div>
            @endif
        </div>
    </div>
</div>

