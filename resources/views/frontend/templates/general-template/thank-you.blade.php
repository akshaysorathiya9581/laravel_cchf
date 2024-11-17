@section('title', 'Thank You')
{{-- @section('raffle_template') --}}
@include('frontend.templates.general-template.includes.header')
<style>
    .header-container,
    .footer-container {
        display: none;
    }
</style>
{{-- {{ dd($stp) }} --}}
<section class="section_gap thank_top_section">
    <div class="container-fluid p-0 m-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="main_heading">
                        <h1>
                            THANK YOU FOR <br>
                            YOUR <span>DONATION</span>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section_gap thank_main_section">
    <div class="container-fluid ">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mt-3 mb-3">
                    <div class="heading">
                        <h2>
                            DEAR <span> {{ $donation->donor_first_name . ' ' . $donation->donor_last_name }},</span>
                        </h2>
                        <p>
                            Thank you for your generous donation of <span>${{ number_format($donation->amount, 2) }}
                            </span>
                        </p>
                        <p>
                            An official receipt will be sent to <span> {{ $donation->donor_email }}</span>
                        </p>
                        <hr>
                    </div>
                    <div class="donor_information">
                        <div class="heading">
                            <h3>
                                Donor Information
                            </h3>
                        </div>
                        <table>
                            <tr>
                                <td>Name:</td>
                                <td>{{ $donation->donor_first_name . ' ' . $donation->donor_last_name }}</td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td>{{ $donation->donor_email ?? '' }}</td>
                            </tr>
                            <tr>
                                <td>Phone:</td>
                                <td>{{ $donation->donor_phone ?? '' }}</td>
                            </tr>
                            <tr>
                                <td>Address:</td>
                                <td>
                                    {{ $donation->address ?? '' }}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-lg-5 mt-3 mb-3">
                    <div class="donation_ticket_details">
                        <div class="heading">
                            <h3>
                                Donation Details
                            </h3>
                        </div>
                        <table>
                            <tr>
                                <td>Donation Date:</td>
                                <td>
                                    @php
                                        $date = new DateTime($donation->created_at);
                                        $formattedDate = $date->format('F j, Y, g:i a');
                                    @endphp
                                    {{ $formattedDate }}

                                </td>
                            </tr> 
                            <tr>
                                <td>Donation Amount:</td>
                                <td>${{ number_format($donation->amount - $TipsTotalAmount, 2) }} </td>
                            </tr>
                            <tr>
                                @if (!empty($details->card_number))
                                    <td>Payment Method:</td>
                                    <td>Credit Card <i>(ending in {{ $details->card_number ?? '' }})</i> </td>
                                @endif
                            </tr> 
                            <tr>
                                @if (count($DonationTips) > 0)
                                    <td style="display: flex" >Yingerman:</td>
                                    <td>
                                        <ul style="list-style: disc" >
                                        @foreach ($DonationTips as $tips)
                                            @if(!empty($tips->tips->title))
                                        <li>
                                            {{ $tips->tips->title . ' - $' . $tips->amount}}
                                            @if($DonationTips->count() > 1) <br> @endif 
                                        </li>                                     
                                            @endif
                                        @endforeach
                                        </ul>
                                    </td>
                                @endif
                            </tr>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@include('frontend.templates.general-template.includes.footer')
