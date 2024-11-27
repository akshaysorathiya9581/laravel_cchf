@section('title', 'Masbia')
@include('frontend.templates.masbia-template.includes.header')

	<main class="main-sponsorship">
		<section class="hero-breadcrumb">
			<div class="hero-breadcrumb__img">
				<img src="{{ asset('assets/frontend/templates/masbia/images/food-banner.jpg') }}" alt="">
			</div>
			<div class="container">
				<div class="hero-breadcrumb__inner">
					<h1><strong>Volunteer Signup</strong></h1>
				</div>
			</div>
		</section>

		<section class="volunteer-signup">
			<div class="container">
				<form class="volunteer-signup__layout" action="{{ route('volunteer.save') }}" id="frm-volunteer">
					<div class="volunteer-signup__grid">
						<div class="volunteer-signup__card">
							<h2 class="card-title">Tell us about yourself</h2>
							<div class="volunteer-signup__card-first">
								<div class="volunteer-form-group">
									<label class="label" for="">First Name<span>*</span></label>
									<input type="text" name="first_name" class="volunteer-form-input" placeholder="Md Jahid Hasan">
								</div>
								<div class="volunteer-form-group">
									<label class="label" for="">Last Name<span>*</span></label>
									<input type="text" name="last_name" class="volunteer-form-input" placeholder="Raju">
								</div>
								<div class="volunteer-form-group">
									<label class="label" for="">Email<span>*</span></label>
									<input type="email" class="volunteer-form-input" name="email_id" placeholder="info@masbia.com">
								</div>
								<div class="volunteer-form-group">
									<label class="label" for="">Phone<span>*</span></label>
									<input type="text" class="volunteer-form-input" name="phone_no" placeholder="+1 (555) 123-4567">
								</div>
								<div class="volunteer-form-group full-width">
									<label class="label" for="">Street Address<span>*</span></label>
									<input type="text" class="volunteer-form-input" name="address" placeholder="123 Main Street, Hoboken, NJ 07030">
								</div>
								<div class="volunteer-form-group">
									<label class="label" for="">City<span>*</span></label>
									<select name="city" class="volunteer-form-select">
										<option value="Jersey City">Jersey City</option>
									</select>
								</div>
								<div class="volunteer-form-group">
									<label class="label" for="">State<span>*</span></label>
									<select name="state" class="volunteer-form-select">
										<option value="New Jersey">New Jersey</option>
									</select>
								</div>
								<div class="volunteer-form-group">
									<label class="label" for="">Post Code<span>*</span></label>
									<input type="text" name="post_code" class="volunteer-form-input">
								</div>
								<div class="volunteer-form-group">
									<label class="label" for="">Country<span>*</span></label>
									<input type="text" name="country" class="volunteer-form-input">
								</div>
								<div class="volunteer-form-group">
									<div class="volunteer__checkbox volunteer__checkbox--sm">
										<input type="checkbox" name="email_updates" value="yes" id="email-update">
										<label for="email-update">Send me email update</label>
									</div>
								</div>
							</div>
						</div>
						<div class="volunteer-signup__card">
							<h2 class="card-title" id="sc-roles">What volunteer roles interest you?</h2>
							<div class="volunteer-signup__card-second">
								<div class="volunteer__checkbox">
									<input type="checkbox" id="fundraising-activities" name="roles[]" value="Fundraising activities">
									<label for="fundraising-activities">Fundraising activities</label>
								</div>
								<div class="volunteer__checkbox">
									<input type="checkbox" id="kitchen-prep" name="roles[]" value="Kitchen prep">
									<label for="kitchen-prep">Kitchen prep</label>
								</div>
								<div class="volunteer__checkbox">
									<input type="checkbox" id="bussing-tables" name="roles[]" value="Bussing tables">
									<label for="bussing-tables">Bussing tables</label>
								</div>
								<div class="volunteer__checkbox">
									<input type="checkbox" id="waitering-service" name="roles[]" value="Waitering service">
									<label for="waitering-service">Waitering service</label>
								</div>
								<div class="volunteer__checkbox">
									<input type="checkbox" id="dishwashing-silverware-and-dishes" name="roles[]" value="Dishwashing — silverware and dishes">
									<label for="dishwashing-silverware-and-dishes">Dishwashing — silverware and dishes</label>
								</div>
								<div class="volunteer__checkbox">
									<input type="checkbox" id="mopping-and-window-cleaning" name="roles[]" value="Mopping and window cleaning">
									<label for="mopping-and-window-cleaning">Mopping and window cleaning</label>
								</div>
								<div class="volunteer__checkbox">
									<input type="checkbox" id="writing-articles-for-newsletter" name="roles[]" value="Writing articles for newsletter">
									<label for="writing-articles-for-newsletter">Writing articles for newsletter</label>
								</div>
								<div class="volunteer__checkbox">
									<input type="checkbox" id="proofreading-publications" name="roles[]" value="Proofreading publications">
									<label for="proofreading-publications">Proofreading publications</label>
								</div>
								<div class="volunteer__checkbox">
									<input type="checkbox" id="phone-calls-to-volunteers" name="roles[]" value="Phone calls to volunteers, clients, or donors">
									<label for="phone-calls-to-volunteers">Phone calls to volunteers, clients, or donors</label>
								</div>
								<div class="volunteer__checkbox">
									<input type="checkbox" id="organizing-small-parties" name="roles[]" value="Organizing small parties and special events">
									<label for="organizing-small-parties">Organizing small parties and special events</label>
								</div>
								<div class="volunteer__checkbox">
									<input type="checkbox" id="data-light-clerical" name="roles[]" value="Data entry/light clerical work">
									<label for="data-light-clerical">Data entry/light clerical work</label>
								</div>
								<div class="volunteer__checkbox">
									<input type="checkbox" id="hand-addressing" name="roles[]" value="Hand addressing envelopes to benefit events">
									<label for="hand-addressing">Hand addressing envelopes to benefit events</label>
								</div>
								<div class="volunteer__checkbox">
									<input type="checkbox" id="conducting-research" name="roles[]" value="Conducting research for development staff">
									<label for="conducting-research">Conducting research for development staff</label>
								</div>
								<div class="volunteer__checkbox">
									<input type="checkbox" id="giving-out-fliers" name="roles[]" value="Giving out fliers with our hours of operation and address to potential people in need">
									<label for="giving-out-fliers">Giving out fliers with our hours of operation and address to potential people in need</label>
								</div>
								<div class="volunteer__checkbox">
									<input type="checkbox" id="hosting-people-as-they-walk" name="roles[]" value="Maitre d' — hosting people as they walk in and seating them">
									<label for="hosting-people-as-they-walk">Maitre d' — hosting people as they walk in and seating them</label>
								</div>
								<div class="volunteer__checkbox">
									<input type="checkbox" id="facility-maintenance-workdays" name="roles[]" value="Facility maintenance workdays (painting, carpentry, etc.)">
									<label for="facility-maintenance-workdays">Facility maintenance workdays (painting, carpentry, etc.)</label>
								</div>
							</div>
						</div>
						<div class="volunteer-signup__card">
							<h2 class="card-title">What type of volunteering opportunity <span>are you looking for?</span></h2>
							<div class="volunteer-signup__card-third">
								<div class="volunteer-form-group">
									<label class="label" for="">Please select an option<span>*</span></label>
									<select name="vol_opportunity" class="volunteer-form-select">
										<option value="">Please Select one option</option>
										<option value="An ongoing opportunity">An ongoing opportunity</option>
										<option value="Occasional opportunity">Occasional opportunity</option>
										<option value="One-time">One-time</option>
									</select>
								</div>
								<div class="volunteer__as-group">
									<div class="volunteer__checkbox volunteer__checkbox--sm">
										<input type="checkbox" name="is_group" value="yes" id="volunteering-group">
										<label for="volunteering-group">I’m volunteering as a group</label>
									</div>
									<div class="volunteer__group-view" id="viewVolunteeringGroup">
										<div class="volunteer-form-group">
											<label class="label" for="">What is the name for your group?<span>*</span></label>
											<input type="text" class="volunteer-form-input" name="group_name" placeholder="">
										</div>
										<div class="volunteer-form-group">
											<label class="label" for="">How many adults are in your group?<span>*</span></label>
											<input type="number" class="volunteer-form-input" name="adults_in_group" placeholder="">
										</div>
										<div class="volunteer-form-group">
											<label class="label" for="">How many children are in your group?<span>*</span></label>
											<input type="number" class="volunteer-form-input" name="children_in_group" placeholder="">
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="volunteer-signup__card">
							<h2 class="card-title">Do you have any special skills?</h2>
							<p class="card-des">Please tell us more about your skills, education, and background. Feel free to include any skills you would like to learn from us:<span>*</span></p>
							<div class="volunteer-signup__card-forth">
								<div class="volunteer-form-group">
									<textarea class="volunteer-form-textarea" name="special_skills" placeholder="" rows="6" cols="10"></textarea>
								</div>
							</div>
						</div>
						<div class="volunteer-signup__card">
							<h2 class="card-title">Where would you like to volunteer?</h2>
							<p class="card-des" id="sc-venue">Please click the logo to select your preferred venue(s):<span>*</span></p>
							<div class="volunteer-signup__card-fifth">
								<div class="volunteer__checkbox">
									<input type="checkbox" name="venue[]" value="Masbia of Flatbush, 1372 Coney Island Ave Brooklyn, NY 11230 718-972-4446 x208" id="masbia-of-flatbush">
									<label for="masbia-of-flatbush">Masbia of Flatbush <span>1372 Coney Island Ave Brooklyn, NY 11230 718-972-4446 x208</span></label>
								</div>
								<div class="volunteer__checkbox">
									<input type="checkbox" name="venue[]" value="Masbia of Queens, 105-47 64th Rd Forest Hills, NY 11375 718-972-4446 x207" id="masbia-of-queens">
									<label for="masbia-of-queens">Masbia of Queens <span>105-47 64th Rd Forest Hills, NY 11375 718-972-4446 x207</span></label>
								</div>
								<div class="volunteer__checkbox">
									<input type="checkbox" id="masbia-of-queens2" name="venue[]" value="Masbia of Queens, 5402 New Utrecht Ave Brooklyn, NY 11219 866-962-7242 x205">
									<label for="masbia-of-queens2">Masbia of Queens <span>5402 New Utrecht Ave Brooklyn, NY 11219 866-962-7242 x205</span></label>
								</div>
							</div>
						</div>
						<div class="volunteer-signup__card">
							<h2 class="card-title">When can you volunteer?</h2>
							<p class="card-des">The locations you selected to volunteer at have the following schedules:</p>
							<div class="volunteer-signup__card-sixth">
								<div class="volunteer-form-group">
									<label class="label" for="" id="sc-avail_day">What days are you available?<span>*</span></label>
									<div class="volunteer__checkbox">
										<input type="checkbox" name="avail_day[]" value="monday" id="Monday">
										<label for="Monday">Monday</label>
									</div>
									<div class="volunteer__checkbox">
										<input type="checkbox" id="Tuesday" name="avail_day[]" value="tuesday">
										<label for="Tuesday">Tuesday</label>
									</div>
									<div class="volunteer__checkbox">
										<input type="checkbox" id="Wednesday" name="avail_day[]" value="wednesday">
										<label for="Wednesday">Wednesday</label>
									</div>
									<div class="volunteer__checkbox">
										<input type="checkbox" id="Thursday" name="avail_day[]" value="thursday">
										<label for="Thursday">Thursday</label>
									</div>
									<div class="volunteer__checkbox">
										<input type="checkbox" id="Friday" name="avail_day[]" value="friday">
										<label for="Friday">Friday</label>
									</div>
								</div>
								<div class="volunteer-form-group">
									<label class="label" for="" id="sc-avail_time">What times are you available?<span>*</span></label>
									<div class="volunteer__checkbox">
										<input type="checkbox" id="Morning" name="avail_time[]" value="morning">
										<label for="Morning">Morning</label>
									</div>
									<div class="volunteer__checkbox">
										<input type="checkbox" id="Afternoon" name="avail_time[]" value="afternoon">
										<label for="Afternoon">Afternoon</label>
									</div>
									<div class="volunteer__checkbox">
										<input type="checkbox" id="Evening" name="avail_time[]" value="evening">
										<label for="Evening">Evening</label>
									</div>
								</div>
							</div>
						</div>
						<div class="volunteer-signup__card">
							<h2 class="card-title">Please enter information about your emergency contact</h2>
							<div class="volunteer-signup__card-last">
								<div class="volunteer-form-group">
									<label class="label" for="">Emergency Contact Phone<span>*</span></label>
									<input type="text" class="volunteer-form-input" name="emergency_contact" placeholder="">
								</div>
								<div class="volunteer-form-group">
									<label class="label" for="">Relationship<span>*</span></label>
									<input type="text" class="volunteer-form-input" name="contact_relationship" placeholder="">
								</div>
							</div>
						</div>
					</div>
					<button type="submit" class="btn btn--green">Submit Volunteer Info</button>
				</form>
			</div>
		</section>

	</main>

