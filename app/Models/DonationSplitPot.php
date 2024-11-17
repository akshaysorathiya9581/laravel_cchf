<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonationSplitPot extends Model
{
    use HasFactory;
    protected $table = 'donation_split_the_pot';

    protected $fillable = [
        'donation_id',
        'campaign_split_pot_id',
        'stp_usd_amount',
        'stp_amount',
        'stp_entries',
    ];
    public function donations()
    {
        return $this->belongsTo(Donations::class);
    }
}
