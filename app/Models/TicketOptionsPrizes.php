<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TicketOptionsPrizes extends Model
{
    use HasFactory;
    protected $table = 'ticket_options_prizes';

    protected $fillable = [
        'id',
        'campaign_id',
        'ticket_option_id',
        'prize_id'
    ];

    public function ticket_options_prizes()
    {
        return $this->belongsTo(TicketOptions::class);
    }

    public function prize()
    {
        return $this->belongsTo(Prizes::class, 'prize_id', 'id');
    }

    public function ticketOption()
    {
        return $this->belongsTo(TicketOptions::class, 'ticket_option_id', 'id');
    }


    public function getSubPricesByPrizeID($ticket_option_id, $campaign_id)
    {
        $subPriceIDs = $this->where('ticket_option_id', $ticket_option_id)
            ->where('campaign_id', $campaign_id)
            ->orderBy('id', 'asc')
            ->pluck('ticket_option_id')
            ->toArray();

        return json_encode($subPriceIDs);
    }




    public static function getUniqueRecordsByPrizeId($campaignId)
    {
        $results = DB::select('

            SELECT t1.*
            FROM ticket_options_prizes t1
            WHERE t1.campaign_id = :campaign_id_outer
              AND t1.id = (
                  SELECT MIN(t2.id)
                  FROM ticket_options_prizes t2
                  WHERE t2.prize_id = t1.prize_id
                    AND t2.campaign_id = :campaign_id_inner
              )
        ', ['campaign_id_outer' => $campaignId, 'campaign_id_inner' => $campaignId]);

        return $results;
    }

    public function getTicketId($prize_id)
    {

        $grandPrizeIDs = $this->where('prize_id', $prize_id)
            ->pluck('ticket_option_id')
            ->toArray();


        return json_encode($grandPrizeIDs);
    }
}
