<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation Confirmation</title>
</head>

<body style="margin: 0; padding: 0; box-sizing: border-box; font-family: Arial, Helvetica, sans-serif; background-color: #d8d3d3;">

    <div style="margin:0;padding:0;box-sizing:border-box;font-family:Arial,Helvetica,sans-serif;background-color:#d8d3d3">
        <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#fff;width:800px;margin:auto">
            <tbody>
                <tr>
                    <td>
                        <table width="100%" cellpadding="0" cellspacing="0" style="padding:20px;background-color:#f2f4f4;border-bottom-left-radius:50px;border-bottom-right-radius:50px">
                            <tbody>
                                <tr>
                                    <td>
                                        <table width="100%" cellpadding="0" cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <img src="{{ $donation->campaign->media->logo_url ?? '' }}" width="100" height="auto" alt="Logo" style="display:block" >
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table width="100%" cellpadding="0" cellspacing="0" style="padding:30px;font-family:Arial,Helvetica,sans-serif;color:#333">
                            <tbody>
                                <tr>
                                    <td><span class="im">
                                            <p>Great news!</p>
                                            <p> <b>{{ $donation->donor_first_name. ' ' . $donation->donor_last_name }} donated ${{ $donation->amount }} towards your campaign "{{ $donation->campaign->camp_title }}"</b></p>
                                            <br>
                                        </span>
                                        <table width="100%" cellpadding="0" cellspacing="0" style="background-color:rgb(243,243,243);padding:20px">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <h2 style="text-transform:uppercase;font-weight:700;color:#333;margin:0px 0px 15px 0px;font-size:20px">Donation Details</h2>
                                                        <table width="100%" cellpadding="1" style="padding-top:12px">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="text-align:left">
                                                                        <p style="color: {{ $donation->campaign->theme_color }};font-size:26px;margin:auto">
                                                                            <b style="color:#333;font-size:16px">Donation Date:</b>
                                                                        </p>
                                                                    </td>
                                                                    <td style="text-align:left;font-size:16px;color: {{ $donation->campaign->theme_color }}"> <b>{{ \Carbon\Carbon::parse($donation->created_at)->format('F j, Y, g:i a') }} </b></td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="text-align:left">
                                                                        <p style="color: {{ $donation->campaign->theme_color }};font-size:26px;margin:auto">
                                                                            <b style="color:#333;font-size:16px">Donation Amount: </b>
                                                                        </p>
                                                                    </td>
                                                                    <td style="text-align:left;font-size:16px;color: {{ $donation->campaign->theme_color }}"> <b>${{ $donation->amount }} </b></td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="text-align:left">
                                                                        <p style="color: {{ $donation->campaign->theme_color }};font-size:26px;margin:auto">
                                                                            <b style="color:black;font-size:16px">Payment Method: </b>
                                                                        </p>
                                                                    </td>
                                                                    <td style="text-align:left;font-size:16px;color: {{ $donation->campaign->theme_color }}"> <b>{{ $donation->details->pay_method ?? '' }} </b><small><i>(ending in {{$donation->details->card_number ?? ''}})</i></small></td>
                                                                </tr>

                                                                <tr>
                                                                    <td style="text-align:left">
                                                                        <p style="color: {{ $donation->campaign->theme_color }};font-size:26px;margin:auto">
                                                                            <b style="color:black;font-size:16px;line-height:16px">Number of Entries: </b>
                                                                        </p>
                                                                    </td>
                                                                    <td style="text-align:left;font-size:16px;color: {{ $donation->campaign->theme_color }}"> <b>{{ $donation->entries ?? '' }}</b></td>

                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <p style="line-height:30px;font-size:14px">
                                            <br>
                                            <br>
                                        </p>
                                        <h2 style="color:#333;text-transform:uppercase;font-weight:700;font-family:Arial,Helvetica,sans-serif;font-size:20px">Donor Information</h2>
                                        <table width="100%" cellpadding="0" cellspacing="0" style="height:40px">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <p style="margin:10px 0"><b>Donation Date:</b></p>
                                                    </td>
                                                    <td>
                                                        <p style="margin:0"> {{ \Carbon\Carbon::parse($donation->created_at)->format('F j, Y, g:i a') }}</p>
                                                    </td>
                                                    <td>
                                                        <p style="margin:10px 0"><b>Amount:</b></p>
                                                    </td>
                                                    <td>
                                                        <p style="margin:0"> ${{ $donation->amount }}</p>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td><br>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p style="margin:10px 0"><b>Donor:</b></p>
                                                    </td>
                                                    <td>
                                                        <p style="margin:0"> {{ $donation->donor_first_name . ' ' . $donation->donor_last_name }}</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p style="margin:10px 0"><b>Email: </b></p>
                                                    </td>
                                                    <td>
                                                        <p style="margin:0"> <a href="mailto:{{ $donation->donor_email }}" target="_blank">{{ $donation->donor_email }}</a></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p style="margin:10px 0"><b>Phone: </b></p>
                                                    </td>
                                                    <td>
                                                        <p style="margin:0"> {{ $donation->donor_phone ?? '' }}</p>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <p style="margin:10px 0"><b>Paid Via: </b></p>
                                                    </td>
                                                    <td>
                                                        <p style="margin:0">{{ $donation->details->pay_method ?? '' . $donation->details->card_number ?? '' }}</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p style="margin:10px 0"><b>Reciept #: </b></p>
                                                    </td>
                                                    <td>
                                                        <p style="margin:0">{{ $donation->organzation_meta->tax_id ?? '' }} </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p style="margin:10px 0"><b>Comments: </b></p>
                                                    </td>
                                                    <td>
                                                        <p style="margin:0">{{ $donation->comments }} </p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <br><br>
                                        <p></p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>


                    </td>
                </tr>
            </tbody>
        </table>
        <img src="" alt="" width="1" height="1" border="0" style="height:1px!important;width:1px!important;border-width:0!important;margin-top:0!important;margin-bottom:0!important;margin-right:0!important;margin-left:0!important;padding-top:0!important;padding-bottom:0!important;padding-right:0!important;padding-left:0!important" class="CToWUd" data-bit="iit">
    </div>
</body>

</html>
