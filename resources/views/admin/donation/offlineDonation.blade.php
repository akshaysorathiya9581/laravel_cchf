@extends('admin.layout')
@section('title', 'Offline Donation')

@section('content')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            Offline Donation</h1>
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <li class="breadcrumb-item text-muted">
                                <a href="#" class="text-muted text-hover-primary">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">Offline Donation</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <div id="kt_app_content_container" class="app-container container-xxl">
                    <div class="card card-flush">
                        <div class="card-header p-4">
                            <div class="d-flex w-100 row">
                                <div class="col-md-6">
                                    <h3>
                                        Bulk Import Offline Donation
                                    </h3>
                                </div>
                                <div class="col-md-6 text-end">

                                    <a href="{{ asset('storage/donations-sample-file.csv') }}"
                                        class="ms-end btn btn-sm btn-primary" download="donations-sample-file.csv">Download
                                        CSV Template</a>

                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <form action="{{ route('admin.donations.import') }}" method="POST"
                                enctype="multipart/form-data">
                                <div class="row w-100">
                                    <div class="col-md-6">
                                        <div class="fv-row mb-10">
                                            <label class="form-label required">Choose Campaign</label>
                                            <select name="campaign_id" class="form-select form-select-lg form-select-solid"
                                                data-control="select2" data-placeholder="Select Campaign..."
                                                data-allow-clear="true" data-hide-search="false">
                                                <option></option>
                                                @foreach ($campaigns as $campaign)
                                                    <option value="{{ $campaign->id }}">{{ $campaign->camp_title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-10 fv-row">
                                            <label class="required form-label mb-3">CSV Donation File</label>
                                            <input type="file" class="form-control form-control-lg form-control-solid"
                                                name="imp_don_file" />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-lg btn-primary me-3">
                                            <span class="indicator-label">Submit
                                                <i class="fas fa-arrow-right"></i>
                                            </span>
                                            <span class="indicator-progress">Please wait...
                                                <span
                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                    </div>
                                </div>
                                @csrf
                            </form>
                        </div>
                    </div>
                    <div class="card card-flush mt-4">
                        <div class="card-header p-4">
                            <div class="d-flex w-100 row">
                                <div class="col-md-6">
                                    <h3>
                                        <b>Add Manual Offline Donation</b>
                                    </h3>
                                    {{-- @if (isset($errors) && $errors->any())
                                <div class="alert alert-danger " role="alert">
                                    @foreach ($errors->all() as $error)
                                    <strong> Error </strong>{{ $error}}
                                    @endforeach
                                </div>
                                @endif --}}
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-3">
                            <form action="{{ route('admin.saveOfflineDonation') }}" method="post">
                                @csrf
                                <div class="row w-100">
                                    <div class="col-md-6">
                                        <div class="fv-row mb-10">
                                            <label class="form-label required">Choose Campaign</label>

                                            <input type="hidden" name="season_id"
                                                value="{{ session()->get('season_id') }}">
                                            <select id="campaign-select" name="campaign_id"
                                                class="form-select form-select-lg form-select-solid" data-control="select2"
                                                data-placeholder="Select Campaign..." data-allow-clear="true"
                                                data-hide-search="false">
                                                <option></option>
                                                @foreach ($campaigns as $campaign)
                                                    <option value="{{ $campaign->id }}">{{ $campaign->camp_title }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('campaign_id'))
                                                <div class="text-danger">{{ $errors->first('campaign_id') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-10 fv-row">
                                            <input type="hidden" name="type" value="offline">
                                            <label class="required form-label mb-3">First Name</label>
                                            <input type="text" class="form-control form-control-lg form-control-solid"
                                                value="{{ old('donor_first_name') }}" name="donor_first_name" />
                                            @if ($errors->has('donor_first_name'))
                                                <div class="text-danger">{{ $errors->first('donor_first_name') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-10 fv-row">
                                            <label class="required form-label mb-3">Last Name</label>
                                            <input type="text" class="form-control form-control-lg form-control-solid"
                                                value="{{ old('donor_last_name') }}" name="donor_last_name" />
                                            @if ($errors->has('donor_last_name'))
                                                <div class="text-danger">{{ $errors->first('donor_last_name') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-10 fv-row">
                                            <label class="required form-label mb-3">Email</label>
                                            <input type="text" class="form-control form-control-lg form-control-solid"
                                                value="{{ old('donor_email') }}" name="donor_email" />
                                            @if ($errors->has('donor_email'))
                                                <div class="text-danger">{{ $errors->first('donor_email') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-10 fv-row">
                                            <label class=" form-label mb-3">Phone</label>
                                            <input type="text" class="form-control form-control-lg form-control-solid"
                                                value="{{ old('donor_phone') }}" name="donor_phone" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-10 fv-row">
                                            <label class=" form-label mb-3">Address</label>
                                            <input type="text" class="form-control form-control-lg form-control-solid"
                                                value="{{ old('address') }}" name="address" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="fv-row mb-10">
                                            <label class="form-label ">Teams</label>
                                            <select id="team-select" name="team_id"
                                                class="form-select form-select-lg form-select-solid"
                                                data-control="select2" data-placeholder="Select Team..."
                                                data-allow-clear="true" data-hide-search="false">
                                                <option></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-10 fv-row">
                                            <label class="required form-label mb-3">Donation Amount</label>
                                            <input type="number" class="form-control form-control-lg form-control-solid"
                                                value="{{ old('amount') }}" name="amount" />
                                            @if ($errors->has('amount'))
                                                <div class="text-danger">{{ $errors->first('amount') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    {{-- <div class="col-lg-3">
                                    <div class="mb-10 fv-row">
                                        <label class="required form-label mb-3">Donation Amount(USD)</label>
                                        <input type="number" class="form-control form-control-lg form-control-solid" value="{{ old('usd_amount') }}" name="usd_amount" />
                                        @if ($errors->has('usd_amount'))
                                        <div class="text-danger">{{ $errors->first('usd_amount') }}</div>
                                        @endif
                                    </div>
                                </div> --}}
                                    <div class="col-lg-4">
                                        <div class="fv-row mb-10">
                                            <label class="form-label required">Currency</label>
                                            <select name="currency" class="form-select form-select-lg form-select-solid"
                                                data-control="select2" data-allow-clear="true" data-hide-search="false">
                                                {{-- <option></option> --}}
                                                <option value="usd">USD</option>
                                                <option value="cad">CAD</option>
                                                <option value="gbp">GBP</option>
                                                <option value="eur">EUR</option>
                                                <option value="ils">ILS</option>
                                            </select>
                                            @if ($errors->has('currency'))
                                                <div class="text-danger">{{ $errors->first('currency') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="mb-10">
                                            <label class="form-label fw-semibold"> Tips</label>
                                            <div class="d-flex">
                                                <label
                                                    class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input yinger_tips" value="1"
                                                        type="checkbox" name="tips" />
                                                    {{-- <span class="form-check-label">Author</span> --}}
                                                </label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="yinger_stuff_original row">

                                        <div class="col-lg-5 yinger_tips_container  d-none">
                                            <div class="fv-row mb-10">
                                                <label class="form-label  ">Yangerman</label>
                                                <select name="yinger_man[]"
                                                    class="form-select form-select-lg form-select-solid yinger_man_select"
                                                    data-placeholder="Select Yangerman..." data-allow-clear="true"
                                                    data-hide-search="false">
                                                    <option></option>

                                                </select>
                                                @if ($errors->has('yinger_man'))
                                                    <div class="text-danger">{{ $errors->first('yinger_man') }}</div>
                                                @endif
                                            </div>
                                        </div>



                                        <div class="col-lg-4 yinger_tips_container  d-none">
                                            <div class="fv-row mb-10">
                                                <label class="form-label  ">Tip Amount</label>
                                                <input type="number" name="tipAmount[]"
                                                    class="form-control form-control-lg form-control-solid">
                                                @if ($errors->has('yinger_man'))
                                                    <div class="text-danger">{{ $errors->first('yinger_man') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="yinger_stuff_cloned row">
                                    </div>
                                    <a href="javascript::void" class="yinger_tips_container d-none yinger_add_more">Add
                                        more</a>

                                    <div class="col-md-6">
                                        <div class="fv-row mb-10">
                                            <label class="form-label">STP</label>
                                            <select name="campaign_split_pot_id"
                                                class="form-select form-select-lg form-select-solid"
                                                data-control="select2" data-placeholder="Split the pot..."
                                                data-allow-clear="true" data-hide-search="false">
                                                <option></option>
                                                <option value="1">$34 for 6 Entries</option>
                                                <option value="2">$79 for 10 Entries</option>
                                                <option value="3">$20 for 4 Entries</option>
                                                <option value="4">$200 for 50 Entries</option>
                                                <option value="5">$150 for 35 Entries</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-10 fv-row">
                                            <label class=" form-label mb-3">Notes</label>
                                            <textarea class="form-control form-control-lg form-control-solid" rows="2" name="notes">{{ old('notes') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-10">
                                            <label class="form-label fw-semibold">Donate Anonymously</label>
                                            <div class="d-flex">
                                                <label
                                                    class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" value="1" type="checkbox"
                                                        name="is_anonymous" />
                                                    {{-- <span class="form-check-label">Author</span> --}}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="col-lg-3">
                                    <div class="mb-10">
                                        <label class="form-label fw-semibold">STP Amount</label>
                                        <div class="d-flex">
                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                                <input class="form-check-input" name="stp_amount" type="radio" />
                                                <span class="form-check-label">Excluded</span>
                                            </label>
                                            <label class="form-check form-check-sm form-check-custom form-check-solid">
                                                <input class="form-check-input" name="stp_amount" type="radio" checked="checked" />
                                                <span class="form-check-label">Included</span>
                                            </label>
                                        </div>
                                    </div>
                                </div> --}}
                                    <div class="col-lg-3">
                                        <div class="mb-10">
                                            <label class="form-label fw-semibold">Recurring Donation:</label>
                                            <div class="d-block">
                                                <label
                                                    class="mb-4 form-check form-check-sm form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" name="recurring"
                                                        id="OneTimeRecurring" checked="checked" value="oneTime"
                                                        type="radio" />
                                                    <span class="form-check-label">One Time</span>
                                                </label>
                                                <label
                                                    class="mb-4 form-check form-check-sm form-check-custom form-check-solid">
                                                    <input class="form-check-input" name="recurring" id="monthly"
                                                        value="Monthly" type="radio" />
                                                    <span class="form-check-label">Monthly</span>
                                                </label>
                                                <label
                                                    class="mb-4 form-check form-check-sm form-check-custom form-check-solid">
                                                    <input class="form-check-input" name="recurring" id="weekly"
                                                        value="Weekly" type="radio" />
                                                    <span class="form-check-label">Weekly</span>
                                                </label>
                                                <label
                                                    class="mb-4 form-check form-check-sm form-check-custom form-check-solid">
                                                    <input class="form-check-input" name="recurring" id="daily"
                                                        value="Daily" type="radio" />
                                                    <span class="form-check-label">Daily</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3" id="recurring_cycle">
                                        <div class="mb-10 fv-row">
                                            <label class="form-label mb-3">Recurring Cycles</label>
                                            <input type="number" class="form-control form-control-lg form-control-solid"
                                                name="recurring_intervals" />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-lg btn-primary me-3">
                                            <span class="indicator-label">Submit
                                                <i class="fas fa-arrow-right"></i>
                                            </span>
                                            </span>
                                            <span class="indicator-progress">Please wait...
                                                <span
                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#campaign-select').select2();
            $('#team-select').select2();

            loadTeams($('#campaign-select').val());
            $('#campaign-select').on('change', function() {
                loadTeams($(this).val());
                loadYingerMan($(this).val());
            });

            function loadYingerMan(campaignId) {
                $.ajax({
                    url: `/admin/getYingerManByCampaign/${campaignId}`,
                    type: 'GET',
                    success: function(yingerMan) {

                        $('.yinger_stuff_cloned').html('');
                        $('.yinger_man_select').empty();
                        yingerMan.forEach(function(ying) {
                            console.log(ying);
                            $('.yinger_man_select').append(new Option(ying.title, ying.id));

                        });
                    }
                });
            }

            function loadTeams(campaignId) {
                $.ajax({
                    url: `/admin/getTeamsByCampaign/${campaignId}`,
                    type: 'GET',
                    success: function(teams) {
                        $('#team-select').empty();
                        teams.forEach(function(team) {
                            $('#team-select').append(new Option(team.display_name, team
                                .id));
                        });
                        $('#team-select').trigger('change');
                    }
                });
            }
                    $('.yinger_tips').on('change', function() {
                        if ($(this).is(':checked')) {
                            $('.yinger_tips_container').removeClass('d-none');
                        } else {
                            $('.yinger_tips_container').addClass('d-none');
                        }

                        $('.yinger_add_more').on('click', function() {
                            let html = $('.yinger_stuff_original').html()
                            $('.yinger_stuff_cloned').append(html);
                        });
                    });
        });
    </script>

@endsection
