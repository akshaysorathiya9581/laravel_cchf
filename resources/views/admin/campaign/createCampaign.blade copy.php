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
                <div class="stepper stepper-pills stepper-column d-flex flex-column flex-xl-row flex-row-fluid gap-10" id="kt_create_account_stepper">
                    <div class="card d-flex justify-content-center justify-content-xl-start flex-row-auto w-100 w-xl-300px w-xxl-400px">
                        <div class="card-body px-6 px-lg-10 px-xxl-15 py-20">
                            <div class="stepper-nav">
                                <div class="stepper-item current" data-kt-stepper-element="nav">
                                    <div class="stepper-wrapper">
                                        <div class="stepper-icon w-40px h-40px">
                                            <i class="stepper-check fas fa-check"></i>
                                            <span class="stepper-number">1</span>
                                        </div>
                                        <div class="stepper-label">
                                            <h3 class="stepper-title">Configure Campaign</h3>
                                            <div class="stepper-desc fw-semibold">Setup Your Compaign</div>
                                        </div>
                                    </div>
                                    <div class="stepper-line h-40px"></div>
                                </div>
                                <div class="stepper-item" data-kt-stepper-element="nav">
                                    <div class="stepper-wrapper">
                                        <div class="stepper-icon w-40px h-40px">
                                            <i class="stepper-check fas fa-check"></i>
                                            <span class="stepper-number">2</span>
                                        </div>
                                        <div class="stepper-label">
                                            <h3 class="stepper-title">Banners</h3>
                                            <div class="stepper-desc fw-semibold">Setup Compaign banners</div>
                                        </div>
                                    </div>
                                    <div class="stepper-line h-40px"></div>
                                </div>
                                <div class="stepper-item" data-kt-stepper-element="nav">
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
                                <div class="stepper-item" data-kt-stepper-element="nav">
                                    <div class="stepper-wrapper">
                                        <div class="stepper-icon w-40px h-40px">
                                            <i class="stepper-check fas fa-check"></i>
                                            <span class="stepper-number">4</span>
                                        </div>
                                        <div class="stepper-label">
                                            <h3 class="stepper-title">Settings</h3>
                                            <div class="stepper-desc fw-semibold">Campaign Settings,payments</div>
                                        </div>
                                    </div>
                                    <div class="stepper-line h-40px"></div>
                                </div>
                                <div class="stepper-item" data-kt-stepper-element="nav">
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
                                <div class="stepper-item mark-completed" data-kt-stepper-element="nav">
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
                            </div>
                        </div>
                    </div>


                    <div class="card d-flex flex-row-fluid flex-center">
                        <form class="card-body py-20 w-100 mw-xl-700px px-9" method="post" action="{{ route('admin.storeCampaign') }}" enctype="multipart/form-data" novalidate="novalidate" id="kt_create_account_form">

                            <div class="current" data-kt-stepper-element="content">
                                <div class="w-100">
                                    <div class="pb-10 pb-lg-15">
                                        <h2 class="fw-bold d-flex align-items-center text-dark">Setup Campaign
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Campaign name will be used as reference within your campaign reports"></i>
                                        </h2>
                                    </div>

                                    <div class="mb-10 fv-row">
                                        <label class=" form-label mb-3">Organization Name</label>
                                        <input type="text" class="form-control form-control-lg form-control-solid" name="organization_name" placeholder="" value="{{ old('organization_name') }}" />
                                        @if ($errors->has('organization_name'))
                                        <div class="text-danger">{{ $errors->first('organization_name') }}</div>
                                        @endif
                                    </div>
                                    <div class="mb-10 fv-row">
                                        <label class=" form-label mb-3">Campaign Name</label>
                                        <input type="text" class="form-control form-control-lg form-control-solid" name="campaign_name" placeholder="" value="{{ old('campaign_name') }}" />
                                        @if ($errors->has('campaign_name'))
                                        <div class="text-danger">{{ $errors->first('campaign_name') }}</div>
                                        @endif
                                    </div>

                                    <div class="mb-10 fv-row">
                                        <label class="required form-label mb-3">Slug</label>
                                        <input type="text" class="form-control form-control-lg form-control-solid" name="slug" placeholder="" value="{{ old('slug') }}" />
                                        @if ($errors->has('slug'))
                                        <div class="text-danger">{{ $errors->first('slug') }}</div>
                                        @endif
                                    </div>

                                    <div class="mb-10 fv-row">
                                        <label class="required form-label mb-3">Users</label>
                                        <select class="form-select form-select-solid form-select-sm" multiple data-control="select2" data-hide-search="true" name="users[]">
                                            <option value="1" {{ in_array(1, old('users', [])) ? 'selected' : '' }}>Guest</option>
                                            <option value="2" {{ in_array(2, old('users', [])) ? 'selected' : '' }}>Owner</option>
                                            <option value="3" {{ in_array(3, old('users', [])) ? 'selected' : '' }}>Can Edit</option>
                                        </select>
                                        @if ($errors->has('users'))
                                        <div class="text-danger">{{ $errors->first('users') }}</div>
                                        @endif
                                    </div>
                                    <div class="fv-row mb-10">
                                        <label class="d-block fw-semibold fs-6 mb-5">
                                            <span class="required"> Logo</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="E.g. Select a logo to represent the company that's running the campaign."></i>
                                        </label>

                                        <style>
                                            .image-input-placeholder {
                                                background-image: url('assets/media/svg/files/blank-image.svg');
                                            }

                                            [data-bs-theme="dark"] .image-input-placeholder {
                                                background-image: url('assets/media/svg/files/blank-image-dark.svg');
                                            }
                                        </style>
                                        <div class="image-input image-input-empty image-input-outline image-input-placeholder" data-kt-image-input="true">
                                            <div class="image-input-wrapper w-125px h-125px"></div>
                                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change">
                                                <i class="fas fa-pencil-alt fs-7"></i>
                                                <input type="file" name="logo" accept=".png, .jpg, .jpeg" />
                                                <input type="hidden" name="avatar_remove" />
                                            </label>
                                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel  ">
                                                <i class="fas fa-times fs-2"></i>
                                            </span>
                                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove  ">
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
                                        <input type="color" class="form-control form-control-lg form-control-solid" name="theme_color" value="{{ old('theme_color') }}" />
                                        @if ($errors->has('theme_color'))
                                        <div class="text-danger">{{ $errors->first('theme_color') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- Repeat the error handling for other form sections -->
                            <div data-kt-stepper-element="content">
                                <div class="w-100">
                                    <div class="d-flex w-100" style="justify-content:space-between">
                                        <h2>Banner</h2>
                                        <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#add_banner">Add Banner</button>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table align-middle table-row-bordered table-row-solid gy-4 gs-9">
                                            <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                                                <tr>
                                                    <th style="white-space: nowrap" class="min-w-100px">Desktop Image</th>
                                                    <th class="min-w-100px">Mobile Image</th>
                                                    <th style="white-space: nowrap" class="min-w-100px">Start Date</th>
                                                    <th style="white-space: nowrap" class="min-w-100px">End Date</th>
                                                    <th class="min-w-100px">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="fw-6 fw-semibold text-gray-600">
                                                <tr>
                                                    <td>
                                                        <img src="assets/media/avatars/300-1.jpg" style="width: 150px;height:auto;" alt="">
                                                    </td>
                                                    <td>
                                                        <img src="assets/media/avatars/300-1.jpg" style="width: 150px;height:auto;" alt="">
                                                    </td>
                                                    <td style="white-space: nowrap">03/10/2024 12:00 AM</td>
                                                    <td style="white-space: nowrap">03/10/2025 12:00 AM</td>
                                                    <td>
                                                        <div class="card-toolbar m-0">
                                                            <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-primary btn-active-light-primary me-n3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                                <span class="svg-icon svg-icon-3 svg-icon-primary">
                                                                    <i class="fas fa-ellipsis-v"></i>
                                                                </span>
                                                            </button>
                                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3" data-kt-menu="true">
                                                                <div class="menu-item px-3">
                                                                    <a href="#" class=" menu-link px-3" type="button" data-bs-toggle="modal" data-bs-target="#update_banner">Update Banner</a>
                                                                </div>
                                                                <div class="menu-item px-3">
                                                                    <a href="#" class="menu-link px-3">Delete</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div data-kt-stepper-element="content">
                                <div class="w-100">
                                    <div class="d-flex w-100" style="justify-content:space-between">
                                        <h2>Ticket/Prizes</h2>
                                        <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#add_ticket_prizes">Add Ticket/Prize</button>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table align-middle table-row-bordered table-row-solid gy-4 gs-9">
                                            <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                                                <tr>
                                                    <th style="white-space: nowrap" class="min-w-100px">Ticket Title</th>
                                                    <th style="white-space: nowrap" class="min-w-100px">Ticket Price ($)</th>
                                                    <th style="white-space: nowrap" class="min-w-150px">Entries</th>
                                                    <th style="white-space: nowrap" class="min-w-150px">Prizes</th>
                                                    <th style="white-space: nowrap" class="min-w-150px">Coupon</th>
                                                    <th style="white-space: nowrap" class="min-w-100px">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="fw-6 fw-semibold text-gray-600">
                                                <tr>
                                                    <td>Test title</td>
                                                    <td>$232,00</td>
                                                    <td>23</td>
                                                    <td>
                                                        <ul>
                                                            <li style="white-space:nowrap;">4 Ticket to Pakistan</li>
                                                            <li style="white-space:nowrap;">4 Test to Pakistan</li>
                                                            <li style="white-space:nowrap;">4 Ticket to Pakistan</li>
                                                        </ul>
                                                    </td>
                                                    <td>Applied Coupon</td>
                                                    <td>
                                                        <div class="card-toolbar m-0">
                                                            <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-primary btn-active-light-primary me-n3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                                <span class="svg-icon svg-icon-3 svg-icon-primary">
                                                                    <i class="fas fa-ellipsis-v"></i>
                                                                </span>
                                                            </button>
                                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3" data-kt-menu="true">
                                                                <div class="menu-item px-3">
                                                                    <a href="#" class="menu-link px-3" type="button" data-bs-toggle="modal" data-bs-target="#update_ticket_prizes">Update</a>
                                                                </div>
                                                                <div class="menu-item px-3">
                                                                    <a href="#" class="menu-link px-3">Delete</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div data-kt-stepper-element="content">
                                <div class="w-100">
                                    <div class="pb-10 pb-lg-5">
                                        <h2 class="fw-bold text-dark">Settings</h2>
                                    </div>

                                    <div class="card-header p-0 card-header-stretch">
                                        <div class="card-toolbar m-0">
                                            <ul class="nav nav-tabs nav-line-tabs nav-stretch fs-6 border-0 fw-bold" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <a id="kt_activity_today_tab" class="nav-link justify-content-center text-active-gray-800 active" data-bs-toggle="tab" role="tab" href="#kt_activity_today">Campaign Settings</a>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <a id="kt_activity_week_tab" class="nav-link justify-content-center text-active-gray-800" data-bs-toggle="tab" role="tab" href="#kt_activity_week">Payment Gateway</a>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <a id="kt_activity_month_tab" class="nav-link justify-content-center text-active-gray-800" data-bs-toggle="tab" role="tab" href="#kt_activity_month">Organization</a>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <a id="kt_activity_year_tab" class="nav-link justify-content-center text-active-gray-800 text-hover-gray-800" data-bs-toggle="tab" role="tab" href="#kt_activity_year">OG Settings</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div id="kt_activity_today" class="card-body p-0 tab-pane fade show active" role="tabpanel" aria-labelledby="kt_activity_today_tab">
                                                <div class="mb-7 mt-4">
                                                    <div class="d-flex mb-4 d-flex align-items-center position-relative">
                                                        <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
                                                        <div class="form-check form-check-custom form-check-solid ms-6 me-4">
                                                            <input id="goalAmountCheckbox" class="form-check-input" name="goal" type="checkbox" value="1" {{ old('goal') ? 'checked' : '' }}>
                                                        </div>
                                                        <div class="fw-semibold">
                                                            <label for="goalAmountCheckbox">Goal</label>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-column mb-b mt-4 fv-row">
                                                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                                            <span class="required">Goal Amount</span>
                                                        </label>
                                                        <input type="number" class="form-control form-control-solid" placeholder="" name="goal_amount" value="{{ old('goal_amount') }}" />
                                                    </div>
                                                </div>
                                                <div class="mb-7 mt-4">
                                                    <div class="d-flex mb-4 d-flex align-items-center position-relative">
                                                        <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
                                                        <div class="form-check form-check-custom form-check-solid ms-6 me-4">
                                                            <input id="bonusGoalAmountCheckbox" class="form-check-input" name="bonus_goal" type="checkbox" value="1" {{ old('bonus_goal') ? 'checked' : '' }}>
                                                        </div>
                                                        <div class="fw-semibold">
                                                            <label for="bonusGoalAmountCheckbox">Bonus Goal</label>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-column mb-b mt-4 fv-row">
                                                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                                            <span class="required">Bonus Goal Amount</span>
                                                        </label>
                                                        <input type="number" class="form-control form-control-solid" name="bonus_amount" value="{{ old('bonus_amount') }}" />
                                                    </div>
                                                </div>
                                                <div class="mb-7">
                                                    <div class="d-flex mb-4 d-flex align-items-center position-relative">
                                                        <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
                                                        <div class="form-check form-check-custom form-check-solid ms-6 me-4">
                                                            <input id="enableGifts" class="form-check-input" name="enable_gifts" type="checkbox" value="1" {{ old('enable_gifts') ? 'checked' : '' }}>
                                                        </div>
                                                        <div class="fw-semibold">
                                                            <label for="enableGifts">Enable Gift</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-7">
                                                    <div class="d-flex mb-4 d-flex align-items-center position-relative">
                                                        <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
                                                        <div class="form-check form-check-custom form-check-solid ms-6 me-4">
                                                            <input id="endDate" class="form-check-input" name="show_end_date" type="checkbox" value="1" {{ old('show_end_date') ? 'checked' : '' }}>
                                                        </div>
                                                        <div class="fw-semibold">
                                                            <label for="endDate">End Date</label>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-column mb-b mt-4 fv-row">
                                                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                                            <span class="">End Date</span>
                                                        </label>
                                                        <input type="datetime-local" class="form-control form-control-solid" />
                                                    </div>
                                                </div>
                                                <div class="mb-7 mt-4">
                                                    <div class="d-flex mb-4 d-flex align-items-center position-relative">
                                                        <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
                                                        <div class="form-check form-check-custom form-check-solid ms-6 me-4">
                                                            <input id="ExtendDate" class="form-check-input" name="is_extended" type="checkbox" value="1" {{ old('is_extended') ? 'checked' : '' }}>
                                                        </div>
                                                        <div class="fw-semibold">
                                                            <label for="ExtendDate">Extend Date</label>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-column mb-b mt-4 fv-row">
                                                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                                            <span class="required">Extend Date</span>
                                                        </label>
                                                        <input type="text" class="form-control form-control-solid" placeholder="" name="extend_date" value="{{ old('extend_date') }}" />
                                                    </div>
                                                </div>
                                                <div class="mb-7">
                                                    <div class="d-flex mb-4 d-flex align-items-center position-relative">
                                                        <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
                                                        <div class="form-check form-check-custom form-check-solid ms-6 me-4">
                                                            <input id="CountDown" class="form-check-input" name="countdown" type="checkbox" value="1" {{ old('countdown') ? 'checked' : '' }}>
                                                        </div>
                                                        <div class="fw-semibold">
                                                            <label for="CountDown">Countdown</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-7">
                                                    <div class="d-flex mb-4 d-flex align-items-center position-relative">
                                                        <span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                                                            <input id="menuFixed" class="form-check-input" type="radio" name="menu_position" value="fixed" {{ old('menu_position') == 'fixed' ? 'checked' : '' }}>
                                                        </span>
                                                        <div class="fw-semibold mt-2 ms-3">
                                                            <label for="menuFixed">Menu Fixed</label>
                                                        </div>&nbsp;&nbsp;&nbsp;
                                                        <span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                                                            <input id="menuFloating" class="form-check-input" type="radio" name="menu_position" value="floating" {{ old('menu_position') == 'floating' ? 'checked' : '' }}>
                                                        </span>
                                                        <div class="fw-semibold mt-2 ms-3">
                                                            <label for="menuFloating">Menu Floating</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-7">
                                                    <div class="d-flex mb-4 d-flex align-items-center position-relative">
                                                        <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
                                                        <div class="form-check form-check-custom form-check-solid ms-6 me-4">
                                                            <input id="totalAmountCAD" class="form-check-input" name="total_amount_currency" type="checkbox" value="CAD" {{ old('total_amount_currency') == 'CAD' ? 'checked' : '' }}>
                                                        </div>
                                                        <div class="fw-semibold">
                                                            <label for="totalAmountCAD">Total Amount in CAD</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-7">
                                                    <div class="d-flex mb-4 d-flex align-items-center position-relative">
                                                        <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
                                                        <div class="form-check form-check-custom form-check-solid ms-6 me-4">
                                                            <input id="customAmount" class="form-check-input" name="manual_amount" type="checkbox" value="1" {{ old('manual_amount') ? 'checked' : '' }}>
                                                        </div>
                                                        <div class="fw-semibold">
                                                            <label for="customAmount">Custom Amount</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-7">
                                                    <div class="d-flex mb-4 d-flex align-items-center position-relative">
                                                        <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
                                                        <div class="form-check form-check-custom form-check-solid ms-6 me-4">
                                                            <input id="donationInstallments" class="form-check-input" name="is_recurring" type="checkbox" value="1" {{ old('is_recurring') ? 'checked' : '' }}>
                                                        </div>
                                                        <div class="fw-semibold">
                                                            <label for="donationInstallments">Turn on donation installments</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-7">
                                                    <div class="d-flex mb-4 d-flex align-items-center position-relative">
                                                        <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
                                                        <div class="form-check form-check-custom form-check-solid ms-6 me-4">
                                                            <input id="processingFee" class="form-check-input" name="allow_fee" type="checkbox" value="1" {{ old('allow_fee') ? 'checked' : '' }}>
                                                        </div>
                                                        <div class="fw-semibold">
                                                            <label for="processingFee">Turn on processing fee</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-7">
                                                    <div class="d-flex mb-4 d-flex align-items-center position-relative">
                                                        <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
                                                        <div class="form-check form-check-custom form-check-solid ms-6 me-4">
                                                            <input id="showDonation" class="form-check-input" name="show_recent_donations" type="checkbox" value="1" {{ old('show_recent_donations') ? 'checked' : '' }}>
                                                        </div>
                                                        <div class="fw-semibold">
                                                            <label for="showDonation">Show Donation</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-7">
                                                    <div class="d-flex mb-4 d-flex align-items-center position-relative">
                                                        <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
                                                        <div class="form-check form-check-custom form-check-solid ms-6 me-4">
                                                            <input id="multiCurrencies" class="form-check-input" name="multi_currency" type="checkbox" value="1" {{ old('multi_currency') ? 'checked' : '' }}>
                                                        </div>
                                                        <div class="fw-semibold">
                                                            <label for="multiCurrencies">Turn on Multiple Currencies</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-7">
                                                    <div class="d-flex mb-4 d-flex align-items-center position-relative">
                                                        <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
                                                        <div class="form-check form-check-custom form-check-solid ms-6 me-4">
                                                            <input id="teamButton" class="form-check-input" name="show_team_button" type="checkbox" value="1" {{ old('show_team_button') ? 'checked' : '' }}>
                                                        </div>
                                                        <div class="fw-semibold">
                                                            <label for="teamButton">Show Create team button</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="kt_activity_week" class="card-body p-0 tab-pane fade show" role="tabpanel" aria-labelledby="kt_activity_week_tab">
                                                <div class="mb-7">
                                                    <div class="d-flex mb-4 d-flex align-items-center position-relative">
                                                        <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
                                                        <div class="form-check form-check-custom form-check-solid ms-6 me-4">
                                                            <input id="payment_CC" class="form-check-input" name="payment_cc_on" type="checkbox" value="1" {{ old('payment_cc_on') ? 'checked' : '' }}>
                                                        </div>
                                                        <div class="fw-semibold">
                                                            <label for="payment_CC">CC</label>
                                                        </div>
                                                        <div class="form-check form-check-custom form-check-solid ms-6 me-4">
                                                            <input id="payment_ACH" class="form-check-input mt-1" name="payment_ach_on" type="checkbox" value="1" {{ old('payment_ach_on') ? 'checked' : '' }}>
                                                        </div>
                                                        <div class="fw-semibold">
                                                            <label for="payment_ACH">ACH</label>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-column mb-b mt-4 fv-row">
                                                        <button type="button" data-bs-toggle="modal" data-bs-target="#cardknox_modal" class="btn btn-dark"> <i class="fas text-white fa-credit-card "></i> CardKnox</button>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="mb-7">
                                                    <div class="d-flex mb-4 d-flex align-items-center position-relative">
                                                        <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
                                                        <div class="form-check form-check-custom form-check-solid ms-6 me-4">
                                                            <input id="payment_banquest" class="form-check-input" name="payment_banquest_on" type="checkbox" value="1" {{ old('payment_banquest_on') ? 'checked' : '' }}>
                                                        </div>
                                                        <div class="fw-semibold">
                                                            <label for="payment_banquest">Bankquest</label>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-column mb-b mt-4 fv-row">
                                                        <button type="button" data-bs-toggle="modal" data-bs-target="#banquest_modal" class="btn btn-warning"> <i class="fas fa-money-check"></i>Banquest</button>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="mb-7">
                                                    <div class="d-flex mb-4 d-flex align-items-center position-relative">
                                                        <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
                                                        <div class="form-check form-check-custom form-check-solid ms-6 me-4">
                                                            <input id="payment_authorize" class="form-check-input" name="payment_authorize_on" type="checkbox" value="1" {{ old('payment_authorize_on') ? 'checked' : '' }}>
                                                        </div>
                                                        <div class="fw-semibold">
                                                            <label for="payment_authorize">Authorize.net</label>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-column mb-b mt-4 fv-row">
                                                        <button type="button" data-bs-toggle="modal" data-bs-target="#authorize_modal" class="btn btn-success"> <i class="fas fa-credit-card"></i>Authorize.net</button>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="mb-7">
                                                    <div class="d-flex mb-4 d-flex align-items-center position-relative">
                                                        <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
                                                        <div class="form-check form-check-custom form-check-solid ms-6 me-4">
                                                            <input id="payment_usaePay" class="form-check-input" name="payment_usaepay_on" type="checkbox" value="1" {{ old('payment_usaepay_on') ? 'checked' : '' }}>
                                                        </div>
                                                        <div class="fw-semibold">
                                                            <label for="payment_usaePay">USAePay</label>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-column mb-b mt-4 fv-row">
                                                        <button type="button" data-bs-toggle="modal" data-bs-target="#usaepay_modal" class="btn btn-success"> <i class="fas fa-credit-card"></i>USAePay</button>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="mb-7">
                                                    <div class="d-flex mb-4 d-flex align-items-center position-relative">
                                                        <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
                                                        <div class="form-check form-check-custom form-check-solid ms-6 me-4">
                                                            <input id="payment_stripe" class="form-check-input" name="payment_stripe_on" type="checkbox" value="1" {{ old('payment_stripe_on') ? 'checked' : '' }}>
                                                        </div>
                                                        <div class="fw-semibold">
                                                            <label for="payment_stripe">Stripe</label>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-column mb-b mt-4 fv-row">
                                                        <button type="button" data-bs-toggle="modal" data-bs-target="#stripe_modal" class="btn btn-primary"> <i class="bi bi-stripe"></i>Stripe</button>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="mb-7">
                                                    <div class="d-flex mb-4 d-flex align-items-center position-relative">
                                                        <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
                                                        <div class="form-check form-check-custom form-check-solid ms-6 me-4">
                                                            <input id="payment_paypal" class="form-check-input" name="payment_paypal_on" type="checkbox" value="1" {{ old('payment_paypal_on') ? 'checked' : '' }}>
                                                        </div>
                                                        <div class="fw-semibold">
                                                            <label for="payment_paypal">PayPal</label>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-column mb-b mt-4 fv-row">
                                                        <button type="button" data-bs-toggle="modal" data-bs-target="#paypal_modal" class="btn btn-warning"><i class="bi bi-paypal"></i>PayPal</button>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="mb-7">
                                                    <div class="d-flex mb-4 d-flex align-items-center position-relative">
                                                        <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
                                                        <div class="form-check form-check-custom form-check-solid ms-6 me-4">
                                                            <input id="payment_ojc_fund" class="form-check-input" name="payment_ojc_fund_on" type="checkbox" value="1" {{ old('payment_ojc_fund_on') ? 'checked' : '' }}>
                                                        </div>
                                                        <div class="fw-semibold">
                                                            <label for="payment_ojc_fund">OJC Fund</label>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-column mb-b mt-4 fv-row">
                                                        <button type="button" data-bs-toggle="modal" data-bs-target="#ojc_fund_modal" class="btn btn-light border"> <i class="fas fa-gift"></i> OJC Fund</button>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="mb-7">
                                                    <div class="d-flex mb-4 d-flex align-items-center position-relative">
                                                        <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
                                                        <div class="form-check form-check-custom form-check-solid ms-6 me-4">
                                                            <input id="payment_matbia" class="form-check-input" name="payment_matbia_on" type="checkbox" value="1" {{ old('payment_matbia_on') ? 'checked' : '' }}>
                                                        </div>
                                                        <div class="fw-semibold">
                                                            <label for="payment_matbia">Matbia</label>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-column mb-b mt-4 fv-row">
                                                        <button type="button" data-bs-toggle="modal" data-bs-target="#matbia_modal" class="btn btn-info border"><i class="fas fa-money-check"></i>Matbia</button>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="mb-7">
                                                    <div class="d-flex mb-4 d-flex align-items-center position-relative">
                                                        <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
                                                        <div class="form-check form-check-custom form-check-solid ms-6 me-4">
                                                            <input id="payment_donorsFund" class="form-check-input" name="payment_donors_fund_on" type="checkbox" value="1" {{ old('payment_donors_fund_on') ? 'checked' : '' }}>
                                                        </div>
                                                        <div class="fw-semibold">
                                                            <label for="payment_donorsFund">Donors Fund</label>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-column mb-b mt-4 fv-row">
                                                        <button type="button" data-bs-toggle="modal" data-bs-target="#donors_fund_modal" class="btn btn-danger"><i class="fas fa-recycle"></i>Donors Fund</button>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="mb-7">
                                                    <div class="d-flex mb-4 d-flex align-items-center position-relative">
                                                        <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
                                                        <div class="form-check form-check-custom form-check-solid ms-6 me-4">
                                                            <input id="otherPayment" class="form-check-input" name="other_payment_on" type="checkbox" value="1" {{ old('other_payment_on') ? 'checked' : '' }}>
                                                        </div>
                                                        <div class="fw-semibold">
                                                            <label for="otherPayment">Other</label>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-column mb-b mt-4 fv-row">
                                                        <button type="button" data-bs-toggle="modal" data-bs-target="#other_modal" class="btn btn-dark"><i style="color:white;" class="fas fa-money-check text-white"></i> Other</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="kt_activity_month" class="card-body p-0 tab-pane fade show" role="tabpanel" aria-labelledby="kt_activity_month_tab">
                                                <h3 class="mt-2">
                                                    Organization Settings
                                                </h3>
                                                <div class="mb-3 mt-3">
                                                    <div class="d-flex flex-column mb-b mt-4 fv-row">
                                                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                                            <span class="required">Organization Legal Name</span>
                                                        </label>
                                                        <input type="text" class="form-control form-control-solid" placeholder="" name="organization_legal_name" value="{{ old('organization_legal_name') }}" />
                                                    </div>
                                                </div>
                                                <div class="mb-3 mt-3">
                                                    <div class="d-flex flex-column mb-b mt-4 fv-row">
                                                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                                            <span class="required">Organization Email</span>
                                                        </label>
                                                        <input type="email" class="form-control form-control-solid" placeholder="" name="organization_email" value="{{ old('organization_email') }}" />
                                                    </div>
                                                </div>
                                                <div class="mb-3 mt-3">
                                                    <div class="d-flex flex-column mb-b mt-4 fv-row">
                                                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                                            <span class="required">Bank Statement</span>
                                                        </label>
                                                        <input type="email" class="form-control form-control-solid" placeholder="" name="bank_statement" value="{{ old('bank_statement') }}" />
                                                    </div>
                                                </div>
                                                <div class="mb-3 mt-3">
                                                    <div class="d-flex flex-column mb-b mt-4 fv-row">
                                                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                                            <span class="required">Tax ID</span>
                                                        </label>
                                                        <input type="number" class="form-control form-control-solid" placeholder="" name="tax_id" value="{{ old('tax_id') }}" />
                                                    </div>
                                                </div>
                                                <div class="mb-3 mt-3">
                                                    <div class="d-flex flex-column mb-b mt-4 fv-row">
                                                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                                            <span class="required">Organization Address Line 1</span>
                                                        </label>
                                                        <input type="text" class="form-control form-control-solid" placeholder="" name="organization_address_line_1" value="{{ old('organization_address_line_1') }}" />
                                                    </div>
                                                </div>
                                                <div class="mb-3 mt-3">
                                                    <div class="d-flex flex-column mb-b mt-4 fv-row">
                                                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                                            <span class="required">Organization Address Line 2</span>
                                                        </label>
                                                        <input type="text" class="form-control form-control-solid" placeholder="" name="organization_address_line_2" value="{{ old('organization_address_line_2') }}" />
                                                    </div>
                                                </div>
                                                <div class="mb-3 mt-3">
                                                    <div class="d-flex flex-column mb-b mt-4 fv-row">
                                                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                                            <span class="required">Mailing Address</span>
                                                        </label>
                                                        <input type="text" class="form-control form-control-solid" placeholder="" name="mailing_address" value="{{ old('mailing_address') }}" />
                                                    </div>
                                                </div>
                                                <div class="mb-3 mt-3">
                                                    <div class="d-flex flex-column mb-b mt-4 fv-row">
                                                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                                            <span class="required">Phone Number</span>
                                                        </label>
                                                        <input type="text" class="form-control form-control-solid" placeholder="" name="phone_number" value="{{ old('phone_number') }}" />
                                                    </div>
                                                </div>
                                                <div class="mb-3 mt-3">
                                                    <div class="d-flex flex-column mb-b mt-4 fv-row">
                                                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                                            <span class="required">Phone System Phone Number</span>
                                                        </label>
                                                        <input type="text" class="form-control form-control-solid" placeholder="" name="phone_system_phone_number" value="{{ old('phone_system_phone_number') }}" />
                                                    </div>
                                                </div>
                                                <div class="mb-3 mt-3">
                                                    <div class="d-flex flex-column mb-b mt-4 fv-row">
                                                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                                            <span class="required">Statement Descriptor</span>
                                                        </label>
                                                        <textarea name="statement_descriptor" class="form-control form-control-solid" cols="30" rows="10">{{ old('statement_descriptor') }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="kt_activity_year" class="card-body p-0 tab-pane fade show" role="tabpanel" aria-labelledby="kt_activity_year_tab">
                                                <h3 class="mt-2">
                                                    Open Graph (og) Settings
                                                </h3>
                                                <div class="mb-3 mt-3">
                                                    <div class="d-flex flex-column mb-b mt-4 fv-row">
                                                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                                            <span class="required">Group OG Title</span>
                                                        </label>
                                                        <input type="text" class="form-control form-control-solid" placeholder="" name="group_og_title" value="{{ old('group_og_title') }}" />
                                                    </div>
                                                </div>
                                                <div class="mb-3 mt-3">
                                                    <div class="d-flex flex-column mb-b mt-4 fv-row">
                                                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                                            <span class="required">Group OG Description</span>
                                                        </label>
                                                        <textarea name="group_og_description" class="form-control form-control-solid" cols="30" rows="10">{{ old('group_og_description') }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="fv-row mb-10">
                                                    <label class="d-block fw-semibold fs-6 mb-5">
                                                        <span class="required"> Group OG Image</span>
                                                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="E.g. Select a logo to represent the company that's running the campaign."></i>
                                                    </label>

                                                    <style>
                                                        .image-input-placeholder {
                                                            background-image: url('assets/media/svg/files/blank-image.svg');
                                                        }

                                                        [data-bs-theme="dark"] .image-input-placeholder {
                                                            background-image: url('assets/media/svg/files/blank-image-dark.svg');
                                                        }
                                                    </style>
                                                    <div class="image-input image-input-empty image-input-outline image-input-placeholder" data-kt-image-input="true">
                                                        <div class="image-input-wrapper w-125px h-125px"></div>
                                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                                            <i class="bi bi-pencil-fill fs-7"></i>
                                                            <input type="file" name="og_image" accept=".png, .jpg, .jpeg" />
                                                            <input type="hidden" name="avatar_remove" />
                                                        </label>
                                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                                            <i class="bi bi-x fs-2"></i>
                                                        </span>
                                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                                            <i class="bi bi-x fs-2"></i>
                                                        </span>
                                                    </div>
                                                    <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div data-kt-stepper-element="content">
                                <div class="w-100">
                                    <div class="pb-10 pb-lg-5">
                                        <h2 class="fw-bold text-dark">Content</h2>
                                    </div>
                                    <div class="card-header p-0 card-header-stretch">
                                        <div class="card-toolbar m-0">
                                            <ul class="nav nav-tabs nav-line-tabs nav-stretch fs-6 border-0 fw-bold" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <a id="contentOne_tab" class="nav-link justify-content-center text-active-gray-800 active" data-bs-toggle="tab" role="tab" href="#contentOne">Campaign Content</a>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <a id="contentTwo_tab" class="nav-link justify-content-center text-active-gray-800" data-bs-toggle="tab" role="tab" href="#contentTwo">Gallery</a>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <a id="contentThree_tab" class="nav-link justify-content-center text-active-gray-800" data-bs-toggle="tab" role="tab" href="#contentThree">Sponsorship Opportunities</a>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <a id="contentFour_tab" class="nav-link justify-content-center text-active-gray-800 text-hover-gray-800" data-bs-toggle="tab" role="tab" href="#contentFour">Other</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div id="contentOne" class="card-body p-0 tab-pane fade show active" role="tabpanel" aria-labelledby="contentOne_tab">
                                                <h3 class="mt-2">
                                                    Intro Content
                                                </h3>
                                                <div class="mb-7">
                                                    <div class="d-flex mb-4 d-flex align-items-center position-relative">
                                                        <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
                                                        <div class="form-check form-check-custom form-check-solid ms-6 me-4">
                                                            <input id="enableIntro" class="form-check-input" name="enable_intro_content" type="checkbox" value="1" {{ old('enable_intro_content') ? 'checked' : '' }}>
                                                        </div>
                                                        <div class="fw-semibold">
                                                            <label for="enableIntro">Enable Intro Content</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 mt-3">
                                                    <div class="d-flex flex-column mb-b mt-4 fv-row">
                                                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                                            <span class="required">Intro Header</span>
                                                        </label>
                                                        <input type="text" class="form-control form-control-solid" placeholder="" name="intro_header" value="{{ old('intro_header') }}" />
                                                        @if ($errors->has('intro_header'))
                                                        <div class="text-danger">{{ $errors->first('intro_header') }}</div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="mb-3 mt-3">
                                                    <div class="d-flex flex-column mb-b mt-4 fv-row">
                                                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                                            <span class="required">Main Content</span>
                                                        </label>
                                                        <textarea name="intro_description" class="form-control form-control-solid" cols="30" rows="10">{{ old('intro_description') }}</textarea>
                                                        @if ($errors->has('intro_description'))
                                                        <div class="text-danger">{{ $errors->first('intro_description') }}</div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="mb-3 mt-3">
                                                    <div class="d-flex flex-column mb-b mt-4 fv-row">
                                                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                                            <span class="">Button Content</span>
                                                        </label>
                                                        <input type="text" class="form-control form-control-solid" placeholder="" name="intro_button_text" value="{{ old('intro_button_text') }}" />
                                                        @if ($errors->has('intro_button_text'))
                                                        <div class="text-danger">{{ $errors->first('intro_button_text') }}</div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <h3 class="mt-2">
                                                    Additional Content
                                                </h3>
                                                <div class="mb-3 mt-3">
                                                    <div class="d-flex flex-column mb-b mt-4 fv-row">
                                                        <textarea name="additional_content" class="form-control form-control-solid" cols="30" rows="10">{{ old('additional_content') }}</textarea>
                                                        @if ($errors->has('additional_content'))
                                                        <div class="text-danger">{{ $errors->first('additional_content') }}</div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="contentTwo" class="card-body p-0 tab-pane fade show" role="tabpanel" aria-labelledby="contentTwo_tab">
                                                <div class="w-100">
                                                    <div class="d-flex w-100" style="justify-content:space-between">
                                                        <h2>Gallery</h2>
                                                        <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#add_gallery">Add</button>
                                                    </div>
                                                    <div class="table-responsive">
                                                        <table class="table align-middle table-row-bordered table-row-solid gy-4 gs-9">
                                                            <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                                                                <tr>
                                                                    <th style="white-space: nowrap" class="min-w-100px">Title</th>
                                                                    <th style="white-space: nowrap" class="min-w-100px">Image</th>
                                                                    <th style="white-space: nowrap" class="min-w-100px">Embed</th>
                                                                    <th class="min-w-100px">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="fw-6 fw-semibold text-gray-600">
                                                                <tr>
                                                                    <td>Gallery Title</td>
                                                                    <td>
                                                                        <img src="assets/media/avatars/300-1.jpg" style="width: 150px;height:auto;" alt="">
                                                                    </td>
                                                                    <td style="white-space: nowrap">embed Lorem ipsum dolor, sit amet consectetur adipisicing elit. In, ratione?</td>
                                                                    <td>
                                                                        <div class="card-toolbar m-0">
                                                                            <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-primary btn-active-light-primary me-n3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                                                <span class="svg-icon svg-icon-3 svg-icon-primary">
                                                                                    <i class="fas fa-ellipsis-v"></i>
                                                                                </span>
                                                                            </button>
                                                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3" data-kt-menu="true">
                                                                                <div class="menu-item px-3">
                                                                                    <a href="#" class="menu-link px-3" type="button" data-bs-toggle="modal" data-bs-target="#update_gallery">Update</a>
                                                                                </div>
                                                                                <div class="menu-item px-3">
                                                                                    <a href="#" class="menu-link px-3">Delete</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="contentThree" class="card-body p-0 tab-pane fade show" role="tabpanel" aria-labelledby="contentThree_tab">
                                                <div class="w-100">
                                                    <div class="d-flex w-100" style="justify-content:space-between">
                                                        <h2>Sponsorship Opportunities</h2>
                                                        <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#add_sponsorship_opportunities">Add</button>
                                                    </div>
                                                    <div class="table-responsive">
                                                        <table class="table align-middle table-row-bordered table-row-solid gy-4 gs-9">
                                                            <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                                                                <tr>
                                                                    <th style="white-space: nowrap" class="min-w-100px">Title</th>
                                                                    <th style="white-space: nowrap" class="min-w-100px">Image</th>
                                                                    <th style="white-space: nowrap" class="min-w-100px">Amount</th>
                                                                    <th class="min-w-100px">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="fw-6 fw-semibold text-gray-600">
                                                                <tr>
                                                                    <td>Sponsorship opportunities title</td>
                                                                    <td>
                                                                        <img src="assets/media/avatars/300-1.jpg" style="width: 150px;height:auto;" alt="">
                                                                    </td>
                                                                    <td style="white-space: nowrap">$247,00</td>
                                                                    <td>
                                                                        <div class="card-toolbar m-0">
                                                                            <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-primary btn-active-light-primary me-n3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                                                <span class="svg-icon svg-icon-3 svg-icon-primary">
                                                                                    <i class="fas fa-ellipsis-v"></i>
                                                                                </span>
                                                                            </button>
                                                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3" data-kt-menu="true">
                                                                                <div class="menu-item px-3">
                                                                                    <a href="#" class="menu-link px-3" type="button" data-bs-toggle="modal" data-bs-target="#update_sponsorship_opportunities">Update</a>
                                                                                </div>
                                                                                <div class="menu-item px-3">
                                                                                    <a href="#" class="menu-link px-3">Delete</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="contentFour" class="card-body p-0 tab-pane fade show" role="tabpanel" aria-labelledby="contentFour_tab">
                                                <h3 class="mt-2">Rules</h3>
                                                <div class="mb-3 mt-3">
                                                    <div class="d-flex flex-column mb-b mt-4 fv-row">
                                                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                                            <span class="">Rules Description</span>
                                                        </label>
                                                        <textarea name="rules_description" class="form-control form-control-solid" cols="30" rows="10">{{ old('rules_description') }}</textarea>
                                                        @if ($errors->has('rules_description'))
                                                        <div class="text-danger">{{ $errors->first('rules_description') }}</div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <h3 class="mt-2">Stats</h3>
                                                <div class="mb-10">
                                                    <label class="form-label fw-semibold">Stats</label>
                                                    <div class="d-flex">
                                                        <label class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                                            <input class="form-check-input" type="checkbox" name="enable_stats" {{ old('enable_stats') ? 'checked' : '' }} />
                                                            <span class="form-check-label">Enable Stats</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="mb-10">
                                                    <label class="form-label fw-semibold">Stats to Display</label>
                                                    <div class="d-flex mb-4">
                                                        <label class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                                            <input class="form-check-input" name="enable_fabulous_prizes" type="checkbox" {{ old('enable_fabulous_prizes') ? 'checked' : '' }} />
                                                            <span class="form-check-label">Fabulous Prizes</span>
                                                        </label>
                                                    </div>
                                                    <div class="mb-4">
                                                        <label class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox" name="enable_total_donors" {{ old('enable_total_donors') ? 'checked' : '' }} />
                                                            <span class="form-check-label">Total Donors</span>
                                                        </label>
                                                    </div>
                                                    <div class="mb-4">
                                                        <label class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox" name="enable_ticket_sold" {{ old('enable_ticket_sold') ? 'checked' : '' }} />
                                                            <span class="form-check-label">Ticket Sold</span>
                                                        </label>
                                                    </div>
                                                    <div class="mb-4">
                                                        <label class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox" name="enable_largest_donation" {{ old('enable_largest_donation') ? 'checked' : '' }} />
                                                            <span class="form-check-label">Largest Donation</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div data-kt-stepper-element="content">
                                <div class="w-100">
                                    <div class="pb-8 pb-lg-10">
                                        <h2 class="fw-bold text-dark">You Are Done!</h2>
                                        <div class="text-muted fw-semibold fs-6">Campaign Created Successfully
                                            <a href="{{route('admin.campaigns')}}" class="link-primary fw-bold">Go to Campaigns</a>.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-stack pt-10">
                                <div class="mr-2">
                                    <button type="button" class="btn btn-lg btn-light-primary me-3" data-kt-stepper-action="previous">
                                        <span class="svg-icon svg-icon-4 me-1">
                                            <i class="fas fa-arrow-left"></i>
                                        </span>Back
                                    </button>
                                </div>
                                <div>
                                    <button type="button" class="btn btn-lg btn-primary me-3" data-kt-stepper-action="submit">
                                        <span class="indicator-label">Submit
                                            <span class="svg-icon svg-icon-3 ms-2 me-0">
                                                <i class="fas fa-check"></i>
                                            </span>
                                        </span>
                                        <span class="indicator-progress">Please wait...
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                    <button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="next">Continue
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

@include('admin.campaign.modals.bannerModels')
@include('admin.campaign.modals.ticketPrizesModels')
@include('admin.campaign.modals.paymentGatwaysModal')
@include('admin.campaign.modals.galleryModal')
@include('admin.campaign.modals.sponsorshipOpportunities')

@endsection
