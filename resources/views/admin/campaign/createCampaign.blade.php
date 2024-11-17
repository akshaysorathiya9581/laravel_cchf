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

                            </div>
                        </div>
                    </div>


                    <div class="card d-flex flex-row-fluid flex-center">
                        <form class="card-body py-20 w-100 mw-xl-700px px-9" method="post" action="{{ route('admin.storeCampaign') }}" enctype="multipart/form-data" novalidate="novalidate">

                            <div class="current" data-kt-stepper-element="content">
                                <div class="w-100">
                                    <div class="pb-10 pb-lg-15">
                                        <h2 class="fw-bold d-flex align-items-center text-dark">Setup Campaign
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Campaign name will be used as reference within your campaign reports"></i>
                                        </h2>
                                    </div>

                                    <div class="mb-10 fv-row">
                                        <label class="required form-label mb-3">Organization Name</label>
                                        <input type="text" class="form-control form-control-lg form-control-solid" name="organization_name" placeholder="" value="{{ old('organization_name') }}" />
                                        @if ($errors->has('organization_name'))
                                        <div class="text-danger">{{ $errors->first('organization_name') }}</div>
                                        @endif
                                    </div>
                                    <div class="mb-10 fv-row">
                                        <label class="required form-label mb-3">Campaign Name</label>
                                        <input type="text" class="form-control form-control-lg form-control-solid" name="campaign_name" placeholder="" value="{{ old('campaign_name') }}" />
                                        @if ($errors->has('campaign_name'))
                                        <div class="text-danger">{{ $errors->first('campaign_name') }}</div>
                                        @endif
                                    </div>
                                    <div class="mb-10 fv-row">
                                        <label class="required form-label mb-3">Template</label>
                                        <select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true" name="template">
                                            <option value="raffle">Raffle</option>
                                            <option value="general">General</option>
                                            <option value="event">Events</option>
                                            <option value="multi_location">Multi Location</option>
                                            <option value="masbia">Masbia</option>
                                            {{-- <option value="goal">Goal</option> --}}
                                        </select>
                                        @if ($errors->has('template'))
                                        <div class="text-danger">{{ $errors->first('template') }}</div>
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
                                        <label class="required form-label mb-3">Seasons</label>
                                        <select class="form-select form-select-solid form-select-sm" data-control="select2" data-placeholder="select season" data-hide-search="false" name="season_id">
                                            @foreach ($seasons as $season)
                                            <option value="{{ $season->id }}">{{ $season->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('season_id'))
                                        <div class="text-danger">{{ $errors->first('season_id') }}</div>
                                        @endif
                                    </div>
                                    <div class="mb-10 fv-row">
                                        <label class="required form-label mb-3">Users</label>
                                        <select class="form-select form-select-solid form-select-sm" data-placeholder="Assign to users" multiple data-control="select2"  data-hide-search="false" name="users[]">
                                            @foreach ($campaign_users as $campaign_user)
                                            <option value="{{ $campaign_user->id }}" {{ in_array(1, old('users', [])) ? 'selected' : '' }}>{{ $campaign_user->name }}</option>
                                            @endforeach

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






                            <div class="d-flex flex-stack pt-10">
                                <div class="mr-2">
                                    <button type="submit" class="btn btn-lg btn-light-primary me-3">
                                        Save
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


@endsection
