<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignUsers extends Model
{
    use HasFactory;
    protected $table = 'campaign_users';
    protected $fillable = [
        'campaign_id',
        'user_id'
    ];
    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
