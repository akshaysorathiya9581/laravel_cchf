<style>
    .team-overview-wrapper {
        padding-top: 50px;
        width: 98%;
        margin: auto;
    }

    .text-link,
    .promo__link {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 14px;
        font-weight: bold;
        color: var(--accent-color);
    }

    .team-overview {
        display: flex;
        align-items: center;
        background-color: #fafafa;
        outline: 2px solid #f2f2f2;
        outline-offset: -2px;
        border-radius: 10px;
        margin-top: 20px;
        overflow: hidden;
    }

    .team-overview__person {
        display: flex;
        flex-direction: column;
        justify-content: center;
        gap: 7px;
        background-color: var(--accent-color);
        flex: 0.55;
        align-self: stretch;
        padding: 0 20px 0 40px;
    }

    .team-overview__details {
        flex: 1;
        padding: 29px 40px 34px 6.7%;
    }

    .team-overview__list {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .team-overview__progress-bar {
        flex: 1;
        position: relative;
        background-color: #ccc;
        overflow: hidden;
    }

    .progress-inner,
    .team-overview__progress-bar {
        height: 10px;
        border-radius: calc(infinity* 1px);
    }

    .progress-inner {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        max-width: 100%;
        position: absolute;
        top: 0;
        left: 0;
        background-color: var(--accent-color);
    }

    .progress-inner,
    .team-overview__progress-bar {
        height: 10px;
        border-radius: calc(infinity* 1px);
    }

    .team-overview__progress {
        font-size: 14px;
        font-weight: 600;
        color: #999999;
    }

    .team-overview__progress {
        font-size: 14px;
        font-weight: 600;
        color: #999999;
    }

    .team-overview__progress {
        font-size: 14px;
        font-weight: 600;
        color: #999999;
    }

    @media(max-width:500px) {
        .team-overview-wrapper {
            width: 98%;
        }
    }
</style>

<div class="team-overview-wrapper">
    <div class="container-lg g-0">
        <a href="/campaign/{{ $campaign->slug }}" class="text-link">
            <svg xmlns="http://www.w3.org/2000/svg" width="19.071" height="11.357" viewBox="0 0 19.071 11.357">
                <g id="arrow" transform="translate(-382.929 -510.314)">
                    <rect id="Rectangle_16" data-name="Rectangle 16" width="8" height="2"
                        transform="translate(400.586 517.385) rotate(-135)" fill="var(--accent-color)"></rect>
                    <rect id="Rectangle_17" data-name="Rectangle 17" width="8" height="2"
                        transform="translate(402 516.014) rotate(135)" fill="var(--accent-color)"></rect>
                    <rect id="Rectangle_18" data-name="Rectangle 18" width="8" height="2"
                        transform="translate(394.586 517.385) rotate(-135)" fill="var(--accent-color)"></rect>
                    <rect id="Rectangle_19" data-name="Rectangle 19" width="8" height="2"
                        transform="translate(396 516.014) rotate(135)" fill="var(--accent-color)"></rect>
                    <rect id="Rectangle_20" data-name="Rectangle 20" width="8" height="2"
                        transform="translate(388.586 517.385) rotate(-135)" fill="var(--accent-color)"></rect>
                    <rect id="Rectangle_21" data-name="Rectangle 21" width="8" height="2"
                        transform="translate(390 516.014) rotate(135)" fill="var(--accent-color)"></rect>
                </g>
            </svg>
            <span>Visit Campaign Homepage</span>
        </a>
        <div class="team-overview">
            <div class="team-overview__person overlay">
                <p class="team-overview__title">Team Page</p>
                <p class="team-overview__owner">{{ $pageTeam->display_name }}</p>
            </div>

            <div class="team-overview__details">
                <div class="team-overview__list">
                    <dl>
                        <dt>Raised:</dt>
                        <dd id="team-overview-raised">${{ number_format($pageTeam->data['totalDonated'], 2) }}</dd>
                    </dl>
                    <dl>
                        <dt>Goal:</dt>
                        <dd id="team-overview-goal"> ${{ number_format($pageTeam->goal, 2) }}</dd>
                    </dl>
                    <dl>
                        <dt>Donors:</dt>
                        <dd id="team-overview-donors">{{ $pageTeam->data['total_donors'] }}</dd>
                    </dl>
                </div>
                <div class="team-overview__progress-wrapper">
                    <div class="team-overview__progress-bar">
                        <div class="progress-inner overlay"
                            style="width: {{ $pageTeam->data['percentage'] }}%;background:var(--accent-color) !important;">
                        </div>
                    </div>
                    <div class="team-overview__progress">
                        <span class="percentage">{{ $pageTeam->data['percentage'] }}%</span>
                        <span class="goal">of ${{ number_format($pageTeam->goal, 2) }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


    <script>
        $(document).ready(function() {
            let teamName = $('.team-overview__owner').text();
            $('#teamId').val({{ $pageTeam->id }});
            $('.cart__team').text('Team: ' + teamName);
        });
    </script>

