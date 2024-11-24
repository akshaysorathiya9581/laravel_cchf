@section('title', 'Masbia')
@include('frontend.templates.masbia-template.includes.header')

	<main>
		<section class="user">

			@include('frontend.templates.masbia-template.components.user-sidebar')

			<div class="user__content user__content--billing">
				<h1 class="user-title">Billing</h1>

				<div class="billing-heading">
					<p class="billing-title">Transactions & Subscriptions</p>
					<p class="billing-subtitle">View your transactions and manage your subscriptions</p>
				</div>

				<div class="user-billing">
					<table class="table user-billing__table" id="user-billing">
						<thead>
							<tr>
								<th>Campaign</th>
								<th>Date</th>
								<th>Amount</th>
								<th>Type</th>
								<th>End Date</th>
								<th>Status</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<!-- Billing list will come dynamic from ajax -->
						</tbody>
					</table>
				</div>

				<nav class="custom-pagination" aria-label="" id="billing-pages">
					<!-- Pagination pages will come dynamic from ajax -->
				</nav>

				<div class="billing-heading">
				<p class="billing-title mb-0">Payment Methods</p>
				</div>

				<div class="user-payment">
				<div class="user-payment__box">
					<span class="user-payment__card-name">Credit Card</span>
					<span class="user-payment__card-default">Default</span>
					<div>
					<div class="user-payment__card-num">
						<img src="images/payment/mastercard.svg" width="59" height="40" alt="Card Icon">
						<span class="num">**** **** ***3520</span>
					</div>
					<div class="user-payment__card-crud">
						<a href="#" class="cart-edit">
						<svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path
							d="M13.475 3.40783L15.592 5.52483M14.836 1.54283L9.109 7.26983C8.81309 7.56533 8.61128 7.94181 8.529 8.35183L8 10.9998L10.648 10.4698C11.058 10.3878 11.434 10.1868 11.73 9.89083L17.457 4.16383C17.6291 3.99173 17.7656 3.78742 17.8588 3.56256C17.9519 3.33771 17.9998 3.09671 17.9998 2.85333C17.9998 2.60994 17.9519 2.36895 17.8588 2.14409C17.7656 1.91923 17.6291 1.71492 17.457 1.54283C17.2849 1.37073 17.0806 1.23421 16.8557 1.14108C16.6309 1.04794 16.3899 1 16.1465 1C15.9031 1 15.6621 1.04794 15.4373 1.14108C15.2124 1.23421 15.0081 1.37073 14.836 1.54283Z"
							stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
							<path
							d="M16 13V16C16 16.5304 15.7893 17.0391 15.4142 17.4142C15.0391 17.7893 14.5304 18 14 18H3C2.46957 18 1.96086 17.7893 1.58579 17.4142C1.21071 17.0391 1 16.5304 1 16V5C1 4.46957 1.21071 3.96086 1.58579 3.58579C1.96086 3.21071 2.46957 3 3 3H6"
							stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
						</svg>
						</a>
						<a href="#" class="cart-delete">
						<svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path
							d="M8.88667 3.42667V2.94133C8.88667 2.2618 8.88667 1.92204 8.75442 1.66249C8.6381 1.43419 8.45248 1.24857 8.22418 1.13225C7.96463 1 7.62486 1 6.94533 1H5.97467C5.29514 1 4.95537 1 4.69583 1.13225C4.46752 1.24857 4.28191 1.43419 4.16558 1.66249C4.03333 1.92204 4.03333 2.2618 4.03333 2.94133V3.42667M5.24667 6.76333V9.79667M7.67333 6.76333V9.79667M1 3.42667H11.92M10.7067 3.42667V10.2213C10.7067 11.2406 10.7067 11.7503 10.5083 12.1396C10.3338 12.4821 10.0554 12.7605 9.71293 12.935C9.32361 13.1333 8.81396 13.1333 7.79467 13.1333H5.12533C4.10604 13.1333 3.59639 13.1333 3.20707 12.935C2.86462 12.7605 2.58619 12.4821 2.4117 12.1396C2.21333 11.7503 2.21333 11.2406 2.21333 10.2213V3.42667"
							stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" />
						</svg>
						</a>
						<a href="#" class="delete_btn"></a>
					</div>
					</div>
				</div>
				<div class="user-payment__box">
					<span class="user-payment__card-name">Debit Card</span>
					<div>
					<div class="user-payment__card-num">
						<img src="images/payment/visa.svg" width="59" height="40" alt="Card Icon">
						<span class="num">**** **** ***3520</span>
					</div>
					<div class="user-payment__card-crud">
						<a href="#" class="cart-edit">
						<svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path
							d="M13.475 3.40783L15.592 5.52483M14.836 1.54283L9.109 7.26983C8.81309 7.56533 8.61128 7.94181 8.529 8.35183L8 10.9998L10.648 10.4698C11.058 10.3878 11.434 10.1868 11.73 9.89083L17.457 4.16383C17.6291 3.99173 17.7656 3.78742 17.8588 3.56256C17.9519 3.33771 17.9998 3.09671 17.9998 2.85333C17.9998 2.60994 17.9519 2.36895 17.8588 2.14409C17.7656 1.91923 17.6291 1.71492 17.457 1.54283C17.2849 1.37073 17.0806 1.23421 16.8557 1.14108C16.6309 1.04794 16.3899 1 16.1465 1C15.9031 1 15.6621 1.04794 15.4373 1.14108C15.2124 1.23421 15.0081 1.37073 14.836 1.54283Z"
							stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
							<path
							d="M16 13V16C16 16.5304 15.7893 17.0391 15.4142 17.4142C15.0391 17.7893 14.5304 18 14 18H3C2.46957 18 1.96086 17.7893 1.58579 17.4142C1.21071 17.0391 1 16.5304 1 16V5C1 4.46957 1.21071 3.96086 1.58579 3.58579C1.96086 3.21071 2.46957 3 3 3H6"
							stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
						</svg>
						</a>
						<a href="#" class="cart-delete">
						<svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path
							d="M8.88667 3.42667V2.94133C8.88667 2.2618 8.88667 1.92204 8.75442 1.66249C8.6381 1.43419 8.45248 1.24857 8.22418 1.13225C7.96463 1 7.62486 1 6.94533 1H5.97467C5.29514 1 4.95537 1 4.69583 1.13225C4.46752 1.24857 4.28191 1.43419 4.16558 1.66249C4.03333 1.92204 4.03333 2.2618 4.03333 2.94133V3.42667M5.24667 6.76333V9.79667M7.67333 6.76333V9.79667M1 3.42667H11.92M10.7067 3.42667V10.2213C10.7067 11.2406 10.7067 11.7503 10.5083 12.1396C10.3338 12.4821 10.0554 12.7605 9.71293 12.935C9.32361 13.1333 8.81396 13.1333 7.79467 13.1333H5.12533C4.10604 13.1333 3.59639 13.1333 3.20707 12.935C2.86462 12.7605 2.58619 12.4821 2.4117 12.1396C2.21333 11.7503 2.21333 11.2406 2.21333 10.2213V3.42667"
							stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" />
						</svg>
						</a>
						<a href="#" class="delete_btn"></a>
					</div>
					</div>
				</div>
				<div class="user-payment__box user-payment__box--add">
					<div class="user-payment__card-crud">
					<a href="#" class="cart-add">
						<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M8 1V15M1 8H15" stroke="currentColor" stroke-width="2" stroke-linecap="round"
							stroke-linejoin="round" />
						</svg>
					</a>
					</div>
				</div>
				</div>
			</div>
		</section>
	</main>

	<div class="custom-modal" id="oneTimeDonationModal">
		<div class="custom-modal__overlay"></div>
		<div class="custom-modal__dialog custom-modal__dialog--onetime-popup">
			<div class="custom-modal__content custom-modal__content--onetime-popup">
				<button type="button" class="custom-modal__close">
					<img src="images/icons/close.svg" alt="">
				</button>
				<h2 class="custom-modal__heading">One-Time Donation</h2>
				<div class="billing-donation">
					<div class="billing-donation__status">
						<span>Status</span>
						<span class="process payStatus"></span>
					</div>
					<div class="transaction-details">
						<h3 class="transaction-title">Transaction Details</h3>
						<div class="transaction-details__list">
							<div>
							<h4 class="title">Campaign</h4>
							<div class="view__details">
								<span class="text campaignName">Donation</span>
							</div>
							</div>
							<div>
							<h4 class="title">Amount</h4>
							<div class="view__details">
								<span class="text donationAmount"></span>
							</div>
							</div>
							<div>
							<h4 class="title">Transaction Fee</h4>
							<div class="view__details">
								<span class="text transactionFee"></span>
							</div>
							</div>
							<div>
							<h4 class="title">Transaction Date</h4>
							<div class="view__details">
								<span class="text transactionDate"></span>
							</div>
							</div>
							<div>
							<h4 class="title">Type</h4>
							<div class="view__details">
								<span class="text recurringType"></span>
							</div>
							</div>
							<div>
							<h4 class="title">Payment Method</h4>
							<div class="view__details">
								<span class="text payMethod"></span>
							</div>
							</div>
						</div>
						<div class="transaction-details__list">
							<div class="align-center">
							<h4 class="title">Request Refund</h4>
							<div class="view__details">
								<a class="btn-refund" href="#">                      
								<svg width="26" height="22" viewBox="0 0 26 22" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M12.3684 17.4706H4.78947C3.78444 17.4706 2.82058 17.0987 2.10991 16.4368C1.39925 15.775 1 14.8772 1 13.9412V4.52941C1 3.59335 1.39925 2.69563 2.10991 2.03374C2.82058 1.37185 3.78444 1 4.78947 1H19.9474C20.9524 1 21.9163 1.37185 22.6269 2.03374C23.3376 2.69563 23.7368 3.59335 23.7368 4.52941V9.82353M1 6.88235H23.7368M6.05263 12.7647H6.06526M11.1053 12.7647H13.6316M17.4211 17.4706H25M17.4211 17.4706L21.2105 13.9412M17.4211 17.4706L21.2105 21" stroke="currentcolor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
								</a>
							</div>
							</div>
							<div>
							<h4 class="title">Amount</h4>
							<div class="view__details">
								<span class="text">$</span>
							</div>
							</div>
							<div>
							<h4 class="title">Transaction Fee</h4>
							<div class="view__details">
								<span class="text">$</span>
							</div>
							</div>
							<div>
							<h4 class="title">Transaction Date</h4>
							<div class="view__details">
								<span class="text"></span>
							</div>
							</div>
							<div>
							<h4 class="title">Type</h4>
							<div class="view__details">
								<span class="text"></span>
							</div>
							</div>
							<div>
							<h4 class="title">Payment Method</h4>
							<div class="view__details">
								<span class="text"></span>
							</div>
							</div>
						</div>
						<div class="transaction-details__list">
							<div>
							<h4 class="title">Allocate Donation</h4>
							<div class="view__details">
								<span class="text allocateDonation"></span>
							</div>
							</div>
							<div>
							<h4 class="title">Dedication / Comment </h4>
							<div class="view__details">
								<span class="text comments"></span>
							</div>
							</div>
							<div>
							<h4 class="title">Letter Request </h4>
							<div class="view__details">
								<span class="text letterReq"></span>
							</div>
							</div>
							<div>
							<h4 class="title">Recognition Request </h4>
							<div class="view__details">
								<span class="text recognitionReq"></span>
							</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@section('scripts')

	<script>
		$(document).ready(function () {

			$('body').on('click','.vw-detail',function (e) { 
				e.preventDefault();

				var id = $(this).data('id');
				var type = $(this).data('type');

				oneTimeDonation(id)
			});

			// Fetch One-Time Donation Data
			function oneTimeDonation(id) {

				$.when(send_ajax_request("{{ route('donation.get') }}",{ id:id },'GET')).done(function(response) {

					var binfo = response.billing;

					$('.payStatus').html(binfo.status);
					$('.campaignName').html(binfo.campaign.org_name);
					$('.donationAmount').html('$'+binfo.donated_amount);
					$('.transactionFee').html('$'+(binfo.fee ? binfo.fee : ''));
					$('.transactionDate').html(getDate(binfo.created_at));
					$('.recurringType').html(binfo.recurring);
					$('.payMethod').html(binfo.payment_gateway);
					$('.allocateDonation').html('');
					$('.comments').html(binfo.comments);
					$('.letterReq').html('');
					$('.recognitionReq').html('');
				});

				$('#oneTimeDonationModal').fadeIn().css("display", "flex");
				$('body').css('overflow', 'hidden');
			}

			function getDonationList(page = 1) {

				$.when(send_ajax_request("{{ route('donation.list') }}",{page: page},'GET')).done(function(response) {
					setBillingList(response.billing);
					$('.custom-pagination').html(response.pagination)
				});
			}

			// Set billing data in html table
			function setBillingList(billing) {

				var row = '<tr><td class="blank_row" colspan="7"></td></tr>';

				$.each(billing, function(index, billingInfo) {

					row += `<tr>
						<td class="user-billing__name">`+billingInfo.campaign.org_name+`</td>
						<td class="user-billing__date">`+(billingInfo.created_at ? getDate(billingInfo.created_at) : 'N/A')+`</td>
						<td class="user-billing__price">$`+billingInfo.donated_amount.toFixed(2)+`</td>
						<td class="user-billing__amount">`+billingInfo.recurring+`</td>
						<td class="user-billing__date">-</td>
						<td><span class="user-billing__status stats--`+billingInfo.status.toLowerCase()+`">`+billingInfo.status+`</span></td>
						<td>
							<a href="javascript:;" class="user-billing_view-details vw-detail" data-type="` + billingInfo.recurring.toLowerCase() + `" data-id="` + billingInfo.id + `">
								<svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<mask id="mask0_2663_245" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="25" height="24">
									<rect x="0.5" width="24" height="24" fill="#D9D9D9"></rect>
								</mask>
								<g mask="url(#mask0_2663_245)">
									<path d="M12.5 16C13.75 16 14.8125 15.5625 15.6875 14.6875C16.5625 13.8125 17 12.75 17 11.5C17 10.25 16.5625 9.1875 15.6875 8.3125C14.8125 7.4375 13.75 7 12.5 7C11.25 7 10.1875 7.4375 9.3125 8.3125C8.4375 9.1875 8 10.25 8 11.5C8 12.75 8.4375 13.8125 9.3125 14.6875C10.1875 15.5625 11.25 16 12.5 16ZM12.5 14.2C11.75 14.2 11.1125 13.9375 10.5875 13.4125C10.0625 12.8875 9.8 12.25 9.8 11.5C9.8 10.75 10.0625 10.1125 10.5875 9.5875C11.1125 9.0625 11.75 8.8 12.5 8.8C13.25 8.8 13.8875 9.0625 14.4125 9.5875C14.9375 10.1125 15.2 10.75 15.2 11.5C15.2 12.25 14.9375 12.8875 14.4125 13.4125C13.8875 13.9375 13.25 14.2 12.5 14.2ZM12.5 19C10.0667 19 7.85 18.3208 5.85 16.9625C3.85 15.6042 2.4 13.7833 1.5 11.5C2.4 9.21667 3.85 7.39583 5.85 6.0375C7.85 4.67917 10.0667 4 12.5 4C14.9333 4 17.15 4.67917 19.15 6.0375C21.15 7.39583 22.6 9.21667 23.5 11.5C22.6 13.7833 21.15 15.6042 19.15 16.9625C17.15 18.3208 14.9333 19 12.5 19ZM12.5 17C14.3833 17 16.1125 16.5042 17.6875 15.5125C19.2625 14.5208 20.4667 13.1833 21.3 11.5C20.4667 9.81667 19.2625 8.47917 17.6875 7.4875C16.1125 6.49583 14.3833 6 12.5 6C10.6167 6 8.8875 6.49583 7.3125 7.4875C5.7375 8.47917 4.53333 9.81667 3.7 11.5C4.53333 13.1833 5.7375 14.5208 7.3125 15.5125C8.8875 16.5042 10.6167 17 12.5 17Z" fill="#0E4542"></path>
								</g>
								</svg>
								<span>View Details</span>
							</a>
						</td>
					</tr>`;
                });

				$('#user-billing tbody').html(row);
			}

			$('body').on('click','#billing-pages a',function() {
				getDonationList($(this).data('page'));
			})

			getDonationList();

		});

		function getDate(timestamp) {

			var date = new Date(timestamp);

			// Extract the month, day, and year
			var month = date.getMonth() + 1; // Months are zero-indexed, so add 1
			var day = date.getDate();
			var year = date.getFullYear().toString().slice(-2); // Get the last 2 digits of the year

			// Format the date as MM/DD/YY
			var formattedDate = month + "/" + day + "/" + year;

			return formattedDate;
		}
		
	</script>

@endsection

@include('frontend.templates.masbia-template.includes.footer')