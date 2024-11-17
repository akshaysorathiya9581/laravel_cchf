<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation Confirmation</title>
</head>

<body
    style="margin: 0; padding: 0; box-sizing: border-box; font-family: Arial, Helvetica, sans-serif; background-color: #d8d3d3;">

    <div
        style="margin: 0; padding: 0; box-sizing: border-box; font-family: Arial, Helvetica, sans-serif; background-color: #d8d3d3;">
        <table width="800" cellpadding="0" cellspacing="0"
            style="border-collapse: separate; background-color: #fff; width: 800px; margin: auto;">
            <tbody>
                <tr>
                    <td>
                        <span>
                            <table cellpadding="0" cellspacing="0"
                                style="padding: 15px 30px; background-color: #fff; width: 100%;">
                                <tbody>
                                    <tr>
                                        <td>
                                            <table cellpadding="0" cellspacing="0" style="width: 100%;">
                                                <tbody>
                                                    <tr>
                                                        <td align="center">
                                                            <img src="{{ $donation->campaign->media->logo_url ?? '' }}"
                                                                width="100" height="auto" alt="Logo"
                                                                style="display: block;">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <table cellpadding="0" cellspacing="0" width="800"
                                style="padding: 15px 30px; width: 100%;">
                                <tbody>
                                    <tr>
                                        <td
                                            style="position: relative; background-color: #0573f1; padding: 15px; border-radius: 10px; height: 150px; 
                       background-image: url('{{ asset('assets/frontend/templates/multi-location/images/Vector.png') }}'); 
                       background-size: 400px 400px; background-position: 150px -90px; background-repeat: no-repeat; 
                       opacity: 1;">

                                            <div
                                                style="position: relative; z-index: 2; color: #fff; text-align: center; width: 100%;">
                                                <h1
                                                    style="text-transform: capitalize; color: #fff; line-height: 28px; font-size: 28px; font-family: 'Montserrat', sans-serif;">
                                                    Thank You For Your Donation
                                                </h1>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>


                        </span>
                        <table cellpadding="0" cellspacing="0" width="800"
                            style="padding: 30px; font-family: Arial, Helvetica, sans-serif; color: #333; width: 100%;">
                            <tbody> 
                                <tr>
                                    <td style="font-size: 18px;" >
                                        <p style="font-size: 18px;"  >DEAR <b  style="font-size: 18px;color: {{ $donation->campaign->theme_color }}; text-transform: uppercase;">{{ $donation->donor_first_name . ' ' . $donation->donor_last_name }}</b>,
                                        </p>
                                        <p style="font-size: 18px;" >Thank you for your generous donation of
                                          <b  style="font-size: 18px;color: {{ $donation->campaign->theme_color }};">${{ $donation->amount }}</b> 
                                          to support 
                                          <b style="font-size: 18px;color: {{ $donation->campaign->theme_color }};">{{ $donation->campaign->camp_title }} </b>.
                                        </p>
                                        <span>
                                            <p style="font-size: 18px;" >This email well serve as an official tax receipt.</p>
                                            <h2  style="text-transform: uppercase;  font-size: 16px; font-style: italic;">
                                                OFFICIAL RECEIPT FOR INCOME TAX PURPOSE</h2>
                                            <h2 style="color: #333; text-transform: uppercase; font-weight: 700; font-family: Arial, Helvetica, sans-serif; font-size: 20px; margin-bottom: 5px; margin-top: 20px;">
                                                Donor Information</h2>
                                        </span>
                                        <table width="100%" cellpadding="0" cellspacing="0"
                                            style="background-color: #f3f3f3; padding: 10px 20px; font-size: 15px;">
                                            <tbody>
                                                <tr>
                                                    <td width="170">
                                                        <p style="font-size: 18px;margin: 10px 0;"><b>Name:</b></p>
                                                    </td>
                                                    <td>
                                                        <p style="font-size: 18px;margin: 10px 0;">
                                                            {{ $donation->donor_first_name . ' ' . $donation->donor_last_name }}
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p style="font-size: 18px;margin: 10px 0;"><b>Email:</b></p>
                                                    </td>
                                                    <td>
                                                        <p style="margin: 10px 0;">
                                                            <a href="mailto:{{ $donation->donor_email }}"
                                                                target="_blank"
                                                                style="font-size: 18px;text-decoration: none; color: #000;">{{ $donation->donor_email }}</a>
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p style="margin: 10px 0;font-size: 18px;"><b>Phone:</b></p>
                                                    </td>
                                                    <td>
                                                        <p style="margin: 10px 0;">
                                                            <a href="tel:{{ $donation->donor_phone ?? '' }}"
                                                                target="_blank"
                                                                style="font-size: 18px;text-decoration: none; color: #000;">{{ $donation->donor_phone ?? '' }}</a>
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p style="font-size: 18px;margin: 10px 0;"><b>Address:</b></p>
                                                    </td>
                                                    <td>
                                                        <p style="font-size: 18px;margin: 10px 0;">{{ $donation->address ?? '' }}</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p style="font-size: 18px;margin: 10px 0;"><b>Reciept #:</b></p>
                                                    </td>
                                                    <td>
                                                        <p style="font-size: 18px;margin: 10px 0;">
                                                            {{ $donation->organzation_meta->tax_id ?? '' }}</p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <br>
                                        <h2 style="color: #333; text-transform: uppercase; font-weight: 700; font-family: Arial, Helvetica, sans-serif; font-size: 20px; margin-bottom: 5px; margin-top: 20px;"> Donation &amp; Ticket Details</h2>
                                        <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #f3f3f3; padding: 10px 20px; font-size: 18px;">
                                            <tbody>
                                                <tr>
                                                    <td width="170" style="font-weight: bold;">
                                                        <p style="font-size: 18px;margin: 10px 0;"><b>Donation Date:</b></p>
                                                    </td>
                                                    <td style="font-weight: bold;">
                                                        <p style="margin: 0; font-size: 18px; color: {{ $donation->campaign->theme_color }};">
                                                            {{ \Carbon\Carbon::parse($donation->created_at)->format('F j, Y, g:i a') }}
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: bold;">
                                                        <p style="font-size: 18px;margin: 10px 0;"><b>Donation Amount:</b></p>
                                                    </td>
                                                    <td style="font-weight: bold;">
                                                        <p style="margin: 0; font-size: 18px; color: {{ $donation->campaign->theme_color }};">
                                                            ${{ $donation->amount ?? '' }}</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: bold;">
                                                        <p style="font-size: 18px;margin: 10px 0;"><b>Payment Method:</b></p>
                                                    </td>
                                                    <td style="font-weight: bold;">
                                                        <p style="font-size: 18px;margin: 0; font-size: 14px; color: {{ $donation->campaign->theme_color }};">
                                                            {{ $donation->details->pay_method ?? '' }}
                                                            <small>
                                                                <i>(ending in
                                                                    {{ $donation->details->card_number ?? '' }})</i>
                                                            </small>
                                                        </p>
                                                    </td>
                                                </tr>
                                                @if (!empty($donation->entries))
                                                <tr>
                                                    <td style="font-weight: bold;">
                                                        <p style="font-size: 18px;margin: 10px 0;"><b>Prize Entry:</b></p>
                                                    </td>
                                                    <td style="font-weight: bold;">
                                                        <p style="margin: 0; font-size: 18px; color: {{ $donation->campaign->theme_color }};">
                                                            {{ $donation->entries ?? '' }} entries to win
                                                            ${{ $donation->tickets->grand_prize->title ?? '' }} &amp;
                                                            {{ isset($donation->prizes) && is_array($donation->prizes) ? count($donation->prizes) : 0 }}
                                                            Additional Prizes
                                                        </p>

                                                    </td>
                                                </tr>
                                                @endif
                                                @if (!empty($donation->prizes))
                                                    <tr>
                                                        <td style="vertical-align: top;">
                                                            <p style="font-size: 18px;margin: 10px 0;"><b>Prizes:</b></p>
                                                        </td>
                                                        <td style="font-weight: bold;">
                                                            <ul
                                                                style="color: {{ $donation->campaign->theme_color }}; font-size: 18px; font-weight: bold; line-height: 20px; padding-top: 10px; padding-left: 0;">
                                                                @foreach ($donation->prizes as $prize)
                                                                    <li>{{ $prize->name }}</li>
                                                                @endforeach
                                                            </ul>
                                                        </td>
                                                    </tr>

                                                @endif
                                                <tr>
                                                    <td>
                                                        <p style="font-size: 18px;margin: 10px 0;"><b>Donation Amount:</b></p>
                                                    </td>
                                                    <td>
                                                        <p style="font-size: 18px;margin: 10px 0;">${{ $donation->amount ?? '' }}</p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table cellpadding="0" cellspacing="0"
                            style="padding:15px 30px;background-color:#e6e6e6;border-top-left-radius:50px;border-top-right-radius:50px;font-size:15px;width:100%">
                            <tbody>
                                <tr>
                                    <td>
                                        <p style="margin:10px 0;font-size:18px">
                                            <b>{{ $donation->campaign->camp_title ?? '' }}</b></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p style="margin-bottom:10px;font-size:18px"><b>Tax ID :
                                                {{ $donation->organzation_meta->tax_id ?? '' }}</b></p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p style="margin:0;font-size:18px;padding:20px 30px;background-color:#f3f3f3;font-style:italic">
                            <b>The tax deductible status of this receipt does not include the value of any and all
                                physical gifts received. Sweepstakes entries are not considered a physical gifts.</b>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
