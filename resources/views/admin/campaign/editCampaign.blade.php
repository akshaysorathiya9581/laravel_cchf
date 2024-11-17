@extends('admin.layout')
@section('title', 'Dashboard')

@section('content')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">

        <div class="d-flex flex-column flex-column-fluid">

            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">

                <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">

                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">

                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            Create
                            Compaign</h1>
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">

                            <li class="breadcrumb-item text-muted">
                                <a href="/" class="text-muted text-hover-primary">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">create compaign</li>

                        </ul>
                    </div>

                </div>
            </div>
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <div id="kt_app_content_container" class="app-container container-xxl">
                    <div class="stepper stepper-pills stepper-column d-flex flex-column flex-xl-row flex-row-fluid gap-10"
                        id="kt_create_account_stepper">
                        <div
                            class="card d-flex justify-content-center justify-content-xl-start flex-row-auto w-100 w-xl-300px w-xxl-400px">
                            <div class="card-body px-6 px-lg-10 px-xxl-15 py-20">
                                <div class="stepper-nav">
                                    <div class="stepper-item current edit_campaign" id="button1"
                                        data-kt-stepper-element="nav" data-kt-stepper-action="step">
                                        <div class="stepper-wrapper">
                                            <div class="stepper-icon w-40px h-40px">
                                                <i class="stepper-check fas fa-check"></i>
                                                <span class="stepper-number">1</span>
                                            </div>
                                            <div class="stepper-label">
                                                <h3 class="stepper-title">Configure Campaign</h3>
                                                <div class="stepper-desc fw-semibold">Setup Your Campaign</div>
                                            </div>
                                        </div>
                                        <div class="stepper-line h-40px"></div>
                                    </div>
                                    <div class="stepper-item edit_campaign" id="button2" data-kt-stepper-element="nav"
                                        data-kt-stepper-action="step">
                                        <div class="stepper-wrapper">
                                            <div class="stepper-icon w-40px h-40px">
                                                <i class="stepper-check fas fa-check"></i>
                                                <span class="stepper-number">2</span>
                                            </div>
                                            <div class="stepper-label">
                                                <h3 class="stepper-title">Banners</h3>
                                                <div class="stepper-desc fw-semibold">Setup Campaign banners</div>
                                            </div>
                                        </div>
                                        <div class="stepper-line h-40px"></div>
                                    </div>
                                    <div class="stepper-item edit_campaign" id="button3" data-kt-stepper-element="nav"
                                        data-kt-stepper-action="step">
                                        <div class="stepper-wrapper">
                                            <div class="stepper-icon w-40px h-40px">
                                                <i class="stepper-check fas fa-check"></i>
                                                <span class="stepper-number">3</span>
                                            </div>
                                            <div class="stepper-label">
                                                <h3 class="stepper-title">Ticket/Prizes</h3>
                                                <div class="stepper-desc fw-semibold">Add Ticket/Prizes</div>
                                            </div>
                                        </div>
                                        <div class="stepper-line h-40px"></div>
                                    </div>
                                    <div class="stepper-item edit_campaign" id="button4" data-kt-stepper-element="nav"
                                        data-kt-stepper-action="step">
                                        <div class="stepper-wrapper">
                                            <div class="stepper-icon w-40px h-40px">
                                                <i class="stepper-check fas fa-check"></i>
                                                <span class="stepper-number">4</span>
                                            </div>
                                            <div class="stepper-label">
                                                <h3 class="stepper-title">Settings</h3>
                                                <div class="stepper-desc fw-semibold">Campaign Settings, payments</div>
                                            </div>
                                        </div>
                                        <div class="stepper-line h-40px"></div>
                                    </div>
                                    <div class="stepper-item edit_campaign" id="button5" data-kt-stepper-element="nav"
                                        data-kt-stepper-action="step">
                                        <div class="stepper-wrapper">
                                            <div class="stepper-icon w-40px h-40px">
                                                <i class="stepper-check fas fa-check"></i>
                                                <span class="stepper-number">5</span>
                                            </div>
                                            <div class="stepper-label">
                                                <h3 class="stepper-title">Content</h3>
                                                <div class="stepper-desc fw-semibold">Campaign Content</div>
                                            </div>
                                        </div>
                                        <div class="stepper-line h-40px"></div>
                                    </div>
                                    <div class="stepper-item edit_campaign mark-completed" id="button6"
                                        data-kt-stepper-element="nav" data-kt-stepper-action="step">
                                        <div class="stepper-wrapper">
                                            <div class="stepper-icon w-40px h-40px">
                                                <i class="stepper-check fas fa-check"></i>
                                                <span class="stepper-number">6</span>
                                            </div>
                                            <div class="stepper-label">
                                                <h3 class="stepper-title">Completed</h3>
                                                <div class="stepper-desc fw-semibold">Woah, we are here</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-5 d-flex justify-content-between mt-4">
                                        <a href="/campaign/{{ $campaign->slug }}" target="_blank"
                                            class="btn btn-lg  btn-primary">View </a>
                                        <button type="button" id="formSubmit" class="btn btn-lg btn-primary py-0 ms-3">
                                            <span class="indicator-label py-0">Submit </span>

                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card d-flex flex-row-fluid flex-center">
                            @if (isset($errors) && $errors->any())
                                <div class="alert alert-danger " role="alert">
                                    @foreach ($errors->all() as $error)
                                        <strong> Error </strong>{{ $error }}
                                    @endforeach
                                </div>
                            @endif
                            <form class="card-body py-20 w-100  px-9 campaign_form" method="post"
                                action="{{ route('admin.updateCampaign') }}" enctype="multipart/form-data"
                                novalidate="novalidate" id="kt_create_account_form">

                                <div class="current contents" id="content1" data-kt-stepper-element="content">
                                    <div class="w-100">
                                        <div class="pb-10 pb-lg-15">
                                            <h2 class="fw-bold d-flex align-items-center text-dark">Setup Campaign
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                                    title="Campaign name will be used as reference within your campaign reports"></i>
                                            </h2>
                                        </div>
                                        <input type="hidden" id="campaignId" name="campaignId"
                                            value="{{ $campaign->id }}">
                                        @if (isset($campaign->media->id))
                                            <input type="hidden" name="mediaId" value="{{ $campaign->media->id }}" />
                                        @endif

                                        @if (isset($campaign->meta->id))
                                            <input type="hidden" name="metaId" value="{{ $campaign->meta->id }}" />
                                        @endif

                                        @if (isset($campaign->organization->id))
                                            <input type="hidden" name="organizationId"
                                                value="{{ $campaign->organization->id }}" />
                                        @endif


                                        <div class="mb-10 fv-row">
                                            <label class="required form-label mb-3">Organization Name</label>
                                            <input type="text" class="form-control form-control-lg form-control-solid"
                                                name="organization_name" value="{{ $campaign->org_name }}" />
                                            @if ($errors->has('organization_name'))
                                                <div class="text-danger">{{ $errors->first('organization_name') }}</div>
                                            @endif
                                        </div>
                                        <div class="mb-10 fv-row">
                                            <label class="required form-label mb-3">Campaign Name</label>
                                            <input type="text" class="form-control form-control-lg form-control-solid"
                                                name="campaign_name" value="{{ $campaign->camp_title }}" />
                                            @if ($errors->has('campaign_name'))
                                                <div class="text-danger">{{ $errors->first('campaign_name') }}</div>
                                            @endif
                                        </div>

                                        <div class="mb-10 fv-row">
                                            <label class="required form-label mb-3">Template</label>
                                            <select id="campaignTemplate"
                                                class="form-select form-select-solid form-select-sm"
                                                data-control="select2" data-hide-search="true" name="template">
                                                <option value="raffle"
                                                    {{ $campaign->template == 'raffle' ? 'selected' : '' }}>Raffle</option>
                                                <option value="general"
                                                    {{ $campaign->template == 'general' ? 'selected' : '' }}>General
                                                </option>
                                                <option value="event"
                                                    {{ $campaign->template == 'event' ? 'selected' : '' }}>Events</option>
                                                <option value="multi_location"
                                                    {{ $campaign->template == 'multi_location' ? 'selected' : '' }}>Multi
                                                    Location</option>
                                                <option value="masbia"
                                                    {{ $campaign->template == 'masbia' ? 'selected' : '' }}>Masbia</option>
                                                {{-- <option value="goal" {{ $campaign->template == 'goal' ? 'selected' : '' }}>Goal</option> --}}
                                            </select>
                                            @if ($errors->has('template'))
                                                <div class="text-danger">{{ $errors->first('template') }}</div>
                                            @endif
                                        </div>

                                        <div class="mb-10 fv-row">
                                            <label class="required form-label mb-3">Slug</label>
                                            <input type="text" class="form-control form-control-lg form-control-solid"
                                                name="slug" value="{{ $campaign->slug }}" />
                                            @if ($errors->has('slug'))
                                                <div class="text-danger">{{ $errors->first('slug') }}</div>
                                            @endif
                                        </div>

                                        <div class="mb-10 fv-row">
                                            <label class="required form-label mb-3">Seasons</label>
                                            <select class="form-select form-select-solid form-select-sm"
                                                data-control="select2" data-placeholder="select season"
                                                data-hide-search="false" name="season_id">
                                                @foreach ($seasons as $season)
                                                    @php
                                                        $selected = '';
                                                    @endphp
                                                    @if ($season->id == $campaign->season_id)
                                                        @php
                                                            $selected = 'selected';
                                                        @endphp
                                                    @endif
                                                    <option {{ $selected }} value="{{ $season->id }}">
                                                        {{ $season->name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('season_id'))
                                                <div class="text-danger">{{ $errors->first('season_id') }}</div>
                                            @endif
                                        </div>
                                        <div class="mb-10 fv-row">
                                            <label class="required form-label mb-3">Users</label>
                                            <select class="form-select form-select-solid form-select-sm" multiple
                                                data-control="select2" data-hide-search="false" name="users[]">
                                                @foreach ($all_users as $user)
                                                    @php
                                                        $selected = '';
                                                    @endphp

                                                    @foreach ($campaign_users as $c_user)
                                                        @if ($user->id == $c_user->user_id)
                                                            @php
                                                                $selected = 'selected';
                                                                // break;
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                    <option value="{{ $user->id }}" {{ $selected }}>
                                                        {{ $user->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('users'))
                                                <div class="text-danger">{{ $errors->first('users') }}</div>
                                            @endif
                                        </div>
                                        <div class="fv-row mb-10">
                                            <label class="d-block fw-semibold fs-6 mb-5">
                                                <span class="required"> Logo</span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                                    title="E.g. Select a logo to represent the company that's running the campaign."></i>
                                            </label>

                                            <style>
                                                .image-input-placeholder {
                                                    background-image: url('assets/media/svg/files/blank-image.svg');
                                                }

                                                [data-bs-theme="dark"] .image-input-placeholder {
                                                    background-image: url('assets/media/svg/files/blank-image-dark.svg');
                                                }
                                            </style>
                                            <div class="image-input image-input-empty image-input-outline image-input-placeholder"
                                                data-kt-image-input="true">
                                                <div class="image-input-wrapper w-125px h-125px"
                                                    @if (isset($campaign->media->logo_url)) style="background-image: url('{{ $campaign->media->logo_url }}');" @endif>
                                                </div>

                                                <label
                                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                    data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                    title="Change">
                                                    <i class="fas fa-pencil-alt fs-7"></i>
                                                    <input type="file" name="logo" accept=".png, .jpg, .jpeg" />

                                                    @if (isset($campaign->media->logo_url))
                                                        <input type="hidden" name="old_logo"
                                                            value="{{ $campaign->media->logo_url }}" />
                                                    @endif

                                                </label>
                                                <span
                                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                    title="Cancel  ">
                                                    <i class="fas fa-times fs-2"></i>
                                                </span>
                                                <span
                                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                    data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                    title="Remove  ">
                                                    <i class="fas fa-times fs-2"></i>
                                                </span>
                                            </div>
                                            <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                            @if ($errors->has('logo'))
                                                <div class="text-danger">{{ $errors->first('logo') }}</div>
                                            @endif
                                        </div>
                                        <div class="mb-10 fv-row">
                                            <label class="required form-label mb-3">Theme Color</label>
                                            <input type="color" class="form-control form-control-lg form-control-solid"
                                                name="theme_color" value="{{ $campaign->theme_color }}" />
                                            @if ($errors->has('theme_color'))
                                                <div class="text-danger">{{ $errors->first('theme_color') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- Repeat the error handling for other form sections -->
                                <div id="content2" class="contents" data-kt-stepper-element="content">
                                    <div class="w-100">
                                        <div class="d-flex w-100" style="justify-content:space-between">
                                            <h2>Banner</h2>
                                            <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal"
                                                data-bs-target="#add_banner">Add Banner</button>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table align-middle table-row-bordered table-row-solid gy-4 gs-9"
                                                id="banner_datatable">
                                                <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                                                    <tr>
                                                        <th class="min-w-100px">Action</th>
                                                        <th style="white-space: nowrap" class="min-w-100px">Banner Type
                                                        </th>
                                                        <th style="white-space: nowrap" class="min-w-100px">Desktop Image
                                                        </th>
                                                        <th class="min-w-100px">Mobile Image</th>
                                                        <th style="white-space: nowrap" class="min-w-100px">Start Date
                                                        </th>
                                                        <th style="white-space: nowrap" class="min-w-100px">End Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="fw-6 fw-semibold text-gray-600">
                                                    @if (isset($campaign->banners))


                                                        @foreach ($campaign->banners as $banner)
                                                            <tr>
                                                                <td>
                                                                    <div class="card-toolbar m-0">
                                                                        <button type="button"
                                                                            class="btn btn-clean btn-sm btn-icon btn-icon-primary btn-active-light-primary me-n3"
                                                                            data-kt-menu-trigger="click"
                                                                            data-kt-menu-placement="bottom-end">
                                                                            <i class="fas fa-ellipsis-v"></i>
                                                                        </button>
                                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3"
                                                                            data-kt-menu="true">
                                                                            <div class="menu-item px-3">
                                                                                <a href="#"
                                                                                    class="menu-link px-3 loadBannerModal"
                                                                                    data-route="{{ route('admin.getSingleBanner') }}"
                                                                                    id="update_banner{{ $banner->id }}"
                                                                                    data-id="{{ $banner->id }}"
                                                                                    data-campaign={{ $banner->campaign_id }}
                                                                                    type="button">Update Banner</a>

                                                                                {{-- data-bs-toggle="modal" data-bs-target="#update_banner" --}}
                                                                            </div>
                                                                            <div class="menu-item px-3">
                                                                                <a href="{{ route('admin.banner.destroy', ['bannerId' => $banner->id]) }}"
                                                                                    class="menu-link px-3">Delete</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    @if ($banner->banner_type == 'file')
                                                                        {{ 'File' }}
                                                                    @elseif($banner->banner_type == 'text')
                                                                        {{ 'Text Based' }}
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if ($banner->file_desktop_image && $banner->banner_type == 'file')
                                                                        <img src="{{ $banner->file_desktop_image }}"
                                                                            style="width: 100px; height:auto;"
                                                                            alt="Desktop Image">
                                                                    @elseif($banner->text_desktop_image && $banner->banner_type == 'text')
                                                                        <img src="{{ $banner->text_desktop_image }}"
                                                                            style="width: 100px; height:auto;"
                                                                            alt="Desktop Image">
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if ($banner->file_mobile_image && $banner->banner_type == 'file')
                                                                        <img src="{{ $banner->file_mobile_image }}"
                                                                            style="width: 100px; height:auto;"
                                                                            alt="Mobile Image">
                                                                    @elseif($banner->text_mobile_image && $banner->banner_type == 'text')
                                                                        <img src="{{ $banner->text_mobile_image }}"
                                                                            style="width: 100px; height:auto;"
                                                                            alt="Mobile Image">
                                                                    @endif
                                                                </td>
                                                                <td style="white-space: nowrap">
                                                                    {{ $banner->start_date ?? 'N/A' }}</td>
                                                                <td style="white-space: nowrap">
                                                                    {{ $banner->end_date ?? 'N/A' }}</td>

                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td>
                                                                No Data Available
                                                            </td>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div id="content3" class="contents" data-kt-stepper-element="content">
                                    <div class="w-100">
                                        <div class="d-flex w-100" style="justify-content:space-between">
                                            <h2>Ticket/Prizes</h2>
                                            <div class="m-0">
                                                <button type="button" data-bs-toggle="modal"
                                                    data-bs-target="#add_ticket_option_modal"
                                                    class="btn btn-sm btn-flex btn-info"> <i class="fas fa-user"></i> Add
                                                    New</button>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table align-middle table-row-bordered table-row-solid gy-4 gs-9"
                                                id="ticket_prize_datatable">
                                                <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                                                    <tr>
                                                        <th style="white-space: nowrap" class="min-w-100px">Action</th>
                                                        <th style="white-space: nowrap" class="min-w-100px">Ticket Title
                                                        </th>
                                                        <th style="white-space: nowrap" class="min-w-100px">Ticket Price
                                                            ($)</th>
                                                        <th style="white-space: nowrap" class="min-w-150px">Entries</th>
                                                        {{-- <th style="white-space: nowrap" class="min-w-150px">Prizes</th> --}}
                                                        {{-- <th style="white-space: nowrap" class="min-w-150px">Coupon</th> --}}
                                                    </tr>
                                                </thead>
                                                <tbody class="fw-6 fw-semibold text-gray-600">
                                                    @if (isset($ticket_options))
                                                        @foreach ($ticket_options as $ticket_option)
                                                            <tr>
                                                                <td>
                                                                    @if ($ticket_option->campaign_id != 0)
                                                                        <div class="card-toolbar m-0">
                                                                            <button type="button"
                                                                                class="btn btn-clean btn-sm btn-icon btn-icon-primary btn-active-light-primary me-n3"
                                                                                data-kt-menu-trigger="click"
                                                                                data-kt-menu-placement="bottom-end">
                                                                                <span
                                                                                    class="svg-icon svg-icon-3 svg-icon-primary">
                                                                                    <i class="fas fa-ellipsis-v"></i>
                                                                                </span>
                                                                            </button>
                                                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3"
                                                                                data-kt-menu="true">
                                                                                <div class="menu-item px-3">
                                                                                    <a href="#" type="button"
                                                                                        data-route="{{ route('admin.getTicketOptionSingledata') }}"
                                                                                        data-id="{{ $ticket_option->id }}"
                                                                                        id="update_ticket_option{{ $ticket_option->id }}"
                                                                                        class="loadEditTicketModal menu-link px-3">
                                                                                        Edit
                                                                                    </a>
                                                                                </div>
                                                                                <div class="menu-item px-3">
                                                                                    <a href="{{ route('admin.ticketOption.destroy', ['ticketId' => $ticket_option->id]) }}"
                                                                                        class="menu-link px-3">Delete</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                </td>
                                                                <td>{{ $ticket_option->title }}</td>
                                                                <td>{{ $ticket_option->price }}</td>
                                                                <td>{{ $ticket_option->entries }}</td>
                                                                {{-- <td>
                                                        <ul>
                                                            @if (!@empty($ticket_options->ticketOptionsPrizes))
                                                            @foreach ($ticket_options->ticketOptionsPrizes as $ticket_prizes)
                                                            <li style="white-space:nowrap;">4 Ticket to Pakistan</li>
                                                            @endforeach
                                                            @endif
                                                        </ul>
                                                    </td> --}}
                                                                {{-- <td>{{ $ticket_option->coupon_id }}</td> --}}

                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td>
                                                                No Data Available
                                                            </td>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div id="content4" class="contents" data-kt-stepper-element="content">
                                    <div class="w-100">
                                        <div class="pb-10 pb-lg-5">
                                            <h2 class="fw-bold text-dark">Settings</h2>
                                        </div>
                                        <div class="card-header p-0 card-header-stretch">
                                            <div class="card-toolbar m-0">
                                                <ul class="nav nav-tabs nav-line-tabs nav-stretch fs-6 border-0 fw-bold"
                                                    role="tablist">
                                                    <li class="nav-item" role="presentation">
                                                        <a id="kt_activity_today_tab"
                                                            class="nav-link justify-content-center text-active-gray-800 active"
                                                            data-bs-toggle="tab" role="tab"
                                                            href="#kt_activity_today">Campaign Settings</a>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <a id="kt_activity_week_tab"
                                                            class="nav-link justify-content-center text-active-gray-800"
                                                            data-bs-toggle="tab" role="tab"
                                                            href="#kt_activity_week">Payment Gateway</a>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <a id="kt_activity_month_tab"
                                                            class="nav-link justify-content-center text-active-gray-800"
                                                            data-bs-toggle="tab" role="tab"
                                                            href="#kt_activity_month">Organization</a>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <a id="kt_activity_year_tab"
                                                            class="nav-link justify-content-center text-active-gray-800 text-hover-gray-800"
                                                            data-bs-toggle="tab" role="tab"
                                                            href="#kt_activity_year">OG Settings</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="tab-content">
                                                @include('admin.campaign.campaignSettingTab')
                                                @include('admin.campaign.paymentMethodtab')
                                                @include('admin.campaign.organizationSettingTab')
                                                @include('admin.campaign.openGraphSettingTab')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="content5" class="contents" data-kt-stepper-element="content">
                                    <div class="w-100">
                                        <div class="pb-10 pb-lg-5" style="display: flex;justify-content:space-between;">
                                            <h2 class="fw-bold text-dark">Content</h2>
                                            <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal"
                                                data-bs-target="#donor_email_content">Customize Email Content</button>
                                        </div>
                                        <div class="card-header p-0 card-header-stretch">
                                            <div class="card-toolbar m-0">
                                                <ul class="nav nav-tabs nav-line-tabs nav-stretch fs-6 border-0 fw-bold"
                                                    role="tablist">
                                                    <li class="nav-item" role="presentation">
                                                        <a id="contentOne_tab"
                                                            class="nav-link justify-content-center text-active-gray-800 active"
                                                            data-bs-toggle="tab" role="tab"
                                                            href="#contentOne">Campaign Content</a>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <a id="contentTwo_tab"
                                                            class="nav-link justify-content-center text-active-gray-800"
                                                            data-bs-toggle="tab" role="tab"
                                                            href="#contentTwo">Gallery</a>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <a id="contentThree_tab"
                                                            class="nav-link justify-content-center text-active-gray-800"
                                                            data-bs-toggle="tab" role="tab"
                                                            href="#contentThree">Sponsorship Opportunities</a>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <a id="contentFour_tab"
                                                            class="nav-link justify-content-center text-active-gray-800 text-hover-gray-800"
                                                            data-bs-toggle="tab" role="tab"
                                                            href="#contentFour">Other</a>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <a id="contentFive_tab"
                                                            class="nav-link justify-content-center text-active-gray-800 text-hover-gray-800"
                                                            data-bs-toggle="tab" role="tab"
                                                            href="#contentFive">Menu</a>
                                                    </li>
                                                    @if ($campaign->slug == 'masbia')
                                                        <li class="nav-item" role="presentation">
                                                            <a id="contentsix_tab"
                                                            class="nav-link justify-content-center text-active-gray-800 text-hover-gray-800"
                                                            data-bs-toggle="tab" role="tab"
                                                            href="#contentsix">Allocate Donation</a>
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="tab-content">
                                                <div id="contentOne" class="card-body p-0 tab-pane fade show active"
                                                    role="tabpanel" aria-labelledby="contentOne_tab">
                                                    <h3 class="mt-2">
                                                        Intro Content
                                                    </h3>
                                                    <div class="mb-7">
                                                        <div
                                                            class="d-flex mb-4 d-flex align-items-center position-relative">
                                                            <div
                                                                class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px">
                                                            </div>
                                                            <div
                                                                class="form-check form-check-custom form-check-solid ms-6 me-4">
                                                                <input id="enableIntro" class="form-check-input"
                                                                    name="intro_content_enabled" type="checkbox"
                                                                    value="1"
                                                                    @if (isset($campaign->meta->intro_content_enabled) && $campaign->meta->intro_content_enabled == '1') {{ 'checked="checked"' }} @endif>
                                                            </div>
                                                            <div class="fw-semibold">
                                                                <label for="enableIntro">Enable Intro Content</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="introContentSection" class="<?php if (isset($campaign->meta->intro_content_enabled) && $campaign->meta->intro_content_enabled != 1) {
                                                        echo 'd-none';
                                                    } ?>">
                                                        <div class="mb-3 mt-3">
                                                            <div class="d-flex flex-column mb-b mt-4 fv-row">
                                                                <label
                                                                    class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                                                    <span class=" ">Intro Header</span>
                                                                </label>
                                                                <input type="text"
                                                                    class="form-control form-control-solid"
                                                                    name="intro_content_header"
                                                                    value="@if (isset($campaign->meta->intro_content_header)) {{ $campaign->meta->intro_content_header }} @endif" />
                                                                @if ($errors->has('intro_content_header'))
                                                                    <div class="text-danger">
                                                                        {{ $errors->first('intro_content_header') }}</div>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="mb-3 mt-3">
                                                            <div class="d-flex flex-column mb-b mt-4 fv-row">
                                                                <label
                                                                    class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                                                    <span class=" ">Main Content</span>
                                                                </label>
                                                                <textarea name="intro_main_content" class="area_editor form-control form-control-solid" cols="30"
                                                                    rows="10">
@if (isset($campaign->meta->intro_main_content))
    {{ $campaign->meta->intro_main_content }}
@endif
</textarea>
                                                                @if ($errors->has('intro_main_content'))
                                                                    <div class="text-danger">
                                                                        {{ $errors->first('intro_main_content') }}</div>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div
                                                            class="multi_language mb-3 mt-3 @if ($campaign->template != 'multi_location') d-none @endif ">
                                                            <div class="d-flex flex-column mb-b mt-4 fv-row">
                                                                <label
                                                                    class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                                                    <span class=" ">Main Content Yiddish</span>
                                                                </label>
                                                                <textarea name="main_content_yiddish" class="area_editor form-control form-control-solid" cols="30"
                                                                    rows="10">
@if (isset($campaign->meta->main_content_yiddish))
{{ $campaign->meta->main_content_yiddish }}
@endif
</textarea>
                                                                @if ($errors->has('main_content_yiddish'))
                                                                    <div class="text-danger">
                                                                        {{ $errors->first('main_content_yiddish') }}</div>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="mb-3 mt-3">
                                                            <div class="d-flex flex-column mb-b mt-4 fv-row">
                                                                <label
                                                                    class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                                                    <span class=" ">Button Content</span>
                                                                </label>
                                                                <input type="text"
                                                                    class="form-control form-control-solid"
                                                                    name="button_content"
                                                                    value="{{ $campaign->meta->button_content }}" />
                                                                @if ($errors->has('button_content'))
                                                                    <div class="text-danger">
                                                                        {{ $errors->first('button_content') }}</div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <h3 class="mt-2">
                                                        Additional Content
                                                    </h3>
                                                    <div class="mb-3 mt-3">
                                                        <div class="d-flex flex-column mb-b mt-4 fv-row">
                                                            <textarea name="additional_content" class="area_editor form-control form-control-solid" cols="30"
                                                                rows="10">{{ $campaign->meta->additional_content }}</textarea>
                                                            @if ($errors->has('additional_content'))
                                                                <div class="text-danger">
                                                                    {{ $errors->first('additional_content') }}</div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="multi_language">
                                                        <div class="@if ($campaign->template != 'multi_location') d-none @endif">
                                                            <br>
                                                            <hr><br>
                                                            <label class="mt-2">
                                                                Yingerman Content
                                                            </label>
                                                            <div class="mb-3 mt-3">
                                                                <div class="d-flex flex-column mb-b mt-4 fv-row">
                                                                    <textarea name="yingerman_content" class="area_editor form-control form-control-solid" cols="30"
                                                                        rows="10">{{ $campaign->meta->yingerman_content }}</textarea>
                                                                    @if ($errors->has('yingerman_content'))
                                                                        <div class="text-danger">
                                                                            {{ $errors->first('yingerman_content') }}</div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <label class="mt-2">
                                                                Yingerman Content Yiddish
                                                            </label>
                                                            <div class="mb-3 mt-3">
                                                                <div class="d-flex flex-column mb-b mt-4 fv-row">
                                                                    <textarea name="yingerman_content_yiddish" class="area_editor form-control form-control-solid" cols="30"
                                                                        rows="10">{{ $campaign->meta->yingerman_content_yiddish }}</textarea>
                                                                    @if ($errors->has('yingerman_content_yiddish'))
                                                                        <div class="text-danger">
                                                                            {{ $errors->first('yingerman_content_yiddish') }}
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="contentTwo" class="card-body p-0 tab-pane fade show"
                                                    role="tabpanel" aria-labelledby="contentTwo_tab">
                                                    <div class="w-100">
                                                        <div class="d-flex w-100" style="justify-content:space-between">
                                                            <h2>Gallery</h2>
                                                            <button class="btn btn-primary btn-sm" type="button"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#add_gallery">Add</button>
                                                        </div>
                                                        <div class="table-responsive">
                                                            <table
                                                                class="table align-middle table-row-bordered table-row-solid gy-4 gs-9"
                                                                id="gallery_datatable">
                                                                <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                                                                    <tr>
                                                                        <th class="min-w-100px">Action</th>
                                                                        <th style="white-space: nowrap"
                                                                            class="min-w-100px">Title</th>
                                                                        <th style="white-space: nowrap"
                                                                            class="min-w-100px">Image</th>
                                                                        <th style="white-space: nowrap"
                                                                            class="min-w-100px">Embed</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody class="fw-6 fw-semibold text-gray-600">
                                                                    @foreach ($gallery as $gal)
                                                                        <tr>
                                                                            <td>
                                                                                <div class="card-toolbar m-0">
                                                                                    <button type="button"
                                                                                        class="btn btn-clean btn-sm btn-icon btn-icon-primary btn-active-light-primary me-n3"
                                                                                        data-kt-menu-trigger="click"
                                                                                        data-kt-menu-placement="bottom-end">
                                                                                        <span
                                                                                            class="svg-icon svg-icon-3 svg-icon-primary">
                                                                                            <i
                                                                                                class="fas fa-ellipsis-v"></i>
                                                                                        </span>
                                                                                    </button>
                                                                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3"
                                                                                        data-kt-menu="true">
                                                                                        <div class="menu-item px-3">
                                                                                            <a href="#"
                                                                                                class="loadUpdateGalleryModal menu-link px-3"
                                                                                                data-route="{{ route('admin.getSingleGallery') }}"
                                                                                                data-id="{{ $gal->id }}"
                                                                                                id="update_gallery{{ $gal->id }}">Update</a>
                                                                                        </div>
                                                                                        <div class="menu-item px-3">
                                                                                            <a href="{{ route('admin.gallery.destroy', ['galleryId' => $gal->id]) }}"
                                                                                                class="menu-link px-3">Delete</a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td>{{ $gal->title }}</td>
                                                                            <td>
                                                                                <img src="{{ $gal->image }}"
                                                                                    style="width: 150px;height:auto;"
                                                                                    alt="">
                                                                            </td>
                                                                            <td> {{ $gal->embed }}</td>

                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="contentThree" class="card-body p-0 tab-pane fade show"
                                                    role="tabpanel" aria-labelledby="contentThree_tab">
                                                    <div class="w-100">
                                                        <div class="d-flex w-100" style="justify-content:space-between">
                                                            <h2>Sponsorship Opportunities</h2>
                                                            <button class="btn btn-primary btn-sm" type="button"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#add_sponsorship_opportunities">Add</button>
                                                        </div>
                                                        <div class="table-responsive">
                                                            <table
                                                                class="table align-middle table-row-bordered table-row-solid gy-4 gs-9"
                                                                id="sponsorship_datatable">
                                                                <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                                                                    <tr>
                                                                        <th class="min-w-100px">Action</th>
                                                                        <th style="white-space: nowrap"
                                                                            class="min-w-100px">Title</th>
                                                                        <th style="white-space: nowrap"
                                                                            class="min-w-100px">Image</th>
                                                                        <th style="white-space: nowrap"
                                                                            class="min-w-100px">Amount</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody class="fw-6 fw-semibold text-gray-600">
                                                                    @if (!empty($sponsorship_opportunities))
                                                                        @foreach ($sponsorship_opportunities as $sponsorship_opportunity)
                                                                            <tr>
                                                                                <td>
                                                                                    <div class="card-toolbar m-0">
                                                                                        <button type="button"
                                                                                            class="btn btn-clean btn-sm btn-icon btn-icon-primary btn-active-light-primary me-n3"
                                                                                            data-kt-menu-trigger="click"
                                                                                            data-kt-menu-placement="bottom-end">
                                                                                            <span
                                                                                                class="svg-icon svg-icon-3 svg-icon-primary">
                                                                                                <i
                                                                                                    class="fas fa-ellipsis-v"></i>
                                                                                            </span>
                                                                                        </button>
                                                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3"
                                                                                            data-kt-menu="true">
                                                                                            <div class="menu-item px-3">
                                                                                                <a href="#"
                                                                                                    class="loadUpdateSponsorShipModal menu-link px-3"
                                                                                                    data-route="{{ route('admin.getSingleSponsorShipOpportunities') }}"
                                                                                                    data-id="{{ $sponsorship_opportunity->id }}"
                                                                                                    id="update_sponsorship{{ $sponsorship_opportunity->id }}">Update</a>
                                                                                            </div>
                                                                                            <div class="menu-item px-3">
                                                                                                <a href="{{ route('admin.sponsorship.destroy', ['sponsorShipId' => $sponsorship_opportunity->id]) }}"
                                                                                                    class="menu-link px-3">Delete</a>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td>{{ $sponsorship_opportunity->title }}
                                                                                </td>
                                                                                <td>
                                                                                    <img src="{{ $sponsorship_opportunity->image }}"
                                                                                        style="width: 150px;height:auto;"
                                                                                        alt="">
                                                                                </td>
                                                                                <td style="white-space: nowrap">
                                                                                    {{ $sponsorship_opportunity->amount }}
                                                                                </td>

                                                                            </tr>
                                                                        @endforeach
                                                                    @else
                                                                        <tr>
                                                                            <td>
                                                                                <p>No Record found</p>
                                                                            </td>
                                                                        </tr>
                                                                    @endif
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="contentFour" class="card-body p-0 tab-pane fade show"
                                                    role="tabpanel" aria-labelledby="contentFour_tab">
                                                    <h3 class="mt-2">Rules</h3>
                                                    <div class="mb-3 mt-3">
                                                        <div class="d-flex flex-column mb-b mt-4 fv-row">
                                                            <label
                                                                class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                                                <span>Rules Description</span>
                                                            </label>
                                                            <textarea name="rules_description" class="area_editor form-control form-control-solid" cols="30"
                                                                rows="10">{{ old('rules_description') }}{{ $campaign->meta->rules_description }}</textarea>
                                                            @if ($errors->has('rules_description'))
                                                                <div class="text-danger">
                                                                    {{ $errors->first('rules_description') }}</div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <h3 class="mt-2">Stats</h3>
                                                    <div class="mb-10">
                                                        <label class="form-label fw-semibold">Stats</label>
                                                        <div class="d-flex">
                                                            <label
                                                                class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="1" id="enable_stats" name="enable_stats"
                                                                    {{ old('enable_stats') ? 'checked' : '' }}
                                                                    @if ($campaign->meta->enable_stats == '1') {{ 'checked="checked"' }} @endif />
                                                                <span class="form-check-label">Enable Stats</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="mb-10">
                                                        <label class="form-label fw-semibold">Stats to Display</label>
                                                        <div class="d-flex mb-4">
                                                            <label
                                                                class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                                                <input class="form-check-input"
                                                                    name="enable_fabulous_prizes"
                                                                    id="enable_fabulous_prizes" value="1"
                                                                    type="checkbox"
                                                                    @if ($campaign->meta->enable_fabulous_prizes == '1') {{ 'checked="checked"' }} @endif />
                                                                <span class="form-check-label">Fabulous Prizes</span>
                                                            </label>
                                                        </div>
                                                        <div class="mb-4">
                                                            <label
                                                                class="form-check form-check-sm form-check-custom form-check-solid">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="1" id="enable_total_donors"
                                                                    name="enable_total_donors"
                                                                    @if ($campaign->meta->enable_total_donors == '1') {{ 'checked="checked"' }} @endif
                                                                    {{ old('enable_total_donors') ? 'checked' : '' }} />
                                                                <span class="form-check-label">Total Donors</span>
                                                            </label>
                                                        </div>
                                                        <div class="mb-4">
                                                            <label
                                                                class="form-check form-check-sm form-check-custom form-check-solid">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="1" id="enable_ticket_sold"
                                                                    name="enable_ticket_sold"
                                                                    @if ($campaign->meta->enable_ticket_sold == '1') {{ 'checked="checked"' }} @endif
                                                                    {{ old('enable_ticket_sold') ? 'checked' : '' }} />
                                                                <span class="form-check-label">Ticket Sold</span>
                                                            </label>
                                                        </div>
                                                        <div class="mb-4">
                                                            <label
                                                                class="form-check form-check-sm form-check-custom form-check-solid">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="1" id="enable_largest_donation"
                                                                    name="enable_largest_donation"
                                                                    @if ($campaign->meta->enable_largest_donation == '1') {{ 'checked="checked"' }} @endif
                                                                    {{ old('enable_largest_donation') ? 'checked' : '' }} />
                                                                <span class="form-check-label">Largest Donation</span>
                                                            </label>
                                                        </div>
                                                        @if ($campaign->slug == 'masbia')
                                                            <div class="mb-4">
                                                                <label
                                                                    class="form-check form-check-sm form-check-custom form-check-solid">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        value="1" id="enable_recognition"
                                                                        name="enable_recognition"
                                                                        @if ($campaign->meta->enable_recognition == '1') {{ 'checked="checked"' }} @endif
                                                                        {{ old('enable_recognition') ? 'checked' : '' }} />
                                                                    <span class="form-check-label">Recognition</span>
                                                                </label>
                                                            </div>
                                                            <div class="mb-10 fv-row">
                                                                <label class="form-label mb-3">Letter Price</label>
                                                                <input type="text" class="form-control form-control-lg form-control-solid" name="letter_price" value="{{ $campaign->meta->letter_price }}">
                                                            </div>
                                                            <div class="mb-10 fv-row">
                                                                <label class="form-label mb-3">Recognition Price</label>
                                                                <input type="text" class="form-control form-control-lg form-control-solid" name="recognition_price" value="{{ $campaign->meta->recognition_price }}">
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div id="contentFive" class="card-body p-0 tab-pane fade show"
                                                    role="tabpanel" aria-labelledby="contentFive_tab">
                                                    <div class="w-100">
                                                        <div class="d-flex w-100" style="justify-content:space-between">
                                                            <h2>Campaign Menu</h2>
                                                            <div class="m-0">
                                                                <button type="button" data-bs-toggle="modal"
                                                                    data-bs-target="#add_menu_modal"
                                                                    class="btn btn-sm btn-flex btn-info"> <i
                                                                        class="fas fa-user"></i> Add New</button>
                                                            </div>
                                                        </div>
                                                        <div class="table-responsive">
                                                            <table
                                                                class="table align-middle table-row-bordered table-row-solid gy-4 gs-9"
                                                                id="ticket_prize_datatable">
                                                                <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                                                                    <tr>
                                                                        <th style="white-space: nowrap"
                                                                            class="min-w-150px">Action</th>
                                                                        <th style="white-space: nowrap"
                                                                            class="min-w-100px">Title</th>
                                                                        <th style="white-space: nowrap"
                                                                            class="min-w-100px">Url</th>
                                                                        <th style="white-space: nowrap"
                                                                            class="min-w-150px">Type</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody class="fw-6 fw-semibold text-gray-600">
                                                                    @if (isset($campaign->menu))
                                                                        @foreach ($campaign->menu as $menu)
                                                                            <tr>
                                                                                <td>
                                                                                    <div class="card-toolbar m-0">
                                                                                        <button type="button"
                                                                                            class="btn btn-clean btn-sm btn-icon btn-icon-primary btn-active-light-primary me-n3"
                                                                                            data-kt-menu-trigger="click"
                                                                                            data-kt-menu-placement="bottom-end">
                                                                                            <span
                                                                                                class="svg-icon svg-icon-3 svg-icon-primary">
                                                                                                <i
                                                                                                    class="fas fa-ellipsis-v"></i>
                                                                                            </span>
                                                                                        </button>
                                                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3"
                                                                                            data-kt-menu="true">
                                                                                            <div class="menu-item px-3">
                                                                                                <a href="#"
                                                                                                    type="button"
                                                                                                    data-route="{{ route('admin.getMenuSingledata') }}"
                                                                                                    data-id="{{ $menu->id }}"
                                                                                                    id="update_menu{{ $menu->id }}"
                                                                                                    class="loadEditMenuModal menu-link px-3">
                                                                                                    Edit
                                                                                                </a>
                                                                                            </div>
                                                                                            <div class="menu-item px-3">
                                                                                                <a href="{{ route('admin.menu.destroy', ['menuId' => $menu->id]) }}"
                                                                                                    class="menu-link px-3">Delete</a>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td>{{ $menu->title }}</td>
                                                                                <td>{{ $menu->url }}</td>
                                                                                <td>{{ $menu->type }}</td>
                                                                            </tr>
                                                                        @endforeach
                                                                    @else
                                                                        <tr>
                                                                            <td>
                                                                                No Data Available
                                                                            </td>
                                                                        </tr>
                                                                    @endif
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="contentsix" class="card-body p-0 tab-pane fade show"
                                                    role="tabpanel" aria-labelledby="contentFive_tab">
                                                    <div class="w-100">
                                                        <div class="d-flex w-100" style="justify-content:space-between">
                                                            <h2>Allocate Donation</h2>
                                                            <div class="m-0">
                                                                <button type="button" class="btn btn-sm btn-flex btn-info btn-add-allocate-donation"> <i class="fas fa-user"></i> Add New</button>
                                                            </div>
                                                        </div>
                                                        <div class="table-responsive">
                                                            <table
                                                                class="table align-middle table-row-bordered table-row-solid gy-4 gs-9"
                                                                id="ticket_prize_datatable">
                                                                <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                                                                    <tr>
                                                                        <th style="white-space: nowrap" class="min-w-150px">Action</th>
                                                                        <th style="white-space: nowrap" class="min-w-100px">Name</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody class="fw-6 fw-semibold text-gray-600">
                                                                    @if (isset($allocate_donation) && !empty($allocate_donation))
                                                                        @foreach ($allocate_donation as $locate_donation)
                                                                            <tr>
                                                                                <td>
                                                                                    <div class="card-toolbar m-0">
                                                                                        <button type="button"
                                                                                            class="btn btn-clean btn-sm btn-icon btn-icon-primary btn-active-light-primary me-n3"
                                                                                            data-kt-menu-trigger="click"
                                                                                            data-kt-menu-placement="bottom-end">
                                                                                            <span
                                                                                                class="svg-icon svg-icon-3 svg-icon-primary">
                                                                                                <i
                                                                                                    class="fas fa-ellipsis-v"></i>
                                                                                            </span>
                                                                                        </button>
                                                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3"
                                                                                            data-kt-menu="true">
                                                                                            <div class="menu-item px-3">
                                                                                                <a href="javascript:;"
                                                                                                    type="button"
                                                                                                    data-id="{{ $locate_donation->id }}"
                                                                                                    class="btn-edit-allocate-donation menu-link px-3">
                                                                                                    Edit
                                                                                                </a>
                                                                                            </div>
                                                                                            <div class="menu-item px-3">
                                                                                                <a href="{{ route('admin.allocateDonation.destroy', ['allocateID' => $locate_donation->id]) }}"
                                                                                                    class="menu-link px-3">Delete</a>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td class="donation-name">{{ $locate_donation->name }}</td>
                                                                            </tr>
                                                                        @endforeach
                                                                    @else
                                                                        <tr>
                                                                            <td>
                                                                                No Data Available
                                                                            </td>
                                                                        </tr>
                                                                    @endif
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="content6" class="contents" data-kt-stepper-element="content">
                                    <div class="w-100">
                                        <div class="pb-8 pb-lg-10">
                                            <h2 class="fw-bold text-dark">You Almost Done!</h2>
                                            <div class="text-muted fw-semibold fs-6">Click on Submit button to save
                                                {{-- <a href="#" class="link-primary fw-bold">Go to Campaigns</a>. --}}
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="d-flex flex-stack pt-10">
                                    <div class="mr-2">
                                        <button type="button" class="btn btn-lg btn-light-primary me-3"
                                            data-kt-stepper-action="previous">
                                            <span class="svg-icon svg-icon-4 me-1">
                                                <i class="fas fa-arrow-left"></i>
                                            </span>Back
                                        </button>
                                    </div>
                                    <div>
                                        {{-- <button type="button" data-bs-toggle="modal" data-bs-target="#preview_campaign_modal" class="btn btn-lg btn-primary">Preview
                                        <span class="svg-icon svg-icon-4 ms-1 me-0">
                                            <i class="fas fa-eye"></i>
                                        </span>
                                    </button> --}}
                                        <button type="submit" class="btn btn-lg btn-primary me-3"
                                            data-kt-stepper-action="submit">
                                            <span class="indicator-label">Submit
                                                <span class="svg-icon svg-icon-3 ms-2 me-0">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                            </span>
                                            <span class="indicator-progress">Please wait...
                                                <span
                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                        <button type="button" class="btn btn-lg btn-primary"
                                            data-kt-stepper-action="next">Continue
                                            <span class="svg-icon svg-icon-4 ms-1 me-0">
                                                <i class="fas fa-arrow-right"></i>
                                            </span>
                                        </button>

                                    </div>
                                </div>
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script></script>
    @include('admin.campaign.modals.addBannerModal')
    @include('admin.campaign.modals.updatebannerModals')
    {{-- @include('admin.campaign.modals.ticketPrizesModels') --}}
    @include('admin.campaign.modals.addGalleryModal')
    @include('admin.campaign.modals.updateGalleryModal')
    @include('admin.campaign.modals.add_sponsorship_opportunity')
    @include('admin.campaign.modals.edit_sponsorship_opportunity')
    @include('admin.campaign.modals.previewCampaignModal')

    {{-- Payment Modals --}}
    @include('admin.campaign.modals.cardknox_payment_modal')
    @include('admin.campaign.modals.banquest_payment_modal')
    @include('admin.campaign.modals.authorize_payment_modal')
    @include('admin.campaign.modals.usaepay_payment_modal')
    @include('admin.campaign.modals.stripe_payment_modal')
    @include('admin.campaign.modals.paypal_payment_modal')
    @include('admin.campaign.modals.ojc_fund_payment_modal')
    @include('admin.campaign.modals.matbia_payment_modal')
    @include('admin.campaign.modals.donors_fund_payment_modal')
    @include('admin.campaign.modals.customize_email_content')
    @include('admin.campaign.modals.add_menu_modal')
    @include('admin.campaign.modals.update_menu_modal')
    @include('admin.campaign.modals.allocate_donation_modal')
    @include('admin.campaign.modals.pledger_payment_modal')

    {{-- ticket prizes --}}
    @include('admin.ticket_options.modals.addTicketOptionModal')
    @include('admin.ticket_options.modals.editTicketOptionModal')



    <script>
        $('.loadBannerModal').on('click', function() {
            // alert($(this).attr('id'))
            let bannerId = $(this).data('id')
            let campaign = $(this).data('campaign')
            $('#campaing_id').val(campaign)
            let action = $(this).data('route')
            let data = {
                'bannerId': bannerId,
                '_token': '{{ csrf_token() }}'
            }
            ajaxCall(
                action, 'POST', data,
                function(response) {
                    // let data =  JSON.stringify(response)
                    // console.log(data)

                    $('#bannerId').val(response.banner.id)

                    $('#EditbannerType').val(response.banner.banner_type)

                    $('#editBannerName').val(response.banner.file_title)

                    $('#edit_file_desktop_image').val(response.banner.file_desktop_image)
                    $('#edit_file_mobile_image').val(response.banner.file_mobile_image)
                    $('#Previewfile_desktop_image').css('background-image', 'url("' + response.banner
                        .file_desktop_image + '")')
                    $('#Preview_file_mobile_image').css('background-image', 'url("' + response.banner
                        .file_mobile_image + '")')

                    if (response.banner.banner_type == 'file') {
                        $('#UpdateBannerTab1').addClass('show active')
                        $('#FileTabBanner').addClass('active')
                        $('#textTabBanner').removeClass('active')
                    } else {
                        $('#UpdateBannerTab2').addClass('show active')
                        $('#textTabBanner').addClass('active')
                        $('#FileTabBanner').removeClass('active')
                    }


                    $('#text_main_content').val(response.banner.text_main_content)
                    $('#text_sub_content').val(response.banner.text_sub_content)
                    $('#secondary_button_url').val(response.banner.secondary_button_url)
                    $('#secondary_button_content').val(response.banner.secondary_button_content)
                    $('#text_button').val(response.banner.text_button)
                    $('#text_amount').val(response.banner.text_amount)
                    $('#text_button_link').val(response.banner.text_button_link)

                    $('#edit_text_desktop_image').val(response.banner.text_desktop_image)
                    $('#edit_text_mobile_image').val(response.banner.text_mobile_image)
                    $('#Preview_text_desktop_image').css('background-image', 'url("' + response.banner
                        .text_desktop_image + '")')
                    $('#Preview_text_mobile_image').css('background-image', 'url("' + response.banner
                        .text_mobile_image + '")')

                    $('#EditStartDate').val(response.banner.start_date)
                    $('#EditEndDate').val(response.banner.end_date)

                    $('#update_banner').modal('show');
                },
                function(xhr, status, error) {
                    console.error('Error:', error);

                    swal.fire({
                        text: 'Error:' + error,
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-light-primary"
                        }
                    });
                }
            );
        })
    </script>
    <script>
        $('.loadPaymentModal').on('click', function() {
            let campaignId = $("#campaignId").val();
            let modal = $(this).data('modal');
            let gateway = $(this).data('gateway');
            let action = $(this).data('route');
            let data = {
                'campaignId': campaignId,
                'gateway': gateway,
                '_token': '{{ csrf_token() }}'
            };

            ajaxCall(action, 'POST', data, function(response) {
                if (response.payments.length == 0) {
                    if (gateway == 'cardknox_ach') {
                        $('#cardKnoxPaymentMethod').val('cardknox_ach');
                    } else if (gateway == 'cardknox_cc') {
                        $('#cardKnoxPaymentMethod').val('cardknox_cc');

                    }
                    $(modal).find('.testApiKey').val('');
                    $(modal).find('.testPublicKey').val('');
                    $(modal).find('.testPin').val('');
                    $(modal).find('.testPrivateKey').val('');
                    $(modal).find('.liveApiKey').val('');
                    $(modal).find('.livePublicKey').val('');
                    $(modal).find('.livePin').val('');
                    $(modal).find('.livePrivateKey').val('');
                    $(modal).modal('show');
                    return;
                }

                $(".paymentCampaignId").val(campaignId);
                if (gateway == 'cardknox_ach') {
                    $('#cardKnoxPaymentMethod').val('cardknox_ach');
                } else if (gateway == 'cardknox_cc') {
                    $('#cardKnoxPaymentMethod').val('cardknox_cc');

                }
                if (response.payments[1]) {
                    $(modal).find('.testApiKey').val(response.payments[1].api_key);
                    $(modal).find('.testPublicKey').val(response.payments[1].public_key);
                    $(modal).find('.testPin').val(response.payments[1].pin);
                    $(modal).find('.testPrivateKey').val(response.payments[1].private_key);
                }
                if (response.payments[0]) {
                    $(modal).find('.liveApiKey').val(response.payments[0].api_key);
                    $(modal).find('.livePublicKey').val(response.payments[0].public_key);
                    $(modal).find('.livePin').val(response.payments[0].pin);
                    $(modal).find('.livePrivateKey').val(response.payments[0].private_key);
                }
                $(modal).modal('show');
            }, function(xhr, status, error) {
                let errorMessage = 'An error occurred';
                try {
                    const response = JSON.parse(xhr.responseText);
                    errorMessage = response.error || errorMessage;
                } catch (e) {
                    errorMessage = error;
                }
                console.error('Error:', errorMessage);
                Swal.fire({
                    text: 'Error: ' + errorMessage,
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-light-primary"
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.updatePaymentModal').on('click', function() {
                let paymentForm = $(this);
                let modal = paymentForm.data('modal');
                let form = paymentForm.closest('form');
                let action = form.attr('action');

                let formData = new FormData(form[0]);
                formData.append('_token', '{{ csrf_token() }}');


                ajaxCall(
                    action, 'POST', formData,
                    function(response) {
                        Swal.fire({
                            text: 'Payment Method Updated',
                            icon: 'success',
                            confirmButtonText: "Ok",
                            buttonsStyling: false,
                            customClass: {
                                confirmButton: "btn btn-light-primary"
                            }
                        })
                        $(modal).modal('hide');
                        location.reload();
                    },
                    function(xhr, status, error) {
                        console.error('Error:', error);
                        let errorMessage = 'An error occurred. Please try again.';
                        if (xhr.responseJSON && xhr.responseJSON.messages) {
                            errorMessage = '<ul>';
                            $.each(xhr.responseJSON.messages, function(key, messages) {
                                $.each(messages, function(index, message) {
                                    errorMessage += '<li>' + message + '</li>';
                                });
                            });
                            errorMessage += '</ul>';
                        }
                        Swal.fire({
                            html: errorMessage,
                            icon: 'error',
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-light-primary"
                            }
                        });
                    }
                );
            });
        });
    </script>
    <script>
        $('.loadEditTicketModal').on('click', function() {
            let ticketOptionId = $(this).data('id')
            // alert(ticketOptionId)
            let action = $(this).data('route')
            let data = {
                'ticketOptionId': ticketOptionId,
                '_token': '{{ csrf_token() }}'
            }
            ajaxCall(action, 'POST', data, function(response) {
                $('#EditTicketPrizes').html('');
                $("#EditGrandPrizes").html('');
                $('#EditCoupons').html('');

                let ticketOptions = response.ticket_options;
                if (ticketOptions) {
                    $('#ticketOptionId').val(ticketOptions.id);
                    $('#EditTicketTitle').val(ticketOptions.title);
                    $('#EditTicketPrice').val(ticketOptions.price);
                    $('#EditTicketEntries').val(ticketOptions.entries);
                    $('#EditTicketOldImage').val(ticketOptions.icon);
                    $('#EditTicketBgImage').css('background-image', 'url(' + ticketOptions.icon + ')');
                    $('#EditTicketContent').text(ticketOptions.content);
                } else {
                    console.error("ticket_options not found in response", response);
                }


                //_______ticket option prizes
                let prizes = response.prizes;
                let prizes_count = prizes.length;
                let ticket_options_prizes = response.ticket_options_prizes;
                let ticket_options_prizes_count = ticket_options_prizes.length;
                let ticket_option = "<option value=''>/option>";
                for (let i = 0; i < prizes_count; i++) {
                    let ticket_option_selected = "";
                    for (let j = 0; j < ticket_options_prizes_count; j++) {
                        if (ticket_options_prizes[j].prize_id == prizes[i].id) {
                            ticket_option_selected = "selected";
                            break;
                        }
                    }
                    ticket_option += '<option ' + ticket_option_selected + ' value="' + prizes[i].id +
                        '" >' + prizes[i].name + '</option>';
                }

                //_________grand prizes

                let grand_prizes = response.grand_prizes;
                let grand_prizes_length = grand_prizes.length;
                let grand_prizes_option = "<option value=''>select</option>";
                for (let i = 0; i < grand_prizes_length; i++) {
                    let grand_prizes_selected = "";
                    if (grand_prizes[i].id == ticketOptions.grand_prize) {
                        grand_prizes_selected = "selected";
                    }
                    grand_prizes_option += "<option " + grand_prizes_selected + " value=" + grand_prizes[i]
                        .id + " >" + grand_prizes[i].title + "</option>";
                }

                //_____Coupons
                let coupons = response.coupons;
                let coupons_length = coupons.length;
                let coupons_option = "<option value=''>select grand prize</option>";
                for (let i = 0; i < coupons_length; i++) {
                    let coupons_selected = "";
                    if (coupons[i].id == ticketOptions.coupon_id) {
                        coupons_selected = "selected";
                    }
                    coupons_option += "<option " + coupons_selected + " value=" + coupons[i].id + " >" +
                        coupons[i].title + "</option>";
                }

                $('#EditTicketPrizes').append(ticket_option);
                $('#EditCoupons').append(coupons_option);
                $("#EditGrandPrizes").append(grand_prizes_option);
                $('#updateTicketOptionsModals').modal('show');
            }, function(xhr, status, error) {
                console.error('Error:', error);
                let errorMessage = 'An error occurred. Please try again.';
                if (xhr.responseJSON && xhr.responseJSON.messages) {
                    errorMessage = '<ul>';
                    $.each(xhr.responseJSON.messages, function(key, messages) {
                        $.each(messages, function(index, message) {
                            errorMessage += '<li>' + message + '</li>';
                        });
                    });
                    errorMessage += '</ul>';
                }
                Swal.fire({
                    html: errorMessage,
                    icon: 'error',
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-light-primary"
                    }
                });
            });
        })
    </script>
    <script>
        $('.loadUpdateGalleryModal').on('click', function() {
            let galleryId = $(this).data('id')
            // alert(galleryId)
            let action = $(this).data('route')
            let data = {
                'galleryId': galleryId,
                '_token': '{{ csrf_token() }}'
            }
            ajaxCall(action, 'POST', data, function(response) {

                let gallery = response.gallery;
                if (gallery) {
                    $('#galleryId').val(gallery.id);
                    $('#EditGalleryTitle').val(gallery.title);
                    $('#EditGalleryOld').val(gallery.image)
                    $('#EditGalleryEmbed').text(gallery.embed);
                    $('#EditGalleryBgImage').css('background-image', 'url(' + gallery.image + ')');
                } else {
                    console.error("Gallery not found in response", response);
                }


                $('#update_gallery').modal('show');
            }, function(xhr, status, error) {
                console.error('Error:', error);
                let errorMessage = 'An error occurred. Please try again.';
                if (xhr.responseJSON && xhr.responseJSON.messages) {
                    errorMessage = '<ul>';
                    $.each(xhr.responseJSON.messages, function(key, messages) {
                        $.each(messages, function(index, message) {
                            errorMessage += '<li>' + message + '</li>';
                        });
                    });
                    errorMessage += '</ul>';
                }
                Swal.fire({
                    html: errorMessage,
                    icon: 'error',
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-light-primary"
                    }
                });
            });
        })
    </script>
    <script>
        $('.loadUpdateSponsorShipModal').on('click', function() {
            let sponsorshipId = $(this).data('id')
            // alert(sponsorshipId)
            let action = $(this).data('route')
            let data = {
                'sponsorshipId': sponsorshipId,
                '_token': '{{ csrf_token() }}'
            }
            ajaxCall(action, 'POST', data, function(response) {

                let sponsorship = response.sponsorship;
                if (sponsorship) {
                    $('#sponsorshipId').val(sponsorship.id);
                    $('#EditSponsorshipTitle').val(sponsorship.title);
                    $('#EditSponsorshipOld').val(sponsorship.image)
                    $('#EditSponsorshipAmount').val(sponsorship.amount);
                    $('#EditSponsorshipBgImage').css('background-image', 'url(' + sponsorship.image + ')');
                } else {
                    console.error("Sponsorship not found in response", response);
                }


                $('#update_sponsorship_opportunities').modal('show');
            }, function(xhr, status, error) {
                console.error('Error:', error);

                swal.fire({
                    text: 'Error:' + error,
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-light-primary"
                    }
                });
            });
        })
    </script>
    <script>
        $('.loadEditMenuModal').on('click', function() {
            let menuId = $(this).data('id')
            // alert(ticketOptionId)
            let action = $(this).data('route')
            let data = {
                'menuId': menuId,
                '_token': '{{ csrf_token() }}'
            }
            ajaxCall(action, 'POST', data, function(response) {


                let menu = response.menu;
                if (menu) {
                    $('#menuId').val(menu.id);
                    $('#EditMenuCampaignId').val(menu.campaign_id);
                    $('#EditMenuTitle').val(menu.title);
                    $('#EditMenuUrl').val(menu.url);
                    if (menu.type == "primary") {
                        $('#menuPrimary').prop('selected', true)
                    } else {
                        $('#menuSecondary').prop('selected', true)
                    }
                } else {
                    console.error("Menu not found in response", response);
                }
                $('#update_menu_modal').modal('show');
            }, function(xhr, status, error) {
                console.error('Error:', error);

                swal.fire({
                    text: 'Error:' + error,
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-light-primary"
                    }
                });
            });
        })
    </script>
    <script>
        $('.loadPaymentModalByCheckBox').on('change', function() {
            if ($(this).is(':checked')) {
                let payment_check = 1;

                let campaignId = $("#campaignId").val();
                let modal = $(this).data('modal');
                let gateway = $(this).data('gateway');
                let action = $(this).data('route');
                let data = {
                    'campaignId': campaignId,
                    'gateway': gateway,
                    'payment_check': payment_check,
                    '_token': '{{ csrf_token() }}'
                };
                ajaxCall(action, 'POST', data, function(response) {

                    if (response.checkbox.length != 0) {
                        Swal.fire({
                            text: response.checkbox.payment_method + ' Method Enabled',
                            icon: 'success',
                            confirmButtonText: "Ok",
                            buttonsStyling: false,
                            customClass: {
                                confirmButton: "btn btn-light-primary"
                            }
                        })
                    } else if (response.checkbox.length == 0) {
                        if (response.payments.length == 0) {
                            $(modal).find('.testApiKey').val('');
                            $(modal).find('.testPublicKey').val('');
                            $(modal).find('.testPin').val('');
                            $(modal).find('.liveApiKey').val('');
                            $(modal).find('.livePublicKey').val('');
                            $(modal).find('.livePin').val('');
                            $(modal).modal('show');
                            return;
                        }
                        $(".paymentCampaignId").val(campaignId);
                        if (response.payments[1]) {
                            $(modal).find('.testApiKey').val(response.payments[1].api_key);
                            $(modal).find('.testPublicKey').val(response.payments[1].public_key);
                            $(modal).find('.testPin').val(response.payments[1].pin);
                        }
                        if (response.payments[0]) {
                            $(modal).find('.liveApiKey').val(response.payments[0].api_key);
                            $(modal).find('.livePublicKey').val(response.payments[0].public_key);
                            $(modal).find('.livePin').val(response.payments[0].pin);
                        }
                        $(modal).modal('show');
                    }

                }, function(xhr, status, error) {
                    let errorMessage = 'An error occurred';
                    const response = JSON.parse(xhr.responseText);
                    errorMessage = response.error || errorMessage;
                    console.error('Error:', errorMessage);
                    Swal.fire({
                        text: 'Error: ' + errorMessage,
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-light-primary"
                        }
                    });
                });
            } else {
                let payment_check = 0;
                let campaignId = $("#campaignId").val();
                let modal = $(this).data('modal');
                let gateway = $(this).data('gateway');
                let action = $(this).data('route');
                let data = {
                    'campaignId': campaignId,
                    'gateway': gateway,
                    'payment_check': payment_check,
                    '_token': '{{ csrf_token() }}'
                };
                ajaxCall(action, 'POST', data, function(response) {
                    if (response.checkbox.length != 0) {
                        Swal.fire({
                            text: response.checkbox.payment_method + ' Method Enabled',
                            icon: 'success',
                            confirmButtonText: "Ok",
                            buttonsStyling: false,
                            customClass: {
                                confirmButton: "btn btn-light-primary"
                            }
                        })
                    }
                }, function(xhr, status, error) {
                    let errorMessage = 'An error occurred';
                    const response = JSON.parse(xhr.responseText);
                    errorMessage = response.error || errorMessage;
                    console.error('Error:', errorMessage);
                    Swal.fire({
                        text: 'Error: ' + errorMessage,
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-light-primary"
                        }
                    });
                });
            }
        });
    </script>
    <script>
        $(document).on('click', '#formSubmit', function() {
            let form = $('.campaign_form');
            form.submit();
        })
        $(document).ready(function() {
            $("#campaignTemplate").on("change", function() {
                let selectedValue = $(this).val();
                if (selectedValue === "multi_location") {
                    $(".multi_language").show();
                } else {
                    $(".multi_language").hide();
                }
            });
        })
    </script>
@endsection