@section('scripts')

	<script>
	</script>

@endsection

<script>
	$(document).ready(function () {

		$('body').on('change','#volunteering-group',function() {
			$('#viewVolunteeringGroup').css('display',($(this).prop('checked') ? 'block' : 'none'))
		});

		$('body').on('submit','#frm-volunteer',function(e) {
			e.preventDefault();

			var formData = new FormData(this);
			formData.append('is_group',($('#volunteering-group').prop('checked')) ? 'yes' : '');
			$('.err-msg').remove();  // Remove existing error messages

			_this = $(this);
			blockUI_page(_this, true);

			$.when(send_ajax_request($(this).attr('action'), formData, 'POST', true)).done(function(response) {

				$('#frm-volunteer')[0].reset()

				toastr_show(response.message, 'success');
				blockUI_page(_this, false);
			}).fail(function(xhr) {


				blockUI_page(_this, false);

				if (xhr.status == 422) {

					var errors = xhr.responseJSON.errors;

					$.each(errors, function (key, value) {

						if($.inArray(key, ['avail_day','avail_time','roles','venue']) !== -1) {
							var errorElement = $('#sc-'+key);
						} else {
							var errorElement = _this.find('input[name=' + key + '], select[name=' + key + '], textarea[name=' + key + ']');
						}
						errorElement.after('<div class="err-msg text-danger">' + value[0] + '</div>'); // Display the first error message
					});
				}
			});
		})
	});
</script>

@include('frontend.templates.masbia-template.includes.footer')