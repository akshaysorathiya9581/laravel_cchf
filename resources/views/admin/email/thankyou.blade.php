@extends('admin.layout')
@section('title', ' Blogs')

@section('content')

	<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

	<div class="app-main flex-column">
		<div class="d-flex flex-column flex-column-fluid">
			<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
				<div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
					<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
						<h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Email Template</h1>
						<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
							<li class="breadcrumb-item text-muted">
								<a href="javascript:void(0)" class="text-muted text-hover-primary">Home</a>
							</li>
							<li class="breadcrumb-item">
								<span class="bullet bg-gray-400 w-5px h-2px"></span>
							</li>
							<li class="breadcrumb-item text-muted">Email Template</li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<div id="kt_app_contentss" class="app-content flex-column-fluid">
			<div id="kt_app_content_container" class="app-container container-xxl">
				<div class="card card-flush">

					<div class="card-header">
						<div class="card-toolbar m-0">
							<ul class="nav nav-tabs nav-line-tabs nav-stretch fs-6 border-0 fw-bold" role="tablist">
								<li class="nav-item" role="presentation">
									<a class="nav-link justify-content-center active text-active-gray-800">Thank You</a>
								</li>
								<li class="nav-item" role="presentation">
									<a class="nav-link justify-content-center text-active-gray-800">Admin Email</a>
								</li>
								<li class="nav-item" role="presentation">
									<a class="nav-link justify-content-center text-active-gray-800">User Email</a>
								</li>
							</ul>
						</div>
					</div>

					<div class="card-body pt-0 mt-4">

						<form id="frm-email-template" action="{{ route('emailtemplate.save') }}">

							<input type="hidden" value="thankyou" name="page">
							<input type="hidden" value="{{ $campaign_id }}" name="campaign_id">

							<div class="fv-row row mb-10">
								<div class="col-md-12">
									<label class="form-label required">Subject</label>
									<input type="text" name="mail_subject" class="form-control form-control-lg form-control-solid" value="{{ $emailTemplate->subject ?? '' }}">
								</div>
							</div>

							<div class="fv-row row mb-10">
								<div class="col-md-12">
									<label class="form-label required">Message</label>
									<textarea id="emailBody" name="email_message" class="form-control form-control-lg form-control-solid" cols="30" rows="10"></textarea>
								</div>
							</div>

							<div class="mt-4 mb-10">

								<label class="form-label required">Variable</label>

								<div style="cursor: pointer">
									<span data-col="name" class="badge db-column badge-secondary">Name</span>
									<span data-col="email" class="badge db-column badge-secondary">Email</span>
									<span data-col="amount" class="badge db-column badge-secondary">Donation Amount</span>
									<span data-col="currentdate" class="badge db-column badge-secondary">Current Date</span>
								</div>
							</div>

							<button type="submit" class="btn btn-submit btn-sm btn-flex btn-info btm-sm">SUBMIT</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script>

		$(document).ready(function () {

			let editorInstance;

			ClassicEditor
				.create(document.querySelector('#emailBody'), {
    	    		toolbar: [
						'heading', '|', 'bold', 'italic', 'link', '|',
						'sourceEditing', // Enable source editing button
						'undo', 'redo'
					],
					language: 'en'
				})
				.then(editor => {
					editorInstance = editor; // Store the editor instance for later use

					editor.setData( "{!! $emailTemplate->message ?? '' !!}" );
				})
				.catch(error => {
					console.error('There was a problem initializing the editor:', error);
				});

			// Handle click event on db-column elements

			$('body').on('click', '.db-column', function () {
				colContent = '[[ ' + $(this).data('col')+ ' ]]'; // Get content from data-col attribute

				// Ensure editorInstance is available
				if (editorInstance) {
					const editor = editorInstance;
					const model = editor.model;
					const doc = model.document;

					// Get the current selection and insert content at the cursor position
					model.change(writer => {
						const selection = doc.selection;
						// Insert the content where the cursor is currently active
						writer.insertText(colContent, selection.getFirstPosition());
					});
				}
			});

			$('body').on('submit','#frm-email-template', function(e) {
				e.preventDefault()

				var formData = new FormData(this);
				_this = $(this).closest('form');
				_this.find('.btn-submit').prop('disabled',true).html('Processing...')

				$('.err-msg').remove();  // Remove existing error messages
				$.when(send_ajax_request($(this).attr('action'), formData, 'POST', true)).done(function(response) {

					if(response.success) {
						toastr_show(response.message);
						_this.find('.btn-submit').prop('disabled', false).html('Submit');
					} else {

						$.each(response.errors, function (key, value) {
							var errorElement = _this.find('input[name=' + key + '], select[name=' + key + '], textarea[name=' + key + ']');
							errorElement.after('<div class="err-msg text-danger">' + value[0] + '</div>'); // Display the first error message
						});
						$('.err-blog').closest('div').find('.form-control').focus();
						_this.find('.btn-submit').prop('disabled', false).html('Submit');
					}
				});
			})

		});

	</script>

@endsection