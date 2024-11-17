@extends('admin.layout')
@section('title', 'Dashboard')

@section('content')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            Campaigns</h1>
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('admin.campaigns') }}" class="text-muted text-hover-primary">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted"> Campaigns</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <div id="kt_app_content_container" class="app-container container-xxl">
                    <div class="d-flex flex-wrap flex-stack mb-6">
                        <h3 class="fw-bold my-2"></h3>
                        <div class="d-flex align-items-center my-2">
                            <a href="{{ route('admin.addCampaigns') }}" class="btn btn-primary btn-sm">Add Campaign </a>
                        </div>
                        <!--end::Controls-->
                    </div>
                    <!--end::Toolbar-->
                    <!--begin::Row-->
                    <div class="row g-6 g-xl-9">
                        <!--begin::Col-->
                        @foreach ($campaigns as $campaign)
                            <div class="col-sm-6 col-xl-4">
                                <div class="card h-100">
                                    <div class="card-header flex-nowrap border-0 pt-9">
                                        <div class="card-title m-0">
                                            <!--begin::Icon-->
                                            <div class="symbol symbol-45px w-45px bg-light me-5">
                                                @if ($campaign->media)
                                                    <img src="{{ $campaign->media->logo_url }}" alt="Logo">
                                                @endif
                                            </div>
                                            <!--end::Icon-->
                                            <!--begin::Title-->
                                            <a href="#" class="fs-4 fw-semibold text-hover-primary text-gray-600 m-0">
                                                {{ $campaign->camp_title }}</a>
                                        </div>
                                        <div class="card-toolbar m-0">
                                            <button type="button"
                                                class="btn btn-clean btn-sm btn-icon btn-icon-primary btn-active-light-primary me-n3"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                <span class="svg-icon svg-icon-3 svg-icon-primary">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                        viewBox="0 0 24 24">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <rect x="5" y="5" width="5" height="5" rx="1"
                                                                fill="currentColor" />
                                                            <rect x="14" y="5" width="5" height="5" rx="1"
                                                                fill="currentColor" opacity="0.3" />
                                                            <rect x="5" y="14" width="5" height="5" rx="1"
                                                                fill="currentColor" opacity="0.3" />
                                                            <rect x="14" y="14" width="5" height="5" rx="1"
                                                                fill="currentColor" opacity="0.3" />
                                                        </g>
                                                    </svg>
                                                </span>
                                            </button>
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3"
                                                data-kt-menu="true">
                                                <div class="menu-item px-3">
                                                    <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">
                                                        Action</div>
                                                </div>
                                                <div class="menu-item px-3">
                                                    <a href="{{ route('admin.Campaignteams', ['id' => $campaign->id]) }}"
                                                        class="menu-link px-3">Teams</a>
                                                </div>
                                                <div class="menu-item px-3">
                                                    <a href="{{ route('admin.split-pot', ['id' => $campaign->id]) }}"
                                                        class="menu-link px-3">Split The Pot</a>
                                                </div>
                                                <div class="menu-item px-3">
                                                    <a href="{{ route('admin.campaign.edit', ['campaign' => $campaign->slug]) }}"
                                                        class="menu-link flex-stack px-3">Customize</a>
                                                </div>
                                                <div class="menu-item px-3">
                                                    <a href="{{ route('admin.campaign.destroy', ['campaignId' => $campaign->id]) }}"
                                                        class="menu-link px-3">Deactivate</a>
                                                </div>

                                                <div class="menu-item px-3 my-1">
                                                    <a href="{{ route('admin.custom-code', ['id' => $campaign->id]) }}"
                                                        class="menu-link px-3">Custom Code</a>
                                                </div>
                                                <div class="menu-item px-3 my-1">
                                                    <a href="{{ route('admin.gifts', ['id' => $campaign->id]) }}"
                                                        class="menu-link px-3">Gifts</a>
                                                </div>
                                                <div class="menu-item px-3 my-1">
                                                    <a href="{{ route('admin.sponsor', ['id' => $campaign->id]) }}"
                                                        class="menu-link px-3">Sponsor</a>
                                                </div>
                                                <div class="menu-item px-3 my-1">
                                                    <a href="{{ route('admin.tips', ['id' => $campaign->id]) }}"
                                                        class="menu-link px-3">Tips</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body d-flex flex-column px-9 pt-6 pb-8">
                                        <div class="fs-2tx fw-bold mb-3">
                                            ${{ number_format($campaign->meta->goal ?? 0, 2) }}
                                        </div>
                                        <div class="d-flex align-items-center flex-wrap mb-5 mt-auto fs-6">
                                            <div class="fw-semibold text-gray-400"><a
                                                    href="{{ route('raffle', ['campaign' => $campaign->slug]) }}"
                                                    target="_blank">View</a>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center fw-semibold">
                                            <span class="text-gray-400 fs-7">Donation</span>
                                            <span
                                                class="badge bg-light text-gray-700 px-3 py-2 me-2">${{ number_format($campaign->totalDonations, 2) }}</span>

                                        </div>
                                        <!--end::Indicator-->
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Card-->
                            </div>
                        @endforeach
                    </div>
                    <div class="d-flex flex-stack flex-wrap pt-10 d-none">
                        <div class="fs-6 fw-semibold text-gray-700">Showing 1 to 10 of 50 entries</div>
                        <ul class="pagination">
                            <li class="page-item previous">
                                <a href="#" class="page-link">
                                    <i class="previous"></i>
                                </a>
                            </li>
                            <li class="page-item active">
                                <a href="#" class="page-link">1</a>
                            </li>

                            <li class="page-item next">
                                <a href="#" class="page-link">
                                    <i class="next"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.campaign.modals.createCampaignModal')


@endsection
