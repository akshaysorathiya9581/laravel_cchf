@extends('admin.layout')
@section('title', 'Donations')

@section('content')
<style>
    #donationDataTable_wrapper .row .col-sm-12 {
        overflow: auto !important;
    }

    #donationDataTable_wrapper th {
        margin-right: auto !important;
        text-align: left !important;
    }

</style>
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Donations</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="#" class="text-muted text-hover-primary">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">All Donations</li>
                    </ul>
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <div class="m-0">
                        <a href="#" class="btn btn-sm btn-flex bg-body btn-color-gray-700 btn-active-color-primary fw-bold" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">

                            <i class="fas fa-filter"></i>
                            Filter</a>
                        <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_63de8accb151e">
                            <div class="px-7 py-5">
                                <div class="fs-5 text-dark fw-bold">Filter Options</div>
                            </div>
                            <div class="separator border-gray-200"></div>
                            <form id="donationFilterForm">
                                <div class="px-7 py-5">
                                    <div class="mb-5">
                                        <label class="form-label fw-semibold">Choose Campaign</label>
                                        <div>
                                            <select class="form-select form-select-solid" id="campaignFilter" name="campaign_id" data-kt-select2="true" data-placeholder="Select Campaign" data-allow-clear="true">
                                                <option></option>
                                                @foreach ($campaigns as $campaign)
                                                <option value="{{ $campaign->id }}">{{ $campaign->camp_title }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-5">
                                        <label class="form-label fw-semibold">Status</label>
                                        <div>
                                            <select name="status" id="statusFilter" class="form-select form-select-solid" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true">
                                                <option></option>
                                                <option value="Paid">Paid</option>
                                                <option value="Failed">Failed</option>
                                                <option value="Refunded">Refunded</option>
                                                <option value="Unverified">Unverified</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-5">
                                        <label class="form-label fw-semibold">Type</label>
                                        <div>
                                            <select name="type" id="typeFilter" class="form-select form-select-solid" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true">
                                                <option></option>
                                                <option value="offline">Offline Donation</option>
                                                <option value="online">Online Donation</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-5">
                                        <label class="form-label fw-semibold">Start Date</label>
                                        <div>
                                            <input name="start_date" id="startDateFilter" type="datetime-local" class="form-control form-conrol-solid">

                                        </div>
                                    </div>
                                    <div class="mb-5">
                                        <label class="form-label fw-semibold">End Date</label>
                                        <div>
                                            <input name="end_date" id="endDateFilter" type="datetime-local" class="form-control form-conrol-solid">
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="button" id="clearFilter" class="btn btn-sm btn-light btn-active-light-primary me-2">Reset</button>
                                        <button type="submit" class="btn btn-sm btn-primary">Apply</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="card card-flush">
                    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                        <div class="card-title">

                            <div id="kt_ecommerce_report_customer_orders_export" class="d-none"></div>
                        </div>
                        <div class="card-toolbar flex-row-fluid justify-content-end gap-5">

                            <button type="button" id="exportReport" class="btn btn-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                <i class="fas fa-file-export"></i>
                                Export Report</button>
                          
                        </div>
                    </div>
                    <div class="card-body pt-0" style="overflow: auto;">
                        <table class="table align-middle table-row-dashed fs-6 gy-5" style="width: 100%" id="donationDataTable">
                            <thead>
                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th style="white-space: nowrap" class="min-w-100px">Action</th>
                                    <th style="white-space: nowrap" class="min-w-100px">Campaign</th>
                                    <th style="white-space: nowrap" class="min-w-100px">Name</th>
                                    <th style="white-space: nowrap" class="min-w-100px">USD Amount</th>
                                    <th style="white-space: nowrap" class="text-end min-w-75px">Reccurring</th>
                                    <th style="white-space: nowrap" class="text-end min-w-75px">Total Donation</th>
                                    <th style="white-space: nowrap" class="text-end min-w-100px">Team</th>
                                    <th style="white-space: nowrap" class="text-end min-w-100px">Status</th>
                                    <th style="white-space: nowrap" class="text-end min-w-100px">Date</th>
                                </tr>
                            </thead>
                            <tbody class="fw-semibold text-gray-600 donation_body">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

</div>

<script>
    $(document).ready(function() {
        var table = $('#donationDataTable').DataTable({
            processing: true
            , serverSide: true,
            // searchable: false,
            ajax: {
                url: "{{ route('admin.getDonationData') }}"
                , data: function(d) {
                    d.campaign_id = $("#campaignFilter").val();
                    d.status = $("#statusFilter").val();
                    d.type = $("#typeFilter").val();
                    d.start_date = $("#startDateFilter").val();
                    d.end_date = $("#endDateFilter").val();
                    d.search.value = $("#donationDataTable_filter").find("input").val();;
                }
            }
            , columns: [{
                    data: 'action'
                    , name: 'action'
                    , searchable: false
                }
                , {
                    data: 'camp_title'
                    , name: 'campaign.camp_title'
                    , searchable: false
                }
                , {
                    data: 'donor_name'
                    , name: 'donor_name'
                    , searchable: false
                }
                , {
                    data: 'usd_amount'
                    , name: 'usd_amount'
                    , searchable: false
                }
                , {
                    data: 'recurring'
                    , name: 'recurring',
                    // searchable: true,
                    searchable: false
                    , render: function(data, type, row) {
                        return data === 'oneTime' ? 'No' : data;
                    }
                }
                , {
                    data: 'amount'
                    , name: 'amount'
                    , searchable: false
                }
                , {
                    data: 'team_name'
                    , name: 'team_name'
                    , searchable: false
                }
                , {
                    data: 'status'
                    , name: 'status'
                    , searchable: false
                    , render: function(data, type, row) {
                        if (data === 'Paid') {
                            return '<span class="bg-success px-3 py-2 radius-1 text-white">' + data + '</span>';
                        } else if (data === 'Failed') {
                            return '<span class="bg-danger px-3 py-2 radius-1 text-white">' + data + '</span>';
                        } else if (data === 'Refunded') {
                            return '<span class="bg-warning px-3 py-2 radius-1 text-white">' + data + '</span>';
                        } else if (data === 'Refunded') {
                            return '<span class="bg-warning px-3 py-2 radius-1 text-white">' + data + '</span>';
                        }
                        return '<span class="px-3 py-2 radius-1">' + data + '</span>';
                    }
                }
                , {
                    data: 'created_at'
                    , name: 'created_at'
                    , searchable: false
                    , render: function(data, type, row) {
                        return moment(data).format('MM/DD/YYYY hh:mm A');
                    }
                }
            ]
        });
        $('#donationFilterForm').on('submit', function(e) {
            e.preventDefault();
            table.draw();
        });
        $('#clearFilter').on('click', function() {
            $('#donationFilterForm')[0].reset();
            $('#typeFilter').val(null).trigger('change');
            $('#statusFilter').val(null).trigger('change');
            $('#campaignFilter').val(null).trigger('change');
            $('#donationFilterForm').submit();
        });
        $('#exportReport').on('click', function() {
            let end_date = $('#endDateFilter').val();
            let start_date = $('#startDateFilter').val();
            let type = $('#typeFilter').val();
            let status = $('#statusFilter').val();
            let campaign_id = $('#campaignFilter').val();
            $.ajax({
                url: "{{ route('admin.exportDonation') }}"
                , method: 'GET'
                , data: {
                    end_date: end_date
                    , start_date: start_date
                    , type: type
                    , status: status
                    , campaign_id: campaign_id
                }
                , xhrFields: {
                    responseType: 'blob'
                }
                , success: function(data, status, xhr) {
                    let filename = xhr.getResponseHeader('Content-Disposition').split('filename=')[1].replace(/"/g, '');
                    let url = window.URL.createObjectURL(new Blob([data]));
                    let a = document.createElement('a');
                    a.href = url;
                    a.download = filename;
                    document.body.appendChild(a);
                    a.click();
                    a.remove();
                }
                , error: function() {
                        alert('Failed to export the report.');
                    }

            , })

        });



    });

</script>
@endsection
