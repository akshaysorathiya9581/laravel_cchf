@extends('admin.layout')
@section('title', 'Ticket Options')

@section('content')
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Ticket Options</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="#" class="text-muted text-hover-primary">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">All</li>

                    </ul>
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <div class="m-0">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#add_ticket_option_modal" class="btn btn-sm btn-flex btn-info"> <i class="fas fa-user"></i> Add New</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_contentss" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="card card-flush">
                    <div class="card-header pt-4">
                        <h3 class="text-start">
                            Coupons
                        </h3>
                    </div>
                    <div class="card-body pt-0">
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="coupons_datatable">
                            <thead>
                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th class="min-w-100px">ID</th>
                                    <th class="min-w-100px">Title</th>
                                    <th class="min-w-100px">Price</th>
                                    <th class="min-w-100px">Entries</th>
                                    <th class="min-w-100px">Grand Prize</th>
                                    <th class="min-w-100px">content</th>
                                    <th class="min-w-100px">Icon</th>
                                    <th class="min-w-100px">Action</th>

                                </tr>
                            </thead>
                            <tbody class="fw-semibold text-gray-600 coupons_body">
                                @foreach ( $ticket_options as $ticket_option )
                                <tr>
                                    <td>{{ $ticket_option->id }}</td>
                                    <td>{{ $ticket_option->title }}</td>
                                    <td>{{$ticket_option->price}}</td>
                                    <td>{{ $ticket_option->entries }}</td>
                                    <td>
                                        @foreach ($grand_prizes as $grand_prize)
                                        @if ($ticket_option->grand_prize == $grand_prize->id)
                                        {{ $grand_prize->title }}
                                        @endif
                                        @endforeach
                                    </td>
                                    <td>{{ $ticket_option->content }}</td>
                                    <td>
                                        <img src="{{ $ticket_option->icon }}" style="width:150px;height:auto;" alt="" srcset="">
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            Actions
                                            <i class="ki-duotone ki-down fs-5 ms-1"></i> </a>
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                            <div class="menu-item px-3">
                                                <a href="#" type="button" data-route="{{ route('admin.getTicketOptionSingledata') }}" data-id="{{ $ticket_option->id }}" id="update_ticket_option{{$ticket_option->id}}" class="loadEditTicketModal menu-link px-3">
                                                    Edit
                                                </a>
                                            </div>
                                            <div class="menu-item px-3">
                                                <a href="{{ route('admin.ticketOption.destroy', ['ticketId' => $ticket_option->id]) }}"  class="menu-link px-3">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

</div>

@include('admin.ticket_options.modals.addTicketOptionModal')
@include('admin.ticket_options.modals.editTicketOptionModal')


<script>
    $('.loadEditTicketModal').on('click', function() {
        let ticketOptionId = $(this).data('id')
        // alert(ticketOptionId)
        let action = $(this).data('route')
        let data = {
            'ticketOptionId': ticketOptionId
            , '_token': '{{ csrf_token() }}'
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
                    ticket_option += '<option ' + ticket_option_selected + ' value="' + prizes[i].id + '" >' + prizes[i].name + '</option>';
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
                    grand_prizes_option += "<option " + grand_prizes_selected + " value=" + grand_prizes[i].id + " >" + grand_prizes[i].title + "</option>";
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
                    coupons_option += "<option " + coupons_selected + " value=" + coupons[i].id + " >" + coupons[i].title + "</option>";
                }

                if (ticketOptions.campaign_id == 0) {
                    let seasons = response.seasons;
                    $('#Seasons').html('');
                    let season_option = "";
                    let seasonsCount = seasons.length;
                    for (let i = 0; i < seasonsCount; i++) {
                        let selectedseason = "";
                        if (seasons[i].id == ticketOptions.season_id) {
                            selectedseason += "selected";
                        }
                        season_option += '<option ' + selectedseason + ' value="' + seasons[i].id + '" >' + seasons[i].name + '</option>';
                    }
                    $('#Seasons').append(season_option);
                }

                $('#EditTicketPrizes').append(ticket_option);
                $('#EditCoupons').append(coupons_option);
                $("#EditGrandPrizes").append(grand_prizes_option);
                $('#updateTicketOptionsModals').modal('show');
            }
            , function(xhr, status, error) {
                console.error('Error:', error);

                swal.fire({
                    text: 'Error:' + error
                    , icon: "error"
                    , buttonsStyling: false
                    , confirmButtonText: "Ok, got it!"
                    , customClass: {
                        confirmButton: "btn btn-light-primary"
                    }
                });
            }
        );
    })

</script>

@endsection
