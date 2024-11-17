<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TicketOptions extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'ticket_options';

    protected $fillable = [
        'id',
        'campaign_id',
        'title',
        'price',
        'entries',
        'coupon_id',
        'grand_prize',
        'group_id',
        'order_by',
        'content',
        'icon',
        'season_id'
    ];

    protected $dates = ['deleted_at'];

    public function ticketOptionsPrizes()
    {
        return $this->hasMany(TicketOptionsPrizes::class, 'ticket_option_id', 'id');
    }

    public function grandPrize()
    {
        return $this->belongsTo(GrandPrizes::class, 'grand_prize', 'id');
    }

    public static function getCampaignCustomPrices($campaign_id)
    {
        return self::where('campaign_id', $campaign_id)
            ->with(['grandPrize', 'ticketOptionsPrizes.prize'])
            ->orderBy('order_by', 'asc')
            ->get()
            ->map(function ($ticketOption) {
                $ticketOption->prizesCount = TicketOptionsPrizes::join('prizes', 'ticket_options_prizes.prize_id', '=', 'prizes.id')
                    ->where('ticket_options_prizes.ticket_option_id', $ticketOption->id)
                    ->where('prizes.type', 'prize')
                    ->count();
                return $ticketOption;
            });
    }

    public function getGrandPrizeIds($campaign_id)
    {

        $grandPrizeIDs = $this->where('campaign_id', $campaign_id)
            ->where('grand_prize', '!=', null)
            ->pluck('id')
            ->toArray();


        return json_encode($grandPrizeIDs);
    }
    public static function getCustomPrices($campaignId){
        $data = TicketOptions::where('campaign_id', $campaignId)->get();
        $packages = $data->map(function ($ticketOption) {
            $prizesCount  = Prizes::count();
            $totalPrizes = TicketOptionsPrizes::join('prizes', 'prizes.id', '=', 'ticket_options_prizes.prize_id')
                ->where('ticket_options_prizes.ticket_option_id', $ticketOption->id)
                ->where('prizes.type', 'prize')
                ->count();
            return [
                'id' => $ticketOption->id,
                'amount' => $ticketOption->price,
                'previousEntries' => $ticketOption->entries,
                'entry' => $ticketOption->entries,
                'couponApplied' => false,
                'group_id' => $ticketOption->group_id,
                'prizesAmount' => $prizesCount,
                'icon' => $ticketOption->icon,
                'grandPrize' => $ticketOption->grandPrize ? $ticketOption->grandPrize->amount : null,
                'prizes' => $totalPrizes,
            ];
        });
        return $packages;
    }
}
