<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignMeta extends Model
{
    use HasFactory;
    protected $table = 'campaign_meta';
    protected $fillable = [
        'campaign_id',
        'goal',
        'show_goal',
        'bonus_amount',
        'bonus_goal',
        'extend_date',
        'enable_gifts',
        'show_end_date',
        'end_date',
        'is_extented',
        'count_down',
        'menuPosition',
        'total_amount_currency',
        'manual_amount',
        'allow_fee',
        'show_recent_donations',
        'show_team_button',
        'is_recurring',
        'multi_currency',
        'intro_content_enabled',
        'intro_content_header',
        'intro_main_content',
        'button_content',
        'additional_content',
        'enable_stats',
        'enable_fabulous_prizes',
        'enable_total_donors',
        'enable_ticket_sold',
        'enable_largest_donation',
        'rules_description',
        'enable_blogs',
        'allow_tip',
        'main_content_yiddish',
        'yingerman_content_yiddish',
        'yingerman_content',
        'letter_price',
        'recognition_price',
        'enable_recognition',
    ];


    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
    public static function getCampaignSetting($campaignId)
    {
        $data = CampaignMeta::where('campaign_id', $campaignId)->first();
        return [
            'showDoners' => $data->show_donors,
            'showGifts' => $data->enable_gifts,
            'createTeams' => $data->show_team_button,
            'showCustomAmount' => $data->manual_amount,
            'enable_blogs' => $data->enable_blogs,
        ];
    }
}