<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Donations extends Model
{
    use HasFactory;
    protected $table = 'donations';

    protected $fillable = [
        'friendly_key',
        'visitor_id',
        'campaign_id',
        'ticket_option_id',
        'team_id',
        'donor_first_name',
        'donor_last_name',
        'donor_email',
        'donor_phone',
        'is_anonymous',
        'cell_number',
        'full_address',
        'address',
        'zipcode',
        'street',
        'city',
        'state',
        'country',
        'neighborhood',
        'additional_email',
        'comments',
        'in_memory_of',
        'coupon_id',
        'amount',
        'fee',
        'usd_amount',
        'usd_fee',
        'currency',
        'recurring',
        'recurring_intervals',
        'spt_id',
        'transaction_id',
        'custom_transaction_number',
        'subscription_id',
        'payment_gateway',
        'status',
        'notes',
        'custom_tickets',
        'donated_amount',
        'paid_by',
        'entries',
        'sponsor_oppertunity',
        'other_pm_input_1',
        'other_pm_input_2',
        'sf_key',
        'gift_ids',
        'grand_prize_id',
        'type',
        'season_id',
        'price_option',
        'created_by',
    ];
    public function getRouteKeyName()
    {
        return 'id';
    }
    public function campaign()
    {
        return $this->belongsTo(campaign::class);
    }
    public function stp()
    {
        return $this->belongsTo(DonationSplitPot::class);
    }
    public function tips()
    {
        return $this->belongsTo(DonationTips::class);
    }
    public static function getCampaignDonations($campaignId)
    {
        $data = Donations::where('campaign_id', $campaignId)
            ->where('status','Paid')
            ->orderBy('created_at', 'desc')
            ->take(12)
            ->get();
        $donationData = $data->map(function ($donation) {
            $teamName = Teams::where('id',$donation->team_id)->first();
            $currency = '';
            if ($donation->currency == 'usd') {
                $currency = 'USD';
            } else if ($donation->currency == 'cad') {
                $currency = 'CAD';
            }
            return [
                'id' => $donation->id,
                'name' => $donation->donor_first_name . ' ' . $donation->donor_last_name,
                'amount' => $donation->amount,
                'currency' =>  $currency,
                'comment' => $donation->comments,
                'time' => $donation->created_at,
                'teamName' => $teamName->display_name ?? '',
                'team_slug' => $teamName->slug ?? '',
                'is_anonymous' => $donation->is_anonymous,
                // $donation->team_id ? Teams::where('id', $donation->team_id)->get()->display_name : [],
            ];
        });
        return $donationData;
    }

    public static function getCampaignTeamsDonors($campaignId,$teamID)
    {
        $data = Donations::where('campaign_id', $campaignId)->where('team_id',$teamID)
            ->where('status','Paid')
            ->orderBy('created_at', 'desc')
            ->take(12)
            ->get();
        $donationData = $data->map(function ($donation) {
            $teamName = Teams::where('id',$donation->team_id)->first();
            $currency = '';
            if ($donation->currency == 'usd') {
                $currency = 'USD';
            } else if ($donation->currency == 'cad') {
                $currency = 'CAD';
            }
            return [
                'id' => $donation->id,
                'name' => $donation->donor_first_name . ' ' . $donation->donor_last_name,
                'amount' => $donation->amount,
                'currency' =>  $currency,
                'comment' => $donation->comments,
                'time' => $donation->created_at,
                'teamName' => $teamName->display_name ?? '',
                'team_slug' => $teamName->slug ?? '',
                'is_anonymous' => $donation->is_anonymous,
                // $donation->team_id ? Teams::where('id', $donation->team_id)->get()->display_name : [],
            ];
        });
        return $donationData;
    }
}