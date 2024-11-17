@extends('admin.layout')
@section('title', ' Email Api Settings')

@section('content')
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Send Grid Settings</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="#" class="text-muted text-hover-primary">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted"> Email Settings</li>

                    </ul>
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <div class="m-0">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#email_api_setting_modal" class="btn btn-sm btn-flex btn-info"> <i class="fas fa-envelope"></i> update information</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_contentss" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="card card-flush">
                    <div class="card-header pt-4">
                        <h3 class="text-start">
                            Email Api Settings
                        </h3>
                        <p class="text-end">
                            @if (isset($success) && $success->any())
                        <div class="alert alert-success " role="alert">
                            @foreach ($success->all() as $succes)
                            <strong> Success! </strong>{{ $succes}}
                            @endforeach
                        </div>
                        @endif
                        </p>
                    </div>
                    <div class="card-body pt-0">
                        <table class="table align-middle table-bordered table-row-dashed fs-6 gy-5" id="Prizes">

                            <tbody class="fw-semibold text-gray-600 coupons_body">
                                <tr>
                                    <th>API KEY</th>
                                    <td>{{ $settings->api_key ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>FROM EMAIL</th>
                                    <td>{{ $settings->from_email ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>FROM NAME</th>
                                    <td>{{ $settings->from_name ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>REPLY TO</th>
                                    <td>{{ $settings->reply_to ?? 'N/A' }}</td>
                                </tr>
                                <tr>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@include('admin.setting.modals.email_api_setting')

@endsection
