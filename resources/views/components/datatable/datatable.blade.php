@props([
    'ajaxUrl', // AJAX URL to fetch data
    'columns', // Array of column definitions
    'filters' => [], // Optional filters for inline filtering
    'pageTitle',
    'actionButton',
])

<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">All
                        {{ $pageTitle }}</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('admin.dashboard') }}" class="text-muted text-hover-primary">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>

                        <li class="breadcrumb-item text-muted">{{ $pageTitle }}</li>
                    </ul>
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <div class="m-0">
                        <a href="{{ $actionButton['url'] ?? '#' }}" class="btn btn-sm btn-flex btn-info"
                            @if (!empty($actionButton['modalTarget'])) data-bs-toggle="modal" 
                            data-bs-target="{{ $actionButton['modalTarget'] }}" @endif>
                            {{ $actionButton['label'] ?? 'Action' }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_contentss" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="card card-flush">
                    <div class="card-header pt-4">
                        <h3 class="text-start">
                            {{ $pageTitle }}
                        </h3>
                    </div>
                    <div class="card-body pt-0">
                        <table id="datatable" class="table align-middle table-row-dashed fs-6 gy-5">
                            <thead>
                                <tr>
                                    @foreach ($columns as $column)
                                        <th>{{ $column['name'] }}</th>
                                    @endforeach
                                </tr>
                                {{-- <x-datatable.filter :filters=$columns /> --}}
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize datepicker
        //    $('.datepicker').datepicker({
        //         format: 'yyyy-mm-dd',  // Adjust this as per your date format
        //         autoclose: true
        //     });

        // Initialize DataTable
        let table = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            order: [], // Disable default sorting (or you can set a default column and order)
            ajax: {
                url: "{{ $ajaxUrl }}",
                data: function(d) {
                    @if ($filters)
                        @foreach ($filters as $filterKey => $filter)
                            @if ($filter['type'] == 'text' || $filter['type'] == 'select')
                                d.{{ $filterKey }} = $('#filter-{{ $filterKey }}').val();
                            @elseif ($filter['type'] == 'datepicker')
                                // d.{{ $filterKey }} = $('#filter-{{ $filterKey }}').datepicker('getDate');
                            @endif
                        @endforeach
                    @endif
                }
            },
            columns: {!! json_encode(
                array_map(
                    fn($col) => [
                        'data' => $col['data'],
                        'name' => $col['data'],
                        'orderable' => $col['orderable'] ?? true, // Add this to make columns sortable or not
                        'searchable' => true, // Allow search input to work
                    ],
                    $columns,
                ),
            ) !!},
            columnDefs: [
                @foreach ($columns as $index => $column)
                    @if (!isset($column['orderable']) || $column['orderable'] === false)
                        {
                            "targets": {{ $index }},
                            "orderable": false,
                        },
                    @endif
                @endforeach {
                    "targets": 'filter-row', // Apply this class to the first row (column headers)
                    "orderable": false
                }
            ],
            initComplete: function() {
                // Apply filters on input change
                @if ($filters)
                    $('.datatable-filter').on('keyup change', function() {
                        table.draw();
                    });
                @endif
            }
        });

        // Apply filters when selecting from dropdown (select box)
        @if ($filters)
            $('.datatable-filter').on('keyup change', function() {
                table.draw();
            });
        @endif
    });
</script>
