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
				<form class="volunteer-signup__layout">
					<div class="volunteer-signup__grid">
						<div class="volunteer-signup__card">
							<h2 class="card-title">Tell us about yourself</h2>
							<div class="volunteer-signup__card-first">
								<div class="volunteer-form-group">
									<label class="label" for="">First Name<span>*</span></label>
									<input type="text" class="volunteer-form-input" placeholder="Md Jahid Hasan">
								</div>
								<div class="volunteer-form-group">
									<label class="label" for="">Last Name<span>*</span></label>
									<input type="text" class="volunteer-form-input" placeholder="Raju">
								</div>
								<div class="volunteer-form-group">
									<label class="label" for="">Email<span>*</span></label>
									<input type="email" class="volunteer-form-input" placeholder="info@masbia.com">
								</div>
								<div class="volunteer-form-group">
									<label class="label" for="">Phone<span>*</span></label>
									<input type="text" class="volunteer-form-input" placeholder="+1 (555) 123-4567">
								</div>
								<div class="volunteer-form-group full-width">
									<label class="label" for="">Street Address<span>*</span></label>
									<input type="text" class="volunteer-form-input" placeholder="123 Main Street, Hoboken, NJ 07030">
								</div>
								<div class="volunteer-form-group">
									<label class="label" for="">City<span>*</span></label>
									<select name="" class="volunteer-form-select">
										<option value="">Jersey City</option>
									</select>
								</div>
								<div class="volunteer-form-group">
									<label class="label" for="">State<span>*</span></label>
									<select name="" class="volunteer-form-select">
										<option value="">New Jersey</option>
									</select>
								</div>
								<div class="volunteer-form-group">
									<label class="label" for="">Post Code<span>*</span></label>
									<input type="text" class="volunteer-form-input">
								</div>
								<div class="volunteer-form-group">
									<label class="label" for="">Country<span>*</span></label>
									<input type="text" class="volunteer-form-input">
								</div>
								<div class="volunteer-form-group">
									<div class="volunteer__checkbox volunteer__checkbox--sm">
										<input type="checkbox" id="email-update">
										<label for="email-update">Send me email update</label>
									</div>
								</div>
							</div>
						</div>
						<div class="volunteer-signup__card">
							<h2 class="card-title">What volunteer roles interest you?</h2>
							<div class="volunteer-signup__card-second">
								<div class="volunteer__checkbox">
									<input type="checkbox" id="fundraising-activities">
									<label for="fundraising-activities">Fundraising activities</label>
								</div>
								<div class="volunteer__checkbox">
									<input type="checkbox" id="kitchen-prep">
									<label for="kitchen-prep">Kitchen prep</label>
								</div>
								<div class="volunteer__checkbox">
									<input type="checkbox" id="bussing-tables">
									<label for="bussing-tables">Bussing tables</label>
								</div>
								<div class="volunteer__checkbox">
									<input type="checkbox" id="waitering-service">
									<label for="waitering-service">Waitering service</label>
								</div>
								<div class="volunteer__checkbox">
									<input type="checkbox" id="dishwashing-silverware-and-dishes" checked>
									<label for="dishwashing-silverware-and-dishes">Dishwashing — silverware and dishes</label>
								</div>
								<div class="volunteer__checkbox">
									<input type="checkbox" id="mopping-and-window-cleaning">
									<label for="mopping-and-window-cleaning">Mopping and window cleaning</label>
								</div>
								<div class="volunteer__checkbox">
									<input type="checkbox" id="writing-articles-for-newsletter">
									<label for="writing-articles-for-newsletter">Writing articles for newsletter</label>
								</div>
								<div class="volunteer__checkbox">
									<input type="checkbox" id="proofreading-publications">
									<label for="proofreading-publications">Proofreading publications</label>
								</div>
								<div class="volunteer__checkbox">
									<input type="checkbox" id="phone-calls-to-volunteers">
									<label for="phone-calls-to-volunteers">Phone calls to volunteers, clients, or donors</label>
								</div>
								<div class="volunteer__checkbox">
									<input type="checkbox" id="organizing-small-parties">
									<label for="organizing-small-parties">Organizing small parties and special events</label>
								</div>
								<div class="volunteer__checkbox">
									<input type="checkbox" id="data-light-clerical">
									<label for="data-light-clerical">Data entry/light clerical work</label>
								</div>
								<div class="volunteer__checkbox">
									<input type="checkbox" id="hand-addressing">
									<label for="hand-addressing">Hand addressing envelopes to benefit events</label>
								</div>
								<div class="volunteer__checkbox">
									<input type="checkbox" id="conducting-research">
									<label for="conducting-research">Conducting research for development staff</label>
								</div>
								<div class="volunteer__checkbox">
									<input type="checkbox" id="giving-out-fliers">
									<label for="giving-out-fliers">Giving out fliers with our hours of operation and address to potential people in need</label>
								</div>
								<div class="volunteer__checkbox">
									<input type="checkbox" id="hosting-people-as-they-walk">
									<label for="hosting-people-as-they-walk">Maitre d' — hosting people as they walk in and seating them</label>
								</div>
								<div class="volunteer__checkbox">
									<input type="checkbox" id="facility-maintenance-workdays">
									<label for="facility-maintenance-workdays">Facility maintenance workdays (painting, carpentry, etc.)</label>
								</div>
							</div>
						</div>
						<div class="volunteer-signup__card">
							<h2 class="card-title">What type of volunteering opportunity <span>are you looking for?</span></h2>
							<div class="volunteer-signup__card-third">
								<div class="volunteer-form-group">
									<label class="label" for="">Please select an option<span>*</span></label>
									<select name="" class="volunteer-form-select">
										<option value="">Please Select one option</option>
										<option value="">An ongoing opportunity</option>
										<option value="">Occasional opportunity</option>
										<option value="">One-time</option>
									</select>
								</div>
								<div class="volunteer__as-group">
									<div class="volunteer__checkbox volunteer__checkbox--sm">
										<input type="checkbox" id="volunteering-group">
										<label for="volunteering-group">I’m volunteering as a group</label>
									</div>
									<div class="volunteer__group-view" id="viewVolunteeringGroup">
										<div class="volunteer-form-group">
											<label class="label" for="">What is the name for your group?<span>*</span></label>
											<input type="text" class="volunteer-form-input" placeholder="">
										</div>
										<div class="volunteer-form-group">
											<label class="label" for="">How many adults are in your group?<span>*</span></label>
											<input type="text" class="volunteer-form-input" placeholder="">
										</div>
										<div class="volunteer-form-group">
											<label class="label" for="">How many children are in your group?<span>*</span></label>
											<input type="text" class="volunteer-form-input" placeholder="">
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
									<textarea class="volunteer-form-textarea" placeholder="" rows="6" cols="10"></textarea>
								</div>
							</div>
						</div>
						<div class="volunteer-signup__card">
							<h2 class="card-title">Where would you like to volunteer?</h2>
							<p class="card-des">Please click the logo to select your preferred venue(s):<span>*</span></p>
							<div class="volunteer-signup__card-fifth">
								<div class="volunteer__checkbox">
									<input type="checkbox" id="masbia-of-flatbush">
									<label for="masbia-of-flatbush">Masbia of Flatbush <span>1372 Coney Island Ave Brooklyn, NY 11230 718-972-4446 x208</span></label>
								</div>
								<div class="volunteer__checkbox">
									<input type="checkbox" id="masbia-of-queens">
									<label for="masbia-of-queens">Masbia of Queens <span>105-47 64th Rd Forest Hills, NY 11375 718-972-4446 x207</span></label>
								</div>
								<div class="volunteer__checkbox">
									<input type="checkbox" id="masbia-of-queens2">
									<label for="masbia-of-queens2">Masbia of Queens <span>5402 New Utrecht Ave Brooklyn, NY 11219 866-962-7242 x205</span></label>
								</div>
							</div>
						</div>
						<div class="volunteer-signup__card">
							<h2 class="card-title">When can you volunteer?</h2>
							<p class="card-des">The locations you selected to volunteer at have the following schedules:</p>
							<div class="volunteer-signup__card-sixth">
								<div class="volunteer-form-group">
									<label class="label" for="">What days are you available?<span>*</span></label>
									<div class="volunteer__checkbox">
										<input type="checkbox" id="Monday">
										<label for="Monday">Monday</label>
									</div>
									<div class="volunteer__checkbox">
										<input type="checkbox" id="Tuesday">
										<label for="Tuesday">Tuesday</label>
									</div>
									<div class="volunteer__checkbox">
										<input type="checkbox" id="Wednesday">
										<label for="Wednesday">Wednesday</label>
									</div>
									<div class="volunteer__checkbox">
										<input type="checkbox" id="Thursday">
										<label for="Thursday">Thursday</label>
									</div>
									<div class="volunteer__checkbox">
										<input type="checkbox" id="Friday">
										<label for="Friday">Friday</label>
									</div>
								</div>
								<div class="volunteer-form-group">
									<label class="label" for="">What times are you available?<span>*</span></label>
									<div class="volunteer__checkbox">
										<input type="checkbox" id="Morning">
										<label for="Morning">Morning</label>
									</div>
									<div class="volunteer__checkbox">
										<input type="checkbox" id="Afternoon">
										<label for="Afternoon">Afternoon</label>
									</div>
									<div class="volunteer__checkbox">
										<input type="checkbox" id="Evening">
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
									<input type="text" class="volunteer-form-input" placeholder="">
								</div>
								<div class="volunteer-form-group">
									<label class="label" for="">Relationship<span>*</span></label>
									<input type="text" class="volunteer-form-input" placeholder="">
								</div>
							</div>
						</div>
					</div>
					<button type="button" class="btn btn--green">Submit Volunteer Info</button>
				</form>
			</div>
		</section>

	</main>

@section('scripts')

	<script>
	</script>

@endsection

@include('frontend.templates.masbia-template.includes.footer')