@extends('admin.layout')
@section('title', 'Donations Tips')

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
                            Donations Tips</h1>
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <li class="breadcrumb-item text-muted">
                                <a href="#" class="text-muted text-hover-primary">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">All Donations Tips</li>
                        </ul>
                    </div>
                    <div class="d-flex align-items-center gap-2 gap-lg-3">

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

                            </div>
                        </div>
                        <div class="card-body pt-0" style="overflow: auto;">
                            <table class="table align-middle table-row-dashed fs-6 gy-5" style="width: 100%"
                                id="donationDataTable">
                                <thead>
                                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                        <th style="white-space: nowrap" class="min-w-100px">Action</th>
                                        <th style="white-space: nowrap" class="min-w-100px">Campaign</th>
                                        <th style="white-space: nowrap" class="min-w-100px">Yingerman </th>
                                        <th style="white-space: nowrap" class="min-w-100px">Donor Name</th>
                                        <th style="white-space: nowrap" class="min-w-100px"> Amount</th>
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
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('admin.getDonationTipsData') }}",
                    data: function(d) {
                        d.search.value = $("#donationDataTable_filter").find("input").val();;
                    }
                },
                columns: [{
                        data: 'action',
                        name: 'action',
                        // searchable: false
                    },
                    {
                        data: 'camp_title',
                        name: 'campaign.camp_title',
                        // searchable: false
                    }, {
                        data: 'tips_title',
                        name: 'tips_title',
                        // searchable: false
                    }, {
                        data: 'donor_name',
                        name: 'donor_name',
                        // searchable: false
                    }, {
                        data: 'total_amount',
                        name: 'total_amount',
                        // searchable: false
                    }, {
                        data: 'created_at',
                        name: 'created_at',
                        searchable: false,
                        render: function(data, type, row) {
                            return moment(data).format('MM/DD/YYYY hh:mm A');
                        }
                    }
                ]
            });
        });
    </script>
@endsection
