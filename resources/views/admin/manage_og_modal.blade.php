{{-- MANAGE OG PROPERTIES --}}
<div class="modal fade" id="manage_og_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content modal-rounded">
            <div class="modal-header d-flex justify-content-between" style="padding: 12px 14px 8px 18px;">
                <h2>Manage OG Properties</h2>
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <i class="fas fa-times"></i>
                </div>
            </div>

            <form action="{{ route('admin.updateogdata') }}" id="updateOgData" enctype="multipart/form-data" method="POST">
                <div class="modal-body scroll-y m-3" style="max-height: 70vh;overflow: auto;">
                    @csrf
                    <div class="card-body">
                        <div class="w-100">

                            <div class="fv-row row mb-10 d- none">
                                <div class="col-md-12">
                                    <input type="hidden" name="campaign_id" value="17">
                                    <label class="form-label required">Page</label>
                                    <select name="og_page" class="form-control form-control-lg form-control-solid">
                                        <option value="home">Home</option>
                                        <option value="donation">Donation</option>
                                        <option value="blog" selected>Blog</option>
                                        <option value="volunteer">Volunteer</option>
                                    </select>
                                </div>
                            </div>

                            <div class="fv-row row mb-10">
                                <div class="col-md-12">
                                    <label class="form-label required">Title</label>
                                    <input type="text" name="og_title" class="form-control form-control-lg form-control-solid" />
                                </div>
                            </div>

                            <div class="fv-row row mb-10">
                                <div class="col-md-12">
                                    <label class="form-label required">Description</label>
                                    <textarea name="og_description" class="form-control form-control-lg form-control-solid"></textarea>
                                </div>
                            </div>

                            <div class="fv-row mb-10">
                                <label class="d-block fw-semibold fs-6 mb-5">
                                    <span class=""> Image</span>
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                        title="E.g. Select a logo to represent the company that's running the campaign."></i>
                                </label>

                                <div class="image-input image-input-empty image-input-outline image-input-placeholder"
                                    data-kt-image-input="true">
                                    <div id="og_image" class="image-input-wrapper w-125px h-125px">
                                    </div>

                                    <label
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change">
                                        <i class="fas fa-pencil-alt fs-7"></i>
                                        <input type="file" name="og_image" accept=".png, .jpg, .jpeg" />
                                        <input type="hidden" name="old_og_image" value="" />
                                    </label>
                                    <span
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel  ">
                                        <i class="fas fa-times fs-2"></i>
                                    </span>
                                    <span
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove  ">
                                        <i class="fas fa-times fs-2"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-submit btn-lg btn-primary"
                        data-kt-element="type-next"><span class="indicator-label">Submit</span>
                    </button>
                </div>
            </form>
            <!--begin::Modal body-->
        </div>
    </div>
</div>

<script>

    $('body').on('click','#manageOg',function(){

        $.when(send_ajax_request('{{ route("admin.getoginfo") }}', {'page':$('select[name="og_page"]').val()}, 'GET')).done(function(response) {

            $('#manage_og_modal').modal('show');

            if (response.success) {
                var og_properties = response.data.og_properties;

                if(og_properties) {
                    $('input[name="og_title"]').val(og_properties.og_title);
                    $('textarea[name="og_description"]').val(og_properties.og_description);

                    $('input[name="old_og_image"]').val(og_properties.og_image)
                    $('#og_image').css('background-image', 'url(' + og_properties.og_image + ')')
                }
            }
        })
    })

    $('#updateOgData').on('submit', function (e) {
        e.preventDefault();

        var formData = new FormData(this);
        // formData.append('page','blog');
        _this = $(this).closest('form');
        toggleButton(_this.find('.btn-submit'),true);

        $.when(send_ajax_request($(this).attr('action'), formData, 'POST', true)).done(function(response) {

            toastr_show(response.message);
            toggleButton(_this.find('.btn-submit'),false,'SUBMIT');
            $('#manage_og_modal').modal('hide');

        }).fail(function(xhr) {

            toggleButton(_this.find('.btn-submit'),false,'SUBMIT');

            if (xhr.status == 422) {
                
                var errors = xhr.responseJSON.errors;

                $('.err-msg').remove();  // Remove existing error messages
                $.each(errors, function (key, value) {
                    var errorElement = _this.find('input[name=' + key + '], select[name=' + key + '], textarea[name=' + key + ']');
                    errorElement.after('<div class="err-msg text-danger">' + value[0] + '</div>'); // Display the first error message
                });
                $('.err-blog').closest('div').find('.form-control').focus();
            }
        });
    });
</script>