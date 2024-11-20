{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.15.0/ace.js"></script> --}}

<script>
    // var editor = ace.edit("editor");
    // editor.setTheme("ace/theme/monokai");
    // editor.session.setMode("ace/mode/javascript");
    // const editor = Jodit.make('#jodit_editor1');
</script>

<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
    <span class="svg-icon">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)"
                fill="currentColor" />
            <path
                d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                fill="currentColor" />
        </svg>
    </span>
</div>
<script>
    var hostUrl = "";
</script>

{{-- <script src="//cdnjs.cloudflare.com/ajax/libs/jodit/4.2.27/jodit.min.js"></script> --}}
<link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/plugins/joditTxtEditor/jodit.min.js') }}"></script>
<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
{{-- <script src="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script> --}}

{{-- <script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
<script src="{{ asset('assets/js/custom/widgets.js') }}"></script> --}}
{{-- <script src="{{ asset('assets/js/custom/ckeditor.js') }}"></script> --}}
{{-- <script src="{{ asset('assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js') }}"></script>
<script src="{{ asset('assets/js/custom/apps/chat/chat.js') }}"></script>
<script src="{{ asset('assets/js/custom/utilities/modals/create-account.js') }}"></script>
<script src="{{ asset('assets/js/custom/utilities/modals/users-search.js') }}"></script>
<script src="{{ asset('assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
{{-- <script src="{{ asset('assets/js/custom/utilities/modals/create-app.js') }}"></script> --}}
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="{{ asset('assets/frontend/js/jquery.toast.js') }}"></script>
<script>
    let table = new DataTable('#donation_data_table');
    let referrers = new DataTable('#referrers_datatable');
    let coupons = new DataTable('#coupons_datatable');
    let grandPrizes = new DataTable('#grandPrizes');
    let Prizes = new DataTable('#Prizes');
    let ticket_prize_datatable = new DataTable('#ticket_prize_datatable');
    let gallery_datatable = new DataTable('#gallery_datatable');
    let sponsorship_datatable = new DataTable('#sponsorship_datatable');
    let banner = new DataTable('#banner_datatable');
    $(document).on("click", "#goalAmountCheckbox", function() {
        $("#goalAmountInput").toggleClass("d-none");
    });
    $(document).on("click", "#bonusGoalAmountCheckbox", function() {
        $("#BonusgoalAmountInput").toggleClass("d-none");
    });
    $(document).on("click", "#ExtendDate", function() {
        $("#ExtendDateInput").toggleClass("d-none");
    });
    $(document).on("click", "#endDate", function() {
        $("#endDateInput").toggleClass("d-none");
    });
    $(document).on("click", "#enableIntro", function() {
        $("#introContentSection").toggleClass("d-none");
    });
    $(document).on('change', function() {
        if ($('#OneTimeRecurring').is(':checked')) {
            $("#recurring_cycle").addClass("d-none");
        } else {
            $("#recurring_cycle").removeClass("d-none");
        }
    });
    $(document).on('change', function() {
        if ($('#enable_fabulous_prizes').is(':checked') ||
            $('#enable_total_donors').is(':checked') ||
            $('#enable_ticket_sold').is(':checked') ||
            $('#enable_largest_donation').is(':checked')) {
            $('#enable_stats').prop('checked', true)
        }
    });
    // Stepper lement
    var element = document.querySelector("#kt_create_account_stepper");
    // Initialize Stepper
    var stepper = new KTStepper(element);

    function updateUrl(tabId) {
        var url = new URL(window.location.href);
        url.searchParams.set('tabId', tabId);
        window.history.pushState({}, '', url);
    }
    // Handle navigation click
    stepper.on("kt.stepper.click", function(stepper) {
        var tabId = stepper.getClickedStepIndex();

        stepper.goTo(stepper.getClickedStepIndex());
        updateUrl(tabId);
    });
    document.addEventListener("DOMContentLoaded", function() {
        var url = new URL(window.location.href);
        var tabId = url.searchParams.get('tabId');
        if (tabId && tabId != 6) {
            stepper.goTo(tabId);
        }
    });
    // Handle next step
    stepper.on("kt.stepper.next", function(stepper) {
        stepper.goNext(); // go next step
    });
    // Handle previous step
    stepper.on("kt.stepper.previous", function(stepper) {
        stepper.goPrevious(); // go previous step
    });

    if($('#email_editor1').length) {
        ClassicEditor
        .create(document.querySelector('#email_editor1'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
    }

    if($('#email_editor2').length) {
        ClassicEditor
        .create(document.querySelector('#email_editor2'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
    }
</script>
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> --}}


<script>
    $(document).ready(function() {
        $('#season-select').change(function() {
            var seasonId = $(this).val();
            $.ajax({
                url: '{{ route('set-season') }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    season_id: seasonId
                },
                success: function(response) {
                    location.reload();
                }
            });
        });

        $(document).on("click", "input[type='datetime-local']", function() {
            if (typeof this.showPicker === 'function') {
                this.showPicker();
            } else {
                $(this).focus();
            }
        });
    });
</script>
@if (isset($errors) && $errors->any())
    @foreach ($errors->all() as $error)
        <script>
            toastr.error("{{ $error }}");
        </script>
    @endforeach
@endif
<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        statusCode: {
            401: function() {
                // Session expired, redirect to login
                window.location.href = '/admin/login';
            }
        },
    });

    function send_ajax_request(reqUrl, payload, method, fileUpload, type) {

        if (!reqUrl) { return; }
        payload = payload || {};
        method = method || 'POST';
        type = type || 'JSON';

        var ajaxOption = {
            type: method,
            url: reqUrl,
            dataType: type,
            data: payload
        };

        (fileUpload) && ($.extend(ajaxOption, { processData: false, contentType: false }));
        return $.ajax(ajaxOption);
    }

    function toastr_show(p_message, p_type = 'success') {
        toastr.success(p_message);
    }

    @if (Session::has('success'))
        toastr.success("{{ Session::get('success') }}");
    @endif

    @if (Session::has('error'))
        toastr.error("{{ Session::get('error') }}");
    @endif

    @if (Session::has('info'))
        toastr.info("{{ Session::get('info') }}");
    @endif

    @if (Session::has('warning'))
        toastr.warning("{{ Session::get('warning') }}");
    @endif
</script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const editors = document.querySelectorAll('.area_editor');
        editors.forEach(editor => {
            new Jodit(editor);
        });
    });
</script>
