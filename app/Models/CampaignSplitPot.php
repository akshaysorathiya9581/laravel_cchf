<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CampaignSplitPot extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'campaign_split_the_pot';
    protected $fillable = [
        'campaign_id',
        'title',
        'amount',
        'entries'
    ];

    protected $dates = ['deleted_at'];
    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
