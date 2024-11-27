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
					
					<div class="card-header p-4">
						<div class="d-flex w-100 row">
							<div class="col-md-6">
								<h3> Email Template </h3>
							</div>
						</div>
					</div>

					<div class="card-body pt-0 mt-4">

						<form id="frm-email-template" action="{{ route('emailtemplate.save') }}">
							<input type="hidden" value="{{ $campaign_id }}" name="campaign_id">

							<div class="fv-row row mb-10">
								<div class="col-md-12">
									<label class="form-label required">Email Template</label>
									<select name="mail_page" class="form-control form-control-lg form-control-solid">
										<option value="thankyou" data-to="user">Thank You (Donor Email)</option>
										<option value="donation_notification" data-to="admin">Admin Email (Donation Notification)</option>
									</select>
								</div>
							</div>

							<div class="fv-row row mb-10 admin-emails" style="display: none">
								<div class="col-md-12">
									<label class="form-label required">To</label>
									<input type="text" name="admin_emails" placeholder="john@gmail.com,jack@gmail.com" class="form-control form-control-lg form-control-solid">
								</div>
							</div>

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

								<label class="form-label">Variables</label>

								<div style="cursor: pointer">
									<span data-col="NAME" class="badge db-column badge-secondary">DONER NAME</span>
									<span data-col="EMAIL" class="badge db-column badge-secondary">EMAIL</span>
									<span data-col="CAMPAIGN" class="badge db-column badge-secondary">CAMPAIGN</span>
									<span data-col="AMOUNT" class="badge db-column badge-secondary">DONATED AMOUNT</span>
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
			var activeInput = '';

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

					$(editor.ui.view.editable.element).on('focus', function() {
						activeInput = 'message';
					});
				})
				.catch(error => {
					console.error('There was a problem initializing the editor:', error);
				});

			
			// Fetch email setting on change of name="mail_page"
			$('body').on('change','select[name="mail_page"]',function (e) { 
				e.preventDefault();
				var page = $(this).val();

				toggleButton($('.btn-submit'),true);
				$('.err-msg').remove();

				var to = $(this).find('option:selected').data('to');
				$('.admin-emails').css('display', (to === 'admin') ? 'block' : 'none');

				$.when(send_ajax_request("{{ route('email.get-settings') }}", { page:page, campaign_id:$('input[name="campaign_id"]').val() }, 'GET')).done(function(response) {

					toggleButton($('.btn-submit'),false,'SUBMIT');

					// Reset formdata
					$('#frm-email-template input[type="text"]').val('')
					editorInstance.setData('');

					if(response.data) {
						$('input[name="mail_subject"]').val(response.data.subject);
						$('input[name="admin_emails"]').val(response.data.admin_emails);
						editorInstance.setData( response.data.message );
					}
				});
			});

			$('select[name="mail_page"]').change()

			$('body').on('focus','input[name="mail_subject"]',function() {
				activeInput = 'subject';
			})
			$('body').on('focus','textarea[name="email_message"]',function() {
				activeInput = 'message';
			})

			// Handle click event on db-column elements
			$('body').on('click', '.db-column', function () {

				colContent = '[[ ' + $(this).data('col')+ ' ]]'; // Get dbcol name from data-col attribute
				(activeInput == 'subject') ? editSubject(colContent) : editMessage(colContent);
			});

			// Add Db column in subject
			function editSubject(colContent) {

				const activeInput = $('input[name="mail_subject"]')[0];

				const cursorPosition = activeInput.selectionStart; // Get the current cursor position in the input field

				// Split the input value around the cursor position
				const valueBefore = activeInput.value.substring(0, cursorPosition);
				const valueAfter = activeInput.value.substring(cursorPosition);

				// Insert the content at the cursor position
				activeInput.value = valueBefore + colContent + valueAfter;
				activeInput.selectionStart = activeInput.selectionEnd = cursorPosition + colContent.length;
				activeInput.focus()
			}

			function editMessage(colContent) {

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
			}

			$('body').on('submit','#frm-email-template', function(e) {
				e.preventDefault()

				var formData = new FormData(this);
				_this = $(this).closest('form');
				toggleButton(_this.find('.btn-submit'),true);

				$('.err-msg').remove();  // Remove existing error messages
				$.when(send_ajax_request($(this).attr('action'), formData, 'POST', true)).done(function(response) {

					toggleButton(_this.find('.btn-submit'),false,'SUBMIT');
					if(response.success) {
						toastr_show(response.message);
					} else {

						$.each(response.errors, function (key, value) {
							var errorElement = _this.find('input[name=' + key + '], select[name=' + key + '], textarea[name=' + key + ']');
							errorElement.after('<div class="err-msg text-danger">' + value[0] + '</div>'); // Display the first error message
						});
						$('.err-blog').closest('div').find('.form-control').focus();
					}
				});
			});
		});

	</script>

@endsection